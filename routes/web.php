<?php

use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\SettingsController;
use App\Http\Controllers\Backend\ContactInfoController;
use App\Http\Controllers\Backend\ContactUsFomrController;
use App\Http\Controllers\Backend\SocialLinkController;

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

////////////// Frontend Routes //////////////
Route::get('/', function () {
    return view('frontend.home');
});
// Pages Routes
Route::get('/contact-us', [SettingsController::class, 'contactUs'])->name('contact-us');

// Contact form submit Route
Route::post('/contact-form-submit', [SettingsController::class, 'contactFormSubmit'])->name('contact.form.submit');

// Language All Routes
Route::get('/arabic/language', [LanguageController::class, 'arabic'])->name('arabic.language');
Route::get('/english/language', [LanguageController::class, 'english'])->name('english.language');





////////////// Backend Routes //////////////
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard', function () {
        return view('backend.dashboard');
    })->name('dashboard');

    // Contact Info Routes
    Route::prefix('contact-info')->group(function () {
        Route::get('/list', [ContactInfoController::class, 'index'])->name('contact.info');
        Route::get('/edit/{id}', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
        Route::put('/update/{id}', [ContactInfoController::class, 'update'])->name('contact-info.update');
    });

    // All Contacts Form Routes
    Route::prefix('contacts')->group(function () {
        Route::get('/list', [ContactUsFomrController::class, 'contactList'])->name('all.contact.us');
        Route::get('/delete/{id}', [ContactUsFomrController::class, 'contactDelete'])->name('contact-us.delete');
    });

    // Socail Link Routes
    Route::prefix('socials')->group(function () {
        Route::get('/list', [SocialLinkController::class, 'index'])->name('social.link');
        Route::get('/edit/{id}', [SocialLinkController::class, 'edit'])->name('social-link.edit');
        Route::put('/update/{id}', [SocialLinkController::class, 'update'])->name('social-link.update');
    });

    // Category Routes
    Route::prefix('categories')->group(function () {
        Route::get('/list', [CategoryController::class, 'list'])->name('category.list');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    });


});
