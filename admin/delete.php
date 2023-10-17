<?php

include_once("../inc/common.php");

if (isset($_GET["id"])) {
	// здесь напишите ваш код
    $id = (int)$_GET["id"];
    $sql = "delete from news where id=$id";
    $mysqli->query($sql);
}
header("Location: http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . "/index.php");

?>