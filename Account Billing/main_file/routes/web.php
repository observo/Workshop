<?php

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

Route::get('/password/reset/{lang?}', 'Auth\LoginController@showLinkRequestForm')->name('change.langPass');

Auth::routes();

Route::get('/register/{lang?}', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register')->name('register');
Route::get('/login/{lang?}', 'Auth\LoginController@showLoginForm')->name('login');


Route::prefix('customer')->as('customer.')->group(
    function (){
        Route::get('login/{lang}', 'Auth\LoginController@showCustomerLoginLang')->name('login.lang')->middleware(['xss']);
        Route::get('login', 'Auth\LoginController@showCustomerLoginForm')->name('login')->middleware(['xss']);
        Route::post('login', 'Auth\LoginController@customerLogin')->name('login')->middleware(['xss']);
        Route::get('dashboard', 'CustomerController@dashboard')->name('dashboard')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::get('invoice', 'InvoiceController@customerInvoice')->name('invoice')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::get('invoice/{id}/send', 'InvoiceController@customerInvoiceSend')->name('invoice.send')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::post('invoice/{id}/send/mail', 'InvoiceController@customerInvoiceSendMail')->name('invoice.send.mail')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::get('invoice/{id}/show', 'InvoiceController@customerInvoiceShow')->name('invoice.show')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('payment', 'CustomerController@payment')->name('payment')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('transaction', 'CustomerController@transaction')->name('transaction')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::post('logout', 'CustomerController@customerLogout')->name('logout')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('profile', 'CustomerController@profile')->name('profile')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );

        Route::put('update-profile', 'CustomerController@editprofile')->name('update.profile')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::put('billing-info', 'CustomerController@editBilling')->name('update.billing.info')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::put('shipping-info', 'CustomerController@editShipping')->name('update.shipping.info')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::put('change.password', 'CustomerController@updatePassword')->name('update.password')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
        Route::get('change-language/{lang}', 'CustomerController@changeLanquage')->name('change.language')->middleware(
            [
                'auth:customer',
                'xss',
            ]
        );
    }
);

Route::prefix('vender')->as('vender.')->group(
    function (){
        Route::get('login/{lang}', 'Auth\LoginController@showVenderLoginLang')->name('login.lang')->middleware(['xss']);
        Route::get('login', 'Auth\LoginController@showVenderLoginForm')->name('login')->middleware(['xss']);
        Route::post('login', 'Auth\LoginController@VenderLogin')->name('login')->middleware(['xss']);
        Route::get('dashboard', 'VenderController@dashboard')->name('dashboard')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::get('bill', 'BillController@VenderBill')->name('bill')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::get('bill/{id}/show', 'BillController@venderBillShow')->name('bill.show')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );


        Route::get('bill/{id}/send', 'BillController@venderBillSend')->name('bill.send')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::post('bill/{id}/send/mail', 'BillController@venderBillSendMail')->name('bill.send.mail')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );


        Route::get('payment', 'VenderController@payment')->name('payment')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::get('transaction', 'VenderController@transaction')->name('transaction')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::post('logout', 'VenderController@venderLogout')->name('logout')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );

        Route::get('profile', 'VenderController@profile')->name('profile')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );

        Route::put('update-profile', 'VenderController@editprofile')->name('update.profile')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::put('billing-info', 'VenderController@editBilling')->name('update.billing.info')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::put('shipping-info', 'VenderController@editShipping')->name('update.shipping.info')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::put('change.password', 'VenderController@updatePassword')->name('update.password')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );
        Route::get('change-language/{lang}', 'VenderController@changeLanquage')->name('change.language')->middleware(
            [
                'auth:vender',
                'xss',
            ]
        );

    }
);


Route::get('/', 'DashboardController@index')->name('dashboard')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::get('profile', 'UserController@profile')->name('profile')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::put('edit-profile', 'UserController@editprofile')->name('update.account')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::resource('users', 'UserController')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::put('change-password', 'UserController@updatePassword')->name('update.password');


Route::resource('roles', 'RoleController')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('permissions', 'PermissionController')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){
    Route::get('change-language/{lang}', 'LanguageController@changeLanquage')->name('change.language');
    Route::get('manage-language/{lang}', 'LanguageController@manageLanguage')->name('manage.language');
    Route::post('store-language-data/{lang}', 'LanguageController@storeLanguageData')->name('store.language.data');
    Route::get('create-language', 'LanguageController@createLanguage')->name('create.language');
    Route::post('store-language', 'LanguageController@storeLanguage')->name('store.language');
}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::resource('systems', 'SystemController');
    Route::post('email-settings', 'SystemController@saveEmailSettings')->name('email.settings');
    Route::post('company-settings', 'SystemController@saveCompanySettings')->name('company.settings');
    Route::post('stripe-settings', 'SystemController@saveStripeSettings')->name('stripe.settings');
    Route::post('system-settings', 'SystemController@saveSystemSettings')->name('system.settings');
    Route::get('company-setting', 'SystemController@companyIndex')->name('company.setting');
}
);


