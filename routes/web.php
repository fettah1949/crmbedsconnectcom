<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });




Route::get('/crono_taux', 'ReservationController@crono_taux');
Route::get('/add_reservation_crono', 'ReservationController@add_reservation_crono');
Route::POST('/getAccessToken', 'ReservationController@getAccessToken')->name('getAccessToken');
Route::POST('/getAccessToken_purchase', 'ReservationController@getAccessToken_purchase')->name('getAccessToken_purchase');


Route::get('/redirectToZoho', 'ReservationController@redirectToZoho')->name('redirectToZoho');
Route::get('/redirectToZoho_purchase', 'ReservationController@redirectToZoho_purchase')->name('redirectToZoho_purchase');


Route::group(['middleware' => 'auth'] , function() {

    // $this->middleware
    Route::redirect('admin2020','login');
    Route::get('/password/reset', function() {
        return redirect('/login');    
    });
    // Route::get('/analytics', function() {
    //     // $category_name = '';
    //     $data = [
    //         'category_name' => 'dashboard',
    //         'page_name' => 'analytics',
    //         'has_scrollspy' => 0,
    //         'scrollspy_offset' => '',
    //     ];
    //     // $pageName = 'analytics';
    //     return view('dashboard2')->with($data);
    // });
      Route::get('/sales', 'HomeController@index');
      Route::get('/analytics', 'HomeController@index1');
      Route::get('/search_sale', 'ReservationController@search_sale');
      Route::get('/search_sale_ajax', 'ReservationController@search_sale_ajax');

      Route::get('/searchanalytics', 'HomeController@search');
    // Route::get('/sales', function() {
    //     // $category_name = '';
    //     $data = [
    //         'category_name' => 'dashboard',
    //         'page_name' => 'sales',
    //         'has_scrollspy' => 0,
    //         'scrollspy_offset' => '',
    //     ];
    //     // $pageName = 'sales';
    //     return view('dashboard')->with($data);
    // });

    Route::prefix('production')->group(function () {
        Route::get('/getdetail', 'ReservationController@getdetail');
    
        // Route::get('/reservation', [ReservationController::class,'index']);
        // Route::post('/reservation', [ReservationController::class,'reservationPost']);
        Route::resource('reservation', ReservationController::class);
        
        
     


       

        
        Route::resource('/hotellist', HoteListController::class);
        Route::resource('/hotelrooms', HotelRoomController::class);
        Route::get('hotelrooms/createH/{HotelCode}', 'HotelRoomController@createH')->name('createH');
        Route::resource('/rooms', RoomsController::class);
        Route::post('/import', 'HoteListController@import')->name('import');
        Route::get('/export', 'HoteListController@export')->name('export');
        Route::post('/update_innvioce', 'ReservationController@update_innvioce');	
        Route::post('/Confirm_HCN', 'ReservationController@Confirm_HCN');	

    });

    Route::get("list",[ReservationController::class,'create']);

    
        

 Route::prefix('invoicing')->group(function () {

        Route::get('/sale', 'ReservationController@sale_Purchase_zoho');	

   Route::get('/purchase', 'ReservationController@Purchase_zoho');
   
    });

    // BANK

    
    Route::post('banks/result/{bank_id}', 'BanksController@filter')->name('filter_banks');
    Route::get('banks/currencies', 'BanksController@currencies')->name('currencies');
    Route::get('banks/update_currencies', 'BanksController@update_currencies')->name('update_currencies');
    Route::get('banks/transactions/{bank_id}', 'BanksController@bankTransactions')->name('bank_transactions');
    Route::get('banks/transactions/{bank_id}/new/{type}', 'BanksController@newTransactions')->name('new_transactions');
    Route::get('banks/transactions/{bank_id}/edit/{transaction_id}', 'TransactionsController@editTransactions')->name('edit_transactions');
    Route::get('banks/delete_transactions/{transaction_id}', 'TransactionsController@deleteTransactions')->name('delete_transactions');
    Route::resource('/banks', BanksController::class);
    Route::resource('/transactions', TransactionsController::class);
    Route::resource('/expense', ExpenseController::class);
    Route::get('expense/delete_expense/{expense_id}', 'ExpenseController@deleteExpense')->name('delete_expense');
    Route::post('expense/result', 'ExpenseController@filter')->name('filter_expense');
  

    
    
    // BANK
    Route::get('/bank', function() {
        // $category_name = 'bank';
        $data = [
            'category_name' => 'bank',
            'page_name' => 'bank',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'calendar';
        return view('pages.bank.B_A_1')->with($data);
    });   

    // EXPENSE
    Route::get('/expenses', function() {
        // $category_name = 'auth';
        $data = [
            'category_name' => 'expense',
            'page_name' => 'expense',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'auth_boxed';
        return view('pages.expense.expense')->with($data);
    });
    Route::prefix('vervotech')->group(function () {
        Route::get('/liste', 'HoteListController@liste')->name('liste');

    });

    // CONTACT
    Route::prefix('contact')->group(function () {
        Route::get('/general_contact', function() {
            // $category_name = 'contact';
            $data = [
                'category_name' => 'contact',
                'page_name' => 'general_contact',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'general_contact';
            return view('pages.contact.general')->with($data);
        });
        Route::get('/sellers_contact', function() {
            // $category_name = 'contact';
            $data = [
                'category_name' => 'contact',
                'page_name' => 'sellers_contact',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'sellers_contact';
            return view('pages.contact.sellers')->with($data);
        });
        Route::get('/buyers_contact', function() {
            // $category_name = 'contact';
            $data = [
                'category_name' => 'contact',
                'page_name' => 'buyers_contact',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'buyers_contact';
            return view('pages.contact.buyers')->with($data);
        });
        
                Route::resource('/agencylist', AgencysController::class);

    });

    // MAILBOX
    Route::get('/mailbox', function() {
        // $category_name = 'auth';
        $data = [
            'category_name' => 'mailbox',
            'page_name' => 'mailbox',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'auth_boxed';
        return view('mailbox')->with($data);
    });

    // Admin
    Route::prefix('admin')->group(function () {
        // Route::get('/user_setup', function() {
        //     // $category_name = 'admin';
        //     $data = [
        //         'category_name' => 'admin',
        //         'page_name' => 'user_setup',
        //         'has_scrollspy' => 0,
        //         'scrollspy_offset' => '',
        //     ];
        //     // $pageName = 'user_setup';
        //     return view('reservation_detail')->with($data);
        // });

        Route::get('/seller_setup', 'HomeController@seller_setup'); 
        Route::get('/user_setup', 'HomeController@indexuser'); 
        Route::post('/add_user', 'HomeController@add_user'); 
        Route::post('/edit_user', 'HomeController@edit_user'); 
        Route::post('/delete_user', 'HomeController@delete_user'); 
        Route::post('/delete_agency', 'AgencysController@delete_agency'); 
        Route::post('/logout_user', 'HomeController@logout_user')
        ->name('logout_user');
    Route::post('/add_Note', 'ReservationController@add_Note');
        Route::get('/company_setup', function() {
            // $category_name = 'admin';
            $data = [
                'category_name' => 'admin',
                'page_name' => 'company_setup',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'company_setup';
            return view('reservation_detail')->with($data);
        });
        
        
        

        
        
    });
Route::prefix('seller')->group(function()
{
    Route::post('/add_register', 'HomeController@add_register'); 
    Route::post('/edit_register', 'HomeController@edit_register'); 
    Route::post('/delete_seller', 'HomeController@delete_seller'); 

});
 });


Auth::routes();
// Route::group(['middleware' => 'Client_seller'] , function() {
 Route::get('/login_auth_seller', 'ClientController@login_auth_seller');
 Route::post('/login_auth_seller', 'ClientController@login_auth_seller');
     Route::get('/getdetail', 'ClientController@getdetail');

 Route::post('/updateseller', 'ClientController@update_seller')->middleware('auth:Client_seller');
 Route::post('/add_Note', 'ClientController@add_Note')->middleware('auth:Client_seller');
//  Route::get('/updateseller', 'ClientController@update_seller');

 Route::post('/client_search', 'ClientController@create')->name('client_search');
 Route::get('/client_search', 'ClientController@create')->name('client_search');
 
Route::get('/', 'HomeController@index');
Route::get('/Reservation_liste', 'ClientController@index');

// });
Route::get('/login_seller', 'ClientController@login_seller');
Route::get('/logout_seller', 'ClientController@logout_seller')->name('logout_seller');
// Route::get('/Reservation_liste', function() {
//     return view('client.liste_reservation_seller');   
// });
// Route::get('/register', function() {
//     return redirect('/login');    
// });
// Route::get('/login', function() {
//     // return redirect('/login');    
//     return view('auth.login');
// });
// Route::post('/conx_login', 'HomeController@conxnew')->name('login_submit'); 
// Route::get('/', function() {
//     return redirect('/sales');    
// });

// Auth::routes(['register' => false]);
// Route::post('/register', 'RegisterController@index');
// Route::post('/add_usert', 'RegisterController@add')->name('add_user');
Route::post('/register_add', 'RegisterController@create')->name('register_add');