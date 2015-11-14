<?php
//defined( '_MOTTO' ) or die( 'Restricted access' );
/*
Link::kiszed('index.phph=rrr&task=123&h=erfwer&ffg=sdfs','task,h,lll');
Link::kiszed(link,'task,id'); //ha a linkben nincs kérdőjel mögé tesz egy ?gt=0 -t
Link::src_thumb($src)  //képnév elé illeszti a thumb/ -ot
*/

class App
{	public $alias;
	public $param;
	public $futtat='result';
	public $result;
	function __construct($param='')
	{
		$this->general($param);

	}

	public function update($param=array())

	{

		foreach ($param as $key => $value) {
			$this->$key =$value;
		}
	}

	public function general($param='')
	{



		if($param!='')
		{
			if(!is_array($param)){$param=STR::to_tomb($param);}
			$this->alias=$param['alias'];
			if(empty($this->alias)){$this->alias=get_class($this);}
		}
		if(is_array( GOB::$param[$this->alias]))
		{
			$this->update(GOB::$param[$this->alias]);
		}
		if(is_array($param))
		{
			$this->update($param);
		}


		//$futtat=$this->futtat;
		//return $this->$futtat();
	}
	public function result()
	{

	}
}
class GYART{

	static	function Obj($osztaly_nev,$param=''){
		//$$osztaly=new $osztaly_nev;
		$osztaly=new $osztaly_nev($param);
		return $osztaly;
	}

	static	function result($osztaly_nev,$param='')
	{
		$oszt=self::Obj($osztaly_nev,$param);
		$result=$oszt->result();
		return $result;
	}

}


function session_post_get($adatnev,$ertek){
	if($_SESSION[$adatnev]!=null){$ertek=$_SESSION[$adatnev];}
	if($_POST[$adatnev]!=null){$ertek=$_POST[$adatnev];}
	if($_GET[$adatnev]!=null){$ertek=$_GET[$adatnev];}
return $ertek;
}
class STR
{
	static public function to_tomb($string, $tagolo1 = ',', $tagolo2 = ':')
	{
//pl.:$string='class:hhh,id:azon,name:név'
		$tx1 = explode($tagolo1, $string);
		foreach ($tx1 as $mezo) {
			$tx2 = explode($tagolo2, $mezo);
			$tomb[$tx2[0]] = $tx2[1];
		}
		return $tomb;
	}

static public function webnev($string,$hosz=20)
	{ $hungarianABC = array( 'á','é','í','ó','ö','ő','ú','ü','ű','Á','É','Í','Ó','Ö','Ő','Ú','Ü','Ű','&','#','@','$','%','/','\\');
		$englishABC = array( 'a','e','i','o','o','o','u','u','u','A','E','I','O','O','O','U','U','U','e','e','e','e','e','e','e');
		$string=str_replace($hungarianABC, $englishABC, $string);
		$webabc = array( 'a','e','i','o','u','b','c','d','f','g','h','j','k','l','m','n','p','_','q','r','s','z','v','w','x','y','t','0','1','2','3','4','5','6','7','8','9');
		$string = strtolower( $string);
		for ($n = 0; $n < strlen($string); ++$n)
		{if($n<$hosz){if (in_array($string{$n},$webabc)){$webnev=$webnev.$string{$n};}}}
		return $webnev;
	}
}
class TOMB {
static public function to_string($tomb){
foreach($tomb as $key=>$value){
if(is_array($value)){self::to_string($value);}else{$str=$str. $key.': '.$value.'\n </br>';}}
	return $str;
}
static public function kiir($tomb){
	foreach($tomb as $key=>$value){
		if(is_array($value)){self::kiir($value);}else{echo $key.': '.$value.'\n </br>';}}
}
}

//osztályok létrehozását könnítő függvények-------------------------------
class Obj{
//pl.:$param='class:hhh,id:azon,name:név' Obj::gyors($osztaly,$param,'megjelenit')
function gyors($osztaly,$param,$fugveny='',$tagolo1=',',$tagolo2=':') //stringből tölti fel az osztály változókat
{
$$osztaly=new $osztaly;
if(is_array($param)){$param2=$param;}else{
$param2=Tomb::char_to_assoc($param,$tagolo1,$tagolo2);
}
foreach($param as $kulcs => $ertek){$$osztaly->$kulcs=$ertek;}
//ha van függvény azzal hanincs az objektummal tér vissza
if($fugveny=''){return $$osztaly;}else{return $$osztaly->$fugveny();}
}

}


//link kezelő-------------------------------------
class LINK {
// a kép neve elé teszi a /thumb-ot (thumb elérési útját állítja elő
static public function thumb_src($src)
{ 
///$path_parts = pathinfo('/www/htdocs/inc/lib.inc.php');
 //$path_parts['dirname'] /www/htdocs/inc
 //$path_parts['basename'] lib.inc.php
 //$path_parts['extension'] php
 //$path_parts['filename'] lib.inc
 $path_parts = pathinfo($src);
 $ujsrc=$path_parts['dirname'].'/thumb/'.$path_parts['basename'];
 return  $ujsrc;
}


static public function kiszed($link,$kiszed1)
{
if(is_array($kiszed1)){$kiszed=$kiszed1;}else{$kiszed=explode(',',$kiszed1);}
$linktomb1=explode('?',$link);
if(empty($linktomb1[1])){$link2=$link.'?gt=0'; GOB::$hiba['link'][]='Link::kiszed:linkben nincs kérdőjel';
}else{
	$linktomb=explode('&',$linktomb1[1]);
	if(is_array($linktomb))
	{
		foreach($linktomb as $tag)
		{
		$altag=explode('=',$tag);
		if( in_array($altag[0],$kiszed))//if($altag[0]!=$kiszed)
		{}else{
		if($get_resz==''){$kotojel='?';}else{$kotojel='&';}
		$get_resz=$get_resz.$kotojel.$altag[0].'='.$altag[1];}
		}
	}else{$get_resz='?'.$altag[0].'='.$altag[1];}
$link2=$linktomb1[0].$get_resz;	
}

return $link2; 
}

static public function get_cserel($link,$cserel)
{
//$cserel pl.: $cserel='task=ment&id=1'

$kiszed1=explode('&',$cserel);
foreach($kiszed1 as $kiszed2){$kiszed3=explode('=',$kiszed2);$kiszedtomb[]=$kiszed3[0];}
$link2=Link::kiszed($link,$kiszedtomb);
//megnézni hogy vane már get érték és ettől függően vagy ? vagy & jellel fűzni össze
if (strpos($link,'?') === false){$link2=$link2.'?'.$cserel;}else{$link2=$link2.'&'.$cserel;}
//echo $link2;
return $link2; 
}





}
class HIBA {
function tombbe($tip,$hiba)
{
global $hiba;
$hiba[$tip][]=$hiba;
}
function beir($tip,$hiba)
{
global $hiba;
$hiba[$tip][]=$hiba;
}
}


	
?>