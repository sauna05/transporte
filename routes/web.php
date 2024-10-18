<?php
use App\Http\Controllers\vehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\driverRouteController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RouteController;
use App\Models\DriverRoute;
use Illuminate\Support\Facades\Route;

// Ruta principal que gestione el login 
Route::get('/', function () {
    return view('login');
});

Route::get('/login', [UserController::class, 'loginForm'])->name('loginForm');
// //Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/login', [UserController::class, 'login'])->name('login');


// // Rutas para el admin
Route::middleware(['role:admin'])->group(function () {

   // Route::get('/admin/dashboard', [UserController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/create', [VehicleController::class, 'create'])->name('admin.create-vehicles');
    Route::post('/admin/register', [VehicleController::class, 'store'])->name('register_vehicle');
    Route::get('/admin/vehicles', [VehicleController::class, 'index'])->name('admin.vehicles');
    Route::get('/admin/reports',[UserController::class, 'reports'])->name('admin.reports');

    Route::get('/admin/vehicle/{id}', [vehicleController::class, 'vehicle_show'])->name('admin.vehicle_show');
   
    // Route::get('/admin/vehicles/{id}/edit', [VehicleController::class, 'edit'])->name('admin.vehicles.edit');
    // Route::post('/admin/vehicles/{id}', [VehicleController::class, 'update'])->name('admin.vehicles.update');


    Route::get('/admin/clienteView', [CustomerController::class, 'indexCustomer'])->name('admin.cliente_index');
    Route::get('/admin/cliente', [CustomerController::class, 'createForm'])->name('admin.clienteForm');
    Route::post('/admin/cliente', [CustomerController::class, 'registerCustomer'])->name('admin.registerCliente');
    Route::get('/admin/customers/{id}', [CustomerController::class, 'show'])->name('admin.customer_show');
    Route::delete('/admin/{customer}', [CustomerController::class, 'eliminarcustomer'])->name('admin.destroy_customer');
    
    Route::get('/admin/customer/{id}', [CustomerController::class, 'edit'])->name('admin.customer_edit');
    Route::put('/admin/customer/{id}', [CustomerController::class, 'update'])->name('admin.customer.update');
    Route::post('/admin/logout', action: [UserController::class, 'logout'])->name('admin.logout');

    //gestion de rutas 
    Route::get('/admin/routes-show/{id}', [RouteController::class,'route_show'])->name('admin.routes-show');
    Route::get('/admin/routes',[RouteController::class,'routes_index'])->name('admin.routesForm');
    Route::get('/admin/routesDocument',[RouteController::class,'buscadorDocument'])->name('admin.showDocument');
    //iniciar ruta
    Route::post('/admin/routes_post',[driverRouteController::class,'iniciarRuta'])->name('admin.iniciar_ruta');

    //ruta para gestionar conductores
    Route::get('/admin/driver', [DriverController::class, 'index'])->name('admin.drivers');
    Route::get('/admin/driverView', [DriverController::class, 'create'])->name('admin.driverForm');
    Route::post('/admin/driverRegister', [DriverController::class, 'registerDriver'])->name('admin.registerDriver');
    Route::get('/admin/drivers/{id}', [DriverController::class, 'show'])->name('admin.driver_show');
    Route::delete('/admin/drivers/{driver}', [DriverController::class, 'eliminardriver'])->name('admin.destroy_driver');

    Route::put('/admin/driver/{id}', [DriverController::class, 'update'])->name('admin.driver.update');

    //para gestionar la actualizacion de registro
    Route::get('/admin/driver{id}',[DriverController::class, 'edit'])->name('admin.driver_edit');
 

});

// // Rutas para conductores
Route::middleware(['role:conductor'])->group(function () {
    Route::get('/conductor/dashboards', [DriverController::class, 'indexDriver'])->name('conductor.routes-index');
    //Route::get('/conductor/routes', [driverRouteController::class, 'index'])->name('conductor.driver-route');
    // Otras rutas para conductores
    Route::post('/admin/logoutDriver', action: [UserController::class, 'logout'])->name('conductor.logout');
});

// Rutas para clientes
Route::middleware(['role:cliente'])->group(function () {
    Route::get('/cliente/dashboard', [CustomerController::class, 'index'])->name('cliente.dashboard');
    Route::get('/cliente/createOrder', [OrderController::class, 'create'])->name('cliente.orders-create');
    Route::post('/cliente/registerorder', [OrderController::class, 'store'])->name('cliente.registerOrder');
    Route::get('/cliente/route-view', [RouteController::class, 'route_customer'])->name('cliente.route-asig');
    
    Route::post('/admin/logoutCustomer', action: [UserController::class, 'logout'])->name('cliente.logout');
    
});




