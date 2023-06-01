<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controller/Members.controller.php");

$members = new MembersController();

if (isset($_POST['submit'])) {
  //memanggil add
  $members->add($_POST);
}

else if (!empty($_GET['point'])) {
  $members->showSubs();
}

else if (!empty($_GET['id_hapus'])) {
  $id = $_GET['id_hapus'];
  $members->delete($id);
}

else if (!empty($_GET['id_edit'])) {
  $id = $_GET['id_edit'];
  $members->show($id);
}

else if (!empty($_POST['id'])) {
  $id = $_POST['id'];
  $members->edit($id, $_POST);
}

else{
  $members->index();
}