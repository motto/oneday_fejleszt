
<?php

class TOOL{
    static  public function item($param){
        include_once 'app/tool/item/item.php';
        return GYART::result('Item',$param);
    }
    static  public function item_query($param){
        include_once 'app/tool/item/item.php';
        return GYART::result('ItemQuery',$param);
    }
static  public function fomenu(){
        include_once 'app/tool/fomenu/fomenu.php';
 return GYART::result('Fomenu');
}
    static  public function head(){
        include_once 'app/tool/head/head.php';
 return GYART::result('Head');
}
static  public function slide(){
 include_once 'app/tool/slide/slide.php';
 return GYART::result('Slide');
}
    static  public function scrol(){
        include_once 'app/tool/scroll/scroll.php';
 return GYART::result('Scroll');
}

}