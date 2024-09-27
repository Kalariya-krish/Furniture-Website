<?php

use App\Http\Controllers\Webcontroller;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('index');
});

// Route::view('index','before/index');
Route::view('about','before/about');
Route::view('contact','before/contact');
// Route::view('review','before/review');
Route::view('login','before/login');
Route::view('registration','before/registration');
Route::view('sofas','before/sofas');
Route::view('chairs','before/chairs');
Route::view('tables','before/tables');
Route::view('outdoor_and_guarden','before/outdoor_guarden');
Route::view('lamps','before/lamps');

Route::get('index',[WebsiteController::class,'fetch_index']);
Route::get('review',[WebsiteController::class,'fetch_review']);

Route::post('registration',[WebsiteController::class,'registration']);
Route::get('activate_account',[WebsiteController::class,'activate_account'])->name('activate.account');
Route::get('send_email_view',[WebsiteController::class,'send_email_view'])->name('send.email.view');
Route::post('login_user',[WebsiteController::class,'login_user']);
Route::post('contactform',[WebsiteController::class,'contact']);

Route::view('forget_password_form', 'before/forget_password_form');
Route::post('forget_password_form_submit', [WebsiteController::class, 'forget_password_form_submit']);
Route::get('verify_forget_pwd_otp/{email}/{token}', [WebsiteController::class, 'verify_forget_pwd_otp']);
Route::post('verify_otp_forget_password_action', [WebsiteController::class, 'verify_otp_forget_password_action']);
Route::post('reset_pwd_action', [WebsiteController::class, 'reset_pwd_action']);


//user
Route::prefix('user')->middleware('login')->group(function () {
    Route::get('master_after',[WebsiteController::class,'master_after'])->name('master.after');
    Route::get('index',[WebsiteController::class,'fetch_user_index'])->name('index'); 
    Route::get('about',[WebsiteController::class,'fetch_user_about'])->name('about'); 
    Route::get('contact',[WebsiteController::class,'fetch_user_contact'])->name('contact'); 
    Route::get('review',[WebsiteController::class,'fetch_user_review'])->name('review'); 
    Route::get('sofas',[WebsiteController::class,'fetch_user_sofas'])->name('sofas'); 
    Route::get('chairs',[WebsiteController::class,'fetch_user_chairs'])->name('chairs'); 
    Route::get('tables',[WebsiteController::class,'fetch_user_tables'])->name('tables'); 
    Route::get('outdoor_and_guarden',[WebsiteController::class,'fetch_user_outdoor_and_guarden'])->name('outdoor.and.guarden');
    Route::get('edit_profile',[WebsiteController::class,'fetch_edit_profile'])->name('edit.profile');
    Route::get('change_password',[WebsiteController::class,'fetch_user_change_password'])->name('change.password');
    Route::get('customize_order',[WebsiteController::class,'fetch_customize_order']);
    Route::get('customize_sofa',[WebsiteController::class,'fetch_customize_sofa']);
    Route::get('customize_chair',[WebsiteController::class,'fetch_customize_chair']);
    Route::get('customize_table',[WebsiteController::class,'fetch_customize_table']);
    Route::get('customize_bed_frame',[WebsiteController::class,'fetch_customize_bed_frame']);

    Route::get('user_view_product/{id}',[WebsiteController::class,'user_view_product']);
    Route::get('user_add_to_cart/{id}',[WebsiteController::class,'user_add_to_cart']);
    Route::get('user_my_cart',[WebsiteController::class,'user_my_cart']);
    Route::get('increment_quantity/{id}',[WebsiteController::class,'increment_quantity']);
    Route::get('decrement_quantity/{id}',[WebsiteController::class,'decrement_quantity']);
    Route::get('user_remove_from_cart/{id}',[WebsiteController::class,'user_remove_from_cart']);
    
    Route::get('user_buy_now/{id}',[WebsiteController::class,'user_buy_now'])->middleware('login');
    Route::post('user_place_order/{id}',[WebsiteController::class,'user_place_order'])->middleware('login');
    Route::get('user_my_order',[WebsiteController::class,'user_my_order'])->middleware('login');    

    Route::post('apply_filter_sofa',[WebsiteController::class,'apply_filter_sofa']);
    Route::post('apply_filter_chair',[WebsiteController::class,'apply_filter_chair']);
    Route::post('apply_filter_table',[WebsiteController::class,'apply_filter_table']);
    Route::post('apply_filter_outdoor',[WebsiteController::class,'apply_filter_outdoor']);

    Route::get('user_share_review',[WebsiteController::class,'user_share_review']);
    Route::get('fetch_review',[WebsiteController::class,'fetch_review']);
    Route::post('add_review',[WebsiteController::class,'add_review']);
    
    Route::post('customize_sofa',[WebsiteController::class,'customize_sofa']);
    Route::post('customize_chair',[WebsiteController::class,'customize_chair']);
    Route::post('customize_table',[WebsiteController::class,'customize_table']);
    Route::post('customize_bed_frame',[WebsiteController::class,'customize_bed_frame'])->name('sofas');
    Route::post('update_data',[WebsiteController::class,'update_data']);
    Route::post('change_password',[WebsiteController::class,'change_password'])->name('sofas');
    Route::get('logout',[WebsiteController::class,'logout'])->name('sofas');
});

