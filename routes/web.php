<?php

use App\Http\Controllers\StudentController;
use App\Http\Middleware\EnsureTokenIsValid;
use Illuminate\Support\Facades\Route;

// Auth::loginUsingId(1); //truy cap hệ thống thông qua tài khoản có id ...
// Route::get('/test-auth', function(){
//     dd(auth());
// });
//Route::method('url', [ClassControllerMuonChay::class, 'tenFunctionMuonChay']);
Route::get('/', function () {
    return view('welcome');
});
 //Route::get('/students', [StudentController::class, 'index']); //hiển thị danh sách sinh viên
 //Route::get('/students/{id}', [StudentController::class, 'show']);//hiển thị thông tin chi tiết sinh viên
// Route::get('/students/create', [StudentController::class, 'create']);
//khai báo route cho resource controller: tự động map url với các hàm trong controller

Route::resource('/students', StudentController::class); 
/** khai báo route cho controller đơn (invokable)
 * Route::method('/url', TenInvokeController::class);
 * Route::match(['get', 'put'], 'url', $callback): khai báo route cho nhiều method (get, post, put, delete) cùng 1 url
 * Route::any('url', $callback): khai báo route cho tất cả các method (get, post, put, delete) cùng 1 url
 * Route::redirect('url_hien_tai', 'url-dich'); Điều hướng người dùng sang
 * Route::view('url', 'ten_file_blade', $data): trả về view mà không cần thông qua controller
 * Route::get()->middleware('ten_middleware'): khai báo middleware cho route
 * Route::middleware('ten_middleware')->group(function(){
 *     Route::get();
 *     Route::post();
 * }): khai báo middleware cho 1 nhóm route
 */

Route::prefix('admin')->middleware(EnsureTokenIsValid::class)->group(function(){  //khai báo nhóm route có tiền tố url là /admin
    Route::view('dashboard', 'dashboard'); // Muốn truy cập vào dashboard thì url sẽ là /admin/dashboard
    Route::prefix('students')->group(function(){
        Route::get('/', [StudentController::class, 'index']);
        Route::get('/{id}', [StudentController::class, 'show']);
    });
});