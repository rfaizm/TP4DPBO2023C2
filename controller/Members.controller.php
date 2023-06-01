<?php

include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Subs.class.php");
include_once("views/Members.view.php");

class MembersController{
    private $members;
    private $subs;

    function __construct(){
        $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
        $this->subs = new Subs(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
        $this->members->open();
        $this->members->getMembers();
        $data = array();
        while($row = $this->members->getResult()){
            array_push($data, $row);
        }
        $this->members->close();
        
        $view = new MembersView();
        $view->tampilan($data);
    }

    //add
    public function showSubs() {
        $this->subs->open();
        $this->subs->getSubs();
        $data = array();
        while($row = $this->subs->getResult()){
            array_push($data, $row);
        }
        $this->subs->close();

        $view = new MembersView();
        $view->optionForm($data);
    }

    public function show($id) {
        $this->members->open();
        $this->subs->open();
        $this->members->getMembersById($id);
        $this->subs->getSubs();
        $data = array(
            'members' => array(),
            'subs' => array(),
        );
        while($row = $this->members->getResult()){
            array_push($data['members'], $row);
        }
        while($row = $this->subs->getResult()){
            array_push($data['subs'], $row);
        }
        $this->members->close();
        $this->subs->close();
        $view = new MembersView();
        $view->tampilanUpdate($data);
    }

    function add($data){
        $this->members->open();
        $this->members->add($data);
        $this->members->close();
        
        header("location:index.php");
    }

    function edit($id){
        $this->members->open();
        $this->members->edit($id);
        $this->members->close();
        
        header("location:index.php");
    }

    function delete($id){
        $this->members->open();
        $this->members->delete($id);
        $this->members->close();
        
        header("location:index.php");
    }
}