Route::middleware('admin_login')->group(function () {
    Route::view('/Dash','dashboard');
    // Route::view('/Index','index');
    Route::view('/Review','review');
    Route::view('/Product','product');
    Route::view('/Cart','cart');
    Route::view('/Order','order');
    Route::view('/Add','adduser');
    Route::view('/Addpro','addproduct');
    Route::view('/Addord','addorder');
    Route::view('/Addcart','addcart');
    Route::view('/Addoffer','addoffer');
    Route::post('adduser',[Webcontroller::class,'register_data']);
    Route::get('admin_index',[Webcontroller::class,'fetch_data']);
    Route::get('Edit_data/{email}',[Webcontroller::class,'edit_data']);
    Route::get('Delete_data/{email}',[Webcontroller::class,'delete_data']);
    Route::post('Edit_data/{email}',[Webcontroller::class,'update_data']);
    Route::get('Active_user/{email}',[Webcontroller::class,'active_user']);
    Route::get('Deactive_user/{email}',[Webcontroller::class,'deactive_user']);
    Route::get('account_activate/{email}',[Webcontroller::class,'account_activate']);
    Route::post('review',[Webcontroller::class,'review']);
    Route::get('Review',[Webcontroller::class,'fetch_review']);
    Route::get('del_rev/{email}',[Webcontroller::class,'del_review']);
    Route::get('active_rev/{email}',[Webcontroller::class,'active_review']);
    Route::post('addord',[Webcontroller::class,'ord_data']);
    Route::get('Order',[Webcontroller::class,'fetch_order']);
    Route::get('Edit_order/{email}',[Webcontroller::class,'edit_order']);
    Route::get('Delete_ord/{email}',[Webcontroller::class,'delete_ord']);
    Route::post('Edit_order/{email}',[Webcontroller::class,'updateord']);
    Route::get('order_activate/{email}',[Webcontroller::class,'order_activate']);
    Route::post('addpro',[Webcontroller::class,'product_data']);
    Route::get('Product',[Webcontroller::class,'fetch_product']);
    Route::get('Edit_pro/{Pro_id}',[Webcontroller::class,'edit_product']);
    Route::post('Edit_pro/{Pro_id}',[Webcontroller::class,'updatepro']);
    Route::get('unavailable_pro/{Pro_id}',[Webcontroller::class,'unavailable_pro']);
    Route::get('available_pro/{Pro_id}',[Webcontroller::class,'available_pro']);
    Route::post('addcart',[Webcontroller::class,'addcart']);
    Route::get('Cart',[Webcontroller::class,'fetch_cart']);
    Route::get('del_cart/{email}',[Webcontroller::class,'delete_cart']);
    Route::get('active_cart/{email}',[Webcontroller::class,'active_cart']);
    Route::get('logout',[Webcontroller::class,'logout']);
    Route::get('logout',[Webcontroller::class,'logout']);

    Route::post('addoffer',[Webcontroller::class,'offer_data']);
    Route::get('Offer',[Webcontroller::class,'fetch_offer']);
    Route::get('unavailable_offer/{Pro_id}',[Webcontroller::class,'unavailable_offer']);
    Route::get('available_offer/{Pro_id}',[Webcontroller::class,'available_offer']);
    Route::get('delete_offer/{Pro_id}',[Webcontroller::class,'delete_offer']);
});