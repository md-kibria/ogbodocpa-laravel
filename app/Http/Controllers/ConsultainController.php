<?php

namespace App\Http\Controllers;

use App\Models\Consultain;
use App\Models\Schedule;
use App\Models\Service;
use Illuminate\Http\Request;

class ConsultainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultains = Consultain::orderBy('id', 'desc')->paginate(10);

        return view('admin.consultains.index', compact('consultains'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.consultains.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'service_id' => 'required|exists:services,id',
        ]);

        $data = $request->all();

        Consultain::create($data);

        return redirect()->route('admin.consultains.index')
            ->with('success', 'Consultant created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $consultain = Consultain::findOrFail($id);

        return view('admin.consultains.show', compact('consultain'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $consultain = Consultain::findOrFail($id);
        $services = Service::all();

        return view('admin.consultains.edit', compact('consultain', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
            'service_id' => 'required|exists:services,id',
        ]);

        $consultain = Consultain::findOrFail($id);
        $data = $request->all();

        $consultain->update($data);

        return redirect()->route('admin.consultains.index')
            ->with('success', 'Consultant updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $consultain = Consultain::findOrFail($id);
        $consultain->delete();

        return redirect()->route('admin.consultains.index')
            ->with('success', 'Consultant deleted successfully.');
    }

    public function schedulesStore(Request $request, Consultain $consultain)
    {   
        
        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            // 'end_time' => 'required|date_format:H:i|after:start_time',
            // 'slot' => 'required|integer|min:1',
            // 'days' => 'required|array',
            // 'days.*' => 'in:sunday,monday,tuesday,wednesday,thursday,friday,saturday',
        ]);

        $data = $request->only(['start_time', 'end_time']);
        $days = $request->input('days');
        // dd($days);
        // Initialize all day flags to false
        $dayFlags = [
            'sunday' => false,
            'monday' => false,
            'tuesday' => false,
            'wednesday' => false,
            'thursday' => false,
            'friday' => false,
            'saturday' => false,
        ];

        // Set the selected days to true
        foreach ($days as $day) {
            if (array_key_exists($day, $dayFlags)) {
                $dayFlags[$day] = true;
            }
        }

        // Merge day flags with the main data array
        $data = array_merge($data, $dayFlags);
        
        $consultain->schedules()->create($data);

        return redirect()->route('admin.consultains.show', $consultain->id)
            ->with('success', 'Schedule added successfully.');
    }

    public function schedulesDelete($scheduleId)
    {
        $schedule = Schedule::findOrFail($scheduleId);
        $consultainId = $schedule->consultain_id;
        $schedule->delete();

        return redirect()->route('admin.consultains.show', $consultainId)
            ->with('success', 'Schedule deleted successfully.');
    }
}
