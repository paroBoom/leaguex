<?php

//------------------------------------------------------------------------------
// MISC GLOBAL
//------------------------------------------------------------------------------

// PAGE TITLE
$lang['page_title_signin'] = "Sign in";
$lang['page_title_signup'] = "Sign up";
$lang['page_title_recovery'] = "Account recovery";
$lang['page_title_home'] = "Home page";
$lang['page_title_profile'] = "Settings";
$lang['adminpage_title_dashboard'] = "Dashboard";
$lang['adminpage_title_settings_site_options'] = "Site settings";
$lang['adminpage_title_settings_email_options'] = "Email settings";
$lang['adminpage_title_users'] = "Manage users";
$lang['adminpage_title_clubs'] = "Manage clubs";
$lang['adminpage_title_managers'] = "Manage managers";

// DATATABLES
$lang['datatables_language'] = "";
$lang['datatables_filter_placeholder'] = "Search...";
$lang['datatables_item_selected'] = "item";
$lang['datatables_items_selected'] = "items";
$lang['datatables_row_selected'] = "selected";
$lang['datatables_rows_selected'] = "selected";
$lang['datatables_dtcolumn_created'] = "Created";
$lang['datatables_dtcolumn_actions'] = "Actions";

// MODAL
$lang['modal_button_confirm'] = "Save";
$lang['modal_button_cancel'] = "Cancel";
$lang['modal_button_ok'] = "Ok, I see";
$lang['modal_title'] = "Advise";

// ALERT MESSAGES
$lang['alert_saved_changes'] = "Saved changes.";
$lang['alert_error'] = "Something not working.";
$lang['alert_banned_user'] = "Your account has been blocked. Contact an administrator.";
$lang['alert_image_type'] = "This file is not allowed!";
$lang['alert_image_max_width'] = "Image width is too big (max %s)";
$lang['alert_image_max_height'] = "Image height is too big (max %s)";
$lang['alert_image_max_width_height'] = "Image width and height too big (max %s x %s)";
$lang['alert_image_min_width'] = "Image width is too small (min %s)";
$lang['alert_image_min_height'] = "Image height is too small (min %s)";
$lang['alert_image_min_width_height'] = "Image width and height too small (min %s x %s)";

// TOOLTIP
$lang['tt_save'] = "Save";
$lang['tt_search'] = "Search";
$lang['tt_filter'] = "Filter";
$lang['tt_add'] = "Add";

//DATE TIME FORMAT 
$lang['tables_date_time'] = "DD/MM/YYYY hh:mm a";

// SELECT
$lang['sel_user_group_1'] = "Admin";
$lang['sel_user_group_2'] = "Moderator";
$lang['sel_user_group_3'] = "Member";
$lang['sel_user_group_4'] = "Banned";
$lang['sel_username'] = "- Select user -";
$lang['sel_clubname'] = "- Select club -";

// MASK
$lang['mask_form'] = "0,000,000,000";
$lang['mask_page'] = ',';

// GLOBAL
$lang['unemployed'] = "Unemployed";


//------------------------------------------------------------------------------
// TEMPLATE
//------------------------------------------------------------------------------

// NAVBAR 
$lang['navbar_menu_admin'] = "Dashboard";
$lang['navbar_menu_profile'] = "Settings";

// SIDEBAR MENU (SITE)
$lang['sbar_menu_home'] = "Home";

// SIDEBAR MENU (ADMIN)
$lang['adminsbar_menu_gotosite'] = "Go to site";
$lang['adminsbar_menu_home'] = "Dashboard";
$lang['adminsbar_menu_settings'] = "Settings";
$lang['adminsbar_submenu_site_options'] = "Site options";
$lang['adminsbar_menu_users'] = "Users";
$lang['adminsbar_menu_clubs'] = "Clubs";
$lang['adminsbar_menu_managers'] = "Managers";

//------------------------------------------------------------------------------
// FORM
//------------------------------------------------------------------------------

// FORM LABEL - PLACEHOLDER 
$lang['form_label_username'] = "Username";
$lang['form_label_email'] = "Email";
$lang['form_label_password'] = "Password";
$lang['form_label_newpassword'] = "New password";
$lang['form_label_confirm_password'] = "Confirm password";
$lang['form_label_birthday'] = "Date of birth";
$lang['form_label_permission'] = "Role";
$lang['form_label_clubname'] = "Club name";
$lang['form_label_wallet'] = "Wallet";

// FORM VALIDATION REMOTE MESSAGES 
$lang['formvalidation_check_username'] = "The username is not available";
$lang['formvalidation_check_email'] = "This email is not available";

// FORM VALIDATION LANGUAGE 
$lang['formvalidation_language'] = "en_EN";


//------------------------------------------------------------------------------
//FRONTEND PAGES
//------------------------------------------------------------------------------

// SIGNIN
$lang['login_subtitle'] = "Sign In to your account";
$lang['login_button_signin'] = "Sign in";
$lang['login_rememberme'] = "Remember me";
$lang['login_forgotpassword'] = "Forgot password ?";
$lang['login_textlink_signup'] = "Don&#8217;t have an account ?";
$lang['login_link_signup'] = "Sign Up";

// SIGNUP
$lang['register_subtitle'] = "Create a new account";
$lang['register_button_signup'] = "Sign UP";
$lang['register_textlink_signin'] = "Have account already ? Please go to";
$lang['register_link_signin'] = "Sign In";
$lang['register_input_signin'] = "Sign In";
$lang['register_alert_message'] = "Welcome to the club ! Sign In.";

