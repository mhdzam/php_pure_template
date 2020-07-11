<?php


// IP VAR : $pd_ip

if (@$run_if_included) {

    $current_page_full_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $current_page_title = @$current_page_title;

    function getBrowser()
    {
        // check if IE 8 - 11+
        preg_match('/Trident\/(.*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
        if ($matches) {
            $version = intval($matches[1]) + 4;     // Trident 4 for IE8, 5 for IE9, etc
            return 'Internet Explorer ' . ($version < 11 ? $version : $version);
        }

        preg_match('/MSIE (.*)/', $_SERVER['HTTP_USER_AGENT'], $matches);
        if ($matches) {
            return 'Internet Explorer ' . intval($matches[1]);
        }

        // check if Firefox, Opera, Chrome, Safari
        foreach (array('Firefox', 'OPR', 'Chrome', 'Safari') as $browser) {
            preg_match('/' . $browser . '/', $_SERVER['HTTP_USER_AGENT'], $matches);
            if ($matches) {
                return str_replace('OPR', 'Opera', $browser);   // we don't care about the version, because this is a modern browser that updates itself unlike IE
            }
        }
    }


    function getOS()
    {

        $user_agent = $_SERVER['HTTP_USER_AGENT'];

        $os_platform = "unknown";

        $os_array = array(
            '/windows nt 6.3/i' => 'Windows 8.1',
            '/windows nt 6.2/i' => 'Windows 8',
            '/windows nt 6.1/i' => 'Windows 7',
            '/windows nt 6.0/i' => 'Windows Vista',
            '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
            '/windows nt 5.1/i' => 'Windows XP',
            '/windows xp/i' => 'Windows XP',
            '/windows nt 5.0/i' => 'Windows 2000',
            '/windows me/i' => 'Windows ME',
            '/win98/i' => 'Windows 98',
            '/win95/i' => 'Windows 95',
            '/win16/i' => 'Windows 3.11',
            '/macintosh|mac os x/i' => 'Mac OS X',
            '/mac_powerpc/i' => 'Mac OS 9',
            '/linux/i' => 'Linux',
            '/ubuntu/i' => 'Ubuntu',
            '/iphone/i' => 'iPhone',
            '/ipod/i' => 'iPod',
            '/ipad/i' => 'iPad',
            '/android/i' => 'Android',
            '/blackberry/i' => 'BlackBerry',
            '/webos/i' => 'Mobile'
        );

        foreach ($os_array as $regex => $value) {

            if (preg_match($regex, $user_agent)) {
                $os_platform = $value;
            }

        }

        return $os_platform;

    }

    $sql_vcount1 = mysql_query("SELECT count(visitor_id) vvcount FROM " . $prefix . "_analytics_visitors where visitor_ip='$pd_ip' and visitor_date='$pd_current_date'");
    $data_vcount1 = mysql_fetch_array($sql_vcount1);
    if ($data_vcount1['vvcount'] == 0) {

        try {
            $visitor_ip_details = json_decode(@file_get_contents("http://ipinfo.io/{$pd_ip}/json"));

            $visitor_city = @$visitor_ip_details->city;
            if ($visitor_city == "") {
                $visitor_city = "unknown";
            }
            $visitor_region = @$visitor_ip_details->region;
            if ($visitor_region == "") {
                $visitor_region = "unknown";
            }
            $visitor_country_code = @$visitor_ip_details->country;
            if ($visitor_country_code == "") {
                $visitor_country_code = "unknown";
            }

            $sql_gc = mysql_query("SELECT * FROM " . $prefix . "_countries  WHERE country_code ='$visitor_country_code' limit 1 ");
            $data_gc = mysql_fetch_array($sql_gc);
            $visitor_country = stripcslashes($data_gc['country_en']);
            if ($visitor_country == "") {
                $visitor_country = "unknown";
            }

            $visitor_address = "$visitor_region, $visitor_city, $visitor_country";

            $visitor_loc = explode(',', @$visitor_ip_details->loc);
            $visitor_loc_0 = @$visitor_loc[0];
            if ($visitor_loc_0 == "") {
                $visitor_loc_0 = "unknown";
            }
            $visitor_loc_1 = @$visitor_loc[1];
            if ($visitor_loc_1 == "") {
                $visitor_loc_1 = "unknown";
            }

            $visitor_org = @$visitor_ip_details->org;
            if ($visitor_org == "") {
                $visitor_org = "unknown";
            }
            $visitor_hostname = @$visitor_ip_details->hostname;
            if ($visitor_hostname == "") {
                $visitor_hostname = "No Hostname";
            }


        } catch (Exception $e) {
            $visitor_city = "unknown";
            $visitor_region = "unknown";
            $visitor_country_code = "unknown";
            $visitor_country = "unknown";
            $visitor_loc_0 = "unknown";
            $visitor_loc_1 = "unknown";
            $visitor_org = "unknown";
            $visitor_hostname = "No Hostname";
        }

        $visitor_referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "unknown";
        $visitor_browser = getBrowser();
        $visitor_os = getOS();
        $visitor_screen_res = "unknown";


        $sql_slct_max_v = mysql_query("select max(visitor_id)  from " . $prefix . "_analytics_visitors");
        $data_slct_max_v = mysql_fetch_array($sql_slct_max_v);
        $next_visitor_id = $data_slct_max_v[0] + 1;
        $sql_insert_new_visitor = mysql_query("INSERT INTO " . $prefix . "_analytics_visitors (
  visitor_id,
  visitor_ip,
  visitor_city,
  visitor_country_code,
  visitor_country,
  visitor_region,
  visitor_full_address,
  visitor_location_cor1,
  visitor_location_cor2,
  visitor_os,
  visitor_browser,
  visitor_resolution,
  visitor_referrer,
  visitor_hostname,
  visitor_org,
  visitor_date,
  visitor_time) VALUES ('$next_visitor_id','$pd_ip','$visitor_city','$visitor_country_code','$visitor_country','$visitor_region','$visitor_address','$visitor_loc_0','$visitor_loc_1','$visitor_os','$visitor_browser','$visitor_screen_res','$visitor_referrer','$visitor_hostname','$visitor_org',now(),now())");

        $ldtime = round((microtime(true) - $Page_time_started_at), 3);

        if ($sql_insert_new_visitor) {
            $sql_slct_max_p = mysql_query("select max(page_id)  from " . $prefix . "_analytics_pages");
            $data_slct_max_p = mysql_fetch_array($sql_slct_max_p);
            $next_page_id = $data_slct_max_p[0] + 1;
            $sql2 = mysql_query("INSERT INTO " . $prefix . "_analytics_pages (
  page_id,
  visitor_id,
  page_title,
  page_name,
  page_query,
  page_loadtime,
  visitor_date,
  visitor_time) VALUES ('$next_page_id','$next_visitor_id','$current_page_title','$pd_current_page_php','$current_page_full_link','$ldtime',now(),now())");
        }


    } else {
        $sql_vv = mysql_query("SELECT visitor_id FROM " . $prefix . "_analytics_visitors where visitor_ip='$pd_ip' and visitor_date='$pd_current_date' limit 1");
        $data_vv = mysql_fetch_array($sql_vv);

        $ldtime = round((microtime(true) - $Page_time_started_at), 3);

        if ($data_vv['visitor_id'] != "") {

            $sql_vcount2 = mysql_query("SELECT count(page_id) ppcount FROM " . $prefix . "_analytics_pages where visitor_id='$data_vv[visitor_id]' and visitor_date='$pd_current_date' and page_query='$current_page_full_link'");
            $data_vcount2 = mysql_fetch_array($sql_vcount2);
            if ($data_vcount2['ppcount'] == 0) {


                $sql_slct_max_p = mysql_query("select max(page_id)  from " . $prefix . "_analytics_pages");
                $data_slct_max_p = mysql_fetch_array($sql_slct_max_p);
                $next_page_id = $data_slct_max_p[0] + 1;
                $sql2 = mysql_query("INSERT INTO " . $prefix . "_analytics_pages (
  page_id,
  visitor_id,
  page_title,
  page_name,
  page_query,
  page_loadtime,
  visitor_date,
  visitor_time) VALUES ('$next_page_id','$data_vv[visitor_id]','$current_page_title','$pd_current_page_php','$current_page_full_link','$ldtime',now(),now())");
            }
        }

    }

}

?>