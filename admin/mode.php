<?

include_once("../inc/common.php");

if (isset($_GET["id"] && isset($_GET["mode"])) {
	// здесь напишите ваш код
}
header("Location: http://" . $_SERVER["SERVER_NAME"] . "/" . dirname($_SERVER["PHP_SELF"]) . "/index.php");

?>