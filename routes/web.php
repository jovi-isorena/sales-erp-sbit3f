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
use App\Http\Controllers\ecommController;
use App\Http\Controllers\EcommSessionsController;
use App\Http\Controllers\EcommLoginSessionsController;
use App\Http\Controllers\EcommCartController;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\MyOrdersController;
use App\Http\Controllers\OrderManagementController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseOrderController;
use App\Http\Controllers\QualityControlTestController;
use App\Http\Controllers\ReleaseOrderController;
use App\Http\Controllers\SerializedProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehousestockController;

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
Route::get('/inventory_landing_page', [SessionController::class, 'landingPage'])
    ->middleware('auth')
    ->name('inventoryLandingPage');
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

//Order manager ordermanagerDashboard

Route::get('/ordermanager_dashboard', [HomeController::class, 'ordermanagerDashboard'])
    ->name('orderManagerDashboard');

//Order Management here

Route::get('/ordermanagements_dashboard', [HomeController::class, 'ordermanagementDashboard'])
    ->name('orderManagementDashboard');
    
Route::get('/toPay', [OrderManagementController::class, 'toPay'])
    ->name('toPayPage');

Route::get('/toShip', [OrderManagementController::class, 'toShip'])
    ->name('toShipPage');

Route::get('/toDeliver', [OrderManagementController::class, 'toDeliver'])
    ->name('toDeliverPage');
Route::get('/CompletedOrder', [OrderManagementController::class, 'CompletedOrder'])
    ->name('CompletedOrderPage');
Route::get('/manageproducts_dashboard', [HomeController::class, 'productmanagementDashboard'])
    ->name('productManagementDashboard');

//view to pay details  toReceiveView
Route::post('/toPayView', [OrderManagementController::class, 'toPayView'])
    ->name('toPayViews');
Route::post('/toShipView', [OrderManagementController::class, 'toShipView'])
    ->name('toShipViews');

Route::post('/toReceiveView', [OrderManagementController::class, 'toReceiveView'])
    ->name('toReceiveViews');

// to pay -> to ship
Route::post('/toPayView/toBeShipped', [OrderManagementController::class, 'toBeShipped'])
    ->name('toshipped');
// to ship -> to receive
Route::post('/toShipView/toBeReceived', [OrderManagementController::class, 'toBeReceived'])
    ->name('toReceive');





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
//Preparation cart checkout
Route::post('ecomm_customer/prepplaceorderCart', [PlaceOrderController::class, 'prepplaceorderCart'])
        ->name('prepplaceOrderCart');

// Place Order for e-pay
Route::post('ecomm_customer/placeorder', [PlaceOrderController::class, 'placeorder'])
        ->name('placeordered');
// Place Order for credit
Route::post('ecomm_customer/placeorder2', [PlaceOrderController::class, 'placeorder2'])
        ->name('placeordered2');
// Place Order for COD
Route::post('ecomm_customer/placeorder3', [PlaceOrderController::class, 'placeorder3'])
        ->name('placeordered3');


// Place Order for e-paycart
Route::post('ecomm_customer/placeordercart', [PlaceOrderController::class, 'placeordercart'])
        ->name('placeorderedcart');
// Place Order for creditcart
Route::post('ecomm_customer/placeorder2cart', [PlaceOrderController::class, 'placeorder2cart'])
        ->name('placeordered2cart');
// Place Order for CODcart
Route::post('ecomm_customer/placeorder3cart', [PlaceOrderController::class, 'placeorder3cart'])
        ->name('placeordered3cart');


//for payment
Route::get('ecomm_customer/cod', [PlaceOrderController::class, 'cod'])
        ->name('cod');

Route::get('ecomm_customer/epayment', [PlaceOrderController::class, 'epayment'])
        ->name('epayment');

Route::get('ecomm_customer/credit', [PlaceOrderController::class, 'credit'])
        ->name('credit');


//for payment in Cart
Route::get('ecomm_customer/codcart', [PlaceOrderController::class, 'codcart'])
        ->name('codcart');

Route::get('ecomm_customer/epaymentcart', [PlaceOrderController::class, 'epaymentcart'])
        ->name('epaymentcart');

Route::get('ecomm_customer/creditcart', [PlaceOrderController::class, 'creditcart'])
        ->name('creditcart');



//View my cart
Route::get('/ecomm_customer/mycart', [EcommCartController::class, 'mycart'])
        ->name('mycartview');
        
//View my cart checkout
Route::post('/ecomm_customer/mycartcheckout', [EcommCartController::class, 'mycartcheckout'])
        ->name('mycartcheckouts');

//View my cart remove
Route::post('/ecomm_customer/removecart', [EcommCartController::class, 'removecart'])
        ->name('removeCart');


//View my orders

Route::get('/ecomm_customer/myorders', [MyOrdersController::class, 'myorders'])
        ->name('myordersview');

