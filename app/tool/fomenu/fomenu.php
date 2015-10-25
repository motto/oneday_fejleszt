<?php
class Fomenu {
//---ghg
static public function view($Param=array())
{   $query="SELECT * FROM menu WHERE menu='fomenu'";
    $fomenu_tomb=DB::assoc_tomb($query);
    /*
    $fomenu_tomb[]=array('Home','index.php?app=home');
    $fomenu_tomb[]=array('Rólunk','index.php?app=cikk');
    */
    if(empty($_GET['mid'])){$activ_elem = $fomenu_tomb[0]['id'];}else{$activ_elem = $_GET['mid'];}


foreach ($fomenu_tomb as $menu) {
    $aktiv ='';
    if ($menu['id']== $activ_elem) {$aktiv = 'class="active"';}
        $html=$html.'<li '.$aktiv.'><a href="'.$menu['link'].'&mid='.$menu['id'].'">'.$menu['nev'].'</a></li>';


    }
    return $html;
}

}
