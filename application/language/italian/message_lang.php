<?php

//------------------------------------------------------------------------------
// MISC GLOBAL
//------------------------------------------------------------------------------

// PAGE TITLE
$lang['page_title_signin'] = "Accedi";
$lang['page_title_signup'] = "Registrati";
$lang['page_title_recovery'] = "Recupera password";
$lang['page_title_home'] = "Home";
$lang['page_title_profile'] = "Impostazioni";
$lang['adminpage_title_dashboard'] = "Dashboard";
$lang['adminpage_title_settings_site_options'] = "Impostazioni generali";
$lang['adminpage_title_settings_email_options'] = "Impostazioni email";
$lang['adminpage_title_users'] = "Gestisci utenti";
$lang['adminpage_title_clubs'] = "Gestisci club";
$lang['adminpage_title_managers'] = "Gestisci manager";

// DATATABLES
$lang['datatables_language'] = "../assets/js/vendor/datatables/languages/italian.json";
$lang['datatables_filter_placeholder'] = "Cerca...";
$lang['datatables_item_selected'] = "oggetto";
$lang['datatables_items_selected'] = "oggetti";
$lang['datatables_row_selected'] = "selezionato";
$lang['datatables_rows_selected'] = "selezionati";
$lang['datatables_dtcolumn_created'] = "Data Creazione";
$lang['datatables_dtcolumn_actions'] = "Azioni";

// MODAL
$lang['modal_button_confirm'] = "Salva";
$lang['modal_button_cancel'] = "Cancella";
$lang['modal_button_ok'] = "Ok, ho capito";
$lang['modal_title'] = "Avviso";

// ALERT MESSAGES
$lang['alert_saved_changes'] = "Modifiche salvate.";
$lang['alert_error'] = "Qualcosa non ha funzionato.";
$lang['alert_banned_user'] = "Il tuo account &#232; stato bloccato. Contatta un amministratore.";
$lang['alert_image_type'] = "Questo file non &#232; consentito!";
$lang['alert_image_max_width'] = "La larghezza dell'immagine &#232; troppo grande (max %s)";
$lang['alert_image_max_height'] = "L'altezza dell'immagine &#232; troppo grande (max %s)";
$lang['alert_image_max_width_height'] = "L'immagine &#232; troppo grande (max %s x %s)";
$lang['alert_image_min_width'] = "La larghezza dell'immagine &#232; troppo piccola (min %s)";
$lang['alert_image_min_height'] = "L'altezza dell'immagine &#232; troppo piccola (min %s)";
$lang['alert_image_min_width_height'] = "L'immagine &#232; troppo piccola (min %s x %s)";

// TOOLTIP
$lang['tt_save'] = "Salva";
$lang['tt_search'] = "Cerca";
$lang['tt_filter'] = "Filtra";
$lang['tt_add'] = "Aggiungi";

//DATE TIME FORMAT 
$lang['tables_date_time'] = "DD/MM/YYYY HH:mm";

// SELECT
$lang['sel_user_group_1'] = "Admin";
$lang['sel_user_group_2'] = "Moderatore";
$lang['sel_user_group_3'] = "Utente";
$lang['sel_user_group_4'] = "Bannato";
$lang['sel_username'] = "- Seleziona utente -";
$lang['sel_clubname'] = "- Seleziona club -";

// MASK
$lang['mask_form'] = "0.000.000.000";
$lang['mask_page'] = '.';

// GLOBAL
$lang['unemployed'] = "Senza contratto";

//------------------------------------------------------------------------------
// TEMPLATE
//------------------------------------------------------------------------------

// NAVBAR
$lang['navbar_menu_admin'] = "Dashboard";
$lang['navbar_menu_profile'] = "Impostazioni";

// SIDEBAR MENU (SITE)
$lang['sbar_menu_home'] = "Home";

// SIDEBAR MENU (ADMIN)
$lang['adminsbar_menu_gotosite'] = "Vai al sito";
$lang['adminsbar_menu_home'] = "Dashboard";
$lang['adminsbar_menu_settings'] = "Impostazioni";
$lang['adminsbar_submenu_site_options'] = "Generali";
$lang['adminsbar_menu_users'] = "Utenti";
$lang['adminsbar_menu_clubs'] = "Club";
$lang['adminsbar_menu_managers'] = "Managers";

