<?php
$fget='club';
if(!empty($_GET['fget'])){$fget=$_GET['fget'];
    include_once 'app/admin/'.$fget.'.php';}
else{
    class ClubAdmin{

//static  public $data=array();
        public static function view(){
            switch ($_GET['task']) {
                case 'edit':
                    //$tartalom= Tool_S::view('edit');
                    $tartalom=' edit';
                    break;
                case 'new':
                    $tartalom= Tool_S::view('new');
                    break;
                default:
                    //$param['data']=array('cim'=>'sghfhfdhfdhfg','intro'=>'gh  ffghfhfhfhfgh  fghfdhfdh fd ');
                    $query="SELECT * FROM scroll WHERE pub='1' ";
                    $param['data_tomb']=DB::assoc_tomb($query);

                    $param['html']=file_get_contents('app/club/view/item.html', true);
                    $tartalom= Tool_S::view('lista',$param);
            }
            $html = file_get_contents('app/admin/view/club.html', true);
            $html = str_replace('<!--|tartalom|-->',$tartalom ,$html);
            return $html;
        }
    }
//echo 'hgbkehgkejhgekjgkhehkehkkj';Lap::$html= Scroll::view();
    Lap::$html=ClubAdmin::view();




}
?>