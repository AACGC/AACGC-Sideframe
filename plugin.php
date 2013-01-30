<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Side Frame                #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/


$eplug_name = "AACGC Side Frame";
$eplug_version = "0.5";
$eplug_author = "M@CH!N3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Shows websites of your choice in expanding section on side of you site inside iframes. Code sorce from Dynamic Drive";
$eplug_compatible = "e107 v7+";
$eplug_readme = "";
$eplug_compliant = true;
$eplug_status = false;
$eplug_latest = false;

$eplug_folder = "aacgc_sideframe";

$eplug_menu_name = "Side Frame";

$eplug_conffile = "admin_main.php";

$eplug_icon = $eplug_folder . "/images/icon_32.png";
$eplug_icon_small = $eplug_folder . "/images/icon_16.png";
$eplug_icon_large = "".e_PLUGIN."aacgc_sideframe/images/icon_64.png";

$eplug_caption = "AACGC Side Frame";

$eplug_prefs = array(
"sideframe_menutitle" => "AACGC Sideframe Menu",
);

$eplug_table_names = array("aacgc_sideframe");

$eplug_tables = array(

"CREATE TABLE ".MPREFIX."aacgc_sideframe(sf_id int(11) NOT NULL auto_increment,sf_link text NOT NULL,sf_label text NOT NULL,sf_order text NOT NULL,sf_type text NOT NULL,PRIMARY KEY  (sf_id)) ENGINE=MyISAM;");

$eplug_link = false;
$eplug_link_name = "";
$eplug_link_url = "";

$eplug_done = "The plugin is now installed.";

$upgrade_add_prefs = "";
$upgrade_remove_prefs = "";
$upgrade_alter_tables = "";
$eplug_upgrade_done = "Upgrade Complete";

?>	

