<?php
//LAP::$head['html'] = file_get_contents('tmpl/'.GOB::$tmpl.'tool/head.html', true);
//LAP::$body['html'] = file_get_contents('tmpl/'.GOB::$tmpl.'base.html', true);
// head és body html beállítás csak a példa kedvéért van itt (ezek az alapbeállítások)
$fomenu=TOOL::fomenu();
$slide=TOOL::slide();
LAP::$html =TOOL::head();
LAP::$html =LAP::$html.file_get_contents('tmpl/'.GOB::$tmpl.'/base.html', true);
LAP::$html= str_replace('<!--|fomenu|-->',$fomenu, LAP::$html);
LAP::$html= str_replace('<!--|slide|-->',$slide, LAP::$html);
?>