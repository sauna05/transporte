<?php
namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Driver;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UserController; // Asegúrate de importar el UserController

class CustomerController extends Controller
{
    /**
     * Register a new customer.
     */

     public function index(){
        return view('cliente.orders-create');
     }

     
    public function indexCustomer(){
        $customers = Customer::with('user')->get();
        return view('admin.customers-index',compact('customers'));
    }

    public function createForm(){
        
        return view('admin.customer-create');
    }
    
     
    public function registerCustomer(Request $request)
    {
        // Validación de datos
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'document' => 'required|string|min:10|unique:users,document', 
            //'role_id' => 'required|exists:roles,id', 
        ],[
            'email'=>'El correo electrónico ya ha sido tomado.',
            'document'=>'El campo del documento debe tener al menos 10 caracteres',
            'confirmed'=>'La confirmación del campo de contraseña no coincide.',
            'password'=>'El campo de contraseña debe tener al menos 8 caracteres.',


        ]
    );
    
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

        $user->roles()->attach(2);
        // Crear el cliente asociado al usuario
        Customer::create([
            "user_id" => $user->id,  // Aquí obtenemos el el id del usuario recien creadi
            'phone_number' => $request->phone_number,
        ]);
    
        return redirect()->route('admin.clienteForm')->with('message', 'Cliente creado con éxito.');
    }

    public function eliminarcustomer(Customer $customer)
    {    
        // Get the associated user
        $user = $customer->user;
    
        // Delete the driver
        $customer->delete();
    
        // Delete the associated user
        if ($user) {
            $user->delete();
        }
    
        return redirect()->route('admin.cliente_index')->with('message', 'cliente eliminado con éxito');
    }


    public function show($id)
    {
        // Obtener el conductor específico junto con su usuario
        $customer = Customer::with('user')->findOrFail($id);
        // Pasar el conductor a la vista
        return view('admin.customer-show', compact('customer'));
    }

    //cargar datos del conductor
    public function edit($id) {
        $customer = Customer::with('user')->findOrFail($id);
        return view('admin.customer-edit', compact('customer'));
    }
    
    public function update(Request $request, $id) {
        // Validar los datos
        $datos = $request->validate([
            'document' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
        ]);
    
        // Encontrar al cliente y su usuario asociado
        $customer = Customer::with('user')->findOrFail($id);
        
        // Actualizar los datos del usuario
        $customer->user->update([
            'document' => $datos['document'],
            'name' => $datos['name'],
            'email' => $datos['email'],
        ]);
    
        // Actualizar el número de teléfono del cliente
        $customer->phone_number = $datos['phone_number'];
        $customer->save();
    
        return redirect()->route('admin.cliente_index')->with('message', 'Cliente actualizado con éxito');
    }
}
