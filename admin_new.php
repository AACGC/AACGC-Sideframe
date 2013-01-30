<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Side Frame                #
#     by M@CH!N3                      #
#     http://www.aacgc.com            #
#######################################
*/
require_once("../../class2.php");
if(!getperms("P")) {
echo "";
exit;
}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;
include_lan(e_PLUGIN."aacgc_sideframe/languages/".e_LANGUAGE.".php");
//-------------------------# BB Code Support #----------------------------------------------
include(e_HANDLER."ren_help.php");
//-----------------------------------------------------------------------------------------------------------+
if ($_POST['add_link'] == '1') {
$newlink = $tp->toDB($_POST['sf_link']);
$newlabel = $tp->toDB($_POST['sf_label']);
$neworder = $tp->toDB($_POST['sf_order']);
$newtype = $tp->toDB($_POST['sf_type']);
$reason = "";
$newok = "";


if (($newlink == "") OR ($newlabel == "")){
	$newok = "0";
	$reason = "".ASF_05."";
} else {
	$newok = "1";
}

If ($newok == "0"){
 	$newtext = "
 	<center>
	<b><br><br> ".$reason."
	</center>
 	</b>
	";
	$ns->tablerender("", $newtext);
}
If ($newok == "1"){
$sql->db_Insert("aacgc_sideframe", "NULL, '".$newlink."', '".$newlabel."', '".$neworder."', '".$newtype."'") or die(mysql_error());
$ns->tablerender("", "<center><b>".ASF_06."</b></center>");
}
}

if (isset($_POST['main_delete'])) {
    $delete_id = array_keys($_POST['main_delete']);
	$sql2 = new db;
    $sql2->db_Delete("aacgc_sideframe", "sf_id='".$delete_id[0]."'");
}

//-----------------------------------------------------------------------------------------------------------+
$text = "
<form method='POST' action='admin_new.php'>
<table style='width:100%' class='fborder' cellspacing='0' cellpadding='0'>";

$sql->db_Select("aacgc_sideframe", "*");
$rows = $sql->db_Rows();
for ($i=0; $i < $rows; $i++) {
$option = $sql->db_Fetch();
$n++;
$options .= "<option name='sf_order' value='".$n."'>".$n."</option>";}
$next = $n + 1;

$text .= "
	<tr>
    	<td style='width:30%; text-align:right' class='forumheader3'>".ASF_08.":</td>
        <td style='width:70%' class='forumheader3'>
        <input class='tbox' type='text' name='sf_link' size='100'>
        </td>
    </tr>
	<tr>
    	<td style='width:30%; text-align:right' class='forumheader3'>".ASF_09.":</td>
        <td style='width:' class='forumheader3'>
		<textarea class='tbox' rows='5' cols='100' name='sf_label' onselect='storeCaret(this);' onclick='storeCaret(this);' onkeyup='storeCaret(this);'></textarea><br/>";

        $text .= display_help('helpb', 'forum');

        $text .= "
		</td>
    </tr>		
	<tr>
        <td style='width:30%; text-align:right' class='forumheader3'>".ASF_10.":</td>
        <td style='width:70%' class='forumheader3'>
			<select name='sf_order' size='1' class='tbox' style='width:20%'>
			<option name='sf_order' value='0'>0</option>
    		".$options."
			<option name='sf_order' value='".$next."'>".$next."</option>
        </td>
    </tr>
	<tr>
    	<td style='width:30%; text-align:right' class='forumheader3'>".ASF_11.":</td>
        <td style='width:70%' class='forumheader3'>
		<input type='radio' name='sf_type' value='1'> ".ASF_13."<br/>
		<input type='radio' name='sf_type' value='0'> ".ASF_14."
        </td>
    </tr>
	<tr>
        <td colspan='2' style='text-align:center' class='forumheader'>
			<input type='hidden' name='add_link' value='1'>
			<input class='button' type='submit' value='".ASF_07."'>
		</td>
    </tr>
</table>
</form>";



//---------------------------------------------------------------------------------------------------+

$text .= "<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>";
$text .= "<link rel='stylesheet' type='text/css' href='".e_PLUGIN."aacgc_sideframe/ddajaxsidepanel.css' />";
$text .= "<script type='text/javascript' src='".e_PLUGIN."aacgc_sideframe/ddajaxsidepanel.js'></script>";

$text .= "<br/>
<table class='' style='width:100%'>
	<tr>
		<td colspan='2' class='forumheader3' style=''><b><u>".ASF_12."</u>:</b></td>
	</tr>";

$sql = new db;
$sql ->db_Select("aacgc_sideframe", "*", "ORDER BY sf_order ASC","");
while($row = $sql ->db_Fetch()){
if($row['type'] == "1")
{$type = "data-loadtype='iframe'";}
else
{$type = "";}
$text .= "<tr>
			<td class='forumheader3'><a href='".$row['sf_link']."' rel='ajaxpanel' ".$type.">".$tp->toHTML($row['sf_label'], TRUE)."</a></td>
			<td class='forumheader3'><form method='POST' action='admin_new.php'>
<input type='image' title='".LAN_DELETE."' name='main_delete[".$row['sf_id']."]' src='".ADMIN_DELETE_ICON_PATH."' onclick=\"return jsconfirm('".LAN_CONFIRMDEL." [ {$row['sf_label']} ]')\"/>
</form></td>
		  </tr>";
}
$text .= "</table>";

//---------------------------------------------------------------------------------------------------+

$ns -> tablerender("AACGC Side Frame (".ASF_04.")", $text);
require_once(e_ADMIN."footer.php");

?>
