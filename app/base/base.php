<?phpclass Base extends Universal{   public $head;   public $body;   public $bodyhead;   public $footer;    public function make($part)    {        if(empty($this->$part))        {            $html = file_get_contents('tmpl/'.GOB::$tmpl.'/'.$part.'.html', true);        }        else        {            $html =  $this->$part ;        }     return $html;    }    public function head()    {        $html=$this->make($this->head);// ha nem akarjuk feltolteni ne tegyünk a html-be <!--|head|--> tagot vagy mielőtt paraméterbe átadjuk cseréljükle        $html = str_replace('<!--|head|-->',MOD::head(LAP::$head) ,$html);        $html= str_replace('<!--|title|-->',GOB::$title, $html2);        return $html;    }    public function bodyhead()    {        $html=$this->make('bodyhead');        $html = str_replace('<!--|bodyhead|-->',MOD::head(LAP::$bodyhead) ,$html);        return $html;    }    public function result()    {        $html=$html.$this->head();        $html=$html.$this->make('body');        $html= str_replace('<!--|bodyhead|-->',$this->bodyhead(), $html);        $html= str_replace('<!--|footer|-->',$this->make('footer'), $html);    return $html;    }}//if($this->result=='jogosultság hiba'){}//$html = str_replace('<!--|header|-->',Tool_S::view('Header') ,$html);//$html = file_get_contents('tmpl/'.GOB::$tmpl.'/scroll.html', true);$fget='home';if(!empty($_GET['fget'])){$fget=$_GET['fget'];}include_once 'app/base/'.$fget.'image_manipulator.php';?>