Route::get('/ecomm_customer/pendingorders', [MyOrdersController::class, 'pendingorders'])
        ->name('myorderspending');

Route::get('/ecomm_customer/shippedorders', [MyOrdersController::class, 'shippedorders'])
        ->name('myordersshipped');

Route::get('/ecomm_customer/receivedorders', [MyOrdersController::class, 'receivedorders'])
        ->name('myordersreceived');

Route::get('/ecomm_customer/completedorders', [MyOrdersController::class, 'completedorders'])
        ->name('myorderscompleted');





//Customer Received

Route::post('/ecomm_customer/myorders', [MyOrdersController::class, 'myordersReceive'])
        ->name('myordersReceive');






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
Route::get('/serialized/checkin', [SerializedProductController::class, 'checkin'])
    ->name('productCheckInList');
Route::post('serialized/checkin/store/{item:testitemno}', [SerializedProductController::class, 'checkinstore'])
    ->name('productCheckIn');
//Release Order
Route::get('/releaserorders', [ReleaseOrderController::class, 'index'])
    ->name('releaseOrderIndex');
Route::get('releaserorders/create', [ReleaseOrderController::class, 'create'])
    ->name('releaseOrderCreate');
Route::post('releaserorders/store', [ReleaseOrderController::class, 'store'])
    ->name('releaseOrderStore');
Route::get('releaserorders/show/{releaseorder}', [ReleaseOrderController::class, 'show'])
    ->name('releaseOrderShow');
Route::get('releaseOrders/fulfill/{releaseorder}', [ReleaseOrderController::class, 'fulfill'])
    ->name('releaseOrderFulfill');
Route::post('releaseOrders/save/{releaseorder}', [ReleaseOrderController::class, 'save'])
    ->name('releaseOrderSave');

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
// LOCATIONS
Route::get('/locations', [LocationController::class, 'index'])
    ->middleware('auth')
    ->name('locationIndex');
Route::get('/locations/create', [LocationController::class, 'create'])
    ->middleware('auth')
    ->name('locationCreate');
Route::post('/locations/store', [LocationController::class, 'store'])
    ->middleware('auth')
    ->name('locationStore');
Route::get('/locations/edit/{location:locationid}', [LocationController::class, 'edit'])
    ->middleware('auth')
    ->name('locationEdit');
Route::put('/locations/update/{location:locationid}', [LocationController::class, 'update'])
    ->middleware('auth')
    ->name('locationUpdate');


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

// QUALITY CONTROL
Route::get('/qualitycontroltest', [QualityControlTestController::class, 'index'])
    ->name('qualityControlTestIndex');
Route::get('/qualitycontroltest/create', [QualityControlTestController::class, 'create'])
    ->name('qualityControlTestCreate');
Route::post('/qualitycontroltest/store', [QualityControlTestController::class, 'store'])
    ->name('qualityControlTestStore');
//SUPPLIER
Route::get('supplier/index', [SupplierController::class, 'index'])
    ->name('supplierIndex');
Route::get('supplier/create', [SupplierController::class, 'create'])
    ->name('supplierCreate');
Route::post('supplier/store', [SupplierController::class, 'store'])
    ->name('supplierStore');
Route::get('supplier/show/{supplier:supplierid}', [SupplierController::class, 'show'])
    ->name('supplierShow');
Route::get('supplier/edit/{supplier:supplierid}', [SupplierController::class, 'edit'])
    ->name('supplierEdit');
Route::put('supplier/update/{supplier:supplierid}', [SupplierController::class, 'update'])
    ->name('supplierUpdate');
Route::get('supplier/archive/{supplier:supplierid', [SupplierController::class, 'archive'])
    ->name('supplierArchive');

//POSITION
Route::get('/position', [PositionController::class, 'index'])
    ->name('positionIndex');
Route::get('/position/show/{position:positionid}', [PositionController::class, 'show'])
    ->name('positionShow');
Route::get('/position/create', [PositionController::class, 'create'])
    ->name('positionCreate');
Route::post('position/store', [PositionController::class, 'store'])
    ->name('positionStore');
Route::put('/position/update/{position}', [PositionController::class, 'update'])
    ->name('positionUpdate');
Route::get('/position/archive/{position:positionid}', [PositionController::class, 'archive'])
    ->name('archivePosition');
Route::get('/position/unarchive/{position:positionid}', [PositionController::class, 'unarchive'])
    ->name('unarchivePosition');

//WAREHOUSE STOCK
Route::get('/warehouse_stock', [WarehousestockController::class, 'index'])
    ->name('warehouseStockIndex');
Route::put('/warehouse_stock/update/{warehousestock}', [WarehousestockController::class, 'update'])
    ->name('warehouseStockUpdate');
Route::get('/warehouse_stock/details/{warehousestock}', [WarehousestockController::class, 'show'])
    ->name('warehouseStockShow');
