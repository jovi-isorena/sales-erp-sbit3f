<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketcategoryController;
use App\Http\Controllers\TicketingslaController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ecommController;
use App\Http\Controllers\EcommSessionsController;
use App\Http\Controllers\EcommLoginSessionsController;
use App\Http\Controllers\EcommCartController;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\MyOrdersController;
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
Route::get('/admin_login', [SessionController::class, 'adminlogin'])
    ->middleware('guest')
    ->name('adminlogin');
//portal for inventory module
Route::get('/inventory_login', [SessionController::class, 'inventorylogin'])
    ->middleware('guest')
    ->name('inventorylogin');
//portal for ecommerce module
Route::get('/ecommerce_login', [SessionController::class, 'ecommercelogin'])
    ->middleware('guest')
    ->name('ecommercelogin');
//portal for crm module
Route::get('/crm_login', [SessionController::class, 'crmlogin'])
    // ->middleware('guest')
    ->name('crmlogin');

Route::post('/logout', [SessionController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');
Route::post('/sessionStore', [SessionController::class, 'store'])
    ->middleware('guest')
    ->name('sessionStore');

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


//Ecomm module

Route::get('/ecomm_customer/index', [ecommController::class, 'index'])
     ->name('customerHome');

Route::get('/ecomm_customer/login', [EcommSessionsController::class, 'login'])
        ->name('ecommlogin');

Route::get('/ecomm_customer/register', [ecommController::class, 'register'])
        ->name('ecommregister');

Route::get('/ecomm_customer/profile', [ecommController::class, 'profile'])
        ->name('ecommprofile');




//Ecomm customer sessions

Route::post('ecomm_customer/store', [EcommSessionsController::class, 'store'])
        ->name('createUser');

Route::post('ecomm_customer/access', [EcommSessionsController::class, 'access'])
        ->name('loginCustomer');
Route::post('ecomm_customer/upgradeAccount', [EcommSessionsController::class, 'upgradeAccount'])
        ->name('upgradeAccount');   
Route::get('ecomm_customer/unload', [EcommSessionsController::class, 'unload'])
        ->name('logoutCustomer');

//View
Route::post('ecomm_customer/product', [EcommCartController::class, 'product'])
        ->name('product');
// Add to cart
Route::post('ecomm_customer/cart', [EcommCartController::class, 'cart'])
        ->name('addtocart');
// Buy now
Route::post('ecomm_customer/buynow', [EcommCartController::class, 'buynow'])
        ->name('buynow');
//Placeorder
// Preparation Order
Route::post('ecomm_customer/prepplaceorder', [PlaceOrderController::class, 'prepplaceorder'])
        ->name('prepplaceOrdered');
// Place Order for e-pay
Route::post('ecomm_customer/placeorder', [PlaceOrderController::class, 'placeorder'])
        ->name('placeordered');
// Place Order for credit
Route::post('ecomm_customer/placeorder2', [PlaceOrderController::class, 'placeorder2'])
        ->name('placeordered2');
// Place Order for COD
Route::post('ecomm_customer/placeorder3', [PlaceOrderController::class, 'placeorder3'])
        ->name('placeordered3');


//for payment
Route::get('ecomm_customer/cod', [PlaceOrderController::class, 'cod'])
        ->name('cod');

Route::get('ecomm_customer/epayment', [PlaceOrderController::class, 'epayment'])
        ->name('epayment');

Route::get('ecomm_customer/credit', [PlaceOrderController::class, 'credit'])
        ->name('credit');

//View orders

Route::get('/ecomm_customer/myorders', [MyOrdersController::class, 'myorders'])
        ->name('myordersview');







