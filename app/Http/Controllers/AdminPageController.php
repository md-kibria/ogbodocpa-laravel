<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmAppointmentMail;
use App\Mail\RejectAppointmentMail;
use App\Models\Appointment;
use App\Models\Consultain;
use App\Models\Schedule;
use App\Models\HomepageContent;
use App\Models\Info;
use App\Models\Media;
use App\Models\Page;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class AdminPageController extends Controller
{
    public function admin()
    {
        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {   
        $appointmentsCount = Appointment::count();
        $servicesCount = Service::count();
        $usersCount = User::count();
        $consultainsCount = Consultain::count();

        $users = User::orderBy('created_at', 'desc')->take(5)->get();
        $appointments = Appointment::with(['service', 'consultain', 'user'])->orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('appointmentsCount', 'servicesCount', 'usersCount', 'consultainsCount', 'users', 'appointments'));
    }

    public function appointments()
    {   
        $appointments = Appointment::with(['service', 'consultain', 'user', 'schedule'])->orderBy('id', 'desc')->paginate(10);
        return view('admin.appointments.index', compact('appointments'));
    }

    public function appointmentShow(Appointment $appointment)
    {
        $appointment->load(['service', 'consultain', 'user', 'schedule']);
        $schedules = Schedule::where('consultain_id', $appointment->consultain_id)->orderBy('start_time')->get();
        return view('admin.appointments.show', compact('appointment', 'schedules'));
    }

    public function appointmentUpdate(Request $request, Appointment $appointment)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $validated = $request->validate([
            'date' => 'required|date',
            'schedule_id' => 'required|exists:schedules,id',
        ]);

        // Ensure the schedule belongs to the same consultain
        $schedule = Schedule::where('id', $validated['schedule_id'])
            ->where('consultain_id', $appointment->consultain_id)
            ->first();

        if (!$schedule) {
            return redirect()->back()->with('error', 'Selected schedule is invalid for this consultant.');
        }

        $appointment->date = $validated['date'];
        $appointment->schedule_id = $validated['schedule_id'];
        // Keep status as is; admin can approve/reject with separate actions
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment updated successfully.');
    }

    public function appointmentApprove(Request $request, Appointment $appointment)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        if (in_array($appointment->status, ['cancelled', 'rejected', 'completed'])) {
            return redirect()->back()->with('error', 'Cannot approve a '.$appointment->status.' appointment.');
        }

        $appointment->status = 'confirmed';
        $appointment->save();

        Mail::to($appointment->user->email)->send(new ConfirmAppointmentMail($appointment));

        return redirect()->back()->with('success', 'Appointment approved.');
    }

    public function appointmentReject(Request $request, Appointment $appointment)
    {
        if(Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        if ($appointment->status === 'rejected') {
            return redirect()->back()->with('error', 'Appointment is already rejected.');
        }

        $appointment->status = 'rejected';
        $appointment->save();

        Mail::to($appointment->user->email)->send(new RejectAppointmentMail($appointment));

        return redirect()->back()->with('success', 'Appointment rejected.');
    }

    public function appointmentCancel(Request $request, Appointment $appointment)
    {
        
        if(Auth::user()->role !== 'admin' && Auth::id() !== $appointment->user_id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }
        if ($appointment->status === 'cancelled') {
            return redirect()->back()->with('error', 'Appointment is already cancelled.');
        }

        $appointment->status = 'cancelled';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment has been cancelled successfully.');
    }

    public function homePage()
    {
        $homepageContent = HomepageContent::all();
        $services = Service::all();

        return view('admin.pages.home', compact('homepageContent', 'services'));
    }

    public function homePageUpdate(Request $request)
    {
        $request->validate([
            'section' => 'required',
        ]);

        $homepageContent = HomepageContent::firstOrNew(['section' => $request->section]);

        $data = $request->all();

        // if($request->section === 'features_services') {
        //     $data['title'] = json_encode([
        //         'service_1' => $request->service_1,
        //         'service_2' => $request->service_2,
        //         'service_3' => $request->service_3,
        //         // 'service_4' => $request->service_4,
        //     ]);
        // }

        // Handle file uploads
        if ($request->hasFile('image')) {
            // Check and delete previous image if a new one is provided
            if ($homepageContent->image) {
                Storage::delete($homepageContent->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        $homepageContent->update($data);

        return redirect()->back()->with('success', 'Homepage content updated successfully');
    }

    public function aboutPage()
    {
        $page = Page::where('slug', 'about')->first();
        return view('admin.pages.about', compact('page'));
    }

    public function aboutPageUpdate(Request $request)
    {

        $request->validate([
            'slug' => 'required',
            'content' => 'required',
            'name' => 'required',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string'
        ]);
        $page = Page::firstOrNew(['slug' => $request->slug]);
        $page->update(['content' => $request->content, 'name' => $request->name, 'seo_keywords' => $request->seo_keywords, 'seo_description' => $request->seo_description]);

        return redirect()->back()->with('success', 'Page updated successfully');
    }

    public function page(Page $page)
    {
        return view('admin.pages.page', compact('page'));
    }

    public function pageUpdate(Request $request, Page $page)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'visible' => 'nullable|boolean',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string'
        ]);

        $data = $request->all();
        $data['visible'] = $request->has('visible') ? true : false;

        $page->update($data);
        return redirect()->back()->with('success', 'Page updated successfully');
    }

    
    public function settings()
    {
        $info = Info::find(1);
        $medias = Media::all();

        return view('admin.settings', compact('info', 'medias'));
    }

    public function settingUpdate(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,ico|max:2048',
            'description' => 'nullable|string',
            'footer_description' => 'nullable|string',
            'seo_keywords' => 'nullable|string',
            'seo_description' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'fax' => 'nullable|string',
            'business_hours' => 'nullable|string',
            'address' => 'nullable|string',
            'is_appointment' => 'nullable|string',
        ]);

        $siteInfo = Info::firstOrNew(['id' => 1]);
        // Check and delete previous logo if a new one is provided
        if ($request->hasFile('logo')) {
            if ($siteInfo->logo) {
                Storage::delete($siteInfo->logo);
            }
            $siteInfo->logo = $request->file('logo')->store('logos', 'public');
        }
        
        if ($request->hasFile('footer_logo')) {
            if ($siteInfo->footer_logo) {
                Storage::delete($siteInfo->footer_logo);
            }
            $siteInfo->footer_logo = $request->file('footer_logo')->store('footer_logos', 'public');
        }

        // Check and delete previous favicon if a new one is provided
        if ($request->hasFile('favicon')) {
            if ($siteInfo->favicon) {
                Storage::delete($siteInfo->favicon);
            }
            $siteInfo->favicon = $request->file('favicon')->store('favicons', 'public');
        }

        $siteInfo->title = $request->title ?? $siteInfo->title;
        $siteInfo->description = $request->description ?? $siteInfo->description;
        $siteInfo->footer_description = $request->footer_description ?? $siteInfo->footer_description;
        $siteInfo->seo_keywords = $request->seo_keywords ?? $siteInfo->seo_keywords;
        $siteInfo->seo_description = $request->seo_description ?? $siteInfo->seo_description;
        $siteInfo->email = $request->email ?? $siteInfo->email;
        $siteInfo->phone = $request->phone ?? $siteInfo->phone;
        $siteInfo->fax = $request->fax ?? $siteInfo->fax;
        $siteInfo->business_hours = $request->business_hours ?? $siteInfo->fax;
        $siteInfo->address = $request->address ?? $siteInfo->address;
        $siteInfo->is_appointment = (bool) $request->input('is_appointment');

        $siteInfo->save();

        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function settingMediaUpdate(Request $request)
    {
        $socialMediaPlatforms = ['facebook', 'instagram', 'twitter', 'youtube', 'github', 'dribbble'];

        foreach ($socialMediaPlatforms as $platform) {
            $url = $request->input($platform);

            // Find or create the media record
            $media = Media::firstOrNew(['name' => $platform]);
            $media->url = $url;
            $media->save();
        }

        return redirect()->back()->with('success', 'Social media links updated successfully');
    }
}
