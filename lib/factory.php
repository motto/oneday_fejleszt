<?php//tartalmazza://Universal  osztalyt ami meghívható $param függvénnyel(string vagy tömb)// BaseHtml osztályt ami az alap html nézetet állítja elő az univerzál gyermeke//Auto  ostály az Universal kiterjesztése automatikusan elindítja a result függvényt vagy amit a futtat paraméterben megadunk//OBJ osztaly objektum generalóclass BaseHtml extends Universal{    public $head;    public $body;    public $bodyhead;    public $footer;    public function general($part)    {        if(empty($this->$part))        {            $html = file_get_contents('tmpl/'.GOB::$tmpl.'/part/'.$part.'.html', true);        }        else        {            $html =  $this->$part ;        }        return $html;    }    public function head()    {        $html=$this->general('head');// ha nem akarjuk feltolteni ne tegyünk a html-be <!--|head|--> tagot vagy mielőtt paraméterbe átadjuk cseréljükle        $html = str_replace('<!--|head|-->',MOD::head(LAP::$head) ,$html);        $html= str_replace('<!--|title|-->',GOB::$title, $html2);        return $html;    }    public function bodyhead()    {        $html=$this->general('bodyhead');        $html = str_replace('<!--|bodyhead|-->',MOD::head(LAP::$bodyhead) ,$html);        return $html;    }    public function result()    {        $html='.ljsaflaslkaskf'.$this->head();        $html=$html.$this->general('body');        $html= str_replace('<!--|bodyhead|-->',$this->bodyhead(), $html);        $html= str_replace('<!--|footer|-->',$this->general('footer'), $html);        return $html;    }}class Universal{	public $alias; //a GOB::$param[$alias] tömbbe rakja a paramétereit    public $param; //olyan paraméterek tárolásására amalyeknek nem akarunk külön this változót létrehozni, vagy újabb App objektumot akarunk vele generálni    public $result='this result';    function __construct($param='')    {        $this->general($param);    }    public function this_refress($param=array())    {        foreach ($param as $key => $value) {            $this->$key =$value;        }    }    public function jog()    {        if(!empty(GOB::$param[$this->alias]['jog']))        { //echo 'teszt';            if(!in_array(GOB::$param[$this->alias]['jog'],GOB::$userjog))            {                return false;            }        }        return true;    }    public function update($param='')    {        if($param!='')        {            if(!is_array($param)){$param=STR::to_tomb($param);}            $this->alias=$param['alias'];            if(empty($this->alias)){$this->alias=get_class($this);}            foreach($param as $key=>$value){                GOB::$param[$this->alias][$key]=$value;            }        }        if(is_array( GOB::$param[$this->alias]))        {            $this->this_refress(GOB::$param[$this->alias]);        }    }    public function general($param='')    {        $this->update($param);        if(!$this->jog())        {            $this->result='jogosultság hiba';            GOB::$hiba[$this->alias][]='jogosultság probléma';        }    }}class Auto extends Universal{    public $futtat='result'; // ez a függvény hívódik meg a generál fügvényből és a konstruktorból is    public function general($param='')    {        $this->update($param);        if($this->jog())        {            $futtat=$this->futtat;            $this->$futtat();        }        else        {            $this->result='jogosultság hiba';            GOB::$hiba[$this->alias][]='jogosultság probléma';        }    }    public function result()    {        //echo $this->result;    }}class OBJ{    static	function make($osztaly_nev,$param=''){        //$$osztaly=new $osztaly_nev;        $osztaly=new $osztaly_nev($param);        return $osztaly;    }    static	function result($osztaly_nev,$param='')    {        $oszt=self::Obj($osztaly_nev,$param);        $result=$oszt->result();        return $result;    }}/*class App{//--    public  $appdir = 'app';    public $path ='';    public $appname ='';    function __construct($app_name,$Param=array()){        $this->path = $this->appdir.'/'.strtolower($app_name).'/'.strtolower($app_name).'.php';        $this->appname=$app_name;    }    function view($Param=array())    {       $app_name= $this->appname;       $this->path = $this->appdir.'/'.strtolower($app_name).'/'.strtolower($app_name).'.php';        include_once $this->path;        $view = $app_name::view($Param);        return $view;    }}class App_S{    public static function view($app_name,$Param=array())    {        $app = new App($app_name);        $view = $app->view($Param);        return $view;    }    public static function obj($app_name,$Param=array())    {        $app = new App;        return $app;    }}class Tool extends App{    public $appdir = 'app/mod';}class Tool_S{    public static function view($app_name,$Param=array())    {        $app = new Tool($app_name);        $view = $app->view($Param);        return $view;    }}class AppTool extends App{    public $appdir = '';}class AppTool_S{    public static function general($tool_name,$Param=array())    {        $mod = new AppTool;        $view = $mod->view($tool_name,$Param);        return $view;    }}*/