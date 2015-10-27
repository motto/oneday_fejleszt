<?php
$fget='club';
if(!empty($_GET['fget'])){$fget=$_GET['fget'];
    include_once 'app/admin/'.$fget.'.php';}
else{
    class ClubAdmin{
//static  public $data=array();
        public static function view(){
            $html = file_get_contents('app/admin/view/club.html', true);

            $html = str_replace('<!--|header|-->',Tool_S::view('Header') ,$html);
           // $html = str_replace('<!--|tartalom|-->',Tool_S::view('Scroll') ,$html);

            return $html;
        }
    }
//echo 'hgbkehgkejhgekjgkhehkehkkj';Lap::$html= Scroll::view();
    Lap::$html=ClubAdmin::view();




}
?>