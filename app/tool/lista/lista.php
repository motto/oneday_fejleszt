<?php
class Lista {
//---ghg
    static public function view($html,$data_tomb){


        foreach ($data_tomb as $data){
            $html=$html.Tool_S::view($html,$data);
        }
        return $html;
    }
    static public function multi_view($html_tomb,$data_tomb,$tip_mezo='tip'){

        $html1=$html_tomb[$data_tomb[$tip_mezo]];
        $html= self::view($html1,$data_tomb);
        return $html;
    }
}