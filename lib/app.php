<?php
class App {
public $appdir='/app';
    function general($app_name){
        include_once $this->appdir.'/'.$app_name.'/'.$app_name.'.php';
        $view=$app_name::general();
        return $view;
    }
}
class App_S {
   public static function general($app_name){
        $app=new App;
        $view=$app->general($app_name);
        return $view;
    }
}

class Tool extends App {
    public $appdir='/app/tool';

}
class Tool_S {
    public static function general($tool_name){
        $tool=new Tool;
        $view=$tool->general($tool_name);
        return $view;
    }
}

class AppTool extends App {
    public $appdir='';
    function general($app_name,$tool_name){
        include_once $this->appdir.'/'.$app_name.'/tool/'.$tool_name.'.php';
        $view=$tool_name::general();
        return $view;
    }
}
class AppTool_S {
    public static function general($tool_name){
        $tool=new AppTool;
        $view=$tool->general($tool_name);
        return $view;
    }
}