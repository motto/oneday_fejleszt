<?phpclass App{//--    public  $appdir = 'app';    public $path ='';    public $appname ='';    function __construct($app_name,$Param=array()){        $this->path = $this->appdir.'/'.strtolower($app_name).'/'.strtolower($app_name).'.php';        $this->appname=$app_name;    }    function view($Param=array())    {       $app_name= $this->appname;       $this->path = $this->appdir.'/'.strtolower($app_name).'/'.strtolower($app_name).'.php';        include_once $this->path;        $view = $app_name::view($Param);        return $view;    }}class App_S{    public static function view($app_name,$Param=array())    {        $app = new App($app_name);        $view = $app->view($Param);        return $view;    }    public static function general()    {        $app = new App;        return $app;    }}class Tool extends App{    public $appdir = 'app/tool';}class Tool_S{    public static function view($app_name,$Param=array())    {        $app = new Tool($app_name);        $view = $app->view($Param);        return $view;    }}class AppTool extends App{    public $appdir = '';}class AppTool_S{    public static function general($tool_name,$Param=array())    {        $tool = new AppTool;        $view = $tool->view($tool_name,$Param);        return $view;    }}