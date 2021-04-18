<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['authkey']], function () {

    //hamrakisan web app version 2
    route::post('updateprofile','Api\UserController@updateProfile');
    route::get('userprofile','Api\UserController@userProfile');

    //end here
    route::get('farm-product/order','Api\FarmProductManageController@orderList');
    route::get('farm-product/{id}/order','Api\FarmProductManageController@ordersOfSingleProduct');

    //farmreview
    route::post('farmreview/{farmid}','Api\ReviewController@store');

    //order controller
    route::post('order','Api\OrderController@order');

    route::post('all-orders','Api\OrderController@allOrders');
     //order change status by admin
    // route::post('orderstatus','Api\OrderController@orderstatus');

    


    
});

// //payment methods
route::get('paymentmethods/','Api\SettingController@paymentMethods');



Route::group(['middleware' => ['farmerApi']], function () {
    route::get('myfarm','Api\Farmer\FarmerController@myFarm');
    route::post('myfarm/store','Api\Farmer\FarmerController@addFarmDetail');
    route::resource('myproduct','Api\Farmer\ProductController');
    route::resource('myfarmreview','Api\Farmer\ReviewController');
    route::post('myfarmreview/changestatus','Api\Farmer\ReviewController@ChangeStatus');
    route::get('my-stats','Api\Farmer\FarmerController@mystats');
    route::get('hasfarm','Api\Farmer\FarmerController@hasFarm');

    // orders
    route::get('myfarm-orders/{user_id}','Api\OrderController@FarmerAllOrders');
    route::get('orderdetail/{order_id}','Api\OrderController@UserOrderDetail');
    route::post('farm/orderstatus','Api\OrderController@farmOrderstatus');
    // route::post('cancelOrder/{order_id}','Frontend\OrderController@userOrderCancel')->name('cancelOrder');

});

Route::group(['middleware' => ['userApi']], function () {
    route::get('user-stats','Api\User\UserController@mystats');
    route::resource('user-reviews','Api\User\UserReviewController');

    // orders
    route::get('user-orders/{user_id}','Api\OrderController@UserAllOrders');
    route::get('orderdetail/{order_id}','Api\OrderController@UserOrderDetail');
    route::post('user/orderstatus','Api\OrderController@userOrderstatus');

});
//order details:
// route::get('orderdetail/{order_id}','Api\OrderController@UserOrderDetail');

route::get('allcategory','Frontend\PageController@allcategory');

route::get('categories','Api\SettingController@getCategories');



//for test



//allactive farm
//route::resource('farm','Api\ListingController');
route::get('farmproduct/{id}','Api\ListingController@farmProductDetail');
//farm product book
route::put('farmproduct/{id}/order','Api\FarmProductManageController@getOrder');


//farm story
route::get('farm-stories','Api\SettingController@allFarmStorires');
route::get('farm-story/{id}','Api\SettingController@getFarmStory');

route::get('allcategory','Api\SettingController@allCategory');

//product-category
route::get('allproductcategory','Api\ProductController@allproductCategoryList');
route::get('productcategories','Api\SettingController@productCategory');


//products
route::get('product','Api\ProductController@index');
route::get('product/{id}','Api\ProductController@show');
//product by cateogries
route::resource('product/{id}/category','Api\ProductController@productByCategory');
//route::get()


//route::get('searchproduct','Api\SearchController@productSearch');
//users
route::post('list-fram','Api\ListingController@registerAndListingFarm');
//hemanta hamrakisan app version 2

//settings

route::get('provinces','Api\SettingController@getProvinces');
route::get('districts','Api\SettingController@getDistricts');
route::get('/fetchdistrictbyprovince/{id}','Frontend\PageController@getDistrictOfProvince')->name('getprovincedistrict');

route::get('units','Api\SettingController@getUnits');

//register modules
route::post('register','Api\UserController@register');
route::post('login','Api\UserController@login');
route::post('logout','Api\UserController@logOut');

//home page
route::get('getfeaturelistings','Api\HomePageController@getFeatureFarm');
route::get('getfeatureproducts','Api\HomePageController@getFeatureProduct');
route::get('getfeaturetraining','Api\HomePageController@getFeatureTraining');

route::get('farmdetail/{farmid}','Api\PageController@farmDetail');
route::get('farmreview/{farmid}','Api\ReviewController@index');

//review


//success stories
route::get('featurevideos','Api\FeatureVideoController@index');
route::get('featurevideo/{id}','Api\FeatureVideoController@show');

//search

route::post('searchfarmer','Api\SearchController@farmerSearch');

//for all banner
route::get('banners','Api\PageController@getAllBanner');

//for website js



