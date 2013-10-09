<?php
$metat="";

function toHache($str) {
global $hache_salt;
$ret="";
$r=$hache_salt.$hache_salt.$hache_salt.$hache_salt.$hache_salt.$hache_salt;
$md=md5($str);
for ($i=0; $i<16; $i++) {
$mmd=substr($md,0,2);
$md=substr($md,2);
$ret.=substr($r,hexdec($mmd),1);
}
return $ret;
}
function toRus($str) {
$str = toLower($str);
$trans = array(
"q" => "�",
"w" => "�",
"e" => "�",
"r" => "�",
"t" => "�",
"y" => "�",
"u" => "�",
"i" => "�",
"o" => "�",
"p" => "�",
"[" => "�",
"]" => "�",
"a" => "�",
"s" => "�",
"d" => "�",
"f" => "�",
"g" => "�",
"h" => "�",
"j" => "�",
"k" => "�",
"l" => "�",
";" => "�",
"'" => "�",
"z" => "�",
"x" => "�",
"c" => "�",
"v" => "�",
"b" => "�",
"n" => "�",
"m" => "�",
"," => "�",
"." => "�");
$str=strtr( $str, $trans);
   return strtolower($str);
}
function toEng($str) {
$str = toLower($str);
$trans = array(
"�" => "q",
"�" => "w",
"�" => "e",
"�" => "r",
"�" => "t",
"�" => "y",
"�" => "u",
"�" => "i",
"�" => "o",
"�" => "p",
"�" => "[",
"�" => "]",
"�" => "a",
"�" => "s",
"�" => "d",
"�" => "f",
"�" => "g",
"�" => "h",
"�" => "j",
"�" => "k",
"�" => "l",
"�" => ";",
"�" => "'",
"�" => "z",
"�" => "x",
"�" => "c",
"�" => "v",
"�" => "b",
"�" => "n",
"�" => "m",
"�" => ",",
"�" => ".",
"�" => "");
$str=strtr( $str, $trans);
return strtolower($str);
}
function toFirst($str) {
$first=substr($str,0,1);
$next=substr($str,1,(strlen($str)-1));
$next = strtr($next, "�����Ũ�������������������������",
"��������������������������������");
$next=strtolower($next);
$first = strtr($first, "��������������������������������",
"�����Ũ�������������������������");
$first=strtoupper($first);
return ($first.$next);
}
function translit($strw, $z=0) {
global $codepage;
$strw = strip_tags($strw);
if (($codepage=="windows-1250")||($codepage=="windows-1252")||($codepage=="windows-1253")||($codepage=="windows-1254")||($codepage=="windows-1255")||($codepage=="windows-1257")) {$strw=iconv($codepage, 'ASCII//TRANSLIT', "$strw");}
$strw = str_replace("&","",$strw);
$strw = str_replace("'","",$strw);
$strw = str_replace("%","_proc",$strw);
$strw = str_replace("`","",$strw);
$strw = str_replace(";","_",$strw);
$strw = str_replace("#","",$strw);
$strw = str_replace("~","",$strw);

$strw = str_replace(chr(0x27),"",$strw);
$strw = str_replace(chr(0x60),"",$strw);
$strw = str_replace(chr(0x80),"d",$strw);
$strw = str_replace(chr(0x90),"d",$strw);
$strw = str_replace(chr(0x81),"g",$strw);
$strw = str_replace(chr(0x82),"",$strw);
$strw = str_replace(chr(0x83),"g",$strw);
$strw = str_replace(chr(0x84),"",$strw);
$strw = str_replace(chr(0x85),"",$strw);
$strw = str_replace(chr(0x86),"",$strw);
$strw = str_replace(chr(0x87),"",$strw);
$strw = str_replace(chr(0x88),"euro",$strw);
$strw = str_replace(chr(0x89),"pr",$strw);
$strw = str_replace(chr(0x8A),"l",$strw);
$strw = str_replace(chr(0x8B),"",$strw);
$strw = str_replace(chr(0x8C),"n",$strw);
$strw = str_replace(chr(0x8D),"k",$strw);
$strw = str_replace(chr(0x8E),"t",$strw);
$strw = str_replace(chr(0x8F),"d",$strw);
$strw = str_replace(chr(0x90),"d",$strw);
$strw = str_replace(chr(0x91),"",$strw);
$strw = str_replace(chr(0x92),"",$strw);
$strw = str_replace(chr(0x93),"",$strw);
$strw = str_replace(chr(0x94),"",$strw);
$strw = str_replace(chr(0x95),"",$strw);
$strw = str_replace(chr(0x96),"",$strw);
$strw = str_replace(chr(0x97),"",$strw);
$strw = str_replace(chr(0x98),"",$strw);
$strw = str_replace(chr(0x99),"",$strw);
$strw = str_replace(chr(0x9A),"l",$strw);
$strw = str_replace(chr(0x9B),"",$strw);
$strw = str_replace(chr(0x9C),"n",$strw);
$strw = str_replace(chr(0x9D),"k",$strw);
$strw = str_replace(chr(0x9E),"t",$strw);
$strw = str_replace(chr(0x9F),"d",$strw);
$strw = str_replace(chr(0xA1),"u",$strw);
$strw = str_replace(chr(0xA2),"u",$strw);
$strw = str_replace(chr(0xA3),"j",$strw);
$strw = str_replace(chr(0xA4),"j",$strw);
$strw = str_replace(chr(0xA5),"g",$strw);
$strw = str_replace(chr(0xA6),"",$strw);
$strw = str_replace(chr(0xA7),"",$strw);
$strw = str_replace(chr(0xA8),"yo",$strw);
$strw = str_replace(chr(0xA9),"c",$strw);
$strw = str_replace(chr(0xAA),"e",$strw);
$strw = str_replace(chr(0xAB),"",$strw);
$strw = str_replace(chr(0xAC),"",$strw);
$strw = str_replace(chr(0xAD),"_",$strw);
$strw = str_replace(chr(0xAE),"r",$strw);
$strw = str_replace(chr(0xAF),"yi",$strw);
$strw = str_replace(chr(0xB0),"",$strw);
$strw = str_replace(chr(0xB1),"",$strw);
$strw = str_replace(chr(0xB2),"i",$strw);
$strw = str_replace(chr(0xB3),"i",$strw);
$strw = str_replace(chr(0xB4),"g",$strw);
$strw = str_replace(chr(0xB5),"m",$strw);
$strw = str_replace(chr(0xB6),"",$strw);
$strw = str_replace(chr(0xB7),"",$strw);
$strw = str_replace(chr(0xB8),"yo",$strw);
$strw = str_replace(chr(0xB9),"num",$strw);
$strw = str_replace(chr(0xBA),"e",$strw);
$strw = str_replace(chr(0xBB),"",$strw);
$strw = str_replace(chr(0xBC),"j",$strw);
$strw = str_replace(chr(0xBD),"j",$strw);
$strw = str_replace(chr(0xBE),"j",$strw);
$strw = str_replace(chr(0xBF),"yi",$strw);




$strw = htmlspecialchars($strw);

$strw = str_replace(";","_",$strw);
$strw = str_replace("`","",$strw);
$strw = str_replace("&","",$strw);
$strw = str_replace("'","",$strw);
$strw = str_replace("%","",$strw);
$strw = str_replace("#","",$strw);
$strw = str_replace(" ","_",$strw);
$strw = str_replace(",","_",$strw);
if ($z==0) {
$strw = str_replace(".","",$strw);
}
$strw = str_replace("!","",$strw);
$strw = str_replace("-","_",$strw);
$strw = str_replace("`","",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("~","",$strw);
$strw = str_replace("@","",$strw);
$strw = str_replace("\$","",$strw);
$strw = str_replace("}","",$strw);
$strw = str_replace("{","_",$strw);
$strw = str_replace("]","",$strw);
$strw = str_replace("[","_",$strw);
$strw = str_replace("^","",$strw);
$strw = str_replace("*","x",$strw);
$strw = str_replace(";","_",$strw);
$strw = str_replace("+","",$strw);
$strw = str_replace("=","",$strw);
$strw = str_replace(":","",$strw);
$strw = str_replace("(","_",$strw);
$strw = str_replace(")","",$strw);
$strw = str_replace("/","_",$strw);
$strw = str_replace("?","",$strw);
$strw = str_replace("\\","",$strw);
$strw = str_replace("|","_",$strw);
$strw = str_replace("\"","",$strw);
$strw = str_replace("\'","",$strw);
$strw = str_replace("�","a",$strw);
$strw = str_replace("�","b",$strw);
$strw = str_replace("�","v",$strw);
$strw = str_replace("�","g",$strw);
$strw = str_replace("�","d",$strw);
$strw = str_replace("�","e",$strw);
$strw = str_replace("�","yo",$strw);
$strw = str_replace("�","j",$strw);
$strw = str_replace("�","z",$strw);
$strw = str_replace("�","i",$strw);
$strw = str_replace("�","y",$strw);
$strw = str_replace("�","k",$strw);
$strw = str_replace("�","l",$strw);
$strw = str_replace("�","m",$strw);
$strw = str_replace("�","n",$strw);
$strw = str_replace("�","o",$strw);
$strw = str_replace("�","p",$strw);
$strw = str_replace("�","r",$strw);
$strw = str_replace("�","s",$strw);
$strw = str_replace("�","t",$strw);
$strw = str_replace("�","u",$strw);
$strw = str_replace("�","f",$strw);
$strw = str_replace("�","h",$strw);
$strw = str_replace("�","tz",$strw);
$strw = str_replace("�","ch",$strw);
$strw = str_replace("�","sh",$strw);
$strw = str_replace("�","sch",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("�","yi",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("�","e",$strw);
$strw = str_replace("�","u",$strw);
$strw = str_replace("�","ya",$strw);
$strw = str_replace("�","a",$strw);
$strw = str_replace("�","b",$strw);
$strw = str_replace("�","v",$strw);
$strw = str_replace("�","g",$strw);
$strw = str_replace("�","d",$strw);
$strw = str_replace("�","e",$strw);
$strw = str_replace("�","yo",$strw);
$strw = str_replace("�","j",$strw);
$strw = str_replace("�","z",$strw);
$strw = str_replace("�","i",$strw);
$strw = str_replace("�","y",$strw);
$strw = str_replace("�","k",$strw);
$strw = str_replace("�","l",$strw);
$strw = str_replace("�","m",$strw);
$strw = str_replace("�","n",$strw);
$strw = str_replace("�","o",$strw);
$strw = str_replace("�","p",$strw);
$strw = str_replace("�","r",$strw);
$strw = str_replace("�","s",$strw);
$strw = str_replace("�","t",$strw);
$strw = str_replace("�","u",$strw);
$strw = str_replace("�","f",$strw);
$strw = str_replace("�","h",$strw);
$strw = str_replace("�","tz",$strw);
$strw = str_replace("�","ch",$strw);
$strw = str_replace("�","sh",$strw);
$strw = str_replace("�","sch",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("�","yi",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("�","e",$strw);
$strw = str_replace("�","u",$strw);
$strw = str_replace("�","ya",$strw);
$strw = strtolower($strw);

return $strw;

}


function translit0($strw) {
global $codepage;
$strw = strip_tags($strw);
if (($codepage=="windows-1250")||($codepage=="windows-1252")||($codepage=="windows-1253")||($codepage=="windows-1254")||($codepage=="windows-1255")||($codepage=="windows-1257")) {$strw=iconv($codepage, 'ASCII//TRANSLIT', "$strw");}
$strw = str_replace("&","",$strw);
$strw = str_replace("'","",$strw);
$strw = str_replace("%","_proc",$strw);
$strw = str_replace("`","",$strw);
$strw = str_replace(";","_",$strw);
$strw = str_replace("#","",$strw);
$strw = str_replace("~","",$strw);

$strw = str_replace(chr(0x27),"",$strw);
$strw = str_replace(chr(0x60),"",$strw);
$strw = str_replace(chr(0x80),"d",$strw);
$strw = str_replace(chr(0x90),"d",$strw);
$strw = str_replace(chr(0x81),"g",$strw);
$strw = str_replace(chr(0x82),"",$strw);
$strw = str_replace(chr(0x83),"g",$strw);
$strw = str_replace(chr(0x84),"",$strw);
$strw = str_replace(chr(0x85),"",$strw);
$strw = str_replace(chr(0x86),"",$strw);
$strw = str_replace(chr(0x87),"",$strw);
$strw = str_replace(chr(0x88),"euro",$strw);
$strw = str_replace(chr(0x89),"pr",$strw);
$strw = str_replace(chr(0x8A),"l",$strw);
$strw = str_replace(chr(0x8B),"",$strw);
$strw = str_replace(chr(0x8C),"n",$strw);
$strw = str_replace(chr(0x8D),"k",$strw);
$strw = str_replace(chr(0x8E),"t",$strw);
$strw = str_replace(chr(0x8F),"d",$strw);
$strw = str_replace(chr(0x90),"d",$strw);
$strw = str_replace(chr(0x91),"",$strw);
$strw = str_replace(chr(0x92),"",$strw);
$strw = str_replace(chr(0x93),"",$strw);
$strw = str_replace(chr(0x94),"",$strw);
$strw = str_replace(chr(0x95),"",$strw);
$strw = str_replace(chr(0x96),"",$strw);
$strw = str_replace(chr(0x97),"",$strw);
$strw = str_replace(chr(0x98),"",$strw);
$strw = str_replace(chr(0x99),"",$strw);
$strw = str_replace(chr(0x9A),"l",$strw);
$strw = str_replace(chr(0x9B),"",$strw);
$strw = str_replace(chr(0x9C),"n",$strw);
$strw = str_replace(chr(0x9D),"k",$strw);
$strw = str_replace(chr(0x9E),"t",$strw);
$strw = str_replace(chr(0x9F),"d",$strw);
$strw = str_replace(chr(0xA1),"u",$strw);
$strw = str_replace(chr(0xA2),"u",$strw);
$strw = str_replace(chr(0xA3),"j",$strw);
$strw = str_replace(chr(0xA4),"j",$strw);
$strw = str_replace(chr(0xA5),"g",$strw);
$strw = str_replace(chr(0xA6),"",$strw);
$strw = str_replace(chr(0xA7),"",$strw);
$strw = str_replace(chr(0xA8),"yo",$strw);
$strw = str_replace(chr(0xA9),"c",$strw);
$strw = str_replace(chr(0xAA),"e",$strw);
$strw = str_replace(chr(0xAB),"",$strw);
$strw = str_replace(chr(0xAC),"",$strw);
$strw = str_replace(chr(0xAD),"_",$strw);
$strw = str_replace(chr(0xAE),"r",$strw);
$strw = str_replace(chr(0xAF),"yi",$strw);
$strw = str_replace(chr(0xB0),"",$strw);
$strw = str_replace(chr(0xB1),"",$strw);
$strw = str_replace(chr(0xB2),"i",$strw);
$strw = str_replace(chr(0xB3),"i",$strw);
$strw = str_replace(chr(0xB4),"g",$strw);
$strw = str_replace(chr(0xB5),"m",$strw);
$strw = str_replace(chr(0xB6),"",$strw);
$strw = str_replace(chr(0xB7),"",$strw);
$strw = str_replace(chr(0xB8),"yo",$strw);
$strw = str_replace(chr(0xB9),"num",$strw);
$strw = str_replace(chr(0xBA),"e",$strw);
$strw = str_replace(chr(0xBB),"",$strw);
$strw = str_replace(chr(0xBC),"j",$strw);
$strw = str_replace(chr(0xBD),"j",$strw);
$strw = str_replace(chr(0xBE),"j",$strw);
$strw = str_replace(chr(0xBF),"yi",$strw);

$strw = htmlspecialchars($strw);

$strw = str_replace(";","_",$strw);
$strw = str_replace("`","",$strw);
$strw = str_replace("&","",$strw);
$strw = str_replace("'","",$strw);
$strw = str_replace("%","",$strw);
$strw = str_replace("#","",$strw);
$strw = str_replace(" ","_",$strw);
$strw = str_replace(",","_",$strw);
$strw = str_replace(".","",$strw);
$strw = str_replace("!","",$strw);
$strw = str_replace("-","_",$strw);
$strw = str_replace("`","",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("~","",$strw);
$strw = str_replace("@","",$strw);
$strw = str_replace("\$","",$strw);
$strw = str_replace("}","",$strw);
$strw = str_replace("{","_",$strw);
$strw = str_replace("]","",$strw);
$strw = str_replace("[","_",$strw);
$strw = str_replace("^","",$strw);
$strw = str_replace("*","x",$strw);
$strw = str_replace(";","_",$strw);
$strw = str_replace("+","",$strw);
$strw = str_replace("=","",$strw);
$strw = str_replace(":","",$strw);
$strw = str_replace("(","_",$strw);
$strw = str_replace(")","",$strw);
$strw = str_replace("/","_",$strw);
$strw = str_replace("?","",$strw);
$strw = str_replace("\\","",$strw);
$strw = str_replace("|","_",$strw);
$strw = str_replace("\"","",$strw);
$strw = str_replace("\'","",$strw);
$strw = str_replace("�","a",$strw);
$strw = str_replace("�","b",$strw);
$strw = str_replace("�","v",$strw);
$strw = str_replace("�","g",$strw);
$strw = str_replace("�","d",$strw);
$strw = str_replace("�","e",$strw);
$strw = str_replace("�","yo",$strw);
$strw = str_replace("�","j",$strw);
$strw = str_replace("�","z",$strw);
$strw = str_replace("�","i",$strw);
$strw = str_replace("�","y",$strw);
$strw = str_replace("�","k",$strw);
$strw = str_replace("�","l",$strw);
$strw = str_replace("�","m",$strw);
$strw = str_replace("�","n",$strw);
$strw = str_replace("�","o",$strw);
$strw = str_replace("�","p",$strw);
$strw = str_replace("�","r",$strw);
$strw = str_replace("�","s",$strw);
$strw = str_replace("�","t",$strw);
$strw = str_replace("�","u",$strw);
$strw = str_replace("�","f",$strw);
$strw = str_replace("�","h",$strw);
$strw = str_replace("�","tz",$strw);
$strw = str_replace("�","ch",$strw);
$strw = str_replace("�","sh",$strw);
$strw = str_replace("�","sch",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("�","yi",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("�","e",$strw);
$strw = str_replace("�","u",$strw);
$strw = str_replace("�","ya",$strw);
$strw = str_replace("�","a",$strw);
$strw = str_replace("�","b",$strw);
$strw = str_replace("�","v",$strw);
$strw = str_replace("�","g",$strw);
$strw = str_replace("�","d",$strw);
$strw = str_replace("�","e",$strw);
$strw = str_replace("�","yo",$strw);
$strw = str_replace("�","j",$strw);
$strw = str_replace("�","z",$strw);
$strw = str_replace("�","i",$strw);
$strw = str_replace("�","y",$strw);
$strw = str_replace("�","k",$strw);
$strw = str_replace("�","l",$strw);
$strw = str_replace("�","m",$strw);
$strw = str_replace("�","n",$strw);
$strw = str_replace("�","o",$strw);
$strw = str_replace("�","p",$strw);
$strw = str_replace("�","r",$strw);
$strw = str_replace("�","s",$strw);
$strw = str_replace("�","t",$strw);
$strw = str_replace("�","u",$strw);
$strw = str_replace("�","f",$strw);
$strw = str_replace("�","h",$strw);
$strw = str_replace("�","tz",$strw);
$strw = str_replace("�","ch",$strw);
$strw = str_replace("�","sh",$strw);
$strw = str_replace("�","sch",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("�","yi",$strw);
$strw = str_replace("�","",$strw);
$strw = str_replace("�","e",$strw);
$strw = str_replace("�","u",$strw);
$strw = str_replace("�","ya",$strw);
//$strw = strtolower($strw);

return $strw;

}
?>
