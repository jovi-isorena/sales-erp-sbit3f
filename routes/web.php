<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketcategoryController;
use App\Http\Controllers\TicketingslaController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\ReleaseOrderController;
use App\Http\Controllers\SerializedProductController;
use App\Http\Controllers\UserController;
use App\Models\Releaseorder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//TESTING PAGE
Route::get('/test', [HomeController::class, 'test']);
//HOME
Route::get('/', [HomeController::class, 'index'])
    ->name('home');
Route::get('/home', [HomeController::class, 'index']);
//NONADMIN
Route::get('/tickets', [HomeController::class, 'tickets'])
    ->name('repTickets');
//TICKET CATEGORY
Route::get('/ticketcategory', [TicketcategoryController::class, 'index'])
    ->name('categories');
Route::get('/ticketcategory/create', [TicketcategoryController::class, 'create'])
    ->name('categoryCreate');
Route::post('/ticketcategory/store', [TicketcategoryController::class, 'store'])
    ->name('categoryStore');
Route::get('/ticketcategory/details/{ticketcategory:categoryid}', [TicketcategoryController::class, 'show'])
    ->name('categoryShow');
Route::get('/ticketcategory/edit/{ticketcategory:categoryid}', [TicketcategoryController::class, 'edit'])
    ->name('categoryEdit');
Route::put('/ticketcategory/update/{ticketcategory:categoryid}', [TicketcategoryController::class, 'update'])
    ->name('categoryUpdate');
Route::get('/ticketcategory/archive/{ticketcategory:categoryid}', [TicketcategoryController::class, 'destroy'])
    ->name('categoryArchive');


//SLA
Route::get('/sla', [TicketingslaController::class, 'index'])
    ->name('sla');
Route::put('/sla/update/{ticketingsla:slaid}', [TicketingslaController::class, 'update'])
    ->name('slaUpdate');

//CUSTOMER
Route::get('/customer', [CustomerController::class, 'index'])
    ->name('customer');
Route::post('/customer/load',[CustomerController::class, 'load'])
    ->name('customerLoad');
Route::get('/customer/unload',[CustomerController::class, 'unload'])
    ->name('customerUnload');
Route::get('/customer/myticket',[CustomerController::class, 'myticket'])
    ->name('myTicket');
Route::get('/customer/newticket',[CustomerController::class, 'newticket'])
    ->name('newTicket');


//TICKET
Route::post('/ticket/store', [TicketController::class, 'store'])
    ->name('ticketStore');
Route::get('/ticket/show/{ticket}', [TicketController::class, 'show']);
Route::put('/ticket/{ticket}', [TicketController::class, 'closeTicket']);

//SESSION or PORTAL
//portal for admin module
Route::get('/employee_portal', [SessionController::class, 'employeeportal'])
    ->middleware('guest')
    ->name('employeePortal');    
