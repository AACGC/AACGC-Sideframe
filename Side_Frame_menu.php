<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Side Frame                #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/

global $tp,$list_pref;

$sideframe_title .= $pref['sideframe_menutitle'];

//---------------------------------------------------------------------------------------------------+

$sideframe_text .= "<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>";
$sideframe_text .= "<link rel='stylesheet' type='text/css' href='".e_PLUGIN."aacgc_sideframe/ddajaxsidepanel.css' />";
$sideframe_text .= "<script type='text/javascript' src='".e_PLUGIN."aacgc_sideframe/ddajaxsidepanel.js'></script>";

//---------------------------------------------------------------------------------------------------+

$sideframe_text .= "<div style='width:95%' align='center'><ul>";

$sql = new db;
$sql ->db_Select("aacgc_sideframe", "*", "ORDER BY sf_order ASC","");

while($row = $sql ->db_Fetch()){

if($row['sf_type'] == "0")
{$type = "data-loadtype='iframe'";}
else
{$type = "";}

$sideframe_text .= "<li><a href='".$row['sf_link']."' rel='ajaxpanel' ".$type.">".$tp->toHTML($row['sf_label'], TRUE)."</a></li>";
}

$sideframe_text .= "</ul></div>";

//---------------------------------------------------------------------------------------------------+

$ns -> tablerender($sideframe_title, $sideframe_text);

?>