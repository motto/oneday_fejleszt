<?phpclass Slide {    //---    static public function view(){$imagepath='tmpl/oneday/images/slider/'; //bg2.jpg$slide_tomb=array('ONE DAY CLUB','Az �tcsillagos turisztikai szolg�ltat�s',$imagepath.'bg1.jpg','#');$slide_tomb=array('A TITOK!!!','Var�zslatosan olcs� hetek clubtagognak!',$imagepath.'bg2.jpg','#');$slide_tomb=array('Tekintse meg bemutatkoz� vide�nkat!','',$imagepath.'bg11.jpg','#','https://www.youtube.com/embed/kBXj3zz5Ddk');        $slide='';        foreach ($slide_tomb as $slide )        {            if(empty($slide[4]))            {                $view = file_get_contents('app/tool/slide/view/slide.html', true);            }            else            {                $view = file_get_contents('app/tool/slide/view/slide_video.html', true);                $view= str_replace('||src||', $slide[4], $view);            }        $view= str_replace('||szoveg1||', $slide[0], $view);        $view= str_replace('||szoveg2||', $slide[1], $view);        $view= str_replace('||image||', $slide[2], $view);        $view= str_replace('||href||', $slide[3], $view);        $slide=$slide.$item;        }        $slide_view = file_get_contents('app/tool/slide/slide_item.html', true);        $slide_view = str_replace('||slide||', $slide, $slide_view);        return $slide_view;    }}