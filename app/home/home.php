<?php
//LAP::$head['html'] = file_get_contents('tmpl/'.GOB::$tmpl.'mod/head.html', true);
//LAP::$body['html'] = file_get_contents('tmpl/'.GOB::$tmpl.'base.html', true);
// head és body html beállítás csak a példa kedvéért van itt (ezek az alapbeállítások)
include_once 'app/mod/item/item.php';
class Home{
//static  public $data=array();
    public static function view(){

        $data['fomenu']=TOOL::fomenu();
        $data['tartalom']=TOOL::slide();
        $data['head'] =TOOL::head();
        $html=file_get_contents('tmpl/'.GOB::$tmpl.'/base.html', true);
        $html= ITEM_S::view($html, $data);
        return $html;
    }
}
LAP::$html= HOME::view();
?>