<?php

namespace App\Http\Controllers;

use App\Mail\SubmitAppointmentMail;
use App\Models\Appointment;
use App\Models\Consultain;
use App\Models\HomepageContent;
use App\Models\Info;
use App\Models\Page;
use App\Models\Resource;
use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PageController extends Controller
{
    public function home()
    {
        $info = Info::find(1);

        $header = HomepageContent::where('section', 'header')->first();
        $about = HomepageContent::where('section', 'about')->first();
        $appointment = HomepageContent::where('section', 'appointment')->first();
        $features_1 = HomepageContent::where('section', 'features_1')->first();
        $features_2 = HomepageContent::where('section', 'features_2')->first();
        $features_3 = HomepageContent::where('section', 'features_3')->first();
        $philosophy = HomepageContent::where('section', 'our_philosophy')->first();
        $services = Service::orderBy('id', 'desc')->take(3)->get();

        return view('pages.home', compact('info', 'header', 'about', 'appointment', 'features_1', 'features_2', 'features_3', 'philosophy', 'services'));
    }

    public function services()
    {
        $services = Service::orderBy('id', 'desc')->paginate(12);
        $page = Page::where('slug', 'services')->first();

        return view('pages.services', compact('services', 'page'));
    }

    public function service(Service $service)
    {
        // $service = Service::where('slug', $slug)->firstOrFail();
        return view('pages.service', compact('service'));
    }

    public function about()
    {
        $page = Page::where('slug', 'about')->first();

        return view('pages.about', compact('page'));
    }

    public function appointment()
    {
        $page = Page::where('slug', 'appointment')->first();
        $info = Info::find(1);
        $services = Service::orderBy('id', 'desc')->get();

        return view('pages.appointment', compact('page', 'info', 'services'));
    }

    public function appointmentConsultain(Service $service)
    {
        return response()->json($service->consultains);
    }

    public function consultainSchedule(Consultain $consultain)
    {

        // add attribute to is_booked = true/false

        // get date from query string
        $date = request()->query('date');

        // find day from date
        $dayOfWeek = strtolower(date('l', strtotime($date)));

        $schedules = $consultain->schedules()->where($dayOfWeek, true)->orderBy('start_time', 'asc')->get();

        $appointments = Appointment::where('date', $date)
            ->where('consultain_id', $consultain->id)
            ->where('status', '!=', 'cancelled')
            ->get()
            ->toArray();
        foreach ($schedules as $schedule) {
            $schedule->is_booked = in_array($schedule->id, array_column($appointments, 'schedule_id'));
        }
        return response()->json($schedules);
    }

    public function appointmentPreview(Request $request)
    {
        $service_id = $request->query('service_id');
        $consultain_id = $request->query('consultain_id');
        $date = $request->query('date');
        $slot_id = $request->query('slot_id');

        $service = Service::find($service_id);
        $consultain = Consultain::find($consultain_id);
        $time_slot = Schedule::find($slot_id);

        if (!$service || !$consultain || !$date || !$time_slot) {
            return redirect()->route('appointment')->with('error', 'Invalid appointment details. Please try again.');
        }

        return response()->json([
            'service' => $service,
            'consultain' => $consultain,
            'date' => $date,
            'time_slot' => $time_slot,
        ]);
    }

    public function appointmentConfirm(Request $request)
    {
        $service_id = $request->query('service_id');
        $consultain_id = $request->query('consultain_id');
        $date = $request->query('date');
        $notes = $request->query('notes');
        $slot_id = $request->query('slot_id');

        $service = Service::find($service_id);
        $consultain = Consultain::find($consultain_id);
        $time_slot = Schedule::find($slot_id);

        if (!$service || !$consultain || !$date || !$time_slot) {
            return redirect()->route('appointment')->with('error', 'Invalid appointment details. Please try again.');
        }

        // Store on databse
        $data = [
            'service_id' => $service->id,
            'consultain_id' => $consultain->id,
            'date' => $date,
            'schedule_id' => $time_slot->id,
            'user_id' => Auth::id(),
            'client_name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
            'client_email' => Auth::user()->email,
            'client_phone' => Auth::user()->phone,
            'notes' => $notes,
            'status' => 'pending',
        ];

        $apntmt = Appointment::create($data);
        
        Mail::to(Auth::user()->email)->send(new SubmitAppointmentMail($apntmt));

        return response()->json([
            'status' => 200,
            'message' => date('F d, Y', strtotime($date)) . ' at ' . date('h:i A', strtotime($time_slot->start_time)) . '<br/> with ' . $consultain->name,
        ]);
    }

    public function contact()
    {
        $page = Page::where('slug', 'contact')->first();
        $info = Info::find(1);

        return view('pages.contact', compact('page', 'info'));
    }

    public function resources()
    {
        $resources = Resource::orderBy('id', 'desc')->paginate(12);
        $page = Page::where('slug', 'resources')->first();

        return view('pages.resources', compact('resources', 'page'));
    }
}
