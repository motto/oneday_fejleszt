<?php
//ELL::$adatok= ['pass'=>'pass11��11 1adat', 'pass2'=>'pass2222b 22adat'];
//ELL::REG_EX('R_SZAM','pass2');
//ELL::REG_EX_TOMB(['R_ENG_SZO','R_ENG_TOBB_SZO','R_MAIL'],'pass2');
//$d=preg_match('/^[-]?[\d ]+$/','-44752572');
//echo $d;
//ELL::SAME_2M('MEZO=ERTEK','pass','pass2');
//$p_alias=LANG::RET('PASSWD'); $p2_alias=LANG::RET('PASSWD').' '.LANG::RET('REPEAT'); aliasok
//ELL::SAME_2MEZO('MEZO=ERTEK',['password',[$p_alias,'N']],['password2',$p2_alias]); //alias haszn�lata a hiba�zenethez Az els� csupa nagybet�:"A JELSZ� mez�, �s a Jelsz� m�gegyszer mez�, egyenl� kell hogy legyen!"
//tomb_kiir(GOB::$hiba);
class ELL{
//a param t�mb�t j�rja be a cserel f�ggv�ny, ide kell be�rni a haszn�lt v�ltoz�kat.
static public $param=['min'=>'1','max'=>'250'];
static public $adatok=[];
static public $REG_EX=[
'R_SZAM'=>'/^[-+]?(\d*[.])?\d+$/', //pozit�v vagy negativ sz�m tizeds t�rt is lehet
'R_SZAM_POZ'=>'/^(\d*[.])?\d+$/', //pozit�v sz�m tizedes t�rt is lehet
'R_EGESZ'=>'/^[-]?[\d ]+$/', //pozit�v vagy negat�v eg�sz sz�m
'R_EGESZ_POZ'=>'/^(\d*[.])?\d+$/', //pozit�v eg�sz zs�m
'R_ENG_SZO_KIS'=>'/^[a-z\d]+$/',  // 1 ha csak angol kisbet� �s sz�m van benne sz�k�z sem lehet
'R_ENG_SZO'=>'/^[a-zA-Z\d]+$/',  // 1 ha csak angol kis �s nagybet� �s sz�m van benne sz�k�z sem lehet
'R_ENG_TOBB_SZO'=>'/^[a-zA-Z\d ]+$/',  //csak angol kis �s nagybet� sz�m �s sz�k�z van
'R_ENG_TEXT'=>'/^[a-zA-Z\d \!\"\?\.\:\(\)]+$/',//1 ha csak angol kis �s nagybet� �s sz�m sz�k�z �s !?().:
'R_MIN_MAX'=>'/^.{<<min>>,<<max>>}$/',  
'R_MIN'=>'/^.{<<min>>,}$/',  
'R_MAX'=>'/^.{1,<<max>>}$/',  
'R_HU_SZO'=>'/^[a-zA-Z\d����������������]+$/',  // eng_szo plusz �kezetesek
'R_HU_TOBB_SZO'=>'/^[a-zA-Z\d ����������������]+$/', //eng_tobb_szo plusz �kezetesek
'R_HU_TEXT'=>'/^[a-zA-Z\d \!\"\?\.\:\(\)����������������]+$/',//eng_text plusz 
'R_MAIL'=>'/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/'//1 ha email
];
//1 string mez�t hasonl�t param�terhez hosszabb r�videbb-------------------------
static function STR_HOSSZ($algo,$mezonev1,$param,$param2=''){
if(is_array($mezonev1)){$mezonev=$mezonev1[0];$alias=$mezonev1[1];}
else{$mezonev=$mezonev1;$alias=$mezonev1;}
switch ($algo) {
    case 'R_MIN': $d=preg_match('/^.{'.$param.',}$/',self::$adatok[$mezonev]);
				$lang_param=[$alias,$param];break;
    case 'R_MAX':$d=preg_match('/^.{0,'.$param.',}$/',self::$adatok[$mezonev]);
				$lang_param=[$alias,$param];break;
    case 'R_MIN_MAX':
	$hosz=strlen(self::$adatok[$mezonev]);
	//echo '$hosz'.$hosz.$param;
	if($hosz>=$param and $hosz<=$param2){$d=1;}
	//$d=preg_match('/^.{'.$param.','.$param2.',}$/',self::$adatok[$mezonev]);
	$lang_param=[$alias,$param, $param2];break;
}
if($d!=1)GOB::$hiba['ELL'][]=LANG::RET($algo,$lang_param);
}
static function TOBB_STR_HOSSZ($algo,$mezonev_tomb,$param,$param2=''){
foreach($mezonev_tomb as $mezonev){
self::STR_HOSSZ($algo,$mezonev,$param,$param2);
}
}

//----------------------------------------------------------
static function SAME_2MEZO($algo,$mezonev1,$mezonev21){//1 mez�t hasonl�t param�terhez
if(is_array($mezonev1)){$mezonev=$mezonev1[0];$alias=$mezonev1[1];}
else{$mezonev=$mezonev1;$alias=$mezonev1;}
if(is_array($mezonev21)){$mezonev2=$mezonev21[0];$alias2=$mezonev21[1];}
else{$mezonev2=$mezonev21;$alias2=$mezonev21;}

if(isset(self::$adatok[$mezonev])){$a=self::$adatok[$mezonev];}else{$a=0;}
if(isset(self::$adatok[$mezonev2])){$ertek=self::$adatok[$mezonev2];}else{$ertek=0;}
//echo $a.'----'.$ertek;
switch ($algo) {
      case 'MEZO>ERTEK': if($a>$ertek){$d=1;};break;
    case 'MEZO<ERTEK': if($a<$ertek){$d=1;};break;
	case 'MEZO>=ERTEK': if($a>=$ertek){$d=1;};break;
    case 'MEZO<=ERTEK': if($a<=$ertek){$d=1;};break;
    case 'MEZO=ERTEK': if($a==$ertek){$d=1;};break;
}
if(!$d==1)GOB::$hiba['ELL'][]=LANG::RET($algo,[$alias,$alias2]);
}
static function SAME_MEZO_ERTEK($algo,$mezonev1,$ertek){//1 mez�t hasonl�t param�terhez
if(is_array($mezonev1)){$mezonev=$mezonev1[0];$alias=$mezonev1[1];}
else{$mezonev=$mezonev1;$alias=$mezonev1;}
if(isset(self::$adatok[$mezonev])){$a=self::$adatok[$mezonev];}else{$a=0;}
switch ($algo) {
    case 'MEZO>ERTEK': if($a>$ertek){$d=1;};break;
    case 'MEZO<ERTEK': if($a<$ertek){$d=1;};break;
	case 'MEZO>=ERTEK': if($a>=$ertek){$d=1;};break;
    case 'MEZO<=ERTEK': if($a<=$ertek){$d=1;};break;
    case 'MEZO=ERTEK': if($a==$ertek){$d=1;};break;
}
if(!$d==1)GOB::$hiba['ELL'][]=LANG::RET($algo,[$alias,$ertek]);
}
static function SAME_TOBBMEZO_ERTEK($algo,$mezonev_tomb,$ertek){//1 mez�t hasonl�t param�terhez
foreach($mezonev_tomb as $mezonev){
self::SAME($algo,$mezonev,$ertek);
}
}

static function cserel($cserelendo){//behelyettes�ti a regexet a param t�mb �rt�keivel
foreach(self::$param as $key=>$value){
$cserelt = str_replace("<<$key>>", $value,$cserelendo);
return $cserelt;
}}
static function param_beir($param){//friss�ti a parat�mb�t
foreach($param as $key=>$value){
self::$param[$key] =$value;
}}

static function REG_EX($reg_ex,$mezonev1){
if(is_array($mezonev1)){$mezonev=$mezonev1[0];$alias=$mezonev1[1];}
else{$mezonev=$mezonev1;$alias=$mezonev1;}
$d=preg_match(self::$REG_EX[$reg_ex],self::$adatok[$mezonev]); //regexel vizsg�l
if(!$d)GOB::$hiba['ELL'][]=LANG::RET($reg_ex,$alias); //ha hib�t tal�l be�rja a GOB::hiba t�mbbe
//echo $adatok[$mezonev].$d;
return $d; // regex vizsgalat eredm�nye 0 vagy 1
}
static function REG_EX_TOMB($reg_ex_tomb,$mezonev){
//echo '----------'.$mezonev;
foreach($reg_ex_tomb as $reg_ex){
$dd=self::REG_EX($reg_ex,$mezonev);
if($dd){$d++;}
}
return $d; // regex vizsgalat eredm�nye 0 vagy 1
}
}
?>
