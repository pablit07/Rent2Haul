<?php
session_start();
$link = mysql_connect('50.62.209.2:3306', 'sabmecto', 'xmd9U7@4');
if (!$link) {
    die('Not connected : ' . mysql_error());
}
// make foo the current db
$db_selected = mysql_select_db('abracken_ufirstmoving', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}


define("SITE_URL", "http://ufirstmoving.com/");
define("TBL_FREIGHT", "ufirstmoving_freight");
define("TBL_CMS", "ufirstmoving_cms");
define("TBL_NEWS_ARTICLES", "ufirstmoving_news_articles");
define("TBL_CATEGORY", "ufirstmoving_category");
define("TBL_USER_REGISTER", "ufirstmoving_user");
define("TBL_USER_CONTACT", "ufirstmoving_contact");
define("TBL_USER_REVIEW", "ufirstmoving_review");
?>