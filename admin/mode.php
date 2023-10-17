<?php

include_once("../inc/common.php");

if (isset($_GET["id"]) && isset($_GET["mode"])) {
	// здесь напишите ваш код
    $mode = (int)$_GET["mode"];
    $id = (int)$_GET["id"];
    $sql = "update news set mode=$mode where id=$id";
    $mysqli->query($sql);
}
header("Location: http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . "/index.php");

?>