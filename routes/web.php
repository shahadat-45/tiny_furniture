<?php


use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Frontend\AppointmentController;
use App\Http\Controllers\AppointmentController as StoreNewsletter;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\FrontendController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

//Front View
Route::get('/', [FrontendController::class, 'home'])->name('home');

Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
Route::get('/about-us', [FrontendController::class, 'about_us'])->name('about.us');
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/contact/page', [FrontendController::class, 'contact'])->name('contact');
Route::get('/service/page', [FrontendController::class, 'service'])->name('service');

//__Blog__//
Route::get('/blogs', [BlogController::class, 'blogList'])->name('blogList');
Route::get('/blog-details/{blog}', [BlogController::class, 'blogDetail'])->name('blogDetail');
Route::resource('/comment', CommentController::class)->names('blog.comment');
Route::post('/blog-search/',[BlogController::class, 'blogSearch'])->name('blogSearch');

// project details
Route::get('/project-details/{id}', function ($id) {
    $project= Project::where('status', 1)->where('id', $id)->first();
    return view('frontend.pages.project.project-details', compact('project'));
})->name('project-details');


Route::resource('/contact', ContactController::class)->names('contact');
Route::resource('/appointment', AppointmentController::class)->names('appointment');

//Route::view('/contact', 'frontend.pages.static_pages.contact');
Route::view('/doctor', 'frontend.pages.static_pages.doctor');
Route::view('/service', 'frontend.pages.static_pages.service');
Route::view('/appointment', 'frontend.pages.static_pages.appointment');

// web.php
Route::get('/doctors-by-department/{id}', [DoctorController::class, 'getDoctorsByDepartment'])->name('doctors.by.department');
Route::post('/appointment/newsletter',[StoreNewsletter::class,'newsletter'])->name('newsletter');



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
