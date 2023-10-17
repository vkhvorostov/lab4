<?php

include_once("../inc/common.php");

if (isset($_POST["save"])) {
	$id = (int)$_POST["id"];
	$header = $_POST["header"];
	$date = $_POST["date"];
	$anons = $_POST["anons"];
	$text = $_POST["text"];
	if ($id) {
		$sql = "update news set header='$header', date_row='$date', short_text='$anons', full_text='$text' where id=$id";
		$mysqli->query($sql);
	} else {
		// здесь код для вставки записи в БД
		$sql = "insert into news (header, date_row, short_text, full_text) values ('$header', '$date', '$anons', '$text')";
		$mysqli->query($sql);
	}
	header("Location: http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["PHP_SELF"]) . "/index.php");
	exit;
}

include_once("../inc/admin_header.php");

$id = isset($_GET["id"]) ? (int)$_GET["id"] : 0;
if ($id) {
	// здесь код, получающий запись из БД с id = $id и записывающий ее в массив $data
	$res = $mysqli->query("select * from news where id=$id");
	$data = $res->fetch_assoc();
	$res->close();
}
?>

	<form method="post" action="<?= $_SERVER["PHP_SELF"]?>">
		<input type="hidden" name="id" value="<?= $id ?>">

		<p>Заголовок:<br><input type="text" name="header" value="<?php if (isset($data["header"])) echo htmlspecialchars($data["header"]) ?>">

		<p>Дата:<br><input type="text" name="date" value="<?php if (isset($data["date_row"])) echo  htmlspecialchars($data["date_row"]) ?>">

		<p>Анонс:<br><textarea name="anons" cols="60" rows="5"><?php if (isset($data["short_text"])) echo  htmlspecialchars($data["short_text"]) ?></textarea>

		<p>Полный текст:<br><textarea name="text" cols="60" rows="5"><?php if (isset($data["full_text"])) echo  htmlspecialchars($data["full_text"]) ?></textarea>

		<p><input type="submit" name="save" value="Сохранить">

	</form>
<?php

include_once("../inc/admin_footer.php");

?>