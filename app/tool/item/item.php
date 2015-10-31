<?php
class ITEM extends Gyarthato
{   public $html;
    public $head=array();
    public $body_head=array();
    public function result()
    {
        foreach ($this->body_head as $key=>$value){
            $html= str_replace('<!--|'.$key.'|-->',$value, $html);
        }

    }
}

class ItemS {
//---ghg
    static public function view($html,$data){
    foreach ($data as $key=>$value){
        $html= str_replace('<!--|'.$key.'|-->',$value, $html);
    }
    return $html;
}
    static public function append($html,$append)
    {
        $html= str_replace('|tartalom|', $html,$append);
        return $html;
    }

        static public function view_append($html,$data,$append){
        $html= self::append($html,$append);
        $html= self::view($html,$data);
            return $html;
    }
    static public function dom($html_tomb){
        foreach ( $html_tomb  as $tomb){
            $html= self::append($html,$tomb);
        }
        return $html;
    }

    static public function view_dom($html_tomb,$data){

        $html= self::dom($html_tomb,$append);
        $html= self::view($html,$data);
        return $html;
    }
}