
<?php

class TOOL{
static  public function fomenu(){
        include_once 'app/tool/fomenu.php'
 return GYART::result('Fomenu');
}
    static  public function head(){
        include_once 'app/tool/slide.php'
 return GYART::result('Slide');
}
static  public function slide(){
 include_once 'app/tool/slide.php'
 return GYART::result('Slide');
}
    static  public function scrol(){
        include_once 'app/tool/scroll.php'
 return GYART::result('Scroll');
}

}