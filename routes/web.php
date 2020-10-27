<?php

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


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//..........customrer and admin controller..........
// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/customer', 'customercontroller@index')->name('customerss');

//........route goruop this session............

Route::group(['middleware' => ['web']], function () {
    //
});

//............end route goruop.............

route::get('categoryadd','category@addcategoy')->name('categoryadd');
route::post('categorypost','category@categorypost')->name('categorypost');
route::get('categoryview','category@categoryview')->name('categoryview');
route::get('categoryedite/{id}','category@edite')->name('categoryedite');
route::post('categoryupdate/{id}','category@categoryUpdate')->name('categoryesupdate');
route::get('categoryDelete/{id}','category@categorydelete')->name('categoryDelete');
route::get('categorysoft','category@categorysoft')->name('categorysoft');
route::get('categoyforceDe/{id}','category@permanetdelte')->name('forceDelete');
route::get('categoryrestore/{id}','category@restore')->name('categoryrestoreses');

// ..........subcategory..........
route::get('subAdd','Subcategorsy@addcategoy')->name('subcategoryadd');
route::post('subpost','Subcategorsy@categorypost')->name('subcategorpost');
route::get('subview','Subcategorsy@categoryview')->name('subcategorview');

//.........product route.............

route::get('add-product','ProductController@addcategoy')->name('add-product');
route::post('add-product-post','ProductController@categorypost')->name('add-product-store');
route::get('add-product-view','ProductController@productview')->name('add-product-viewss');
route::get('edit-product/{id}','ProductController@productedite')->name('edites-product');
route::post('edit-update','ProductController@productuppdsate')->name('productuppdsate');
route::get('edit-delete/{id}','ProductController@productdete')->name('productdete');

//...................password change..........

route::get('passchange','PasswordChange@passpage')->name('passchange');
route::post('/password_update','PasswordChange@changepass')->name('password.update');

//........................fontcontroller...................

route::get('/','fontController@font')->name('/');
route::get('/about','fontController@about')->name('about');
route::get('/contacts','fontController@contact')->name('contact');
route::get('/blog','fontController@blogs')->name('blog');
route::get('/wishli','fontController@wishlist')->name('wishlist');
route::get('/faq','fontController@faqpage')->name('faqpage');
route::get('/shop','fontController@shop')->name('shops');
route::get('/shopcard','fontController@shopcard')->name('shops_card');
route::get('/single/{slug}','fontController@single')->name('singlepage');
route::get('/singlecard/{product_id}','fontController@singlecard')->name('single-card');
route::get('/cart','CartController@cart')->name('cart');
route::get('/cart/{coupon}','CartController@cart')->name('couponcart');
route::get('cartdel/{cart_id}','CartController@cartdelete')->name('cart-delete');
route::post('cartupdate','CartController@cartupdate')->name('cart-update');
route::get('love/{lovecart}','CartController@lovecart')->name('lovecart');
route::get('/blogdets/{slug}','fontController@blogsdetails')->name('blogsdetails');


//..............top prosuct show...........

//...........checkout controller.............
route::get('check/','chekcoutcontroller@checkout')->name('check_out');

route::get('api/get-state-list/{country_id}','chekcoutcontroller@countryget')->name('countryget');
route::get('api/get-city-list/{state_id}','chekcoutcontroller@statetryget')->name('statetryget');
//.....................Payment controller...........

route::post('/pyment','paymentcontroller@pymentmethod')->name('pymentss');
//..............socially conteroller............

Route::get('login/github', 'sociallityController@redirectToProvider')->name('redirectToProvider');
Route::get('login/github/callback', 'sociallityController@handleProviderCallback')->name('handleProviderCallback');
//.................coupon route...................
route::get('/inert','couponcontroller@insert')->name('insertcoupon');
route::post('/postcoupon','couponcontroller@couponpost')->name('couponpost');
route::get('/viewcoupon','couponcontroller@couponview')->name('couponview');
route::get('/deltecoupon/{id}','couponcontroller@coupondelted')->name('coupondelted');

//.................font social icon .........................

route::get('/icon','fontsocialcontroller@createicon')->name('createicon');
route::post('/iconpost','fontsocialcontroller@createiconpost')->name('createiconpost');
route::get('/iconview','fontsocialcontroller@createiview')->name('createiview');
route::get('/icondelete/{id}','fontsocialcontroller@socila_icondelte')->name('socila_icondelte');
route::get('/iconedite/{id}','fontsocialcontroller@socila_iconedite')->name('socila_iconedite');
route::post('/iconeupdate','fontsocialcontroller@socila_iconeupdate')->name('socila_iconeupdate');

//.......................Copywrite route...................

route::get('/coptwrit','copywritecontroller@create')->name('createcopywrite');
route::post('/copyinsert','copywritecontroller@insert')->name('copywirte_insert');
route::get('/copyiview','copywritecontroller@copywriteview')->name('copywriteview');
route::get('/copyiedite/{id}','copywritecontroller@copywriteedite')->name('copywriteedite');
route::post('/copyiedite','copywritecontroller@copywriteupdate')->name('copywriteupdate');

//.............Informatin route...................
route::get('/info','fontinformation@create')->name('createinformation');
route::post('/infopost','fontinformation@infoinsert')->name('infoinsert');
route::get('/infoview','fontinformation@infoview')->name('infoview');
route::get('/infoedi/{id}','fontinformation@infoedite')->name('infoedite');
route::post('/infoup','fontinformation@infoupdate')->name('infoupdate');

