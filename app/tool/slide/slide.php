<?php
class Slide {
    //---ghg
    static public function view(){
$imagepath='tmpl/oneday/images/slider/'; //bg2.jpg

$slide_tomb[]=array('ONE DAY CLUB','Az ötcsillagos turisztikai szolgáltatás',$imagepath.'bg1.jpg','#');
$slide_tomb[]=array('A TITOK!!!','Varázslatosan olcsó hetek clubtagognak!',$imagepath.'bg2.jpg','#');
$slide_tomb[]=array('Tekintse meg bemutatkozó videónkat!','',$imagepath.'bg11.jpg','#','https://www.youtube.com/embed/kBXj3zz5Ddk');

       $a=1;
        foreach ($slide_tomb as $slide )
        {

            if(empty($slide[4]))
            {
                $view = file_get_contents('app/tool/slide/view/slide_item.html', true);
            }
            else
            {
                $view = file_get_contents('app/tool/slide/view/slide_video.html', true);
                $view= str_replace('||videosrc||', $slide[4], $view);
            }
            if($a==1){ $view= str_replace('class="item"','class="item active"' , $view);}
            $a++;

            $view= str_replace('||szoveg1||', $slide[0], $view);
            $view= str_replace('||szoveg2||', $slide[1], $view);
            $view = str_replace('||image||', $slide[2], $view);
            $view = str_replace('||href||', $slide[3], $view);
            $html=$html.$view;
        }
        $slide_view = file_get_contents('app/tool/slide/view/slide.html', true);
        $slide_view = str_replace('||slide||', $html, $slide_view);
        return $slide_view;
    }
}