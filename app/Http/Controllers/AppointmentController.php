<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with(['doctor', 'patient'])->get();
        return view('appointments.index', compact('appointments'));
    }

    public function create()
    {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('appointments.create', compact('doctors', 'patients'));
    }

    public function store(Request $request)
{
    // Validación básica
    $request->validate([
        'doctor_id' => 'required|exists:doctors,id',
        'patient_id' => 'required|exists:patients,id',
        'date' => 'required|date',
        'time' => 'required',
        'status' => 'required|in:pending,confirmed,cancelled',
    ]);

    // Combinar fecha y hora
    $appointmentDateTime = \Carbon\Carbon::parse($request->date . ' ' . $request->time);

    // Validar que no sea una fecha pasada
    if ($appointmentDateTime->isPast()) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'La fecha y hora de la cita no pueden ser anteriores a la actual.');
    }

    // Verificar si ya hay una cita en esa fecha y hora para ese doctor
    $exists = Appointment::where('doctor_id', $request->doctor_id)
        ->where('date', $request->date)
        ->where('time', $request->time)
        ->exists();

    if ($exists) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Ya existe una cita registrada para este doctor en esa fecha y hora.');
    }

    // Crear la cita
    Appointment::create($request->all());

    return redirect()->route('appointments.index')->with('success', 'Cita creada correctamente.');
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('appointments.edit', compact('appointment', 'doctors', 'patients'));
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'required|exists:patients,id',
            'date' => 'required|date',
            'time' => 'required',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $appointment->update($request->all());

        return redirect()->route('appointments.index')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', 'Cita eliminada correctamente.');
    }
}