<?php
class Scroll{
//static  public $data=array();
public static function view($Param=array()){
    $query="SELECT * FROM scroll ";
    $tomb=DB::assoc_tomb($query);
    $html = '<ul>' ;
    foreach($tomb as $item){
       if ($item['szerk']=='0'){$html =$html.'<li><img src="images/'.$item['kep'].'.png" ></li>';}else{
           $html = file_get_contents('app/tool/scroll/view/item.html', true);
           $html = str_replace('|kep|',$item['kep'],$html);
           $html = str_replace('|szin|',$item['szin'],$html);
           $html = str_replace('|cim|',$item['cim'],$html);
           $html = str_replace('|intro|',$item['intro'],$html);}
    }
    $html = '</ul>' ;
return $html;
}
}

