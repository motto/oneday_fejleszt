<?php
session_start();

// GodMode.{ED7BA470-8E54-465E-825C-99712043E01C}    új mappa és erre átnevezni
error_reporting(E_ERROR | E_WARNING | E_PARSE);

include_once 'definial.php';
include_once 'lib/lang.php';
include_once 'mod/mod.php';
include_once 'app/app.php';
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
	public static $user=Array();
	public static $userjog=Array();
	public static $get_userjog=array();
	static $hiba=array();
	static $param=array();
	public static $admin_mod='tulajdonos'; //Az adminok szerkeszthetnek minden cikket
	//public static $admin_mod='kozos'; // az adminok egymás cikkeit szerkeszthetik

}
//userjogok beálítása ha nem a Jog::fromDB()-t használjuk
GOB::$get_userjog['admin']=array(62);
GOB::$get_userjog['moderator']=array(62,228);
GOB::$uerjog=Jog::fromGOB();
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
public static $bodyhead;//js,css stb
public static $upload_dir='media/user2';
//public static $body;
//public static $tartalom;
//public static $param=array();
//public static $tmpl='';
}


GOB::$app=session_post_get('app',GOB::$app);
include_once 'app/'.GOB::$app.'/'.GOB::$app.'.php';


echo LAP::$html;

?>

