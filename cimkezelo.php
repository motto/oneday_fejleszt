<?php 
//defined( '_MOTTO' ) or die( 'Restricted access' );
$url_dir1 = substr($_SERVER['REQUEST_URI'], 1);
$url_dir = str_replace('/', "", $url_dir1);
include 'index.php';
/*
if($url=='admin/' or $url=='admin'){
header('Location:http://'.$_SERVER['HTTP_HOST'].'/index.php?com=admin');
}else{
header('Location:http://'.$_SERVER['HTTP_HOST'].'/index.php?com=admin&view=article&id=20&aruhazcim='.$url.'');
}/*


?>