// ACCOUNT RECOVERY
$lang['recovery_subtitle'] = "Input your registered email to reset your password";
$lang['recovery_textlink_signin'] = "Go To";
$lang['recovery_link_signin'] = "Signin";
$lang['recovery_button_send'] = "Send recovery email";
$lang['recovery_alert_success'] = "We&#8217;ve sent a new password. Check your inbox or spam folder.";
$lang['recovery_alert_error'] = "No account associated to this email.";
$lang['recovery_object_mailreset'] = "Reset Password";
$lang['recovery_text_mailreset'] = "Hi %s, your password has been modified. <br/><br/> This is your new password";

// USER SETTINGS
$lang['user_settings_tabs_title'] = "Settings";
$lang['user_settings_tabs_account'] = "Account";

//------------------------------------------------------------------------------
// BACKEND PAGES
//------------------------------------------------------------------------------

// SITE OPTIONS
$lang['bksettings_siteoptions_header_title'] = "Site Settings";
$lang['bksettings_siteoptions_form_label_sitename'] = "Site name";
$lang['bksettings_siteoptions_form_placeholder_sitename'] = "e.g. LEAGUEX";
$lang['bksettings_siteoptions_form_label_sitetitle'] = "Site title";
$lang['bksettings_siteoptions_form_placeholder_sitetitle'] = "e.g. LEAGUEX | Your Fantasy Master League";
$lang['bksettings_siteoptions_form_label_language'] = "Language";

// EMAIL OPTIONS
$lang['bksettings_emailoptions_header_title'] = "Email Settings";
$lang['bksettings_emailoptions_smtp_description'] = "Configuring leaguex to send using SMTP authentication.";
$lang['bksettings_emailoptions_smtp_description_2'] = "* Leave the parameters below empty if your server does not require authentication.";
$lang['bksettings_emailoptions_form_label_email'] = "From email";
$lang['bksettings_emailoptions_form_placeholder_email'] = "e.g. admin@yoursite.com";
$lang['bksettings_emailoptions_form_help_email'] = "Specify the email address that emails should be sent from.";
$lang['bksettings_emailoptions_form_label_name'] = "From name";
$lang['bksettings_emailoptions_form_placeholder_name'] = "e.g. leaguex";
$lang['bksettings_emailoptions_form_help_name'] = "Specify the name that emails should be sent from.";
$lang['bksettings_emailoptions_form_label_host'] = "SMTP host";
$lang['bksettings_emailoptions_form_placeholder_host'] = "e.g. ssl://smtp.googlemail.com";
$lang['bksettings_emailoptions_form_help_host'] = "Specify the hostname of the SMTP service.";
$lang['bksettings_emailoptions_form_label_port'] = "SMTP port";
$lang['bksettings_emailoptions_form_placeholder_port'] = "e.g. 25";
$lang['bksettings_emailoptions_form_help_port'] = "Specify the port SMTP service.";
$lang['bksettings_emailoptions_form_label_username'] = "Username";
$lang['bksettings_emailoptions_form_placeholder_username'] = "e.g. abc@gmail.com";
$lang['bksettings_emailoptions_form_help_username'] = "The username which should be used for the authentication in front of the mail server.";
$lang['bksettings_emailoptions_form_label_password'] = "Password";
$lang['bksettings_emailoptions_form_help_password'] = "The password for the email account used as a username.";
$lang['bksettings_emailoptions_test_description'] = "Send a test email.";
$lang['bksettings_emailoptions_test_form_label_email'] = "To email";
$lang['bksettings_emailoptions_test_form_help_email'] = "Send a trial mail to the chosen address.";
$lang['bksettings_emailoptions_test_submit_btn_text'] = "Send email";
$lang['bksettings_emailoptions_test_object_mail'] = "SMTP test";
$lang['bksettings_emailoptions_test_text_mail'] = "Congratulations! <br/><br/> Now you can use the SMTP protocol to send emails.";

// USERS LIST
$lang['bkuserslist_header_title'] = "Manage Users";
$lang['bkuserslist_dtcolumn_username'] = "Username";
$lang['bkuserslist_dtcolumn_role'] = "Role";
$lang['bkuserslist_dtcolumn_email'] = "Email";
$lang['bkuserslist_dtcolumn_registration_date'] = "Registration Date";
$lang['bkuserslist_dtcolumn_last_visite'] = "Last Visite";
$lang['bkuserslist_dtcolumn_last_visite'] = "Last Visite";
$lang['bkuserslist_modal_delete_users'] = "Are you sure that you want to delete this user ?";
$lang['bkuserslist_modal_title'] = "Add new user";
$lang['bkuserslist_modal_edit_title'] = "Edit user";
$lang['bkuserslist_alert_new_user'] = "New user added.";

// CLUBS LIST
$lang['bkclubslist_header_title'] = "Manage Clubs";
$lang['bkclubslist_dtcolumn_clubname'] = "Club";
$lang['bkclubslist_dtcolumn_manager'] = "Manager";
$lang['bkclubslist_dtcolumn_value'] = "Value";
$lang['bkclubslist_modal_title'] = "Add new club";
$lang['bkclubslist_modal_edit_title'] = "Edit club";
$lang['bkclubslist_modal_delete_clubs'] = "Are you sure that you want to delete this club ?";
$lang['bkclubslist_alert_new_club'] = "New club added.";

// MANAGERS LIST
$lang['bkmanagerslist_header_title'] = "Manage Manager";
$lang['bkmanagerslist_dtcolumn_managername'] = "Manager";
$lang['bkmanagerslist_dtcolumn_clubname'] = "Club";
$lang['bkmanagerslist_dtcolumn_wallet'] = "Wallet";
$lang['bkmanagerslist_modal_title'] = "Add new manager";
$lang['bkmanagerslist_modal_edit_title'] = "Edit manager";
$lang['bkmanagerslist_alert_new_manager'] = "New manager added.";
$lang['bkmanagerslist_modal_delete_managers'] = "Are you sure that you want to delete this manager ?";