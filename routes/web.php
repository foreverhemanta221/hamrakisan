<?php






//basic login only here
    //adminlogin
    route::get('admin',function (){
        return view('auth.login');
    })->name('adminlogin');
    route::post('adminlogin','AuthController@adminLogin')->name('adminlogin.post');



    //forget password
    route::get('/forgot-password',function (){
       return view('frontend.auth.forgot_password');
    });
    //code verification
    route::get('verificationcode',function (){
       return view('frontend.auth.verification_code');
    });
    //add to cart
    route::get('add-to-cart/{id}','Backend\ProductController@addToCart')->name('product.addToCart');
    route::get('show-cart','Backend\ProductController@getCart')->name('product.showcart');
//admin
Route::group(['middleware' => ['admin']], function () {
    //tag
    route::get('/dashboard',function (){
        return view('backend.index');
    });
    route::resource('banner','Backend\Websetting\BannerController');
    route::resource('category','Backend\CategoryController');
    route::resource('listing','Backend\ListingController');
    route::resource('listing/{id}/review','Backend\ReviewController');
    route::resource('productcategory','Backend\ProductCategoryController');
    route::resource('products','Backend\ProductController');
    route::resource('farmstory','Backend\FarmStoriesController');
    route::resource('vendor','Backend\VendorController');
    route::resource('users','Backend\UserController');
    route::resource('trainings','Backend\TrainingController');
    route::resource('trainings-instructor','Backend\InstructorController');
    route::resource('trainings/{training_id}/faq','Backend\TrainingFaqController');
    route::resource('trainings/{training_id}/syllabus','Backend\TrainingSyllabusController');
    route::resource('dashboard/faqs','Backend\FaqController');

    //product category
    route::get('productcategory/translate/{id}','Backend\Nepali\ProductCategoryController@getView')->name('productcategory.translate');
    route::put('productcategory/translate/{id}','Backend\Nepali\ProductCategoryController@translateData')->name('productcategory.translate.submit');
    //product
    route::get('product/translate/{id}','Backend\Nepali\ProductController@getview')->name('products.translate');
    route::put('product/translate/{id}','Backend\Nepali\ProductController@translateData')->name('products.translat.submit');
    //websetting

    //listing related route here
    //listing feature image update
    route::put('listing/updateFeatureImage/{id}','Backend\ListingController@updateFeatureImage')->name('updateFarmFeatureImage');

    route::get('setting',function (){
        return view('backend.listing.settings.index');
    });
    route::post('listing/changeStatus','Backend\ListingController@changeStatus');
    //only for admin insert products on farm
    route::get('listing/farmproduct/{id}/create','Backend\FarmProductController@create')->name('farmproduct.create');
    route::get('listing/farmproduct/{id}','Backend\FarmProductController@index')->name('farmproduct.index');
    route::put('farmproduct/listing/{id}','Backend\FarmProductController@store')->name('farmproduct.store');
    route::get('farmproduct/{id}','Backend\FarmProductController@edit')->name('farmproduct.edit');
    route::put('farmproduct/{id}','Backend\FarmProductController@update')->name('farmproduct.update');
    //get gallery of listing
    route::get('gallery/{listing_id}','Backend\ListingController@showImage')->name('imagegallery');
    //insert new image into listing
    route::put('insertgallery/{id}','Backend\ListingController@insertImage')->name('insertgalleryimage');
    //delete gallery image
    route::delete('imagegallery/{id}','Backend\ListingController@deleteImage')->name('deleteimage');

    //manual password change by admn
    route::put('users/password_change/{id}','Backend\UserController@changePassword')->name('users.change_password');

    //all the code for user login
    //    TODO: change controller location
    route::get('user/dashboard/add-product','Frontend\ProductController@create');
    route::post('user/dashboard/add-product','Frontend\ProductController@store')->name('userproduct.store');
    route::get('user/dashboard/edit-product/{id}','Frontend\ProductController@edit')->name('userproduct.edit');
    route::put('user/dashboard/edit-product/{id}','Frontend\ProductController@update')->name('userproduct.update');
    route::delete('user/dashboard/delete/{id}','Frontend\ProductController@destroy')->name('userproduct.destroy');

    //order
    route::resource('orders','Backend\OrderController');
    //order change status by admin
    route::post('orderstatus','Backend\OrderController@orderstatus');


    //logout
    route::post('logout','AuthController@logout');


    //other forms
    route::get('farmlistingrequest','Forms\FarmListFormController@index')->name('farmlistrequest.index');
    route::get('farmlistingrequest/{id}','Forms\FarmListFormController@show');
    route::put('farmlistingrequest/{id}','Forms\FarmListFormController@update')->name('farmlistrequest.update');
    route::delete('farmlistingrequest/{id}','Forms\FarmListFormController@destroy')->name('farmlistrequest.delete');

    //loan form
    route::get('loanrequest','Forms\LoanRequestFormController@index')->name('loanrequest.index');
    route::get('loanrequest/{id}','Forms\LoanRequestFormController@show')->name('loanrequest.show');
    route::put('loanrequest/{id}','Forms\LoanRequestFormController@update')->name('loanrequest.update');
    route::delete('loanrequest/{id}','Forms\LoanRequestFormController@destroy')->name('loanrequest.delete');
    //    other functionality
    route::get('report/farm','Backend\ReportController@getFarmerReportView');
    route::post('report/farm','Backend\ReportController@generateFarmReport');

});

