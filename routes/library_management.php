<?php

use App\Http\Controllers\Backend\Library_management\Book\BookController;
use App\Http\Controllers\Backend\Library_management\Direction\DirectionController;
use App\Http\Controllers\Backend\Library_management\Shelf\ShelfController;
use App\Http\Controllers\Backend\Library_management\Delivery\DeliveryController;
use App\Http\Controllers\User\Library_management\BookController as Library_managementBookController;
use App\Http\Controllers\User\Library_management\LibraryController;
use Illuminate\Support\Facades\Route;

Route::prefix('direction')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //direction Create
     Route::get('index/', [DirectionController::class,"index"])->name('admin.direction.index');
     Route::get('create/', [DirectionController::class,"create"])->name('admin.direction.create');
     Route::post('store/', [DirectionController::class,"store"])->name('admin.direction.store');
     Route::get('edit/{id}', [DirectionController::class,"edit"])->name('admin.direction.edit');
     Route::post('update/{id}', [DirectionController::class,"update"])->name('admin.direction.update');
     Route::post('delete/', [DirectionController::class,"destroy"])->name('admin.direction.delete');
     Route::get('/status/{id}', [DirectionController::class, 'status'])->name('admin.direction.status');
});

Route::prefix('library-shelf')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //shelf Create
     Route::get('index/', [ShelfController::class,"index"])->name('admin.shelf.index');
     Route::get('create/', [ShelfController::class,"create"])->name('admin.shelf.create');
     Route::post('store/', [ShelfController::class,"store"])->name('admin.shelf.store');
     Route::get('edit/{id}', [ShelfController::class,"edit"])->name('admin.shelf.edit');
     Route::post('update/{id}', [ShelfController::class,"update"])->name('admin.shelf.update');
     Route::post('delete/', [ShelfController::class,"destroy"])->name('admin.shelf.delete');
     Route::get('/status/{id}', [ShelfController::class, 'status'])->name('admin.shelf.status');
});

Route::prefix('library-book')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //book Create
     Route::get('index/', [BookController::class,"index"])->name('admin.book.index');
     Route::get('create/', [BookController::class,"create"])->name('admin.book.create');
     Route::post('store/', [BookController::class,"store"])->name('admin.book.store');
     Route::get('edit/{id}', [BookController::class,"edit"])->name('admin.book.edit');
     Route::post('update/{id}', [BookController::class,"update"])->name('admin.book.update');
     Route::post('delete/', [BookController::class,"destroy"])->name('admin.book.delete');
     Route::get('/status/{id}', [BookController::class, 'status'])->name('admin.book.status');
});

Route::prefix('book_delivery')->middleware(['auth:admin', 'adminCheck:0'])->group( function () {
    //book Create
     Route::get('index/', [DeliveryController::class,"index"])->name('admin.book_delivery.index');
     Route::get('create/', [DeliveryController::class,"create"])->name('admin.book_delivery.create');
     Route::post('store/', [DeliveryController::class,"store"])->name('admin.book_delivery.store');
     Route::get('edit/{id}', [DeliveryController::class,"edit"])->name('admin.book_delivery.edit');
     Route::post('update/{id}', [DeliveryController::class,"update"])->name('admin.book_delivery.update');
     Route::post('delete/', [DeliveryController::class,"destroy"])->name('admin.book_delivery.delete');
     Route::get('/status/{id}', [DeliveryController::class, 'status'])->name('admin.book_delivery.status');
});



Route::post('get-library-book-by-ajax', [BookController::class,"libraryBookByAjax"])->name('admin.libraryBookByAjax');
Route::post('get-library-delivery-book-by-ajax', [DeliveryController::class,"libraryDeliveryBookByAjax"])->name('admin.libraryDeliveryBookByAjax');




Route::prefix('user')->middleware(['userCheck'])->group(function () {
    //Library Manage from teacher Profile
    Route::get('library/', [LibraryController::class,"library"])->name('teacher.library');
    Route::get('library-index/', [LibraryController::class,"index"])->name('teacher.library_index');
    Route::post('library-borrow-store/', [LibraryController::class,"borrowStore"])->name('teacher.library_borrow.store');
    Route::post('library-borrow-return', [LibraryController::class,"returnBook"])->name('teacher.library_borrow.return');
    Route::get('library-borrow-manage/', [LibraryController::class,"borrowManage"])->name('teacher.library_borrow.manage');
    Route::get('library-borrow-edit/{id}', [LibraryController::class,"borrowEdit"])->name('teacher.library_borrow.edit');
    Route::post('library-borrow-update/{id}', [LibraryController::class,"borrowUpdate"])->name('teacher.library_borrow.update');
    Route::post('library-borrow-delete/', [LibraryController::class,"borrowDelete"])->name('teacher.library_borrow.delete');

});




Route::prefix('user')->middleware(['userCheck'])->group( function () {
    //add book in library Create
     Route::get('library-book-create/', [Library_managementBookController::class,"create"])->name('teacher.library_book.create');
     Route::post('library-book-store/', [Library_managementBookController::class,"store"])->name('teacher.library_book.store');
     Route::get('library-book-edit/{id}', [Library_managementBookController::class,"edit"])->name('teacher.library_book.edit');
     Route::post('library-book-update/{id}', [Library_managementBookController::class,"update"])->name('teacher.library_book.update');
     Route::post('library-book-delete/', [Library_managementBookController::class,"destroy"])->name('teacher.library_book.delete');
    //  Route::get('/library-book-status/{id}', [Library_managementBookController::class, 'status'])->name('teacher.library_book.status');
});
Route::prefix('user')->middleware(['userCheck'])->group( function () {
    //add book in library Create
     Route::get('library-shelf-direction-create/', [Library_managementBookController::class,"create"])->name('teacher.library_shelf_direction.create');
     Route::post('library-shelf-direction-store/', [Library_managementBookController::class,"store"])->name('teacher.library_shelf_direction.store');
     Route::get('library-shelf-direction-edit/{id}', [Library_managementBookController::class,"edit"])->name('teacher.library_shelf_direction.edit');
     Route::post('library-shelf-direction-update/{id}', [Library_managementBookController::class,"update"])->name('teacher.library_shelf_direction.update');
     Route::post('library-shelf-direction-delete/', [Library_managementBookController::class,"destroy"])->name('teacher.library_shelf_direction.delete');
    //  Route::get('/library-direction-status/{id}', [Library_managementBookController::class, 'status'])->name('teacher.library_shelf_direction.status');
});
Route::prefix('user')->middleware(['userCheck'])->group( function () {
    //add book in library Create
     Route::get('library-shelf-create/', [Library_managementBookController::class,"create"])->name('teacher.library_shelf.create');
     Route::post('library-shelf-store/', [Library_managementBookController::class,"store"])->name('teacher.library_shelf.store');
     Route::get('library-shelf-edit/{id}', [Library_managementBookController::class,"edit"])->name('teacher.library_shelf.edit');
     Route::post('library-shelf-update/{id}', [Library_managementBookController::class,"update"])->name('teacher.library_shelf.update');
     Route::post('library-shelf-delete/', [Library_managementBookController::class,"destroy"])->name('teacher.library_shelf.delete');
    //  Route::get('/library-shelf-status/{id}', [Library_managementBookController::class, 'status'])->name('teacher.library_shelf.status');
});


Route::get('/get/student/{id}', [DeliveryController::class, 'getStudent']);

 
