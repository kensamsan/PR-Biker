<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/login', 'UserController@login')->name('user.login');
Route::get('/admin', 'UserController@admin')->name('admin.login');
Route::get('/','HomeController@home')->name('home');
Route::get('marketplace/','HomeController@marketplace')->name('marketplace');

Route::get('register/','AccountController@register')->name('register');
Route::post('store-account/','AccountController@store')->name('store-account');
Route::get('product/{id}','ProductController@show')->name('product.show');


Route::group(['prefix' => ''], function () {
	Route::group(['middleware' => ['guest']], function()
	{
		
		Route::post('auth/login', 'Auth\AuthController@authenticate')->name('user.authenticate');		Route::get('/forgot_password/reset/token/{token}', 'Auth\AuthController@resetPassword')->name('user.forgot.reset.password');
		Route::post('/forgot_password/reset/token/{token}/email/{email}', 'Auth\AuthController@resetPasswordUpdate')->name('user.forgot.reset.password.update');
		Route::get('/forgot_password', 'Auth\AuthController@forgotPassword')->name('user.forgot.password');
		Route::post('/forgot_password/request_token', 'Auth\AuthController@requestToken')->name('user.forgot.request.token');
	});

	Route::group(['middleware' => ['auth']], function()
	{

		Route::group(['prefix'=>'admin','middleware' => 'permission:is_admin'],function()
		{
		

			Route::resource('product', 'ProductController');
			Route::get('product-create-sale/{id}', 'ProductController@productCreateSale')->name('admin.product.create-sale');
			Route::get('product-set-unsale/{id}', 'ProductController@productUnsale')->name('admin.product.unsale');
			Route::post('product-save-sale/', 'ProductController@productSaleSave')->name('admin.product.sale-save');
			Route::post('product-save-sales/', 'ProductController@multipleSaleSave')->name('admin.product.sales-save');
			Route::get('product-on-sale' , 'ProductController@productOnSale')->name('admin.product.on-sale');

			Route::resource('product.product-image', 'ProductImageController');

	

			Route::resource('category', 'CategoryController');
			Route::get('category/{id}/active', 'CategoryController@active')->name('admin.category.active');
			Route::get('category/{id}/inactive', 'CategoryController@inactive')->name('admin.category.inactive');

			Route::resource('tag', 'TagController');
			Route::get('tag/{id}/active', 'TagController@active')->name('admin.tag.active');
			Route::get('tag/{id}/inactive', 'TagController@inactive')->name('admin.tag.inactive');

			Route::resource('promo-codes', 'PromoCodeController');
			Route::get('/promo-codes/{id}/delete', 'PromoCodeController@destroy')->name('promo-code-delete');
			Route::get('promo-codes/{id}/active', 'PromoCodeController@active')->name('admin.promo-codes.active');
			Route::get('promo-codes/{id}/inactive', 'PromoCodeController@inactive')->name('admin.promo-codes.inactive');
			Route::get('set-banner/{id}','PromoCodeController@setBanner')->name('set-banner');

			Route::resource('orders', 'AdminOrderController');
			Route::get('orders/{id}/action/{action}','AdminOrderController@orderAction')->name('admin.order.action');
			Route::post('order-cancel/{id}/','AdminOrderController@orderCancel')->name('admin.order.cancel');
			Route::post('orders-ship/{id}/','AdminOrderController@orderShip')->name('admin.order.ship');
			Route::post('orders-reship/{id}/','AdminOrderController@orderReShip')->name('admin.order.reship');
			// Route::resource('category', ['uses' => 'CategoryController@method', 'as' => 'categories']);


		});


		//Customer
		Route::post('/addtocart/','CartController@addToCart')->name('client-add-to-cart');
		Route::get('/cart','CartController@viewCart')->name('client-view-cart');
		Route::get('/cart-add-qty/{id}','CartController@addQty')->name('add-qty');
		Route::get('/cart-sub-qty/{id}','CartController@subQty')->name('sub-qty');
		Route::get('/cart-remove-item/{id}','CartController@removeItem')->name('client-remove-item');
		Route::get('/cart-remove-condition/{id}','CartController@removeCondition')->name('client-remove-condition');

		Route::get('/checkout-paypal/','CartController@paypal')->name('client-checkout-paypal');
		Route::get('/checkout-shipping/','CartController@shipping')->name('client-checkout-shipping');
		Route::get('/checkout-information/','CartController@information')->name('client-checkout-information');
		Route::get('/checkout-payment/','CartController@payment')->name('client-checkout-payment');
		Route::get('/checkout-submit/','CartController@submit')->name('client-checkout-submit');
		Route::get('/checkout-apply-promo/','CartController@applyPromo')->name('client-apply-promo');
		Route::get('/checkout-clear/','CartController@clearCart')->name('client-clear-cart');


		Route::resource('account','AccountController');
		Route::resource('account.billing-address','BillingAddressController');
		Route::post('account-billing-address/{id}','BillingAddressController@addBillingAddressModal')->name('account.billing-address.store-modal');
		Route::post('account-billing-contact/{id}','BillingAddressController@addBillingContactModal')->name('account.contact.store-modal');
		Route::resource('account.order','OrderController');
		// Route::resource('account.wishlist', 'WishlistController');
		// Route::get('wishlist-add-to-cart/{product_id}', 'WishlistController@addToCart')->name('wishlist-add-to-cart');
		// Route::get('wishlist-add-to-cart-variation/{product_id}/variation/{variation_id}', 'CartController@addToCartVariation')->name('wishlist-add-to-cart-variation');
		// Route::get('wishlist-add-to-cart/product/{product_id}/variation/{variation_id}', 'WishlistController@addToCartVariation')->name('wishlist-add-to-cart-variation');


		

		//Dashboard
		Route::group(['middleware' => ['permission:is_allow_dashboard']], function(){
			Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
		});

		//admin profile
		Route::get('/profile/password','UserController@profilePassword')->name('profile.password');
		Route::put('/profile/password/update','UserController@updateProfilePassword')->name('profile.password.update');
		Route::get('/profile','UserController@profile')->name('profile');
		Route::put('/profile/update','UserController@updateProfile')->name('profile.update');
		Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
		//Dashboard

		Route::group(['middleware' => ['permission:is_allow_products']], function(){
			Route::resource('admin-products','ProductController');
			Route::get('/admin-products-stock/{id}','ProductController@stock')->name('admin.product.stock');
			route::post('admin-products-addstock','ProductController@addstock')->name('admin.product.addstock');
			route::post('admin-products-adjust-stock','ProductController@adjustStock')->name('admin.product.adjust-stock');
			Route::get('/admin-products-visibility/{id}/active', 'ProductController@active')->name('admin.product.active');
			Route::get('/admin-products-visibility/{id}/inactive', 'ProductController@inactive')->name('admin.product.inactive');
			Route::get('/admin-products-type/{type}','ProductController@indexByType')->name('product-type.index');
			Route::resource('admin-products.product-image', 'ProductImageController');
			Route::post('/delete_product-image/{id}', 'ProductImageController@destroy')->name('product-image-delete');
			Route::get('/api/delete_product-image/{id}', 'ProductImageController@deleteProductImage')->name('delete-product-image');
		});


		Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');


		Route::group(['middleware' => ['permission:is_allow_activity_logs']], function(){
				Route::get('activity-logs', 'ActivityLogController@index')->name('settings.activity.logs.index');
			});


		
		Route::group(['middleware' => ['permission:is_allow_users']], function(){
			Route::resource('users','UserController');
				// Route::get('users/', 'UserController@index')->name('settings.users.index');
				// Route::get('users/create', 'UserController@create')->name('settings.users.create');
				// Route::post('users', 'UserController@store')->name('settings.users.store');
				// Route::get('users/{id}/edit', 'UserController@edit')->name('settings.users.edit');
				// Route::put('users/{id}/update', 'UserController@update')->name('settings.users.update');
				// Route::get('users/{id}/role/edit', 'UserController@editRole')->name('settings.users.edit.role');
				// Route::put('users/{user}/role', 'UserController@updateRole')->name('settings.users.update.role');
				// Route::get('users/{id}/activate', 'UserController@activate')->name('settings.users.activate');
				// Route::get('users/{id}/deactivate', 'UserController@deactivate')->name('settings.users.deactivate');
				// Route::get('users/{id}/delete', 'UserController@destroy')->name('settings.users.delete');
				// Route::get('users/{id}/password/edit', 'UserController@editPassword')->name('settings.users.edit.password');
				// Route::put('users/{user}/password', 'UserController@updatePassword')->name('settings.users.update.password');
			});


		Route::group(['middleware' => ['permission:is_allow_roles']], function(){
			Route::get('roles/{id}/delete', 'RoleController@destroy')->name('roles.delete');
			Route::get('roles/{id}/privilege/edit', 'RoleController@editPrivilege')->name('roles.edit.privilege');
			Route::put('roles/{id}/privilege/{type}', 'RoleController@updatePrivilege')->name('roles.update.privilege');
			Route::resource('roles','RoleController');
		});

		//Settings - Manage Profile
		Route::group(['prefix' => 'settings'], function () {
			Route::get('manage-profile', 'SettingsController@manageProfile')->name('settings.manage.profile');
			Route::get('edit-name', 'SettingsController@editName')->name('settings.edit.name');
			Route::put('update-name', 'SettingsController@updateName')->name('settings.update.name');
			Route::get('edit-username', 'SettingsController@editUsername')->name('settings.edit.username');
			Route::put('update-username', 'SettingsController@updateUsername')->name('settings.update.username');
			Route::get('edit-email', 'SettingsController@editEmail')->name('settings.edit.email');
			Route::put('update-email', 'SettingsController@updateEmail')->name('settings.update.email');
			Route::get('edit-password', 'SettingsController@editPassword')->name('settings.edit.password');
			Route::put('update-password', 'SettingsController@updatePassword')->name('settings.update.password');

			

			//Settings - Users List
			
			//Settings - Activity Logs
			
		
		
		});
		
	
	});
});

Route::group(['prefix' => 'api'], function () {
	
});