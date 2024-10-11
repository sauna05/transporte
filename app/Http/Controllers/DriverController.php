<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Route;
use App\Models\Driver;
use App\Models\Licence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index()
    {
        //vista para el mostrar imformacion del perfil del conductor
        $drivers = Driver::with('user')->get(); 
        return view('admin.drivers-index', compact('drivers'));
    }


    public function indexDriver()
    {
        // Obtiene el ID del usuario autenticado
        $user_id = Auth::user()->id;
    
        // hacer relacion con licence y filtrar conducto por el id  de usuario
        $driver = Driver::with(['user', 'Licence']) 
            ->where('user_id', $user_id) 
            ->firstOrFail(); 
    
        return view('conductor.driver-show', compact('driver'));
    }

    
    

    public function create(){

        $licences = Licence::all();
        return view('admin.drivers-create',compact('licences'));
    }
 
        public function registerDriver(Request $request)
        {
        // Validaciones
        $validator = Validator::make($request->all(), [
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'license_id' => 'required|exists:licences,id',
            'experience' => 'required|integer|min:0',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'document' => 'required|string|min:10|unique:users,document', 
        ], [
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
            'imagen.max' => 'La imagen no debe pesar más de 2 MB.',
            
            'license.required' => 'El campo licencia es obligatorio.',
            'license.string' => 'La licencia debe ser una cadena de texto.',
            'license.max' => 'La licencia no puede tener más de 255 caracteres.',
            
            'experience.required' => 'El campo experiencia es obligatorio.',
            'experience.integer' => 'La experiencia debe ser un número entero.',
            'experience.min' => 'La experiencia no puede ser negativa.',
            
            'name.required' => 'El campo nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de texto.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.unique' => 'El correo electrónico ya ha sido tomado.',
            
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'La contraseña debe ser una cadena de texto.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            
            'document.required' => 'El campo documento es obligatorio.',
            'document.string' => 'El documento debe ser una cadena de texto.',
            'document.min' => 'El documento debe tener al menos 10 caracteres.',
            'document.unique' => 'El documento ya ha sido registrado.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'document' => $request->document, 
        ]);

        // Asignar rol al usuario
        $user->roles()->attach(3);

        // Crear el conductor asociado al usuario
        $driver = new Driver();
        $driver->user_id = $user->id; // Asegúrate de tener esta relación definida
        $driver->license_id = $request->license_id;
        $driver->experience = $request->experience;
        

        if ($request->hasFile('imagen')) {
            
            $imagePath = $request->file('imagen')->store('images', 'public');
            $driver->imagen = $imagePath;
        }

        $driver->save();

        return redirect()->route('admin.drivers')->with('message', 'Conductor registrado con éxito');
    }

    public function assignRoutesToDriver(Request $request, $driverId)
   {
    // Validaciones
    $validator = Validator::make($request->all(), [
        'routes' => 'required|array', // Asegúrate de que routes sea un array
        'routes.*' => 'exists:routes,id', // Validar cada ruta existente
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Obtener el conductor por ID
    $driver = Driver::findOrFail($driverId);

    // Asignar rutas al conductor
    if ($request->has('routes')) {
        $driver->routes()->attach($request->routes); // Guardar relación en tabla pivote
    }

      return redirect()->route('drivers.index')->with('success', 'Rutas asignadas con éxito al conductor.');
  }
  public function show($id)
  {
      // Obtener el conductor específico junto con su usuario
      $driver = Driver::with('user')->findOrFail($id);
      
      // Pasar el conductor a la vista
      return view('admin.driver-show', compact('driver'));
  }


  public function edit($id) {
    $driver = Driver::with('user')->findOrFail($id);
    $licences = Licence::all();
    return view('admin.driver-edit', compact('driver','licences'));
}

public function update(Request $request, $id) {
    // Validar los datos
    $datos = $request->validate([
        'document' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'license_id' => 'required|exists:licences,id',
        'experience' => 'required|integer|min:0',

    ]
    , [
        'imagen.image' => 'El archivo debe ser una imagen válida.',
        'imagen.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
        'imagen.max' => 'La imagen no debe pesar más de 2 MB.',
        
        'license.required' => 'El campo licencia es obligatorio.',
        'license.string' => 'La licencia debe ser una cadena de texto.',
        'license.max' => 'La licencia no puede tener más de 255 caracteres.',
        
        'experience.required' => 'El campo experiencia es obligatorio.',
        'experience.integer' => 'La experiencia debe ser un número entero.',
        'experience.min' => 'La experiencia no puede ser negativa.',
        
        'name.required' => 'El campo nombre es obligatorio.',
        'name.string' => 'El nombre debe ser una cadena de texto.',
        'name.max' => 'El nombre no puede tener más de 255 caracteres.',
        
        'email.required' => 'El campo correo electrónico es obligatorio.',
        'email.string' => 'El correo electrónico debe ser una cadena de texto.',
        'email.email' => 'El formato del correo electrónico no es válido.',
        'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
        'email.unique' => 'El correo electrónico ya ha sido tomado.',
        
        'document.required' => 'El campo documento es obligatorio.',
        'document.string' => 'El documento debe ser una cadena de texto.',
        'document.min' => 'El documento debe tener al menos 10 caracteres.',
        'document.unique' => 'El documento ya ha sido registrado.'
    ]

);

    // Encontrar al cliente y su usuario asociado
    $driver = Driver::with('user')->findOrFail($id);
    
    // Actualizar los datos del usuario
    $driver->user->update([
        'document' => $datos['document'],
        'name' => $datos['name'],
        'email' => $datos['email'],

    ]);

    $driver->license_id=$datos['license_id'];
    $driver->experience=$datos['experience'];
    $driver->save();


    return redirect()->route('admin.drivers')->with('message', 'Conductor actualizado con éxito');
}

    public function eliminardriver(Driver $driver)
    {
        $user = $driver->user;

        $driver->delete();
        
        if ($user) {
            $user->delete();
        }
    
        return redirect()->route('admin.drivers')->with('message', 'Conductor  eliminados con éxito');
    }
   
}