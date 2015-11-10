<?php
//include_once 'app/tool/item/item.php';
/**
 * megjeleníti a száloda listát
 */
class Szallaskereso{
    public static function view(){

        $id=$_GET['id'];
        if(empty($id)){
 //itemlista előállítása-----------------------
            $o=1;
            if( $_GET['o']!=null){$o=$_GET['o'];}
            $query = "SELECT sz.Af_id,sz.Af_nev,sz.Af_orszag,sz.Af_telepules,COALESCE(GROUP_CONCAT(f.Foto_id SEPARATOR ', '),'nincs') AS fotok,v.Af_varosNev FROM odc_szallas sz INNER JOIN  odc_fotok f ON (sz.Af_id=f.Fokep) INNER JOIN odc_varosok v ON (v.Af_varosID=sz.Af_telepules) WHERE sz.AF_orszag='".$o."' AND sz.AF_aktiv='I' GROUP BY sz.Af_id LIMIT 10";
            $data_tomb=DB::assoc_tomb($query);
            //print_r($data_tomb);
            $tartalom_item=file_get_contents('tmpl/'.GOB::$tmpl.'/tool/item/szallas.html', true);
            $item_lista=TOOL::lista($tartalom_item,$data_tomb);

 //Város vállasztó gombok előállítása-----------
        /*    foreach ($data_tomb as $adat){
                $varosok2[]=$adat['Af_varosNev'];
            }
            $varosok2=array_unique ($varosok);
            foreach ($varosok2 as $adat){
                $varosok[]=array('varos'=>$adat);
            }
            $gomb= '<li><a class="btn btn-default" href="#" data-filter="<!--|varos|-->" > <!--|varos|--></a></li>';
            $gomb_lista=TOOL::lista($gomb,$varosok);*/

 //listázó html adatainak előállítása-------------------
            $tartalom_html=file_get_contents('tmpl/'.GOB::$tmpl.'/szallaskereso.html', true);
            $tartalom['list']=$item_lista;
           // $tartalom['gomb']=$gomb_lista;

 //html előállítása--------------------------------------
            $data['tartalom']=TOOL::item_s($tartalom_html,$tartalom);
            $data['fomenu']=TOOL::fomenu();
            //$data['slide']=TOOL::slide();
            $data['head'] =TOOL::head();
            $html2=file_get_contents('tmpl/'.GOB::$tmpl.'/base.html', true);
            $html= ITEM_S::view($html2, $data);
        }else{}

        return $html;
    }
}
LAP::$html= Szallaskereso::view();
?>