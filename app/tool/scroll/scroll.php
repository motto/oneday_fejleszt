<?php
class Scroll{
//static  public $data=array();
public static function view($Param=array()){
    $query="SELECT * FROM scroll WHERE pub='1' ";
    $tomb=DB::assoc_tomb($query);
    $html = '<ul id="scroller">' ;
    foreach($tomb as $item){
       if ($item['szerk']=='0'){$html =$html.'<li><img src="images/'.$item['kep'].'.png" ></li>';}else{
           $elem =file_get_contents('app/club/view/item.html', true);
           $elem= str_replace('<!--|kep|-->',$item['kep'],$elem);
           $elem= str_replace('<!--|szin|-->',$item['szin'],$elem);
           $elem = str_replace('<!--|cim|-->',$item['cim'],$elem);
           $elem = str_replace('<!--|intro|-->',$item['intro'],$elem);
           $html =$html.$elem;
           $html ='<li>'.$html.'</li>'
             }
     }
    $html = $html.'</ul>' ;
return $html;
}
}

