<?

include_once("../inc/common.php");

if ($_POST["save"]) {
	$id = (int)$_POST["id"];
	if ($id) {
		// здесь код для изменения записи в БД
	} else {
		// здесь код для вставки записи в БД
	}
	header("Location: http://" . $_SERVER["SERVER_NAME"] . "/" . dirname($_SERVER["PHP_SELF"]) . "/index.php");
	exit;
}

include_once("../inc/admin_header.php");

$id = (int)$_GET["id"];
if ($id) {
	// здесь код, получающий запись из БД с id = $id и записывающий ее в массив $data
}
?>

<form method="post" action="<?= $_SERVER["PHP_SELF"]?>">
<input type="hidden" name="id" value="<?= $id ?>">
<input type="text" name="header" value="<?= htmlspecialchars($data["header]") ?>">
<!-- допишите здесь нужный код -->
<input type="submit" name="save" value="Сохранить">
</form>
<? 

include_once("../inc/admin_footer.php");

?>