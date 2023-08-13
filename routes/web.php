<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\JustBannerController;
use App\Http\Controllers\Backend\NewsPostController;
use App\Http\Controllers\Backend\PhotoGalleryController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SeoSettingController;
use App\Http\Controllers\Backend\VideoGalleryController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\NewsCommentController as CommentController;
use App\Http\Controllers\Frontend\NewsCommentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RedirectIfAuthenticated;

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


/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 */
Route::get('/', [IndexController::class,'index']);

Route::middleware(['auth'])->group(function() {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    
    Route::get('/change/password', [UserController::class, 'ChangePassword'])->name('change.password');
    
    Route::post('/user/change/password', [UserController::class, 'UserChangePassword'])->name('user.change.password');
    
    }); // End User Middleware 
    

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
Route::controller(BannerController::class)->group(function(){

/*     Route::get('/all/banners','AllBanners')->name('all.banners');
    Route::post('/update/banners','UpdateBanners')->name('update.banners'); */
/*     Route::get('/all/banners/','AllBanners')->name('all.banners');
    Route::get('/update/banners/','UpdateBanners')->name('update.banners'); */
   
});

// PhotoGallery all Route
Route::controller(PhotoGalleryController::class)->group(function(){

    Route::get('/all/photo/gallery','AllPhotoGallery')->name('all.photo.gallery');
    Route::get('/add/photo/gallery','AddPhotoGallery')->name('add.photo.gallery');
    Route::post('/store/photo/gallery','StorePhotoGallery')->name('store.photo.gallery');

    Route::get('/edit/photo/gallery/{id}','EditPhotoGallery')->name('edit.photo.gallery');

    Route::post('/update/photo/gallery','UpdatePhotoGallery')->name('update.photo.gallery');

    Route::get('/delete/photo/gallery/{id}','DeletePhotoGallery')->name('delete.photo.gallery');

});


/* Live tv , Gallery and Video Controller routes Here */
// Video Gallery all Route

Route::controller(VideoGalleryController::class)->group(function(){

    Route::get('/all/video/gallery','AllVideoGallery')->name('all.video.gallery'); 

    Route::get('/add/video/gallery','AddVideoGallery')->name('add.video.gallery');

    Route::post('/store/video/gallery','StoreVideoGallery')->name('store.video.gallery');

     Route::get('/edit/video/gallery/{id}','EditVideoGallery')->name('edit.video.gallery');

     Route::post('/update/video/gallery','UpdateVideoGallery')->name('update.video.gallery');

     Route::get('/delete/video/gallery/{id}','DeleteVideoGallery')->name('delete.video.gallery');
     Route::get('/update/live/tv','UpdateLiveTv')->name('update.live.tv');
     Route::post('/update/live','UpdateLiveData')->name('update.live');

});


Route::controller(BannerController::class)->group(function(){

    Route::get('/all/banners','allBanners')->name('all.banners');

    Route::post('/update/banners','updateBanners')->name('update.banners');
});

    // Review all Route
    Route::controller(NewsCommentController::class)->group(function(){

        Route::get('/pending/review','PendingReview')->name('review.pending');
        Route::get('/review/approve/{id}','ReviewApprove')->name('review.approve');
        Route::get('/approve/review','ApproveReview')->name('review.approved'); 
        Route::get('/delete/review/{id}','DeleteReview')->name('delete.review');
     
    });

    // Review all Route
Route::controller(SeoSettingController::class)->group(function(){

    Route::get('/seo/setting','SeoSiteSetting')->name('seo.setting');
    Route::post('/update/seo/setting','UpdateSeoSetting')->name('update.seo.setting');
 
});

// Permission all Route
Route::controller(RoleController::class)->group(function(){

    // Permission all Route

    Route::get('/all/permission','AllPermission')->name('all.permission');
    Route::get('/add/permission','AddPermission')->name('add.permission');
    Route::post('/store/permission','StorePermission')->name('permission.store');
    Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
    Route::post('/update/permission','UpdatePermission')->name('permission.update');

    Route::delete('/delete/permission/{id}','DeletePermission')->name('delete.permission');


    // Roles all Route

    Route::get('/all/roles','AllRoles')->name('all.roles');
    Route::get('/add/roles','AddRoles')->name('add.roles');
    Route::post('/store/roles','StoreRoles')->name('roles.store');
    Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');
    Route::post('/update/roles','UpdateRoles')->name('roles.update');
    Route::get('/delete/roles/{id}','DeleteRoles')->name('delete.roles');

    Route::get('/add/roles/wise/permission','AddRolesPermission')->name('add.roles.wise.permissions');
    Route::get('/all/roles/wise/permission','AllRolesPermission')->name('all.roles.wise.permissions');

    Route::post('/store/roles/wise/permission','StoreRolesPermission')->name('store.roles.wise.permissions');

    Route::get('/edit/roles/wise/permission/{id}','EditRolesPermission')->name('edit.roles.wise.permissions');
    
    Route::post('/update/roles/wise/permission','UpdateRolesPermission')->name('update.roles.wise.permissions');

    Route::get('/delete/roles/wise/permission/{id}','DeleteRolesPermission')->name('delete.roles.wise.permissions');

});

}); // This end is of admin role middleware


/* Access routes for all Start */

Route::controller(IndexController::class)->group(function(){
    
    Route::get('/news/post/details/{id}/{slug}', 'newsDetails');
    
    Route::get('/news/category/{id}/{slug}','cateWiseNews')->name('news.post.category');
    Route::get('/news/subcategory/{id}/{slug}','subcateWiseNews')->name('news.post.subcategory');
    
    /* Change Language Route Here */
    
    Route::get('/lang/change','changeLanguage')->name('change.language');
    
    /* Reporter Wise Post Route */
    Route::get('/reporter/news/{id}','reporterWiseNews')->name('reporter.news.post');

    });


    Route::post('store/review/',[NewsCommentController::class,'storeReview'])->name('store.review');



/*     Route::controller(NewsCommentController::class)->group(function(){

        Route::post('/store/comment','storeComment')->name('store.comment');
    }); */
    // Route::resource('comments', NewsCommentController::class)->middleware('auth');

/*     Route::get('/comments', 'CommentController@index'); // To fetch all comments
Route::post('/comments', 'CommentController@store'); // To create a new comment
Route::put('/comments/{id}', 'CommentController@update'); // To update a comment
Route::delete('/comments/{id}', 'CommentController@destroy'); // To delete a comment
 */
/* Access routes for all End */