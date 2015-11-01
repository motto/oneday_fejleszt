<?php
//include_once 'app/tool/item/item.php';
class Szallaskereso{
    public static function view(){

        $id=$_GET['id'];
        if(empty($id)){
 //itemlista előállítása-----------------------
            $query = "SELECT sz.Af_id,sz.Af_nev,sz.Af_orszag,sz.Af_telepules,f.Foto_id FROM odc_szallas sz WHERE  sz.AF_aktiv='I'
INNER JOIN  odc_fotok f ON (sz.Af_id=f.Fokep)
INNER JOIN odc_varosok v ON (v.Af_varosID=sz.Af_telepules) GROUP BY sz.Af_id  ORDER BY RAND()";
            $data_tomb=DB::assoc_tomb($query);
            $tartalom_item=file_get_contents('tmpl/'.GOB::$tmpl.'/tool/item/szallas.html', true);
            $item_lista=TOOL::lista($tartalom_item,$data_tomb);

 //Város vállasztó gombok előállítása-----------
            foreach ($data_tomb as $adat){
                $varosok[]['varos']=$adat['Af_varosNev'];
            }
            $varosok=array_unique ($varosok);
            $gomb= '<li><a class="btn btn-default" href="#" data-filter="<!--|varos|-->" > <!--|varos|--></a></li>';
            $gomb_lista=TOOL::lista($gomb,$varosok);

 //listázó html adatainak előállítása-------------------
            $tartalom_html=file_get_contents('tmpl/'.GOB::$tmpl.'/szallaskereso.html', true);
            $tartalom['list']=$item_lista;
            $tartalom['gomb']=$item_lista;

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