<?php
class Fomenu {
//---ghg
static public function view($Param=array()){

$html= file_get_contents('tmpl/'.GOB::$tmpl.'/tool/fomenu.html', true);
$html= str_replace('<!--|menu|-->', TOOL:::view('fomenu'), $html);
return $html;
}
}