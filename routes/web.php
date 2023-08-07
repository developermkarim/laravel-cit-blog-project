<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\Role;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::controller(IndexController::class)->group(function(){

Route::get('/', 'Index');

Route::get('/news/post/details/{id}/{slug}', 'newsDetails');

Route::get('/news/category/{id}/{slug}','cateWiseNews')->name('news.post.category');
Route::get('/news/subcategory/{id}/{slug}','subcateWiseNews')->name('news.post.subcategory');

/* Change Language Route Here */

Route::get('/lang/change','changeLanguage')->name('change.language');


});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



/* 
* Route Middle Ware Group
* Custom Logout page in admin dashboard.
 */
Route::middleware(['auth','role:admin'])->group(function() {
   
Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');

Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');

Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

}); // End Admin Middleware 


/* 
* RedirectIfAuthenticated is added with route for being stable in dashboard afer login.actually it fixes bug that creates issue while navigate to login page after logged in.
* Custom Login Page Here for admin.
*/

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class)->name('admin.login');

Route::get('/admin/logout/page', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');


/* Admin Pages Controller inclued WIth The admin Role In the Following */

Route::middleware(['auth','role:admin'])->group(function(){

    /* The Route Group for admin setting such as add store, delete , update and show all admins */

    Route::controller(AdminController::class)->group(function(){

        Route::get('/all/admin','allAdmin')->name('all.admin');
    
        Route::get('/add/admin','AddAdmin')->name('add.admin');

        Route::post('/store/admin','storeAdmin')->name('admin.store');

        Route::get('/edit/admin/{id}','editAdmin')->name('edit.admin');

        Route::post('/update/admin','updateAdmin')->name('update.admin');

        Route::get('/delete/admin/{id}','deleteAdmin')->name('delete.admin');

        Route::get('admin/{status}/{id}','activeInactive')->name('status.admin');

        Route::post('admin/data/activate/{id}', 'activate')->name('admin.data.activate');
        Route::post('admin/data/deactivate/{id}', 'deactivate')->name('admin.data.deactivate');
        
    });
    /* admin route group end here */

    Route::controller(CategoryController::class)->group(function(){
    /* Category Routes Here */

    Route::get('/all/category','AllCategory')->name('all.category');
    Route::get('/add/category','AddCategory')->name('add.category');
    Route::post('/store/category','StoreCategory')->name('category.store');
    Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
    Route::post('/update/category','UpdateCategory')->name('category.update');
    Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');


// SubCategory all Route

    Route::get('/all/subcategory','AllSubCategory')->name('all.subcategory');
    Route::get('/add/subcategory','AddSubCategory')->name('add.subcategory');
    Route::post('/store/subcategory','StoreSubCategory')->name('subcategory.store');
    Route::get('/edit/subcategory/{id}','EditSubCategory')->name('edit.subcategory');
    Route::post('/update/subcategory','UpdateSubCategory')->name('subcategory.updated');
    Route::get('/delete/subcategory/{id}','DeleteSubCategory')->name('delete.subcategory');

     Route::get('/subcategory/ajax/{category_id}','GetSubCategory')->name('get-subcategory');
});

// News Post all Route
Route::controller(NewsPostController::class)->group(function(){

    Route::get('/all/news/post','AllNewsPost')->name('all.news.post');
    Route::get('/add/news/post','AddNewsPost')->name('add.news.post');

    Route::post('/store/news/post','storeNewsPost')->name('store.news.post');

    Route::get('/edit/news/post/{id}','editNewsPost')->name('edit.news.post');

    Route::post('/update/news/post','updateNewsPost')->name('update.news.post');

    Route::get('/delete/news/post/{id}','deleteNewsPost')->name('delete.news.post');

    Route::get('/news/post/active/{id}','activeNewsPost')->name('active.news.post');
    Route::get('/news/post/inactive/{id}','inactiveNewsPost')->name('inactive.news.post');

    

});

/* Banner Routes of admin Panel Here */

/*    Route::controller(BannerController::class)->group(function(){

    Route::get('/all/banners/','AllBanners')->name('all.banners');

    Route::post('/update/banners/', 'UpdateBanners')->name('update.banners');
});
 */

Route::controller(BannerController::class)->group(function(){

    Route::get('/all/banners','AllBanners')->name('all.banners');
    Route::post('/update/banners','UpdateBanners')->name('update.banners');
   

});

});