Route::group(['middleware'=>['locale']],function(){

    //auth
    route::get('login',function (){
        return view('frontend.auth.login');
    })->name('userlogin');

    route::post('login','Frontend\UserController@login');

    //register
    route::get('/register', function(){
        return view('frontend.auth.register');
    });
    route::post('/register','Frontend\UserController@register')->name('register.store');

    Route::get('/','Frontend\PageController@getHomePageData');
    //farmer
    Route::group(['middleware'=>'farmer'],function (){
        route::get('farmerdashboard','Frontend\Farmer\FarmerController@getFamerDashboard');
        route::get('myfarm','Frontend\Farmer\FarmerController@loadFarm');
        route::post('postmyfarm','Frontend\Farmer\FarmerController@saveFarm');
        route::post('updatemyfarm','Frontend\Farmer\FarmerController@updateFarm')->name('updatemyfarm');
        route::resource('myproduct','Frontend\Farmer\ProductController');
        route::post('myproduct/changestatus','Frontend\Farmer\ProductController@changeStatus');

        route::get('farmreview','Frontend\Farmer\ReviewController@index');
        route::post('changestatus','Frontend\Farmer\ReviewController@changeStatus');
        route::resource('traingings','Frontend\Farmer\TrainingController');
        route::get('farmorder','Frontend\Farmer\OrderController@farmOrder');
        route::get('farmorder/{order_id}','Frontend\Farmer\OrderController@viewFarmOrders');
    });
//user
    Route::group(['middleware'=>'user'],function (){
        route::get('userdashboard','Frontend\User\UserDashboardController@getUserDashboard');
        route::get('myreview','Frontend\User\ReviewController@index');
        route::get('my-order','Frontend\User\OrderConroller@myOrder');
        route::get('my-order/{order_id}','Frontend\User\OrderConroller@viewmyOrder');
        //cancel order
        // route::post('cancelOrder/{order_id}','Frontend\User\OrderConroller@cancelOrder')->name('cancelOrder');
        route::post('cancelOrder/{order_id}','Frontend\OrderController@orderCancel')->name('cancelOrder');



    });
//eitther user and farmer
    route::group(['middleware'=>'userfarmer'],function (){
        route::get('myaccount','Frontend\User\AccountController@myProfile');
        route::post('myaccount','Frontend\User\AccountController@updateAccount');

        //cart
        route::post('add-to-cart','Frontend\CartController@store');
        route::post('update-cart','Frontend\CartController@update');
        route::post('remove-cart','Frontend\CartController@remove');
        route::get('my-cart','Frontend\CartController@index')->name('my-cart');
        route::post('order','Frontend\OrderController@order');
        route::post('order/change-status','Frontend\OrderController@changestatus');



        //checkout
        route::get('checkout','Frontend\OrderController@checkout');
    });

    route::post('logout','Frontend\UserController@logOut')->name('logout');

////////////////////////////////////new version route frontend ///////////////////////
    route::get('/farm', 'Frontend\SearchController@showSearchResults')->name('farm.search');
    route::post('farmserach','Frontend\SearchController@ajaxSearch');
//pages
    route::get('about-us','Frontend\PageController@about');
    route::get('faqs','Frontend\PageController@faqs');
//new product
    route::get('allproducts','Frontend\PageController@getAllProduct');
    route::get('/product/{slug}', 'Frontend\PageController@getProductDetail');
//listings
    route::get('listings/{slug}','Frontend\PageController@loadListing');
//loan requestF

//forms
    route::post('farmregisterform','Forms\FarmListFormController@store');
    route::get('loanrequestform','Forms\LoanRequestFormController@create');
    route::post('loanrequestform','Forms\LoanRequestFormController@store');
//product
    route::get('agrotraining/{id}','Frontend\PageController@getTraining');
//language
    Route::get('_language/{locale?}','Frontend\LanguageSwitcherController@getlang');
});



////////////////////////////new version route end /////////////////////


