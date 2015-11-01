<?php
class Lista_S {
//---ghg
    static public function view($html,$data_tomb){

       foreach ($data_tomb as $data){
            $html=$html.TOOL::item_s($html,$data);
        }
        return $html;
    }
    static public function multi_view($html_tomb,$data_tomb){

        foreach ($data_tomb as $data){
         $html=$html_tomb[$data['tip']];
         $html=$html.TOOL::item_s($html,$data);
        }
        return $html;
    }
    static public function tool($data_tomb){
        $html='';
        foreach ($data_tomb as $toolnev=>$param){

            $html=$html.TOOL::$toolnev($param);
        }
        return $html;
    }
}