Route::get('productservice/index', 'ProductServiceController@index')->name('productservice.index');
Route::resource('productservice', 'ProductServiceController')->middleware(
    [
        'auth',
        'xss',
    ]
);


Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('customer/{id}/show', 'CustomerController@show')->name('customer.show');
    Route::resource('customer', 'CustomerController');

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('vender/{id}/show', 'VenderController@show')->name('vender.show');
    Route::resource('vender', 'VenderController');

}
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::resource('bank-account', 'BankAccountController');

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('transfer/index', 'TransferController@index')->name('transfer.index');
    Route::resource('transfer', 'TransferController');

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('transaction/index', 'TransactionController@index')->name('transaction.index');
    Route::resource('transaction', 'TransactionController');

}
);


Route::resource('taxes', 'TaxController')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::resource('product-category', 'ProductServiceCategoryController')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::resource('product-unit', 'ProductServiceUnitController')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('payment-method', 'PaymentMethodController')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('invoice/pdf/{id}', 'InvoiceController@invoice')->name('invoice.pdf');
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('invoice/test', 'InvoiceController@mailTest')->name('invoice.mail.test');

    Route::get('invoice/{id}/payment/reminder', 'InvoiceController@paymentReminder')->name('invoice.payment.reminder');
    Route::get('invoice/index', 'InvoiceController@index')->name('invoice.index');
    Route::post('invoice/product/destroy', 'InvoiceController@productDestroy')->name('invoice.product.destroy');
    Route::post('invoice/product', 'InvoiceController@product')->name('invoice.product');
    Route::post('invoice/customer', 'InvoiceController@customer')->name('invoice.customer');
    Route::get('invoice/{id}/sent', 'InvoiceController@sent')->name('invoice.sent');
    Route::get('invoice/{id}/payment', 'InvoiceController@payment')->name('invoice.payment');
    Route::post('invoice/{id}/payment', 'InvoiceController@createPayment')->name('invoice.payment');
    Route::post('invoice/{id}/payment/{pid}/destroy', 'InvoiceController@paymentDestroy')->name('invoice.payment.destroy');
    Route::resource('invoice', 'InvoiceController');

}
);


Route::resource('taxes', 'TaxController')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('revenue/index', 'RevenueController@index')->name('revenue.index')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('revenue', 'RevenueController')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::get('bill/pdf/{id}', 'BillController@bill')->name('bill.pdf');
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('bill/index', 'BillController@index')->name('bill.index');
    Route::post('bill/product/destroy', 'BillController@productDestroy')->name('bill.product.destroy');
    Route::post('bill/product', 'BillController@product')->name('bill.product');
    Route::post('bill/vender', 'BillController@vender')->name('bill.vender');
    Route::get('bill/{id}/sent', 'BillController@sent')->name('bill.sent');
    Route::get('bill/{id}/payment', 'BillController@payment')->name('bill.payment');
    Route::post('bill/{id}/payment', 'BillController@createPayment')->name('bill.payment');
    Route::post('bill/{id}/payment/{pid}/destroy', 'BillController@paymentDestroy')->name('bill.payment.destroy');

    Route::resource('bill', 'BillController');

}
);


Route::get('payment/index', 'PaymentController@index')->name('payment.index')->middleware(
    [
        'auth',
        'xss',
    ]
);
Route::resource('payment', 'PaymentController')->middleware(
    [
        'auth',
        'xss',
    ]
);

Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::resource('income-summary', 'IncomeSummaryController');

}
);

Route::resource('plans', 'PlanController')->middleware(
    [
        'auth',
        'xss',
    ]
);


Route::resource('expenses', 'ExpenseController')->middleware(
    [
        'auth',
        'xss',
    ]
);


Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('/orders', 'StripePaymentController@index')->name('order.index');
    Route::get('/stripe/{code}', 'StripePaymentController@stripe')->name('stripe');
    Route::post('/stripe', 'StripePaymentController@stripePost')->name('stripe.post');

}
);
Route::group(
    [
        'middleware' => [
            'auth',
            'xss',
        ],
    ], function (){

    Route::get('report/income-summary', 'ReportController@incomeSummary')->name('report.income.summary');
    Route::get('report/expense-summary', 'ReportController@expenseSummary')->name('report.expense.summary');
    Route::get('report/income-vs-expense-summary', 'ReportController@incomeVsExpenseSummary')->name('report.income.vs.expense.summary');
    Route::get('report/tax-summary', 'ReportController@taxSummary')->name('report.tax.summary');
    Route::get('report/profit-loss-summary', 'ReportController@profitLossSummary')->name('report.profit.loss.summary');


}
);

