<?php
class Item {
//---ghg
    static public function view($param=array()){

        $html= $param['html'];
        foreach ($param['data'] as $key=>$value){
            $html= str_replace('<!--|'.$key.'|-->',$value, $html);
        }
        return $html;
    }
}