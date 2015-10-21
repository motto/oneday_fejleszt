<?php
class Home{
//static  public $data=array();
public static function view(){
   $data['slide']=Tool_S::view('Slide');
$view = file_get_contents('tmpl/'.GOB::$tmpl.'/home.html', true);
$html = str_replace('||slide||', $data['slide'], $view);
return $html;
}
}
Lap::$html= Home::view();