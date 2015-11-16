<?php
class Lista_S {
//---ghg
    static public function view($html,$data_tomb){

       foreach ($data_tomb as $data){
            $html2=$html2.TOOL::item_s($html,$data);
        }
        return $html2;
    }
    static public function multi_view($html_tomb,$data_tomb){

        foreach ($data_tomb as $data){
         $html=$html_tomb[$data['tip']];
         $html2=$html2.TOOL::item_s($html,$data);
        }
        return $html2;
    }

    /**
     * listát állít eló a datatömmből, a tömb kulcs a mod név amit meghív, értéke a pramtömb amivel meghívja a mod-t a paramtömbben kell megadni a html-t pl: $datatomb['toolnév']=array('html'=>'','id'=>'2')
     * @param $data_tomb
     * @return string
     */
    static public function tool($data_tomb){
        $html='';
        foreach ($data_tomb as $toolnev=>$param){

            $html=$html.TOOL::$toolnev($param);
        }
        return $html;
    }
}