<?php
function szallas_bemutat(){
$motto_view=file_get_contents('app/motto/view/szallasok.html', true);
$view_tomb1=explode('view:stop',$motto_view);
foreach ($view_tomb1 as $view){
    $tomb1=explode('view:body',$view);
    $view_tomb[$tomb1[0]]=$tomb1[1];
}
$query = "SELECT sz.Af_id,sz.Af_nev,sz.Af_orszag,sz.Af_telepules,f.Foto_id FROM odc_szallas sz WHERE  sz.AF_aktiv='I'
INNER JOIN  odc_fotok f ON (sz.Af_id=f.Fokep)
INNER JOIN odc_varosok v ON (v.Af_varosID=sz.Af_telepules) GROUP BY sz.Af_id LIMIT 0,3 ORDER BY RAND()";
$tomb=DB::assoc_tomb($query);
    print_r($tomb);
    echo '------------';
      foreach ($tomb as $adatok){
          $view=$view_tomb['Szallas_listaz'];
          foreach ($adatok as $adatnev=>$adat){
              $view= str_replace('-|-'.$adatnev.'-|-',$adat,$view );

          }
          $szallasbemutat=$szallasbemutat.$view;
      }
    return '------------';
}
?>