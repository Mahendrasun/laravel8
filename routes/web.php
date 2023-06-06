<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Middleware\CheckAge;
use App\Models\User;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\DB;
use App\Models\Multipic;
// use App\Http\Middleware\UserMiddleware;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $abouts = DB::table('home_abouts')->first();
    $portfolio = Multipic::all();
    return view('home',compact('brands','abouts','portfolio'));
})->name('/');

Route::get('/home', function () {
    return ('home page');
});

Route::get('/about', function () {
    return view('welcome');
});

// Route::get('/contact', function () {
//     return ('Contact  us Page');
// });


// FrontEnd Home Page Setup
Route::get('/slider',[HomeController::class,'HomeSlider'])->name('home.slider');
Route::GET('/slider/add',[HomeController::class,'AddSlider'])->name('add.slider');
Route::POST('/store/slider',[HomeController::class,'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class,'EditSlider']);
Route::POST('/slider/update/{id}',[HomeController::class,'UpdateSlider'])->name('upadte.slider');
Route::get('/delete/slider/{id}',[HomeController::class,'Deleteslider']);

// HOme About All Route
Route::get('/home/about',[AboutController::class,'HomeAbout'])->name('home.about');
Route::GET('/about/add',[AboutController::class,'AboutAdd'])->name('add.about');
Route::POST('/store/about',[AboutController::class,'StoreAbout'])->name('store.about');
Route::GET('/about/edit/{id}',[AboutController::class,'EditAbout'])->name('edit.about');
Route::POST('/update/about/{id}',[AboutController::class,'UpdateAbout']);
Route::GET('about/delete/{id}',[AboutController::class,'DeleteAbout']);

// portfolio All Route
Route::get('/portfolio',[AboutController::class,'Portfolio'])->name('portfolio');



Route::get('/contact-us',[ContactController::class,'index'])->name("con");

// Admin Contact route 

Route::get('admin/contact',[ContactController::class,'AdminContact'])->name("admin.contact");
Route::GET('/add/contact',[ContactController::class,'ContactAdd'])->name('add.contact');
Route::POST('/store/contact',[ContactController::class,'StoreContact'])->name('store.contact');
Route::get('admin/message',[ContactController::class,'AdminMessage'])->name("admin.message");
Route::get('contact/edit/{id}',[ContactController::class,'EditAdminContact']);
Route::POST('contact/update/{id}',[ContactController::class,'UpdateContact']);
Route::get('contact/delete/{id}',[ContactController::class,'DeleteContact']);

// Website contact Route

Route::get('/contact',[ContactController::class,'Contact'])->name("contact");
Route::POST('/contact/form',[ContactController::class,'ContactForm'])->name('contact.form');



// CategoryController
Route::get('/category/all',[CategoryController::class,'AllCat'])->name('all.category');
Route::POST('/category/add',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class,'EditCat']);
Route::POST('/category/update/{id}',[CategoryController::class,'UpdateCat']);
Route::get('/softdelete/category/{id}',[CategoryController::class,'SoftDeleteCat']);
Route::get('/restore/category/{id}',[CategoryController::class,'Restore']);
Route::get('category/pdelete/{id}',[CategoryController::class,'Trash']);

// For Brand Route
Route::get('/brand/all',[BrandController::class,'AllBrand'])->name('all.brand');
Route::POST('/brand/add',[BrandController::class,'AddBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'EditBrand']);
Route::POST('/brand/update/{id}',[BrandController::class,'UpdateBrand']);
Route::get('/delete/brand/{id}',[BrandController::class,'DeleteBrand']);

// Multi Images
Route::GET('/multi/image',[BrandController::class,'Multipic'])->name('multi.image');
Route::POST('/multi/add',[BrandController::class,'StoreImages'])->name('store.image');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users = User::all();
        return view('admin.index');
    })->name('dashboard');
});

Route::GET('/user/logout',[BrandController::class,'Logout'])->name('user.logout');

// User Pofile Method

Route::get('/change/password',[ChangePass::class,'ChangePassword'])->name('change.password');
Route::POST('/update/password',[ChangePass::class,'UpdatePassword'])->name('password.update');

// User Profile
Route::GET('/update/profile',[ChangePass::class,'UpdateProfile'])->name('profile.update');
Route::POST('/update/user',[ChangePass::class,'Updateuser'])->name('user.update');