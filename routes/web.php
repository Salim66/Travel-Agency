<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BookingPackageController;
use App\Http\Controllers\Backend\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\SettingsController;
use App\Http\Controllers\Backend\ContactInfoController;
use App\Http\Controllers\Backend\ContactUsFomrController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\DestinationController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\HeroSliderController;
use App\Http\Controllers\Backend\PackageController;
use App\Http\Controllers\Backend\PolicyController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ReviewerController;
use App\Http\Controllers\Backend\SeoController;
use App\Http\Controllers\Backend\SocialLinkController;
use App\Http\Controllers\Backend\SubscriberController;
use App\Http\Controllers\Backend\SubscribeSectionController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\TermsController;
use App\Http\Controllers\Backend\TourGuideController;
use App\Http\Controllers\Backend\TravelGalleryController;
use App\Http\Controllers\Backend\UserController;

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
Route::get('/package-details/{slug}', [SettingsController::class, 'packageDetails'])->name('package-details');
Route::get('/packages', [SettingsController::class, 'allPackages'])->name('all.package');
Route::get('/holiday-packages', [SettingsController::class, 'allHolidayPackages'])->name('holiday.packages');
Route::get('/destination-details/{slug}', [SettingsController::class, 'destinationDetails'])->name('destination-details');
Route::get('/category-wise-destination/{id}/{name}', [SettingsController::class, 'categoryWiseDestination'])->name('category.wise.destination');
Route::post('/search-wise-destination', [SettingsController::class, 'searchWiseDestination'])->name('search.wise.destination');
Route::get('/about-us', [SettingsController::class, 'aboutUs'])->name('about-us');
Route::get('/terms-condition', [SettingsController::class, 'termsAndCondition'])->name('terms.condition');
Route::get('/privacy-policy', [SettingsController::class, 'privacyPolicy'])->name('privacy.policy');
// Category wise package
Route::get('/category-wise-package/{id}/{name}', [SettingsController::class, 'categoryWisePackage'])->name('category.wise.package');

// Header Panel Search Box Find Package
Route::post('/search-package', [SettingsController::class, 'headerSearchPackage'])->name('header.search.package');

// Subscriber Store
Route::post('/subscriber-store', [SettingsController::class, 'subscriberStore'])->name('subscriber.store');

//Hearder
Route::get('/blogs', [SettingsController::class, 'posts'])->name('all.blogs');
Route::get('/packages', [SettingsController::class, 'packages'])->name('all.package');
Route::get('/destination', [SettingsController::class, 'destination'])->name('all.destination');

//post search
Route::get('/date-wise-posts/{id}/{date}', [SettingsController::class, 'dateWisePost'])->name('date.wise.post');
Route::get('/user-wise-posts/{id}/{name}', [SettingsController::class, 'userWisePost'])->name('user.wise.post');
Route::post('/search-wise-post', [SettingsController::class, 'searchWisePost'])->name('search.box.wise.post');
Route::get('/category-wise-post/{id}/{name}', [SettingsController::class, 'categoryWisePost'])->name('category.wise.post');
Route::get('/tag-wise-post/{id}/{name}', [SettingsController::class, 'tagWisePost'])->name('tag.wise.post');


//Post Details
Route::get('/post-details/{slug}', [SettingsController::class, 'postDetails'])->name('blog-details');


