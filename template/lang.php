<?php

if (@$run_if_included) {
    $act = @$_GET['act'];

    $lang = @$_GET['lang'];
    if($lang==""){
        $lang = @$_COOKIE["pd_front_lang"];
    }else{
        $koki_tim = time() + 864000;
        setcookie("pd_front_lang", ("$lang"), $koki_tim, '/');
    }
    $lang_id = 1; 
	// if no lang selected (EN)
    if($lang=="en"){
        $lang_id = 1;
    }


    $sql_choose_lang = mysql_query("SELECT * FROM " . $prefix . "_languages where lang_id ='$lang_id'");
    $count_lang_check = mysql_num_rows($sql_choose_lang);
    if ($count_lang_check == 0) {
        // defult language  1=en
        $sql_choose_lang = mysql_query("SELECT * FROM " . $prefix . "_languages where lang_id ='1'");
    }

    $data_choose_lang = mysql_fetch_array($sql_choose_lang);
//general lang settings
    $lang = stripcslashes($data_choose_lang['lang_code']);
    $site_lang_id = stripcslashes($data_choose_lang['lang_id']);
    $site_lang_title = stripcslashes($data_choose_lang['lang_title']);
    $site_lang_charset = stripcslashes($data_choose_lang['lang_charset']);
    $site_lang_dir = stripcslashes($data_choose_lang['lang_dir']);
    $site_lang_align_right = stripcslashes($data_choose_lang['lang_align_right']);
    $site_lang_align_left = stripcslashes($data_choose_lang['lang_align_left']);
    $site_lang_status = stripcslashes($data_choose_lang['lang_status']);
    $site_lang_icon = stripcslashes($data_choose_lang['lang_icon']);

// load all languages words
    $lang_var = "1"; // 0=admin, 1=public site
    $sql_choose_vars_lang = mysql_query("SELECT * FROM " . $prefix . "_languages_words where lang_id ='$site_lang_id' and word_type='$lang_var'");
    while ($data_choose_vars_lang = mysql_fetch_array($sql_choose_vars_lang)) {
        $$data_choose_vars_lang['word_variable'] = nl2br(stripcslashes($data_choose_vars_lang['word_text']));
    }

    $sql_get_site_settings = mysql_query("SELECT * FROM " . $prefix . "_webmaster_settings  WHERE set_id ='1' ");
    $data_get_site_settings = mysql_fetch_array($sql_get_site_settings);
    $site_ar_box_status = stripcslashes($data_get_site_settings['ar_box_status']);
    $site_en_box_status = stripcslashes($data_get_site_settings['en_box_status']);
    $site_seo_status = stripcslashes($data_get_site_settings['seo_status']);
    $site_analytics_status = stripcslashes($data_get_site_settings['analytics_status']);
    $site_banars_status = stripcslashes($data_get_site_settings['banars_status']);
    $site_inbox_status = stripcslashes($data_get_site_settings['inbox_status']);
    $site_calendar_status = stripcslashes($data_get_site_settings['calendar_status']);
    $site_settings_status = stripcslashes($data_get_site_settings['settings_status']);
    $site_newsletter_status = stripcslashes($data_get_site_settings['newsletter_status']);
    $site_members_status = stripcslashes($data_get_site_settings['members_status']);
    $site_orders_status = stripcslashes($data_get_site_settings['orders_status']);
    $site_shop_settings_status = stripcslashes($data_get_site_settings['shop_settings_status']);
    $site_shop_status = stripcslashes($data_get_site_settings['shop_status']);
    $site_defult_currency_id = stripcslashes($data_get_site_settings['defult_currency_id']);

    $sql_get_site_currency = mysql_query("SELECT * FROM " . $prefix . "_shop_currencies  WHERE currency_id ='$site_defult_currency_id' ");
    $data_get_site_currency = mysql_fetch_array($sql_get_site_currency);
    $defult_currency = stripcslashes($data_get_site_currency['currency_shorttitle']);


    $current_page_lang_url="?lang=$lang_var_public_141";
    $current_page_lang_url_ar="?lang=ar";
    $current_page_lang_url_en="?lang=en";

}
?>