//------------------------------------------------------------------------------
// FORM
//------------------------------------------------------------------------------

// FORM LABEL - PLACEHOLDER 
$lang['form_label_username'] = "Username";
$lang['form_label_email'] = "Email";
$lang['form_label_password'] = "Password";
$lang['form_label_newpassword'] = "Nuova password";
$lang['form_label_confirm_password'] = "Conferma password";
$lang['form_label_birthday'] = "Data di nascita";
$lang['form_label_permission'] = "Permessi";
$lang['form_label_clubname'] = "Nome club";
$lang['form_label_wallet'] = "Finanze";

// FORM VALIDATION REMOTE MESSAGES 
$lang['formvalidation_check_username'] = "Questo username &#232; gi&#224; utilizzato";
$lang['formvalidation_check_email'] = "Questa email &#232; gi&#224; utilizzata";

// FORM VALIDATION LANGUAGE 
$lang['formvalidation_language'] = "it_IT";



//------------------------------------------------------------------------------
//FRONTEND PAGES
//------------------------------------------------------------------------------

// SIGNIN
$lang['login_subtitle'] = "Accedi con il tuo account";
$lang['login_button_signin'] = "Login";
$lang['login_rememberme'] = "Ricordami";
$lang['login_forgotpassword'] = "Recupera password";
$lang['login_textlink_signup'] = "Non sei ancora iscritto ?";
$lang['login_link_signup'] = "Registrati";

// SIGNUP
$lang['register_subtitle'] = "Crea un nuovo account";
$lang['register_button_signup'] = "Registrati";
$lang['register_textlink_signin'] = "Sei gi&#224; iscritto ?";
$lang['register_link_signin'] = "Accedi";
$lang['register_alert_message'] = "Benvenuto nel club ! Accedi.";

// ACCOUNT RECOVERY
$lang['recovery_subtitle'] = "Inserisci la mail di registrazione";
$lang['recovery_textlink_signin'] = "Torna alla pagina di";
$lang['recovery_link_signin'] = "Login";
$lang['recovery_button_send'] = "Recupera password";
$lang['recovery_alert_success'] = "Abbiamo inviato un&#8217;email all&#8217;indirizzo indicato. Verifica la tua posta e procedi al login.";
$lang['recovery_alert_error'] = "L&#8217;email inserita non corrisponde a nessun account.";
$lang['recovery_object_mailreset'] = "Modifica Password";
$lang['recovery_text_mailreset'] = "Ciao %s, la tua password di accesso &#232; stata modificata. <br/><br/> Accedi con la tua nuova password";

// USER SETTINGS
$lang['user_settings_tabs_title'] = "Impostazioni";
$lang['user_settings_tabs_account'] = "Account";

//------------------------------------------------------------------------------
// BACKEND PAGES
//------------------------------------------------------------------------------

// SITE OPTIONS
$lang['bksettings_siteoptions_header_title'] = "Impostazioni Sito";
$lang['bksettings_siteoptions_form_label_sitename'] = "Nome sito";
$lang['bksettings_siteoptions_form_placeholder_sitename'] = "es. LEAGUEX";
$lang['bksettings_siteoptions_form_label_sitetitle'] = "Titolo sito";
$lang['bksettings_siteoptions_form_placeholder_sitetitle'] = "es. LEAGUEX | La tua Fantasy Master League";
$lang['bksettings_siteoptions_form_label_language'] = "Linguaggio";

