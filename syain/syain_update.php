<?php
require_once('common.php');
$id = $_GET["id"];
$member = $db->getsyain($id);
show_top("社員情報の編集");
show_update($member);
show_down(true);
?>