<?php



Route::model('users', 'User');
Route::get('/admin', 'UserController@index'); 

Route::get('/', array('as'=>'/', 'uses'=>'PagesController@home'));

Route::get('/login', array('as'=>'login', 'uses'=>'UserController@login'));
Route::get('/profile', array('as'=>'profile', 'uses'=>'UserController@profile'));

Route::post('/checkLogin', array('as'=>'checkLogin', 'uses'=>'UserController@checkLogin'));
Route::get('/userAll', array('as'=>'userAll', 'uses'=>'UserController@showAll'));

Route::post('/user/logout', 'UserController@postLogout');
//Route::get('signout', 'PagesController@postLogout');
Route::get('/create_account', array('as'=>'create_account', 'uses'=>'UserController@create'));
Route::post('/create_account', array('as'=>'create_account', 'uses'=>'UserController@create'));
Route::get('/editUsers', array('as'=>'editUsers', 'uses'=>'UserController@edit_users'));
Route::post('delete_category', 'UserController@delete_category');
//Route::get('/showMessages', array('as'=>'showMessages', 'uses'=>'MessageController@index'));
Route::get('/addNewCat', array('as'=>'addNewCat', 'uses'=>'UserController@add_new_category'));
Route::get('/add_action', array('as'=>'add_action', 'uses'=>'UserController@add_category_action'));
//Route::get('/view_notifications', array('as'=>'view_notifications', 'uses'=>'NotificationController@index'));
Route::post('/store', array('as'=>'store', 'uses'=>'UserController@store'));
Route::get('/sendMail', array('as'=>'sendMail', 'uses'=>'UserController@send_mail'));
Route::get('/showRequests', array('as'=>'showRequests', 'uses'=>'UserController@show_requests'));
Route::get('/sendApprovalRequest/{confirmCode}', array('as'=>'sendApprovalRequest', 'uses'=>'UserController@send_approval_request'));
Route::patch('/approve_req', array('as'=>'approve_req', 'uses'=>'UserController@approve_request'));
Route::patch('/reject_req', array('as'=>'reject_req', 'uses'=>'UserController@reject_request'));
Route::get('/password/email', 'Auth\PasswordController@getEmail');
Route::post('/password/email', 'Auth\PasswordController@postEmail');
Route::get('/password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/reset', 'Auth\PasswordController@postReset');



Route::get('/reset_password', array('as'=>'reset_password', 'uses'=>'UserController@getReset_password'));
Route::post('/reset_password', array('as'=>'reset_password', 'uses'=>'UserController@postReset_password'));


Route::resource('users', 'UserController');

Route::post('delete_user', array('as'=>'delete_user', 'uses'=>'UserController@deleteUser'));
Route::get('verify_email/{confirmCode}', array('as' => 'verify_email','uses' => 'UserController@verify_email'));
Route::get('verify_user_email/{confirmCode}', array('as' => 'verify_user_email','uses' => 'PagesController@verify_email'));

Route::bind('users', function($id, $route)
{
	return App\User::whereId($id)->first();
});

/*Route::bind('messages', function($id, $route)
{
	return App\Message::whereId($id)->first();
});*/




Route::resource('pages', 'PagesController');


