<?php
require_once('common.php');

if(isset($_POST["status"])){
  if(isset($_POST["id"])){
    $id = $_POST["id"];
  }
  if(isset($_POST["name"])){
    $name = $_POST["name"];
  }
  if(isset($_POST["age"])){
    $age = $_POST["age"];
  }
  if(isset($_POST["work"])){
    $work = $_POST["work"];
  }
  if(isset($_POST["old_id"])){
    $old_id = $_POST["old_id"];
  }
  if($_POST["status"] == "create"){
    if(check_input($id, $name, $age, $work, $error) == false){
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    if($db->idexist($id) == true){
      $error = "既に使用されているIDです";
      header("Location: syain_create.php?error={$error}&name={$name}&age={$age}&work={$work}");
      exit();
    }
    if($db->createsyain($id, $name, $age, $work) == false){
      $error = "DBエラー";
      header("Location: syain_create.php?error={$error}");
      exit();
    }
    header("Location: index.php");
    exit();
  }
  elseif($_POST["status"] == "update"){
    if(check_input($id, $name, $age, $work, $error) == false){
      header("Location: syain_update.php?error={$error}");
      exit();
    }
     if($db->idexist($id) == true && $id !== $old_id){
     $error = "既に使用されているIDです";
      header("Location: syain_update.php?error={$error}");
      exit();
    }
    if($db->updatesyain($id, $name, $age, $work, $old_id) == false){
      $error = "DBエラー";
      header("Location: syain_update.php?error={$error}");
      exit();
    }
    header("Location: index.php");
    exit();
  }
  elseif($_POST["status"] == "delete"){
    if($db->deletesyain($id) == false){
      $error = "DBエラー";
      header("Location: syain_delete.php?error={$error}");
      exit();
    }
    header("Location: index.php");
    exit();
  }
}
?>