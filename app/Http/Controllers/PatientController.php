<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email',
            'birthdate' => 'required|date',
            'phone' => 'nullable|string|max:20',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente creado correctamente.');
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:patients,email,' . $patient->id,
            'birthdate' => 'required|date',
            'phone' => 'nullable|string|max:20',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index')->with('success', 'Paciente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('patients.index')->with('success', 'Paciente eliminado correctamente.');
    }
}
