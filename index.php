<?php
session_start();

// GodMode.{ED7BA470-8E54-465E-825C-99712043E01C}    új mappa és erre átnevezni
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include_once 'definial.php';
include_once 'lib/lang.php';
include_once 'app/tool/tool.php';
if(MoConfig::$offline=='igen'){ //offline módban kikapcsolja a weblapot
				if($jogok_gt['stat']!='admin'){die(MoConfig::$offline_message);
				return false;
				}
}

//globális változók-------------------------------------------------------------
class GOB {
	//public static $tmpl=Array('alap'=>'alap'); //alap template
	public static $tmpl='oneday';
	public static $title='Oneday club';
	public static $app='home';
	//public static $tartalom;
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

class LAP{
public static $html='';
public static $head;//js,css,ogg stb
public static $body;
public static $tartalom;
public static $upload_dir='media/user2';
public static $param=array();
//public static $tmpl='';
}


GOB::$app=session_post_get('app',GOB::$app);
include_once 'app/'.GOB::$app.'/'.GOB::$app.'.php';


echo LAP::$html;

?>

