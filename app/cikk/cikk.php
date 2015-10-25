<?php
class Cikk{
//static  public $data=array();
    public static function view(){
        $id=$_GET['id'];
        $query="SELECT cim,kep,text FROM cikk WHERE id='".$id."'";
        $data_tomb=DB::assoc_sor($query);
       // print_r($data_tomb);
        $tartalom=file_get_contents('tmpl/'.GOB::$tmpl.'/cikk.html', true);
        foreach ($data_tomb as $key=>$value){

            $tartalom= str_replace('<!--|'.$key.'|-->',$value ,$tartalom);
        }

        $html = file_get_contents('tmpl/'.GOB::$tmpl.'/alap.html', true);
        $html = str_replace('<!--|head|-->',Tool_S::view('Head') ,$html);
        $html = str_replace('<!--|header|-->',Tool_S::view('Header') ,$html);
        $html = str_replace('<!--|tartalom|-->',$tartalom ,$html);
        return $html;
    }
}
Lap::$html= Cikk::view();
?>