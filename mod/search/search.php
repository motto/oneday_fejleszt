<?php
class Search extends Gyarthato {
//---ghg
    public function result($Param=array())
    {
        $html= file_get_contents('tmpl/'.GOB::$tmpl.'/mod/search.html', true);
       // $html= str_replace('<!--|menu|-->',$html, $html2);
        return $html;
    }

}