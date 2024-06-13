<?php
use Illuminate\Support\Facades\Route;


//report
Route::get("balance-sheet",[App\Http\Controllers\Account\TransactionController::class,'balanceSheet'])->name("balance_sheet");
Route::get("trail-balance",[App\Http\Controllers\Account\TransactionController::class,'Trailbalance'])->name("trail_balance");
Route::get("ledger-summary",[App\Http\Controllers\Account\TransactionController::class,'ledgerSummary'])->name("ledger_summary");
Route::get("profit-and-loss",[App\Http\Controllers\Account\TransactionController::class,'profitLoss'])->name("profit_loss");
//account_head
Route::resource('account_head', App\Http\Controllers\Account\AccountHeadController::class);
Route::get('/account-head-delete/{id}','App\Http\Controllers\Account\AccountHeadController@destroy')->name('account_head.delete');
Route::get('select2/accounts',[App\Http\Controllers\Account\AccountHeadController::class,'select2Account'])->name('select2.accounts');
Route::post('account_head/ajax',[App\Http\Controllers\Account\AccountHeadController::class,'ajaxAccountHead'])->name('account_head.ajax');
 //transaction
Route::resource('transaction', App\Http\Controllers\Account\TransactionController::class);


 //balance_account
Route::resource('balance_account', App\Http\Controllers\Account\BalanceAccountController::class);
Route::get('select2/balance_accounts',[App\Http\Controllers\Account\BalanceAccountController::class,'select2BalanceAccounts'])->name('select2.balance_accounts');
Route::post('/balance_account-ajax','App\Http\Controllers\Account\BalanceAccountController@ajaxBalanceAccount')->name('balance_account.ajax');


//bankaccount
Route::get('/bank-account-view','App\Http\Controllers\Account\bankaccountController@view')->name('bankaccount.view');

Route::post('/bank-account-store','App\Http\Controllers\Account\bankaccountController@store')->name('bankaccount.store');
Route::get('/bank-account-edit','App\Http\Controllers\Account\bankaccountController@edit')->name('bankaccount.edit');
Route::post('/bank-account-delete','App\Http\Controllers\Account\bankaccountController@delete')->name('bankaccount.delete');

//expense category
Route::get('/expense-category-list','App\Http\Controllers\Account\ExpenseCategoryController@index')->name('expense_category.index');
Route::post('/expense-category-ajax','App\Http\Controllers\Account\ExpenseCategoryController@ajaxExpenseCategory')->name('expense_category.ajax');
Route::post('/expense-category-store','App\Http\Controllers\Account\ExpenseCategoryController@store')->name('expense_category.store');
Route::get('/expense-category-edit','App\Http\Controllers\Account\ExpenseCategoryController@edit')->name('expense_category.edit');
Route::get('/expense-category-delete/{id}','App\Http\Controllers\Account\ExpenseCategoryController@delete')->name('expense_category.delete');

//expense
Route::get('/expense-list','App\Http\Controllers\Account\ExpenseController@index')->name('expense.index');
Route::post('/expense-ajax','App\Http\Controllers\Account\ExpenseController@ajaxExpense')->name('expense.ajax');
Route::post('/expense-store','App\Http\Controllers\Account\ExpenseController@store')->name('expense.store');
Route::get('/expense-edit','App\Http\Controllers\Account\ExpenseController@edit')->name('expense.edit');
Route::get('/expense-delete/{id}','App\Http\Controllers\Account\ExpenseController@delete')->name('expense.delete');
//payment method
Route::get('/payment-method-list','App\Http\Controllers\Account\PaymentMethodController@index')->name('payment_method.index');
Route::post('/payment-method-ajax','App\Http\Controllers\Account\PaymentMethodController@ajaxPaymentMethod')->name('payment_method.ajax');
Route::post('/payment-method-store','App\Http\Controllers\Account\PaymentMethodController@store')->name('payment_method.store');
Route::get('/payment-method-edit','App\Http\Controllers\Account\PaymentMethodController@edit')->name('payment_method.edit');
Route::get('/payment-method-delete/{id}','App\Http\Controllers\Account\PaymentMethodController@delete')->name('payment_method.delete');
Route::get('select2/payment_methods',[App\Http\Controllers\Account\PaymentMethodController::class,'select2PaymentMthods'])->name('select2.payment_methods');

//fee collection
Route::get('fee-collections',[App\Http\Controllers\Account\FeeCollectionController::class,'index'])->name('fee_collection.index');
Route::post('fee-collection-ajax',[App\Http\Controllers\Account\FeeCollectionController::class,'ajaxFeeCollection'])->name('fee_collection.ajax');
Route::post('fee-collection/store',[App\Http\Controllers\Account\FeeCollectionController::class,'store'])->name('fee_collection.store');
Route::post('get_fees_by_filter',[App\Http\Controllers\Account\FeeCollectionController::class,'getFees'])->name('get_fees_by_filter');
Route::post('get_student_by_filter',[App\Http\Controllers\Account\FeeCollectionController::class,'getStudent'])->name('get_student_by_filter');
Route::get('select2/student',[App\Http\Controllers\Account\FeeCollectionController::class,'select2Student'])->name('select2.student');

