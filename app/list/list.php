<?php 
 function listadiv($adatok){
     $adatok['fotok'] = str_replace(" ", "",$adatok['fotok'] );
     $foto_tomb  =explode(',',$adatok['fotok']);
     rsort($foto_tomb);
    // $adatok['foto']=$foto_tomb[0];
     foreach($foto_tomb as $foto ){
         if(is_file('image/nagykepek500x375/'.$foto.'.jpg')){
         $adatok['foto']=$foto;
         }
     }
     if($adatok['foto']==''){$adatok['foto']='noimage';}
//$szhnev = str_replace(";", "", $szhnev);
 $div='<li class="portfolio-item '.$adatok['Af_varosNev'].'">
                <div class="item-inner">
                    <img src="image/nagykepek500x375/'.$adatok['foto'].'.jpg" alt="">
                    <h5>'.$adatok['Af_nev'].'</h5>
                    <div class="overlay">
                       <div class="overlay">
                        <a class="preview btn btn-danger" ><i class="icon-eye-open"></i></a>              
                    </div>          
                    </div>           
                </div>           
            </li>';


return $div;
}
function varosok($varos){
    $gomb=  '<li><a class="btn btn-default" href="#" data-filter=".'.$varos.'">'.$varos.'</a></li>';
 return $gomb;
}
//GOB::$tartalom = file_get_contents('tmpl/'.GOB::$tmpl.'/list.html', true);
$o=1;
if( $_GET['o']!=null){$o=$_GET['o'];}

$query = "SELECT sz.Af_id,sz.Af_nev,sz.Af_orszag,sz.Af_telepules,COALESCE(GROUP_CONCAT(f.Foto_id SEPARATOR ', '),'nincs') AS fotok,v.Af_varosNev FROM odc_szallas sz
  INNER JOIN  odc_fotok f ON (sz.Af_id=f.Fokep)
  INNER JOIN odc_varosok v ON (v.Af_varosID=sz.Af_telepules) WHERE sz.AF_orszag='".$o."' AND sz.AF_aktiv='I' GROUP BY sz.Af_id";
//SELECT * FROM `table` ORDER BY RAND() LIMIT 0,1

	$tomb=DB::assoc_tomb($query);
	//print_r($tomb);
	foreach ($tomb as $adat){
        $varosok[]=$adat['Af_varosNev'];

	    $lista=$lista.listadiv($adat);
        }
        $varosok=array_unique ($varosok);
        foreach ($varosok as $varos){
        $gomb=$gomb.varosok($varos);
    }
	$list_view=file_get_contents('tmpl/'.GOB::$tmpl.'/list.html', true);
    $view = str_replace("|list|", $lista, $list_view);
    $view  = str_replace("|gomb|", $gomb, $view);
GOB::$tartalom=$view;


?>