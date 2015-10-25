<?php
class Header {
//---ghg
static public function view($Param=array()){

$html= file_get_contents('tmpl/'.GOB::$tmpl.'/tool/header.html', true);
$html= str_replace('<!--|menu|-->', Tool_S::view('fomenu'), $html);
return $html;
}
}