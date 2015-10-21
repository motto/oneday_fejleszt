<?php
session_start();
//ob_start();

// GodMode.{ED7BA470-8E54-465E-825C-99712043E01C}    új mappa és erre átnevezni
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include_once 'definial.php';
include_once 'lib/lang.php';
if(MoConfig::$offline=='igen'){ //offline módban kikapcsolja a weblapot
				if($jogok_gt['stat']!='admin'){die(MoConfig::$offline_message);
				return false;
				}
}

//globális változók-------------------------------------------------------------
class GOB {
	//public static $tmpl=Array('alap'=>'alap'); //alap template
	public static $tmpl='oneday';
	public static $app='home';
	public static $tartalom;
	protected static $user=Array();
	protected static $jog=Array();
	protected static $admin_tomb=array(62);
	protected static $szerzo_tomb=array(228);
	protected static $moderator_tomb=array(247,228);
	static $hiba=array();
	static $param=array();
	public static function get_user($useradat='all'){
		if($useradat=='all'){return self::$user;}else{return self::$user[$useradat];
		}}
}
// adatbázis elérés------------------------------------------------------
include_once DB_FGV;  //adatbázis
$db=DB::connect();
include_once JOGOK; // azzonosítás jogosultságok

//azonosítás jogok--------------------------------------------------
$azonosit= new Azonosit; //session-be írja az useridet vagy nullát

//$_SESSION['userid']=62;
include_once ALTALANOS_FGV;

//tartalom előállítás--------------------------------------

//template becsatolás (alap,json stb) tartalom keret stb kiírás----------------
GOB::$app=session_post_get('app',GOB::$app);
include_once 'app/'.GOB::$app.'/'.GOB::$app.'.php';

class Lap{
public static $html='';
public static $head_tomb=array();//js,css,ogg stb
public static $app_tomb=array();
public static $tool_tomb=array();	
}
echo Lap::$html.'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh';
//echo $file ;

//ob_end_flush();
/*
function szallas_bemutat(){
	$view=file_get_contents('app/motto/view/szallasok2.html', true);
	$view_tomb1=explode('view:stop',$motto_view);
	foreach ($view_tomb1 as $view){
		$tomb1=explode('view:body',$view);
		$view_tomb[$tomb1[0]]=$tomb1[1];
	}
//print_r($view_tomb) ;
	$query =  "SELECT sz.Af_nev,f.Foto_id,v.Af_varosNev FROM odc_szallas sz
INNER JOIN  odc_fotok f ON (sz.Af_id=f.Fokep)
INNER JOIN odc_varosok v ON (v.Af_varosID=sz.Af_telepules) WHERE sz.AF_aktiv='I' GROUP BY sz.Af_id ORDER BY RAND() LIMIT 0,4 ";
	$tomb=DB::assoc_tomb($query);
//print_r($tomb);
	$szallasbemutat=SView::lista($tomb,$view);
	return $szallasbemutat;
}
$szallasbemutat=szallas_bemutat();

$szallasbemutat=szallas_bemutat();
$lapkiir = str_replace('||lista||', $szallasbemutat,$lapkiir );*/
?>

