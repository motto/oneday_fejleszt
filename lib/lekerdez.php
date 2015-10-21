<?php			       
$query = "SELECT * FROM odc_szallas ";		

class MoConfig {
public static $felhasznalonev = 'pnet354_motto001';
public static $jelszo = 'motto6814';
public static $adatbazis = 'pnet354_motto001_like';
public static $host = 'localhost';
}

	$db=DB::connect();
	$tomb=$db->assoc_tomb($query)
	foreach ($tomb as $sor){
	foreach ($sor as $key as $value){
	echo $key.':'.$value.',';
	}
	echo '</br>';
	}
	
class DB
{
static public function connect(){
try {
				$db = new PDO("mysql:dbname=".MoConfig::$adatbazis.";host=".MoConfig::$host,MoConfig::$felhasznalonev, MoConfig::$jelszo, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
				//$db->pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
			} catch (PDOException $e) {
				die(GOB::$hiba['pdo']="Adatbazis kapcsolodasi hiba: ".$e->getMessage());
				return false;
			}
	return $db;		
}
static public function parancs($sql){
$sth =self::alap($sql);
}
static public function alap($sql){
global $db;
$sth = $db->prepare($sql);
$sth->execute();
		//GOB::$hiba][]="assoc_tomb: ".$sth->errorInfo(); nem jó!!!
		//tömbhöz nem lehet hozzáfűzni	stringet!!!!!!!!!!!!!!!!!
		$h=$sth->errorInfo();
		//echo 'ffffffffffffffffffffff:'.$h[2].'</br>';
		if(!empty($h[2])){GOB::$hiba['pdo'][]=$sth->errorInfo();	}

return $sth;
}
static public function assoc_tomb($sql){
$sth =self::alap($sql);
 while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
     $eredmeny_tomb[]= $row;
	//$row= $sth->fetchAll();//sorszámozottan is és associatívan is tárolja a mezőket(duplán)
  }
return $eredmeny_tomb;
}
}					