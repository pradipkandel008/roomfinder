<?php

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

Route::get('/','RoomController@slider')->name('slider');
Route::post('feedback','UserController@feedback')->name('feedback.submit');

Route::prefix('user')->group(function(){
    /*login & register*/
	Route::get('login','Auth\LoginController@showLoginForm')->name('user.login');
	Route::post('login','Auth\LoginController@login')->name('user.login.submit');
	Route::get('/', 'UserController@showRoom')->name('homepageuser');
	Route::get('/logout','Auth\LoginController@logout')->name('user.logout');
	Route::get('register','Auth\RegisterController@showRegisterForm')->name('user.register');
	Route::post('register','Auth\RegisterController@store')->name('user.register.submit');


	Route::get('rooms','UserController@showRoom')->name('user.showroom');
    /*roommate register*/
	Route::get('roommateregister','UserController@showRoommateRegisterForm')->name('user.roommateregister');
	Route::post('roommateregister','RoommateController@store')->name('user.roommateregister.submit');

	Route::get('roommates','UserController@showRoommates')->name('user.showRoommates');
    Route::get('myroommates','UserController@showMyRoommates')->name('user.myroommates');
    //roommate update
    Route::get('myroommates/edit/{id}','UserController@editRoommate')->name('user.roommate.edit');
    Route::post('myroommates/update/{id}','RoommateController@updateRoommate')->name('user.roommate.update');
    //roommate delete
    Route::get('myroommates/delete/{id}', 'RoommateController@deleteRoommate')->name('user.roommate.delete');
    //bookroom
    Route::get('room/bookroom/{id}','UserController@bookRoom')->name('user.bookroom');
    Route::post('room/bookroom/{id}','RoomController@bookRoom')->name('user.bookroom.submit');
    //mybookings
    Route::get('room/mybookings','UserController@myBookings')->name('user.mybookings');
    Route::get('room/mybookings/{id}/{rid}','RoomController@cancelBookings')->name('user.cancelbookings');
    //accept roommate request
    Route::get('roommate/acceptroommate/{id}','UserController@acceptRoommate')->name('user.acceptroommate');
    Route::post('roommate/acceptroommate/{id}','RoommateController@acceptRoommate')->name('user.acceptroommate.submit');

    Route::get('roommate/myacceptedroommates','UserController@myAcceptedRequests')->name('user.myacceptedrequest');
    Route::get('roommate/myacceptedroommates/{id}/{rid}','RoommateController@cancelMyAcceptedRequests')->name('user.cancelmyacceptedrequests');
    Route::get('roommate/mineacceptedrequests','UserController@mineAcceptedRequests')->name('user.mineacceptedrequest');
    //question
    Route::get('forum/question','UserController@askQuestion')->name('user.askquestion');
    Route::post('forum/question','UserController@storeQuestion')->name('user.askquestion.submit');

    Route::get('forum','UserController@showForum')->name('user.showforum');
    //answer
    Route::get('forum/question/answer/{id}','UserController@replyAnswer')->name('user.replyanswer');
    Route::post('forum/question/answer/{id}','UserController@storeAnswer')->name('user.replyanswer.submit');
    Route::get('forum/question/answers/{id}','UserController@showAnswers')->name('user.showanswers');
    //myquestions and edit questions
    Route::get('forum/myquestions','UserController@myQuestions')->name('user.myquestions');
    Route::get('forum/myanswers','UserController@myAnswers')->name('user.myanswers');
    Route::get('myquestions/editquestion/{id}','UserController@editQuestion')->name('user.editquestion');
    Route::post('myquestions/updatequestions/{id}','UserController@updateQuestion')->name('user.updatequestion');

    Route::get('myquestions/deletequestion/{id}','UserController@deleteQuestion')->name('user.deletequestion');
    //myanswers and edit answers
    Route::get('myanswers/editanswer/{aid}','UserController@editAnswer')->name('user.editanswer');
    Route::post('myanswers/updateanswer/{aid}','UserController@updateAnswer')->name('user.updateanswer');

    Route::get('myanswers/deleteanswer/{aid}','UserController@deleteAnswer')->name('user.deleteanswer');

    Route::get('about','UserController@about')->name('user.about');
    //account update
    Route::get('account','UserController@account')->name('user.account');
    Route::post('account','UserController@accountUpdate')->name('user.account.submit');
    //search
    Route::get('rooms/search','UserController@showRoomSearchForm')->name('user.showroomsearchform');
    Route::post('rooms/search','RoomController@searchRoom')->name('user.roomsearch.submit');

    Route::get('roommates/search','UserController@showRoommateSearchForm')->name('user.showroommatesearchform');
    Route::post('roommates/search','RoommateController@searchRoommate')->name('user.roommatesearch.submit');
    //password reset
    Route::post('/password/email','Auth\UserForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
    Route::get('/password/reset','Auth\UserForgotPasswordController@showLinkRequestForm')->name('user.password.request');
    Route::post('/password/reset','Auth\UserResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\UserResetPasswordController@showResetForm')->name('user.password.reset');

});


Route::prefix('admin')->group(function(){
    //login and register
	Route::get('login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('homepageadmin');
	Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
	Route::get('register','Auth\AdminRegisterController@showRegisterForm')->name('admin.register');
	Route::post('register','Auth\AdminRegisterController@store')->name('admin.register.submit');
    //room register
	Route::get('roomregister','AdminController@showRoomRegisterForm')->name('admin.roomregister');
	Route::post('roomregister','RoomController@storeAdmin')->name('admin.roomregister.submit');
    //rooms, myrooms , update, delete
    Route::get('rooms','AdminController@showRoom')->name('admin.showroom');
    Route::get('myrooms/edit/{id}','AdminController@editRoom')->name('admin.room.edit');
    Route::post('myrooms/update/{id}','RoomController@updateRoomAdmin')->name('admin.room.update');
    Route::get('myrooms/delete/{id}', 'RoomController@deleteRoomAdmin')->name('admin.room.delete');
    Route::get('/myrooms','AdminController@showMyRooms')->name('admin.myrooms');
    Route::get('room/minebookedrooms','AdminController@mineBookedRooms')->name('admin.minebookedrooms');
    //roommate register
    Route::get('roommateregister','AdminController@showRoommateRegisterForm')->name('admin.roommateregister');
    Route::post('roommateregister','RoommateController@storeAdmin')->name('admin.roommateregister.submit');
    //roommates and myroommates
    Route::get('roommates','AdminController@showRoommates')->name('admin.showRoommates');
    Route::get('myroommates','AdminController@showMyRoommates')->name('admin.myroommates');
    //roommate update
    Route::get('myroommates/edit/{id}','AdminController@editRoommate')->name('admin.roommate.edit');
    Route::post('myroommates/update/{id}','RoommateController@updateRoommateAdmin')->name('admin.roommate.update');
    //roommate delete
    Route::get('myroommates/delete/{id}', 'RoommateController@deleteRoommateAdmin')->name('admin.roommate.delete');

    Route::get('roommate/mineacceptedrequests','AdminController@mineAcceptedRequests')->name('admin.mineacceptedrequest');
    //forum
    Route::get('forum/question','AdminController@askQuestion')->name('admin.askquestion');
    Route::post('forum/question','AdminController@storeQuestion')->name('admin.askquestion.submit');

    Route::get('forum','AdminController@showForum')->name('admin.showforum');

    Route::get('forum/question/answer/{id}','AdminController@replyAnswer')->name('admin.replyanswer');
    Route::post('forum/question/answer/{id}','AdminController@storeAnswer')->name('admin.replyanswer.submit');
    Route::get('forum/question/answers/{id}','AdminController@showAnswers')->name('admin.showanswers');

    Route::get('forum/myquestions','AdminController@myQuestions')->name('admin.myquestions');
    Route::get('forum/myanswers','AdminController@myAnswers')->name('admin.myanswers');

    Route::get('myquestions/editquestion/{id}','AdminController@editQuestion')->name('admin.editquestion');
    Route::post('myquestions/updatequestions/{id}','AdminController@updateQuestion')->name('admin.updatequestion');

    Route::get('myquestions/deletequestion/{id}','AdminController@deleteQuestion')->name('admin.deletequestion');

    Route::get('myanswers/editanswer/{aid}','AdminController@editAnswer')->name('admin.editanswer');
    Route::post('myanswers/updateanswer/{aid}','AdminController@updateAnswer')->name('admin.updateanswer');

    Route::get('myanswers/deleteanswer/{aid}','AdminController@deleteAnswer')->name('admin.deleteanswer');
    //account update
    Route::get('account','AdminController@account')->name('admin.account');
    Route::post('account','AdminController@accountUpdate')->name('admin.account.submit');

    Route::get('adminrequests','AdminController@showAdminRequests')->name('admin.adminrequests');
    //approve admin requests
    Route::post('adminrequests/request/{id}','AdminController@approveRequest')->name('admin.approverequest');
    //Route::post('adminrequests','AdminController@rejectRequest')->name('admin.rejectrequest');
    //showing all details
    Route::get('rooms/allrooms','AdminController@allRooms')->name('admin.allrooms');
    Route::get('rooms/allbookedrooms','AdminController@allBookedRooms')->name('admin.allbookedrooms');
    Route::get('rooms/bookingcancelledrooms','AdminController@allBookingCancelledRooms')->name('admin.allbookingcancelledrooms');
    Route::get('rooms/deletedrooms','AdminController@allDeletedRooms')->name('admin.alldeletedrooms');

    Route::get('roommates/allroommates','AdminController@allRoommates')->name('admin.allroommates');
    Route::get('roommates/allacceptedroommates','AdminController@allAcceptedRoommates')->name('admin.allacceptedroommates');
    Route::get('roommates/cancelledacceptedrequests','AdminController@allCancelledAcceptedRequests')->name('admin.allcancelledacceptedrequests');
    Route::get('roommates/deletedroommates','AdminController@allDeletedRoommaterequests')->name('admin.alldeletedroommaterequests');

    Route::get('users/allusers','AdminController@allUsers')->name('admin.allusers');
    Route::get('users/allowners','AdminController@allOwners')->name('admin.allowners');
    Route::get('users/alladmins','AdminController@allAdmins')->name('admin.alladmins');
    Route::get('users/alladminrequests','AdminController@allAdminrequests')->name('admin.alladminrequests');
    Route::get('users/allapprovedadminrequests','AdminController@allApprovedAdminrequests')->name('admin.allapprovedadminrequests');

    Route::get('admin/allquestions','AdminController@allQuestions')->name('admin.allquestions');
    Route::get('admin/alldeletedquestions','AdminController@allDeletedQuestions')->name('admin.alldeletedquestions');
    Route::get('admin/allanswers','AdminController@allAnswers')->name('admin.allanswers');
    Route::get('admin/alldeletedanswers','AdminController@allDeletedAnswers')->name('admin.alldeletedanswers');
    Route::get('admin/allfeedbacks','AdminController@allFeedbacks')->name('admin.allfeedbacks');
    //password reset
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


});

Route::prefix('owner')->group(function(){
    //login and register
	Route::get('login','Auth\OwnerLoginController@showLoginForm')->name('owner.login');
	Route::post('login','Auth\OwnerLoginController@login')->name('owner.login.submit');
	Route::get('/', 'OwnerController@showRoom')->name('homepageowner');
	Route::get('/myrooms','OwnerController@showMyRooms')->name('owner.myrooms');
	Route::get('/logout','Auth\OwnerLoginController@logout')->name('owner.logout');
	Route::get('register','Auth\OwnerRegisterController@showRegisterForm')->name('owner.register');
	Route::post('register','Auth\OwnerRegisterController@store')->name('owner.register.submit');
    //room register
	Route::get('roomregister','OwnerController@showRoomRegisterForm')->name('owner.roomregister');
	Route::post('roomregister','RoomController@store')->name('owner.roomregister.submit');
    //myrooms and edit rooms
    Route::get('myrooms/edit/{id}','OwnerController@editRoom')->name('owner.room.edit');
    Route::post('myrooms/update/{id}','RoomController@updateRoom')->name('owner.room.update');
    //delete rooms
    Route::get('myrooms/delete/{id}', 'RoomController@deleteRoom')->name('owner.room.delete');
    //mine booked rooms
    Route::get('room/minebookedrooms','OwnerController@mineBookedRooms')->name('owner.minebookedrooms');
    Route::get('roommates','OwnerController@showRoommates')->name('owner.roommates');
    //forum
    Route::get('forum/question','OwnerController@askQuestion')->name('owner.askquestion');
    Route::post('forum/question','OwnerController@storeQuestion')->name('owner.askquestion.submit');

    Route::get('forum','OwnerController@showForum')->name('owner.showforum');

    Route::get('forum/question/answer/{id}','OwnerController@replyAnswer')->name('owner.replyanswer');
    Route::post('forum/question/answer/{id}','OwnerController@storeAnswer')->name('owner.replyanswer.submit');
    Route::get('forum/question/answers/{id}','OwnerController@showAnswers')->name('owner.showanswers');

    Route::get('forum/myquestions','OwnerController@myQuestions')->name('owner.myquestions');
    Route::get('forum/myanswers','OwnerController@myAnswers')->name('owner.myanswers');

    Route::get('myquestions/editquestion/{id}','OwnerController@editQuestion')->name('owner.editquestion');
    Route::post('myquestions/updatequestions/{id}','OwnerController@updateQuestion')->name('owner.updatequestion');

    Route::get('myquestions/deletequestion/{id}','OwnerController@deleteQuestion')->name('owner.deletequestion');

    Route::get('myanswers/editanswer/{aid}','OwnerController@editAnswer')->name('owner.editanswer');
    Route::post('myanswers/updateanswer/{aid}','OwnerController@updateAnswer')->name('owner.updateanswer');

    Route::get('myanswers/deleteanswer/{aid}','OwnerController@deleteAnswer')->name('owner.deleteanswer');

    Route::get('about','OwnerController@about')->name('owner.about');
    //account update
    Route::get('account','OwnerController@account')->name('owner.account');
    Route::post('account','OwnerController@accountUpdate')->name('owner.account.submit');
    //password reset
    Route::post('/password/email','Auth\OwnerForgotPasswordController@sendResetLinkEmail')->name('owner.password.email');
    Route::get('/password/reset','Auth\OwnerForgotPasswordController@showLinkRequestForm')->name('owner.password.request');
    Route::post('/password/reset','Auth\OwnerResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\OwnerResetPasswordController@showResetForm')->name('owner.password.reset');
});
