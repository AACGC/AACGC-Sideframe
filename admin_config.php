<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Expanding Bar             #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/

require_once("../../class2.php");
if (!getperms("P"))
{
    header("location:" . e_HTTP . "index.php");
    exit;
} 
require_once(e_ADMIN . "auth.php");
require_once(e_HANDLER . "userclass_class.php");
include_lan(e_PLUGIN."aacgc_sideframe/languages/".e_LANGUAGE.".php");

if (isset($_POST['update']))
{ 
    $pref['sideframe_menutitle'] = $_POST['sideframe_menutitle'];


if (isset($_POST['sideframe_'])) 
{$pref['sideframe_'] = 1;}
else
{$pref['sideframe_'] = 0;}


    save_prefs();

$text .= "".AEXB_04."";

}

//--------------------------------------------------------------------

$text .= "<form method='post' action='".e_SELF."' id='conslform'>
<table class='fborder' width='100%'>
<tr>
<td style='width:30%' class='forumheader3' colspan=2><b>".ASF_15."</b></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'><b>".ASF_.":</b></td>
<td style='width:70%' class='forumheader3'><input class='tbox' type='text'  size='50' name='sideframe_menutitle' value='" . $pref['sideframe_menutitle'] . "' /></td>
</tr>
<tr>
<td style='width:30%' class='forumheader3'><b>".ASF_.":</b></td>
<td colspan=2 class='forumheader3'>".($pref['sideframe_'] == 1 ? "<input type='checkbox' name='sideframe_' value='1' checked='checked' />" : "<input type='checkbox' name='sideframe_' value='0' />")."</td>
</tr>
</table><br/><br/>";

//------------------------------------------------------------------------------------
$text .= "
<table class='fborder' width='100%'><tr>
<td colspan='2' class='fcaption' style='text-align: left;'><input type='submit' name='update' value='".ASF_16."' class='button' />\n
</td>
</tr></table></form>";


$ns->tablerender("AACGC Side Frame(".ASF_.")", $text);
require_once(e_ADMIN . "footer.php");

?>