<?php

use App\Http\Controllers\ContriesController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CoursesLogin;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TrinningController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

Route::get('/hi', function () {

})->middleware('PoliceMan');
 Route::get('/', function () {
     return View('home');
});
Route::get('ar', function () {
    session()->put( 'locale','ar');
     return redirect()->back();
})->name('ar');

Route::get('en', function () {

     session()->put('locale','en');
     return redirect()->back();
})->name('en');
//  Route::get('posts/{id}/edit',[PostController::class,'edit'])->name('posts.edit');
//  Route::put('posts/{id}',[PostController::class,'update'])->name('posts.update');
//  Route::delete('posts/{id}',[PostController::class,'destroy'])->name('posts.destroy');
//Route::resource('posts',PostController::class)->middleware('auth');//يتم استخدم لان(auth') المستخدم مسجل الدخول بالفعل
//Route::get('login',[LoginController::class,'login'])->name('login')->middleware('guest');//يتم استخدم جيست لان المستخدم لما يقوم بتسجيل الدخول بعد
//Route::post('login',[LoginController::class,'authenticate'])->name('login.authenticate')->middleware('guest');
//Route::get('logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');
//Route::post('logout',[LoginController::class,'logout'])->name('logout')->middleware('auth');//طريقه اللوج اوت من خلال بوست بشرط وجود فورم
//t courses
Route::middleware('auth:dashboard')->group(function(){
 Route::resource('country',ContriesController::class);
Route::get('deleted/{id}',[ContriesController::class,'delete'])->name('country.deleted');//except([اسم الداله])دي داله ممكن بيها استثني روت من الريسورس مخلهوش يشتغل
Route::get('restore/{id}',[ContriesController::class,'restore'])->name('country.restore');//only([اسم الداله ,اسم الداله])دي داله ممكن اشغل بيها الدوال او الداله المحتاج اشغلها فقط
//star
    //courses
    Route::get('courses',[CoursesController::class,'index'])->name('courses.index');
Route::get('create_courses',[CoursesController::class,'create'])->name('courses.create');
Route::post('store_courses',[CoursesController::class,'store'])->name('courses.store');
Route::get('edit_courses/{id}',[CoursesController::class,'edit'])->name('courses.edit');
Route::post('update_courses/{id}',[CoursesController::class,'update'])->name('courses.update');
Route::get('delete_courses/{id}',[CoursesController::class,'destroy'])->name('courses.delete');
//start studend
Route::get('student',[StudentController::class,'index'])->name('student.index');
Route::get('create_student',[StudentController::class,'create'])->name('student.create');
Route::post('store_student',[StudentController::class,'store'])->name('student.store');
Route::get('edit_student/{id}',[StudentController::class,'edit'])->name('student.edit');
Route::post('update_student/{id}',[StudentController::class,'update'])->name('student.update');
Route::get('deleted_student/{id}',[StudentController::class,'destroy'])->name('student.deleted');
Route::post('ajax_search_student',[StudentController::class,'ajax_search_student'])->name('student.ajax_search_student');

//start trinning
Route::get('trinning',[TrinningController::class,'index'])->name('trinning.index');
Route::get('create_trinning',[TrinningController::class,'create'])->name('trinning.create');
Route::post('store_trinning',[TrinningController::class,'store'])->name('trinning.store');
Route::get('edit_trinning/{id}',[TrinningController::class,'edit'])->name('trinning.edit');
Route::post('update_trinning/{id}',[TrinningController::class,'update'])->name('trinning.update');
Route::get('delete_trinning/{id}',[TrinningController::class,'destroy'])->name('trinning.delete');
Route::get('details_trinning/{id}',[TrinningController::class,'details'])->name('trinning.details');
Route::get('addstudenttotrinningcourse/{id}',[TrinningController::class,'addstudenttotrinningcourse'])->name('trinning.addstudenttotrinningcourse');
Route::post('doaddstudenttotrinningcourse/{id}',[TrinningController::class,'doaddstudenttotrinningcourse'])->name('trinning.doaddstudenttotrinningcourse');
Route::get('deletestudenttotrinningfromcourse/{id}',[TrinningController::class,'deletestudenttotrinningfromcourse'])->name('trinning.deletestudenttotrinningfromcourse');

});

Route::get('courses_login',[CoursesLogin::class,'courses_login'])->name('courses_login.courses_login')->middleware('guest:dashboard');//يتم استخدم جيست لان المستخدم لما يقوم بتسجيل الدخول بعد
Route::post('courses_dologin',[CoursesLogin::class,'courses_authenticate'])->name('courses_dologin.courses_authenticate')->middleware('guest:dashboard');
Route::get('courses_logout',[CoursesLogin::class,'courses_logout'])->name('courses_logout')->middleware('auth:dashboard');
//fallback
Route::fallback(function(){
    return ('this page is not found');
});

