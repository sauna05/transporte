<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Route;
use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    /**
     * Show the registration form.
     */

    public function  loginForm(){
        return view('login');
    }
    public function reports(){
        $vehicles_to=Vehicle::all();
        $driver=Driver::all();
        $customer = Customer::all();
        //sacar los conductores disponibles
        $drivers = Driver::with('user')->where('availability', 'disponible')->get(); 
        //sacar los vehicles disponibles
        $vehicles = Vehicle::where('status', 'disponible')->get(); 
        //sacar los conductores ocupados
        $drivers_ocu = Driver::with('user')->where('availability', 'ocupado')->get(); 
        //sacar los vehiculos ocupados
        $vehicles_ocu = Vehicle::where('status', 'ocupado')->get();
        //gestionar la cantidad de pedidos
        $orders = Order::all();
        //filtrar los pedidos en progreso
        $order_pro = Route::where('status','en curso')->get();
        //filtrar pedidos pendientes
        $order_pend = Route::where('status', 'pendiente')->get();
        $price_count = Route::sum('price');
        return view('admin.reports-show',
        compact('vehicles','driver',
        'vehicles_to','drivers','vehicles','customer',
        'drivers_ocu','vehicles_ocu','orders','order_pro','order_pend','price_count'));
    }
    



    public function login(Request $request)
    {
        // Validar las credenciales de inicio de sesión
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
    
        // Intentar autenticar al usuario
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
    
            // Redirigir según el rol del usuario
            if ($user->roles()->where('name', 'admin')->exists()) {
                return redirect()->route('admin.vehicles');
            } elseif ($user->roles()->where('name', 'cliente')->exists()) {
                return redirect()->route('cliente.dashboard');
            } elseif ($user->roles()->where('name', 'conductor')->exists()) {
                return redirect()->route('conductor.routes-index');
            }
        }
    
        // Si las credenciales no son correctas, redirigir de nuevo con errores
        return redirect()->back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput(); // Mantiene los datos ingresados
    }



    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();
    
        // Redirigir a la ruta de inicio de sesión con un mensaje
        return redirect()->route('loginForm')->with('message', 'Has cerrado sesión correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Usuario no encontrado']);
        }

        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Usuario no encontrado']);
        }

        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Usuario no encontrado']);
        }

        // Validar los datos para la actualización
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $id,
            // Agrega otros campos que deseas actualizar si es necesario
        ]);

        // Actualizar los datos del usuario
        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'Usuario no encontrado']);
        }
        
        // Eliminar el usuario
        $user->delete();
        
        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito');
    }

    /**
     * Display all users.
     */
    public function allUsers()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return redirect()->back()->withErrors(['error' => 'No hay usuarios registrados']);
        }

        return view('users.index', ['users' => $users]);
    }
}