<?php
class Head {
//---ghg
static public function view($head_tomb=array()){
  if(empty($head_tomb)){$head_tomb=Lap::$head_tomb}
foreach( $head_tomb as $key=>$value_tomb){
    switch ($key) {
        case 'js_file':
        foreach($value_tomb as $value){
          $html=$html.'<script type="text/javascript" src="'.$value.'">
</script>';
        }
            break;
        case 'css_file':
            foreach($value_tomb as $value){
                $html=$html.'<link rel="stylesheet" href="'.$value.'" media="all" type="text/css">';
            }
            break;
        case 'js':
            $html=$html.'<script type="text/javascript">';
            foreach($value_tomb as $value){
            $html=$html.$value;
            }
            $html=$html.'</script>';
            break;
        case 'css':

        break;
        case 'jquery':
            $html=$html.'<script type="text/javascript">';
            foreach($value_tomb as $value){
            $html=$html.'(function($) {'.$value.'})(jQuery)';
            }
            $html=$html.'</script>';
            break;
    }

    }
return $html;
}
}