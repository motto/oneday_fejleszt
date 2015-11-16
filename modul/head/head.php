<?php
class Head extends  Gyarthato{
public function result(){
$head_tomb=LAP::$head;
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
    $html2= LAP::$head['html'];
   $html2= str_replace('<!--|head|-->',$html, $html2);
   $html2= str_replace('<!--|title|-->',GOB::$title, $html2);

return $html2;
}
}