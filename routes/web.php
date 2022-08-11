<?php

use App\Http\Controllers\BackEnd\CategoryController;
use App\Http\Controllers\BackEnd\DanhmucController;
use App\Http\Controllers\BackEnd\Homecontroller as BackEndHomecontroller;
use App\Http\Controllers\BackEnd\RoleController;
use App\Http\Controllers\BackEnd\TheloaiController;
use App\Http\Controllers\BackEnd\TruyenController;
use App\Http\Controllers\BackEnd\UserController;
use App\Http\Controllers\BaclEnd\RoleController as BaclEndRoleController;
use App\Http\Controllers\FrontEnd\ChangePasswordController;
use App\Http\Controllers\FrontEnd\CommentController;
use App\Http\Controllers\Frontend\FavoriteController;
use App\Http\Controllers\FrontEnd\HomeController;
use App\Http\Controllers\FrontEnd\Loginasd;
use App\Http\Controllers\FrontEnd\LoginController;
use App\Http\Controllers\FrontEnd\ProfileController;
use App\Http\Controllers\Frontend\RegisterController;
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

Route::get('/', [HomeController::class, 'index'])->name('trang-chu');
Route::get('/truyen/{slug}', [HomeController::class, 'xemtruyen'])->name('xem-truyen');
Route::Get('/truyen/{slug}/{slug_chapter}', [HomeController::class, 'doc_chapter'])->name('doc-chapter');
Route::Get('/the-loai', [HomeController::class, 'show_cate'])->name('show_cate');
Route::Get('/the-loai/{slug}', [HomeController::class, 'detail_cate'])->name('detail_cate');
Route::get('/add-favorite/{truyen}',[FavoriteController::class,'store'])->name('store-favorite');
Route::get('/unfollow/{truyen}',[FavoriteController::class,'remove'])->name('remove-favorite');
Route::get('/truyen-theo-doi',[FavoriteController::class,'show_truyen_follow'])->name('show.follow_comic');

 // -------------------------------Login--------------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/dang-nhap', 'index')->name('dang-nhap');
    Route::post('/dang-nhap',  'PostLogin');
    Route::get('/dang-xuat', 'logout')->name('dang-xuat');
});
//-------------------------------register-----------------------------------------//
Route::controller(RegisterController::class)->group(function () {
    Route::get('/dang-ki', 'index')->name('dang-ki');
    Route::post('/dang-ki', 'store')->name('register');
});
//-------------------------------profile-----------------------------------------//
Route::controller(ProfileController::class)->group(function () {
    Route::get('/trang-ca-nhan', 'index')->name('profile');
    Route::get('/thay-doi-thong-tin-ca-nhan','edit')->name('EditProfile');
    Route::post('/update','update')->name('UpdateProfile');
    Route::get('/thay-doi-mat-khau', 'change_password_index')->name('change_password.index');
    Route::post('/thay-doi-mat-khau', 'changePassword')->name('save.change_password');
    
});
//-------------------------------profile-----------------------------------------//

// Route::get('/trang-ca-nhan',[ProfileController::class, 'index'])->name('profile');
// comment system
Route::post('/comment',[CommentController::class, 'store'])->name('comment');
// favorite
Route::group(['prefix' => '/admin'], function () {

    Route::get('dashboard', [BackEndHomecontroller::class, 'index'])->name('dasboard');
    // -------------------------------ROLE---------------------------------------//
    // Route::get('role/',[RoleController::class, 'index'])->name('role.index');
    // Route::get('role/{id}',[RoleController::class,'delete'])->name('role.delete');
    // Route::get('/role/tao-moi-role',[RoleController::class,'create'])->name('role.create');
    // Route::post('/role/store',[RoleController::class,'store'])->name('role.store');
    Route::controller(UserController::class)->group(function () {
        Route::group(['prefix'=>'/user/'],function(){
            Route::get('/', 'index')->name('user.index');
            Route::get('/{username}', 'edit')->name('user.edit');
            Route::post('/{username}', 'saveEdit');
        });
    });
    Route::controller(RoleController::class)->group(function () {
        Route::group(['prefix' =>'/role/'],function () {
            Route::get('/','index')->name('role.index');
            Route::get('tao-moi-role','create')->name('role.create');
            Route::post('store','store')->name('role.store');
            Route::get('edit-role/{id}','edit')->name('role.edit');
            Route::post('edit-role/{id}','update');
            Route::get('xoa-role/{id}','delete')->name('role.delete');
        });
    });
    // -------------------------------THỂ LOẠI---------------------------------------//
    Route::controller(TheloaiController::class)->group(function () {
        Route::group(['prefix' => '/the-loai/'], function () {
            Route::get('/', 'index')->name('the-loai.index');
            Route::get('/them-moi-the-loai', 'CreateForm')->name('the-loai.CreateForm');
            Route::post('/them-moi-the-loai', 'SaveCreateForm');
            Route::get('/sua-the-loai/{id}', 'EditForm')->name('the-loai.EditForm');
            Route::post('/sua-the-loai/{id}', 'SaveEditForm');
            Route::post('/xoa/{id}', 'DeleteTheloai')->name('the-loai.delete');
        });
    });
    //-------------------------------DANH MỤC-----------------------------------------//
    Route::controller(DanhmucController::class)->group(function () {
        Route::group(['prefix' => '/danh-muc/'], function () {
            Route::get('/',  'index')->name('danhmuc.index');
            Route::get('them-moi-danh-muc',  'create')->name('danhmuc.createForm');
            Route::post('them-moi-danh-muc',  'store');
            Route::get('xoa/{id}',  'delete')->name('danhmuc.delete');
            Route::get('sua-danh-muc/{id}',  'edit')->name('danhmuc.edit');
            Route::post('sua-danh-muc/{id}',  'update');
        });
    });
    //-------------------------------TRUYEN-----------------------------------------//

    Route::controller(TruyenController::class)->group(function () {
        Route::group(['prefix' => '/truyen/'], function () {
            Route::get('/', 'index')->name('truyen.index');
            Route::get('them-moi-truyen', 'create')->name('truyen.create');
            Route::post('them-moi-truyen', 'store');
            Route::get('xoa-truyen/{id}', 'delete')->name('truyen.delete');
            Route::get('sua-truyen/{id}', 'edit')->name('truyen.edit');
            Route::post('sua-truyen/{id}', 'update');
            
            Route::get('/{slug}/chapter','show')->name('chapter.show');
            Route::get('/{slug}/them-chapter','create_form_chapter')->name('chapter.create');
            Route::post('/{slug}/them-chapter','save_chapter');
            // Route::get('/xoa-chapter/{slug_chapter}','delete_chapter')->name('chapter.delete');
            Route::get('{slug}/xoa-chapter/{slug_chapter}','delete_chapter')->name('chapter.delete');
            Route::get('{slug}/sua-chapter/{slug_chapter}','edit_chapter')->name('chapter.update');
            Route::post('{slug}/sua-chapter/{slug_chapter}','update_chapter');
            Route::get('{slug}/{slug_chapter}/show-image/','show_image_chapter')->name('show');
        });
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::group(['prefix' =>'/category'],function () {
            Route::get('/','index')->name('category.index');
            Route::get('them-moi-category','create')->name('category.create');
            Route::post('store','store')->name('category.store');
            Route::get('xoa-category/{slug}','delete')->name('category.delete');
        });
    });
}); 

// Route::get('/', function () {
//     return view('welcome');
// });