// Package book form Route
Route::post('/package-booking', [SettingsController::class, 'packageBookingForm'])->name('package.book.form');

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


    //Logout Routes
    Route::get('/admin/logout', [UserController::class, 'adminLogout'])->name('admin.logout');

    // User List Routes
    Route::prefix('users')->group(function () {
        Route::get('/list', [UserController::class, 'usersList'])->name('users.list');
        Route::get('/create', [UserController::class, 'usersCreate'])->name('add.user');
        Route::post('/store', [UserController::class, 'usersStore'])->name('store.user');
        Route::get('/edit/{id}', [UserController::class, 'usersEdit'])->name('edit.user');
        Route::patch('/update/{id}', [UserController::class, 'usersUpdate'])->name('update.user');
        Route::get('/delete/{id}', [UserController::class, 'usersDelete'])->name('delete.user');

        // User Profile
        Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');
        Route::get('/profile/edit/{id}', [UserController::class, 'userProfileEdit'])->name('user.profile.edit');
        Route::patch('/profile/update/{id}', [UserController::class, 'usersUpdateProfile'])->name('update.user.profile');

        // User Change Password
        Route::get('/change-password', [UserController::class, 'changePassword'])->name('user.change-password');
        Route::patch('/password-update/{id}', [UserController::class, 'updatePassword'])->name('user.password-update');
    });


    // Contact Info Routes
    Route::prefix('contact-info')->group(function () {
        Route::get('/list', [ContactInfoController::class, 'index'])->name('contact.info');
        Route::get('/edit/{id}', [ContactInfoController::class, 'edit'])->name('contact-info.edit');
        Route::put('/update/{id}', [ContactInfoController::class, 'update'])->name('contact-info.update');
    });

    // SEO Routes
    Route::prefix('seos')->group(function () {
        Route::get('/list', [SeoController::class, 'index'])->name('seo.list');
        Route::get('/edit/{id}', [SeoController::class, 'edit'])->name('seo.edit');
        Route::put('/update/{id}', [SeoController::class, 'update'])->name('seo.update');
    });

    // About Us Routes
    Route::prefix('abouts')->group(function () {
        Route::get('/edit', [AboutController::class, 'edit'])->name('about.edit');
        Route::put('/update/{id}', [AboutController::class, 'update'])->name('about.update');
    });

    // Subscribe Section Routes
    Route::prefix('subscribe-section')->group(function () {
        Route::get('/edit', [SubscribeSectionController::class, 'edit'])->name('subscirbe-s.edit');
        Route::put('/update/{id}', [SubscribeSectionController::class, 'update'])->name('subscirbe-s.update');
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

    // Category Routes
    Route::prefix('countries')->group(function () {
        Route::get('/list', [CountryController::class, 'list'])->name('country.list');
        Route::post('/store', [CountryController::class, 'store'])->name('country.store');
        Route::get('/edit/{id}', [CountryController::class, 'edit'])->name('country.edit');
        Route::put('/update/{id}', [CountryController::class, 'update'])->name('country.update');
        Route::get('/delete/{id}', [CountryController::class, 'delete'])->name('country.delete');
        Route::get('/district/ajax/{country_id}', [CountryController::class, 'getDistrict']);
    });

    // District Routes
    Route::prefix('districts')->group(function () {
        Route::get('/list', [DistrictController::class, 'list'])->name('district.list');
        Route::post('/store', [DistrictController::class, 'store'])->name('district.store');
        Route::get('/edit/{id}', [DistrictController::class, 'edit'])->name('district.edit');
        Route::put('/update/{id}', [DistrictController::class, 'update'])->name('district.update');
        Route::get('/delete/{id}', [DistrictController::class, 'delete'])->name('district.delete');
    });

    // Hero Banner Routes
    Route::prefix('hero')->group(function () {
        Route::get('/list', [HeroSliderController::class, 'list'])->name('banner.list');
        Route::post('/store', [HeroSliderController::class, 'store'])->name('banner.store');
        Route::get('/edit/{id}', [HeroSliderController::class, 'edit'])->name('banner.edit');
        Route::put('/update/{id}', [HeroSliderController::class, 'update'])->name('banner.update');
        Route::get('/delete/{id}', [HeroSliderController::class, 'delete'])->name('banner.delete');
    });

    // Packages Routes
    Route::prefix('packages')->group(function () {
        Route::get('/list', [PackageController::class, 'list'])->name('package.list');
        Route::get('/add', [PackageController::class, 'add'])->name('package.add');
        Route::post('/store', [PackageController::class, 'store'])->name('package.store');
        Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
        Route::put('/update/{id}', [PackageController::class, 'update'])->name('package.update');
        Route::get('/delete/{id}', [PackageController::class, 'delete'])->name('package.delete');
        Route::get('/inactive/{id}', [PackageController::class, 'packageInactive'])->name('package.inactive');
        Route::get('/active/{id}', [PackageController::class, 'packageActive'])->name('package.active');
        Route::get('/view/{id}', [PackageController::class, 'packageView'])->name('package.view');
    });

    // Booking Packages Routes
    Route::prefix('booking-package')->group(function () {
        Route::get('/pending-list', [BookingPackageController::class, 'pendingList'])->name('pending.package.booking');
        Route::get('/completed-list', [BookingPackageController::class, 'CompletedList'])->name('completed.package.booking');
        Route::get('/view/{id}', [BookingPackageController::class, 'pendingPackageView'])->name('pending.booking.package.view');
        Route::get('/completed/{id}', [BookingPackageController::class, 'packageCompleted'])->name('booking.package.completed');
        Route::get('/pending/{id}', [BookingPackageController::class, 'packagePending'])->name('booking.package.pending');
        Route::get('/delete/{id}', [BookingPackageController::class, 'bookingPackagedelete'])->name('booking.package.delete');
        Route::get('/add', [PackageController::class, 'add'])->name('package.add');
        Route::post('/store', [PackageController::class, 'store'])->name('package.store');
        Route::get('/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
        Route::put('/update/{id}', [PackageController::class, 'update'])->name('package.update');
        Route::get('/active/{id}', [PackageController::class, 'packageActive'])->name('package.active');
    });


    // Destinations Routes
    Route::prefix('destination')->group(function () {
        Route::get('/list', [DestinationController::class, 'list'])->name('destination.list');
        Route::get('/add', [DestinationController::class, 'add'])->name('destination.add');
        Route::post('/store', [DestinationController::class, 'store'])->name('destination.store');
        Route::get('/edit/{id}', [DestinationController::class, 'edit'])->name('destination.edit');
        Route::put('/update/{id}', [DestinationController::class, 'update'])->name('destination.update');
        Route::get('/delete/{id}', [DestinationController::class, 'delete'])->name('destination.delete');
        Route::get('/inactive/{id}', [DestinationController::class, 'destinationInactive'])->name('destination.inactive');
        Route::get('/active/{id}', [DestinationController::class, 'destinationActive'])->name('destination.active');
        Route::get('/view/{id}', [DestinationController::class, 'destinationView'])->name('destination.view');
    });


    // Travel Gallery Routes
    Route::prefix('travel-gallery')->group(function () {
        Route::get('/list', [TravelGalleryController::class, 'list'])->name('gallery.list');
        Route::post('/store', [TravelGalleryController::class, 'store'])->name('gallery.store');
        Route::get('/edit/{id}', [TravelGalleryController::class, 'edit'])->name('gallery.edit');
        Route::put('/update/{id}', [TravelGalleryController::class, 'update'])->name('gallery.update');
        Route::get('/delete/{id}', [TravelGalleryController::class, 'delete'])->name('gallery.delete');
        Route::get('/inactive/{id}', [TravelGalleryController::class, 'galleryInactive'])->name('gallery.inactive');
        Route::get('/active/{id}', [TravelGalleryController::class, 'galleryActive'])->name('gallery.active');
    });


    // Tour Guide Routes
    Route::prefix('tour-guide')->group(function () {
        Route::get('/list', [TourGuideController::class, 'list'])->name('guide.list');
        Route::post('/store', [TourGuideController::class, 'store'])->name('guide.store');
        Route::get('/edit/{id}', [TourGuideController::class, 'edit'])->name('guide.edit');
        Route::put('/update/{id}', [TourGuideController::class, 'update'])->name('guide.update');
        Route::get('/delete/{id}', [TourGuideController::class, 'delete'])->name('guide.delete');
        Route::get('/inactive/{id}', [TourGuideController::class, 'guideInactive'])->name('guide.inactive');
        Route::get('/active/{id}', [TourGuideController::class, 'guideActive'])->name('guide.active');
    });

    // Tag Routes
    Route::prefix('tags')->group(function () {
        Route::get('/list', [TagController::class, 'list'])->name('tag.list');
        Route::post('/store', [TagController::class, 'store'])->name('tag.store');
        Route::get('/edit/{id}', [TagController::class, 'edit'])->name('tag.edit');
        Route::put('/update/{id}', [TagController::class, 'update'])->name('tag.update');
        Route::get('/delete/{id}', [TagController::class, 'delete'])->name('tag.delete');
    });


    // Posts Routes
    Route::prefix('posts')->group(function () {
        Route::get('/list', [PostController::class, 'list'])->name('post.list');
        Route::get('/add', [PostController::class, 'add'])->name('post.add');
        Route::post('/store', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('post.update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
        Route::get('/inactive/{id}', [PostController::class, 'postInactive'])->name('post.inactive');
        Route::get('/active/{id}', [PostController::class, 'postActive'])->name('post.active');
        Route::get('/view/{id}', [PostController::class, 'postView'])->name('post.view');
    });


    // Reviewer Routes
    Route::prefix('reviewers')->group(function () {
        Route::get('/list', [ReviewerController::class, 'list'])->name('reviewer.list');
        Route::post('/store', [ReviewerController::class, 'store'])->name('reviewer.store');
        Route::get('/edit/{id}', [ReviewerController::class, 'edit'])->name('reviewer.edit');
        Route::put('/update/{id}', [ReviewerController::class, 'update'])->name('reviewer.update');
        Route::get('/delete/{id}', [ReviewerController::class, 'delete'])->name('reviewer.delete');
        Route::get('/inactive/{id}', [ReviewerController::class, 'reviewerInactive'])->name('reviewer.inactive');
        Route::get('/active/{id}', [ReviewerController::class, 'reviewerActive'])->name('reviewer.active');
    });

    // Terms & Conditions Routes
    Route::prefix('terms')->group(function () {
        Route::get('/list', [TermsController::class, 'list'])->name('term.list');
        Route::post('/store', [TermsController::class, 'store'])->name('term.store');
        Route::get('/edit/{id}', [TermsController::class, 'edit'])->name('term.edit');
        Route::put('/update/{id}', [TermsController::class, 'update'])->name('term.update');
        Route::get('/delete/{id}', [TermsController::class, 'delete'])->name('term.delete');
    });

    // Privacy Policy Routes
    Route::prefix('policies')->group(function () {
        Route::get('/list', [PolicyController::class, 'list'])->name('policy.list');
        Route::post('/store', [PolicyController::class, 'store'])->name('policy.store');
        Route::get('/edit/{id}', [PolicyController::class, 'edit'])->name('policy.edit');
        Route::put('/update/{id}', [PolicyController::class, 'update'])->name('policy.update');
        Route::get('/delete/{id}', [PolicyController::class, 'delete'])->name('policy.delete');
    });

    // Subscriber Routes
    Route::prefix('subscribers')->group(function () {
        Route::get('/list', [SubscriberController::class, 'list'])->name('subscriber.list');
        Route::get('/delete/{id}', [SubscriberController::class, 'delete'])->name('subscriber.delete');
    });


});
