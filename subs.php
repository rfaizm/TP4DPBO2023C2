<?php


include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controller/Subs.controller.php");

$subs = new SubsController();

if (isset($_POST['add'])) {
    // add
    $subs->add($_POST);
}

else if (!empty($_GET['id_hapus'])) {
    $id = $_GET['id_hapus'];
    $subs->delete($id);
}

else{
    $subs->index();
}