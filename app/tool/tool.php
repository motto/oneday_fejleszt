
<?php

class TOOL{
    static  public function lista($html,$data_tomb){
        include_once 'app/tool/lista/lista.php';
        return Lista_S::view($html,$data_tomb);
    }
//$html_tomb=array('tip1'=>$html1,'tip2'=>$html2)
//dat_tomb=array('tip1'=>$data,'tip1'=>$data2,'tip2'=>$data3)
    static  public function lista_multi($html_tomb,$data_tomb){
        include_once 'app/tool/lista/lista.php';
        return Lista_S::multi_view($html_tomb,$data_tomb);
    }
    //$data_tomb=array('toolnev'=>$param,'toolnev2'=>$param2);
    static  public function lista_tool($data_tomb){
        include_once 'app/tool/lista/lista.php';
        return Lista_S::tool($data_tomb);
    }

    static  public function kereso($html,$data){
        include_once 'app/tool/item/item.php';
        return Item_S::view($html,$data);
    }
    static  public function ads($html,$data){
        include_once 'app/tool/item/item.php';
        return Item_S::view($html,$data);
    }
    static  public function item_s($html,$data){
        include_once 'app/tool/item/item.php';
        return Item_S::view($html,$data);
    }
    static  public function item($param){
        include_once 'app/tool/item/item.php';
        return GYART::result('Item',$param);
    }
    static  public function item_query($param){
        include_once 'app/tool/item/item.php';
        return GYART::result('ItemQuery',$param);
    }
static  public function fomenu($param=array()){
        include_once 'app/tool/fomenu/fomenu.php';
 return GYART::result('Fomenu');
}
    static  public function head($param=array()){
        include_once 'app/tool/head/head.php';
 return GYART::result('Head');
}
static  public function slide($param=array()){
 include_once 'app/tool/slide/slide.php';
 return GYART::result('Slide');
}
    static  public function scrol($param=array()){
        include_once 'app/tool/scroll/scroll.php';
 return GYART::result('Scroll');
}

}