Route::get('signup', 'PagesController@getSignup');
Route::get('signin_user', array('as'=>'signin_user', 'uses'=>'PagesController@getSignin'));
Route::post('signin_user', array('as'=>'signin_user', 'uses'=>'PagesController@postSignin'));
//Route::get('pages/display', 'PagesController@getDisplay');
Route::post('complete_prof', 'PagesController@update_profile');
Route::get('new_post', array('as'=>'new_post', 'uses'=>'PagesController@getNew_post'));
Route::post('new_post', array('as'=>'new_post', 'uses'=>'PagesController@postNew_post'));
//Route::get('complete_my_profile', 'PagesController@completeProfile');
Route::get('signup_work', 'PagesController@getSignup_work');
Route::get('signup_hire', 'PagesController@getSignup_hire');
Route::post('signup_user', 'PagesController@postSignup');
Route::get('approve_user_company/{code}', 'PagesController@approve_user_company');
Route::get('display', array('as'=>'display', 'uses'=>'PagesController@getDisplay'));
Route::get('reset_user_password', 'PagesController@getReset_password');
Route::post('/pages/reset_password', 'PagesController@postReset_password');
Route::get('/password/user_reset/{token}', 'Auth\PasswordController@getReset');
Route::post('/password/user_reset', 'Auth\PasswordController@postReset');
Route::get('/password/user_email', 'Auth\PasswordController@getUserEmail');
Route::post('/password/user_email', 'Auth\PasswordController@postUserEmail');
Route::get('/pages/display_on_category/{id}', 'PagesController@getDisplay_on_category');
Route::get('/pages/display_on_skill/{id}', 'PagesController@getDisplay_on_skill');
Route::get('view_post/{id}', 'PostController@getView_post');
Route::get('submit_quotation/{id}', 'PostController@getSubmit_quotation');
Route::post('submit_quotation', 'PostController@postSubmit_quotation');
Route::get('view_quotations', 'PostController@getView_quotations');
Route::post('view_quotations', 'PostController@postView_quotations');
Route::get('signout', array('as'=>'signout', 'uses'=>'PagesController@signout'));
Route::get('download_attachment/{id}', 'PostController@download_attachment_quotation');
Route::get('download_attachment_post/{id}', 'PostController@download_attachment_post');
Route::get('company_details/{id}', 'PagesController@getCompanyDetails');
Route::get('user_details/{id}', 'PagesController@getUserDetails');
Route::get('add_action_skill', array('as'=>'add_action_skill', 'uses'=>'UserController@add_skill'));
Route::get('add_new_skill', array('as'=>'add_new_skill', 'uses'=>'UserController@show_skills'));
Route::post('delete_skill', array('as'=>'delete_skill', 'uses'=>'UserController@delete_skill'));
Route::get('my_profile', 'PagesController@getMyProfile');
Route::post('delete_post', array('as'=>'delete_post', 'uses'=>'PostController@delete_post'));
Route::post('upload_prof_pic', 'PagesController@upload_pic');

//Route::post('post/comment_action', array('as'=>'post/comment_action', 'uses'=>'PostController@postComment_action'));
Route::post('pages/upload_file', array('as'=>'pages/upload_file', 'uses'=>'PagesController@upload_file'));
Route::get('user_profile/{id}', 'PagesController@user_profile');
Route::post('close_post', 'PostController@close_post');
Route::get('edit_post/{id}', 'PostController@getEdit_post');
Route::post('edit_post', 'PostController@postEdit_post');
Route::post('open_post', 'PostController@open_post');




/*Route::get('ajax/posts', function()
{
	$posts= Post::paginate(3);
	return view('pages.display')->with('posts', $posts)->render();
});*/

/*Route::get('posts/json', array(
	'as' =>'posts/json',
	'uses' => 'PostController@postJson'
));*/

Route::get('edit_profile/{id}', 'PagesController@edit_profile');
Route::post('edit_profile', 'PagesController@postEdit_profile');
Route::get('review', array('as'=>'review', 'uses'=>'PagesController@getReview'));
Route::get('show_review_requests/{id}', 'PagesController@show_review_requests');
Route::post('review_action/{id}', 'PagesController@postReview');
Route::get('reject_review/{id}', 'PagesController@reject_review');
Route::post('send_mail', 'PagesController@send_mail');
Route::post('comment_action', 'PostController@comment_action');

Route::get('browse_clients', 'PagesController@view_clients');
Route::get('browse_suppliers', 'PagesController@view_suppliers');


Route::get('view_messages/{id}', 'PagesController@view_messages');
Route::get('create_message', 'PagesController@getCreate_message');
Route::post('create_message', 'PagesController@postCreate_message');
Route::get('inbox', 'PagesController@inbox');
Route::get('sent_messages', array('as'=>'sent_messages', 'uses'=>'PagesController@sent_messages'));
Route::get('message_history/{id}', 'PagesController@message_history');

Route::get('account_settings/{id}', 'PagesController@profile_settings');
Route::get('notifications/{id}', 'PagesController@view_notifications');

Route::get('deactivate_account', 'PagesController@deactivate_account');
Route::get('change_role/{id}', 'PagesController@change_role');
Route::post('change_role_request', 'PagesController@change_role_request');
Route::get('reset_pass', 'PagesController@reset_password_sign');
Route::post('reset_password_user', 'PagesController@postReset_password_user');
Route::get('delete_notifications', 'PagesController@delete_notifications');
Route::post('deactivate_action', 'PagesController@deactivate_action');


?>