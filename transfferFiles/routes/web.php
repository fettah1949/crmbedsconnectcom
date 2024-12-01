<?php

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


Route::group(['middleware' => 'auth'] , function() {

    // $this->middleware

    Route::get('/analytics', function() {
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'analytics';
        return view('dashboard2')->with($data);
    });
    
    Route::get('/sales', function() {
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'sales',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'sales';
        return view('dashboard')->with($data);
    });

    Route::prefix('production')->group(function () {
    
        // Route::get('/reservation', [ReservationController::class,'index']);
        // Route::post('/reservation', [ReservationController::class,'reservationPost']);
        Route::resource('reservation', ReservationController::class);

        Route::resource('/hotellist', HoteListController::class);
        Route::resource('/hotelrooms', HotelRoomController::class);
        Route::get('hotelrooms/createH/{HotelCode}', 'HotelRoomController@createH')->name('createH');
        Route::resource('/rooms', RoomsController::class);


    });

    Route::get("list",[ReservationController::class,'create']);

    
        

    Route::prefix('invoicing')->group(function () {
        Route::get('sale', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'invoicing',
                'page_name' => 'invoicing_sale',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'analytics';
            return view('reservation_detail')->with($data);
        });
        Route::get('purchase', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'invoicing',
                'page_name' => 'invoicing_purchase',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'analytics';
            return view('reservation_detail')->with($data);
        });
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
        Route::get('/user_setup', function() {
            // $category_name = 'admin';
            $data = [
                'category_name' => 'admin',
                'page_name' => 'user_setup',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
            ];
            // $pageName = 'user_setup';
            return view('reservation_detail')->with($data);
        });
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

});


Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/register', function() {
    return redirect('/login');    
});
Route::get('/password/reset', function() {
    return redirect('/login');    
});

Route::get('/', function() {
    return redirect('/sales');    
});