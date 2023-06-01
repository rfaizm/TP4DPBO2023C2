<?php

include_once("conf.php");
include_once("models/Subs.class.php");
include_once("views/Subs.view.php");

class SubsController{
    private $subs;

    function __construct(){
        $this->subs = new Subs(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->subs->open();
        $this->subs->getSubs();
        $data = array();
        while($row = $this->subs->getResult()){
            array_push($data, $row);
        }

        $this->subs->close();

        $view = new SubsView();
        $view->render($data);
    }

    function add($data){
        $this->subs->open();
        $this->subs->add($data);
        $this->subs->close();
        
        header("location:subs.php");
    }

    function delete($id){
        $this->subs->open();
        $this->subs->delete($id);
        $this->subs->close();
        
        header("location:subs.php");
    }
}