Route::post('/logout', [SessionController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::post('/sessionStore', [SessionController::class, 'store'])
    ->middleware('guest')
    ->name('sessionStore');
Route::get('/first_login', [SessionController::class, 'firstlogin'])
    ->middleware('auth')
    ->name('firstLogin');
//QUEUE
Route::get('/queue', [QueueController::class, 'index'])
    ->name('queue');
Route::post('/queue/enqueue', [QueueController::class, 'enqueue'])
    ->name('enqueue');
Route::post('assignTicket', [QueueController::class, 'assign'])
    ->name('assign');
Route::get('queue/reset', [QueueController::class, 'reset'])
    ->name('resetQueue');
Route::get('queue/dequeue', [QueueController::class, 'dequeue'])
    ->name('dequeue');

//COMMENT
Route::post('/comment/customercomment', [CommentController::class, 'storeCustomerComment']);

//CRM MODULE
Route::get('/crm_dashboard', function (){ return view('nonadmin.crmadmin_dashboard');})
    ->name('crmAdminDashboard');
Route::get('/rep_dashboard', [HomeController::class, 'repDashboard'])
    ->name('repDashboard');
Route::get('/lead_dashboard', [HomeController::class, 'leadDashboard'])
    ->name('leadDashboard');

//Inventory Module
Route::get('/inventory_dashboard', [HomeController::class, 'inventoryDashboard'])
    ->name('inventoryDashboard');
//Product Maintenance
Route::get('/inventory_maintenance', [ProductController::class, 'index'])
    ->name('inventoryMaintenance');
Route::post('/product/store', [ProductController::class, 'store'])
    ->name('addProduct');
Route::get('/product/edit/{product:productid}', [ProductController::class, 'edit'])
    ->name('editProduct');
Route::put('/product/update/{product:productid}', [ProductController::class, 'update'])
    ->name('updateProduct');
Route::get('/product/archive/{product:productid}', [ProductController::class, 'archive'])
    ->name('archiveProduct');
Route::get('/product/unarchive/{product:productid}', [ProductController::class, 'unarchive'])
    ->name('unarchiveProduct');
//Serialized Product Maintenance
Route::get('/serialized', [SerializedProductController::class,'index'])
    ->name('serializedIndex');
Route::get('/serialized/create', [SerializedProductController::class, 'create'])
    ->name('serializedCreate');
Route::post('/serialized/store', [SerializedProductController::class, 'store'])
    ->name('serializedStore');
Route::get('/serialized/edit/{serializedproduct:id}', [SerializedProductController::class, 'edit'])
    ->name('serializedEdit');
Route::put('/serialized/update/{serializedproduct:id}', [SerializedProductController::class, 'update'])
    ->name('serializedUpdate');
//Release Order
Route::get('/releaserorders', [ReleaseOrderController::class, 'index'])
    ->name('releaseOrderIndex');
Route::get('releaserorders/create', [ReleaseOrderController::class, 'create'])
    ->name('releaseOrderCreate');
Route::post('releaserorders/store', [ReleaseOrderController::class, 'store'])
    ->name('releaseOrderStore');
Route::get('releaserorders/show/{releaseorder}', [ReleaseOrderController::class, 'show'])
    ->name('releaseOrderShow');

// ADMIN MODULE
Route::get('admin_dashboard', [HomeController::class, 'adminDashboard'])
    ->name('adminDashboard');
// Employee Maintenance
Route::get('/employee/index', [EmployeeController::class, 'index'])
    ->name('employeeIndex');
Route::get('/employee/create', [EmployeeController::class, 'create'])
    ->name('employeeCreate');
Route::post('employee/store', [EmployeeController::class, 'store'])
    ->name('employeeStore');
// System Account Maintenance
Route::get('/systemaccount/create/{employee:employeeid}', [UserController::class, 'create'])
    ->name('userCreate');
Route::post('/systemaccount/store/{employee:employeeid}', [UserController::class, 'store'])
    ->name('userStore');
Route::get('/systemaccount/edit/{user:employeeid}', [UserController::class, 'edit'])
    ->name('userEdit');
Route::put('/systemaccount/update/{user:employeeid}', [UserController::class, 'update'])
    ->name('userUpdate');
Route::post('/systemaccount/deactivate/{user:employeeid}', [UserController::class, 'deactivate'])
    ->name('userDeactivate');
Route::post('/systemaccount/reactivate/{user:employeeid}', [UserController::class, 'reactivate'])
    ->name('userReactivate');
Route::post('/systemaccount/unlock/{user:employeeid}', [UserController::class, 'unlock'])
    ->name('userUnlock');
Route::post('/systemaccount/changepassword/{user:employeeid}', [UserController::class, 'changepassword'])
    ->name('changePassword');
//PURCHASE ORDER
Route::get('/purchaseorder', [PurchaseOrderController::class, 'index'])
    ->middleware('auth')
    ->name('purchaseOrderIndex');
Route::get('/purchaseorder/create', [PurchaseOrderController::class, 'create'])
    ->middleware('auth')
    ->name('purchaseOrderCreate');
Route::post('/purchaseorder/store', [PurchaseOrderController::class, 'store'])
    ->middleware('auth')
    ->name('purchaseOrderStore');
Route::put('/purchaseorder/update/{purchaseorder:id}', [PurchaseOrderController::class, 'update'])
    ->middleware('auth')
    ->name('purchaseOrderUpdate');
Route::put('/purchaseorder/cancel/{purchaseorder:id}', [PurchaseOrderController::class, 'cancel'])
    ->middleware('auth')
    ->name('purchaseOrderCancel');
Route::get('/purchaseorder/receive/{purchaseorder:id}', [PurchaseOrderController::class, 'receive'])
    ->middleware('auth')
    ->name('purchaseOrderReceive');
Route::get('/purchaseorder/show/{purchaseorder}', [PurchaseOrderController::class, 'show'])
    ->name('purchaseOrderShow');