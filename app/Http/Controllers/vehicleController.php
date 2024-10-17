<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class vehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all(); // Obtener todos los vehículos
        return view('admin.vehicles-index', compact('vehicles')); // Pasar datos a la vista
    }

    public function create()
    {
        return view('admin.vehicles-create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'type.required' => 'El campo tipo es obligatorio.',
            'type.string' => 'El tipo debe ser una cadena de texto.',
            'type.max' => 'El tipo no puede tener más de 255 caracteres.',
        
            'capacity.required' => 'El campo capacidad es obligatorio.',
            'capacity.integer' => 'La capacidad debe ser un número entero.',
            'capacity.min' => 'La capacidad debe ser al menos 1.',
        
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
            'imagen.max' => 'La imagen no debe pesar más de 2 MB.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vehicle = new Vehicle();
        $vehicle->type = $request->type;
        $vehicle->capacity = $request->capacity;

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('images', 'public');
            $vehicle->imagen = $imagePath;
        }

        $vehicle->save();
        return redirect()->route('admin.create-vehicles')->with('message', 'Vehículo creado con éxito');
    }



    public function show($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.show', compact('vehicle'));
    }

    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
       
        $vehicle = Vehicle::findOrFail($id);
        
        // Actualizar solo los campos relevantes
        $vehicle->update($request->only(['type', 'capacity', 'status']));

        return redirect()->route('admin.vehicles.index')->with('success', 'Vehículo actualizado con éxito');
    }

    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        $vehicle->delete();
        
        return redirect()->route('admin.vehicles.index')->with('success', 'Vehículo eliminado con éxito');
    }
}