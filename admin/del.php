<!DOCTYPE html><html>
<head>
<?php
if (version_compare(phpversion(), "4.1.0", "<") === true) {
$_GET &= $HTTP_GET_VARS;
$_POST &= $HTTP_POST_VARS;
$_SERVER &= $HTTP_SERVER_VARS;
$_FILES &= $HTTP_POST_FILES;
$_ENV &= $HTTP_ENV_VARS;

if (isset($HTTP_COOKIE_VARS)) $_COOKIE &= $HTTP_COOKIE_VARS;
}

if (!ini_get("register_globals")) {
extract($_GET, EXTR_SKIP);
extract($_POST, EXTR_SKIP);
extract($_COOKIE, EXTR_SKIP);

}


$fold=".."; require ("../templates/lang.inc");
if (!isset($speek)) {
$speek=$language;
} else {
$found_lang=0;
while (list ($keyl, $stl) = each ($langs)) {
if ($speek==$stl){
$found_lang=1;
}
}
if ($found_lang==0){
$speek=$language;
}
}


require ("../templates/$template/$speek/vars.txt"); @setlocale(LC_CTYPE, $site_nls);  require ("../templates/$template/$speek/config.inc");
require ("../templates/$template/css.inc");
require ("../modules/translit.php");
echo "<meta http-equiv='Content-Type' content='text/html; charset=$codepage'><title>".$lang[439]."</title>


<head>";
echo $css;
echo "</head>

<SCRIPT language='JavaScript1.1'>
<!--

function rc() {
window.opener.location.reload();
self.close();

}
//-->
</SCRIPT>
<BODY bgcolor=$nc0 link=$nc2 text=$nc5>";
if ((!@$id) || (@$id==0)): $id=="0"; endif;
if ((!@$id) || (@$id=="")): $id==0; endif;
if ((!@$del) || (@$del=="")): $del="no"; endif;
if ((!@$nazv) || (@$nazv=="")): $nazv=""; endif;



if ($del=="yes") {
settype ($id, "integer");
$st="";
$fcontents = file(".$base_file");
$out=explode("|",$fcontents [$id]);
$catid=translit($out[1]." ".$out[2]." ");
$out[0]=$id;
$st=implode("|",$out);
$fcontents [$id] = "\n";

$html = implode ("", $fcontents);
$file = fopen (".$base_file", "w");
if (!$file) {
echo "<p>".$lang[44]." <b>.$base_file</b> ".$lang[45]."\n";
exit;
}
flock ($file, LOCK_EX); fputs ($file, "$html");flock ($file, LOCK_UN);
fclose ($file);
unset ($fcontents, $html, $file);

if ($admin_speedup==1) {
$fcontents = file(".$base_loc/items/$catid.txt");
while(list($key,$val)=each($fcontents)) {
if ($val==$st) {
unset($fcontents[$key]);
}
}

$html = implode ("", $fcontents);
$file = fopen (".$base_loc/items/$catid.txt", "w");
if (!$file) {
echo "<p>".$lang[44]." <b>.$base_loc/items/$catid.txt</b> ".$lang[45]."\n";
exit;
}
flock ($file, LOCK_EX); fputs ($file, "$html");flock ($file, LOCK_UN);
fclose ($file);
unset ($fcontents, $html, $file);



}
echo "<font face=verdana><center><small><b>".$lang[437]." ID=$id</b><br>
<br>$nazv
<br><br><b>".$lang[438]."</b></small><br><br>
<p><input type='button' value='".$lang[428]."' name='no' onclick='javascript:rc()'></p></font>";
exit;
}

echo "<table border=0 class=table2 style='width:96%' cellpadding=4>
";

$sc=0;
$st=0;
$fcontents = file(".$base_file");

$line = @$fcontents[$id];
$out=explode("|",$line);
$nomer = $out[0];
@$dir=@$out[1];
if ($dir!="") {$sc=1;}
@$subdir=@$out[2];
@$nazv=@$out[3];
@$price=@$out[4];
@$opt=@$out[5];
@$ext_id=@$out[6];
@$description=@$out[7];
@$kwords=@$out[8];
@$foto1=@$out[9];
@$foto2=@$out[10];
@$vitrin=@$out[11];
@$onsale=substr(@$out[12],0,1);
@$brand_name=@$out[13];
@$ext_lnk=@$out[14];
@$full_descr=@$out[15];
@$kolvo=@$out[16];


if ($sc>0)  {
$foto1=str_replace("<img ","<img id=smallimg ", str_replace("src='photos","src='$htpath/photos", $foto1));

echo "<tr>
<td align='left' valign='top'><small>$foto1</small></td>
    <td align='left' valign='top'><font face=verdana><center><small>".$lang[439]."</small>
    <table border=0 cellpadding='3'>
  <tr>
    <td width='50%' align=center valign=top><form method='POST' target='_self' action='del.php?speek=".$speek."&id=$id&del=yes&nazv=$nazv'><input type='hidden' value=\"$speek\" name=\"speek\"> <input class='btn btn-primary' type='submit' value='".$lang['yes']."' name='yes'></td>
    <td width='50%' valign=top align=center><input class=btn type='button' value='".$lang['no']."' name='no' onclick='javascript:self.close()'></form></td></tr>

  <tr><td colspan=2 align=center><div align=center><form method='POST' target='_self' action='del_archive.php?id=$id&del=yes'><input type='hidden' value=\"$speek\" name=\"speek\"> <input class='btn btn-warning' type='submit' value='".$lang[418]."' name='yes'></small></form></div></td></tr>
</table>
<small><div align=center><b>$nazv</b><br></div></small></font></td>
    </tr>
    </table>";

} else {
echo "<div align=center><font face=verdana>".$lang[434]."<br><br><input class='btn btn-primary' type='button' value='OK' name='no' onclick='javascript:self.close()'></font></div>";
}


?>
<!--end-->
</body>
</html>

