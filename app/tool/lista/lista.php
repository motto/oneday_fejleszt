<?php
class Lista {
//---ghg
    static public function view($param=array()){


        foreach ($param['data_tomb'] as $data){
            $param2['data']=$data;
            $param2['html']= $param['html'];
            Tool_S::view('item'$param2)
        }
        return $html;
    }
}