// EMAIL OPTIONS
$lang['bksettings_emailoptions_header_title'] = "Impostazioni Email";
$lang['bksettings_emailoptions_smtp_description'] = "Configura leaguex per l'invio di email con autenticazione SMTP.";
$lang['bksettings_emailoptions_smtp_description_2'] = "* Lascia i parametri seguenti vuoti se il server non richiede l'autenticazione.";
$lang['bksettings_emailoptions_form_label_email'] = "Email";
$lang['bksettings_emailoptions_form_placeholder_email'] = "es. admin@yoursite.com";
$lang['bksettings_emailoptions_form_help_email'] = "Indirizzo email del mittente.";
$lang['bksettings_emailoptions_form_label_name'] = "Nome";
$lang['bksettings_emailoptions_form_placeholder_name'] = "es. leaguex";
$lang['bksettings_emailoptions_form_help_name'] = "Nome del mittente.";
$lang['bksettings_emailoptions_form_label_host'] = "Host SMTP";
$lang['bksettings_emailoptions_form_placeholder_host'] = "es. ssl://smtp.googlemail.com";
$lang['bksettings_emailoptions_form_help_host'] = "Nome del server SMTP.";
$lang['bksettings_emailoptions_form_label_port'] = "Porta SMTP";
$lang['bksettings_emailoptions_form_placeholder_port'] = "es. 25";
$lang['bksettings_emailoptions_form_help_port'] = "Porta del server SMTP.";
$lang['bksettings_emailoptions_form_label_username'] = "Username";
$lang['bksettings_emailoptions_form_placeholder_username'] = "es. abc@gmail.com";
$lang['bksettings_emailoptions_form_help_username'] = "Nome utilizzato per l'autenticazione al server di posta elettronica.";
$lang['bksettings_emailoptions_form_label_password'] = "Password";
$lang['bksettings_emailoptions_form_help_password'] = "Password utilizzata per l'autenticazione al server di posta elettronica.";
$lang['bksettings_emailoptions_test_description'] = "Test email.";
$lang['bksettings_emailoptions_test_form_label_email'] = "Email";
$lang['bksettings_emailoptions_test_form_help_email'] = "Invia una mail di prova all'indirizzo di posta elettronica inserito.";
$lang['bksettings_emailoptions_test_submit_btn_text'] = "Invia email";
$lang['bksettings_emailoptions_test_object_mail'] = "SMTP test";
$lang['bksettings_emailoptions_test_text_mail'] = "Ottimo! <br/><br/> Ora puoi utilizzare il protocollo SMTP per l'invio di email.";

// USERS LIST
$lang['bkuserslist_header_title'] = "Gestione Utenti";
$lang['bkuserslist_dtcolumn_username'] = "Username";
$lang['bkuserslist_dtcolumn_role'] = "Ruolo";
$lang['bkuserslist_dtcolumn_email'] = "Email";
$lang['bkuserslist_dtcolumn_registration_date'] = "Data di Registrazione";
$lang['bkuserslist_dtcolumn_last_visite'] = "Ultima Visita";
$lang['bkuserslist_modal_delete_users'] = "Sei sicuro di voler rimuovere questo utente ?";
$lang['bkuserslist_modal_title'] = "Crea nuovo utente";
$lang['bkuserslist_modal_edit_title'] = "Modifica utente";
$lang['bkuserslist_alert_new_user'] = "Nuovo utente creato.";

// CLUBS LIST
$lang['bkclubslist_header_title'] = "Gestione Club";
$lang['bkclubslist_dtcolumn_clubname'] = "Club";
$lang['bkclubslist_dtcolumn_manager'] = "Manager";
$lang['bkclubslist_dtcolumn_value'] = "Valore";
$lang['bkclubslist_modal_title'] = "Crea nuovo club";
$lang['bkclubslist_modal_edit_title'] = "Modifica club";
$lang['bkclubslist_alert_new_club'] = "Nuovo club creato.";
$lang['bkclubslist_modal_delete_clubs'] = "Sei sicuro di voler rimuovere questo club ?";
$lang['bkclubslist_alert_new_club'] = "Nuovo club creato.";

// MANAGERS LIST
$lang['bkmanagerslist_header_title'] = "Gestione Manager";
$lang['bkmanagerslist_dtcolumn_managername'] = "Manager";
$lang['bkmanagerslist_dtcolumn_clubname'] = "Club";
$lang['bkmanagerslist_dtcolumn_wallet'] = "Finanze";
$lang['bkmanagerslist_modal_title'] = "Crea nuovo manager";
$lang['bkmanagerslist_modal_edit_title'] = "Modifica manager";
$lang['bkmanagerslist_alert_new_manager'] = "Nuovo manager creato.";
$lang['bkmanagerslist_modal_delete_managers'] = "Sei sicuro di voler rimuovere questo manager ?";