//..................featured-area route..................
route::get('create','featercontroller@createfeature')->name('createfeature');
route::post('featurepost','featercontroller@createfeaturepost')->name('createfeaturepost');
route::get('featureview','featercontroller@createfeatureview')->name('createfeatureview');
route::get('featureedite/{id}','featercontroller@createfeatureedie')->name('createfeatureedie');
route::post('featureeupdate','featercontroller@createfeatuupdaet')->name('createfeatuupdaet');
route::get('featureedelted/{id}','featercontroller@createfeatudelete')->name('createfeatudelete');

//.................slider route.....................................
route::get('slider','slidercontroller@createslider')->name('createslider');
route::post('sliderpost','slidercontroller@createsliderpost')->name('createsliderpost');
route::get('sliderview','slidercontroller@createslideview')->name('createslideview');
route::get('slideredite/{id}','slidercontroller@createslideedite')->name('createslideedite');
route::post('slideredite','slidercontroller@createslidrupdate')->name('createslidrupdate');
route::get('slideredelete/{id}','slidercontroller@createslidrdelete')->name('createslidrdelete');

//........................Testimonial route.....................
route::get('/testi','testimonialcontroller@create')->name('testimonialcreate');
route::post('testipost','testimonialcontroller@testimonialinsert')->name('testimonialinsert');
route::get('testiview','testimonialcontroller@testimonialview')->name('testimonialview');
route::get('testiedite/{id}','testimonialcontroller@testimonialedite')->name('testimonialedite');
route::post('testieupdate','testimonialcontroller@testimonialupdate')->name('testimonialupdate');
route::get('testiedelte/{id}','testimonialcontroller@testimonialdelted')->name('testimonialdelted');

//........................single product FAQ route............

route::get('/faqcreate','SinglePorductFAQ@create')->name('createfaq');
route::post('/faqpost','SinglePorductFAQ@createfaqpost')->name('createfaqpost');
route::get('/faview','SinglePorductFAQ@createfaqview')->name('createfaqview');
route::get('/faview/{id}','SinglePorductFAQ@createfaqedite')->name('createfaqedite');
route::post('/faviupdate','SinglePorductFAQ@createfaqupdate')->name('createfaqupdate');
route::get('/favidelted/{id}','SinglePorductFAQ@createfaqdeleted')->name('createfaqdeleted');

//..............about page route................................
route::get('/aboucreate','AboutController@aboutcreate')->name('aboutcreate');
route::post('/aboucreatpost','AboutController@aboutcreatepost')->name('aboutcreatepost');
route::get('/aboucreatview','AboutController@aboutcreateview')->name('aboutcreateview');
route::get('/aboucreatedite/{id}','AboutController@aboutcreatedite')->name('aboutcreatedite');
route::post('/aboucreateupdate','AboutController@aboutcreatupdate')->name('aboutcreatupdate');


//................contact page route................

route::post('/contct','Contactpage@aboutpost')->name('aboutpost');
route::get('/contctview','Contactpage@aboutpostview')->name('aboutpostview');
route::get('/contctdelete/{id}','Contactpage@aboutpostdelete')->name('aboutpostdelete');
route::get('/contctupdate/{id}','Contactpage@aboutpostupdate')->name('aboutpostupdate');
route::get('/contctreplay/{id}','Contactpage@aboutpostreplay')->name('aboutpostreplay');
route::post('/contctreplaypost','Contactpage@aboutpostreplaypost')->name('aboutpostreplaypost');


//.......................Blog comment route..............

route::post('/commetpost','blogCommentController@postcomment')->name('postcomment');
route::get('/commetview','blogCommentController@postcommentview')->name('postcommentview');
route::get('/commetdelte/{id}','blogCommentController@postcommentdelete')->name('postcommentdelete');

//................FAQ font page rotue....................................

route::get('/fontfaq','faqfontpage@faqfontpage')->name('faqfontpage');
route::post('/fontfaqpost','faqfontpage@faqfontpagepost')->name('faqfontpagepost');
route::get('/fontfaview','faqfontpage@faqfontpageview')->name('faqfontpageview');
route::get('/fontfaqdelete/{id}','faqfontpage@faqfontpagedelete')->name('faqfontpagedelete');
route::get('/fontfaqedite/{id}','faqfontpage@faqfontpageedite')->name('faqfontpageedite');
route::post('/fontfaqeupdate','faqfontpage@faqfontpageupdate')->name('faqfontpageupdate');

//...........................Blog route................
route::get('/controlblog','blogcontroller@blogcontroller')->name('blogcontroller');
route::post('/controlpost','blogcontroller@blogpsot')->name('blogpsot');
route::get('/controlview','blogcontroller@blogview')->name('blogview');
route::get('/controledite/{id}','blogcontroller@blogedite')->name('blogedite');
route::post('/controledite','blogcontroller@blogupdate')->name('blogupdate');
route::get('/controledelete/{id}','blogcontroller@blogdelete')->name('blogdelete');

//.....................product review route.......

route::post('/proreview','productReviewController@product_reviewpost')->name('product_reviewpost');
route::get('/proreviewview','productReviewController@product_reviewview')->name('product_reviewview');




