<?php
$fget='club';
if(!empty($_GET['fget'])){$fget=$_GET['fget'];
    include_once 'app/admin/'.$fget.'image_manipulator.php';}
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
                    //$tartalom= Tool_S::view('new');
                    break;
                default:
                    //$param['data']=array('cim'=>'sghfhfdhfdhfg','intro'=>'gh  ffghfhfhfhfgh  fghfdhfdh fd ');
                    $query="SELECT * FROM scroll WHERE pub='1' ";
                    $data_tomb=DB::assoc_tomb($query);
                        $html_tomb['0']='<img src="images/<!--|kep|-->.png" >';
                    $html_tomb['1']=file_get_contents('app/club/view/item.html', true);
                    include 'app/mod/lista/lista.php';
                    //$tartalom= Tool_S::view('lista',$param);
                    $tartalom= LISTA::multi_view($html_tomb,$data_tomb,'szerk');
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