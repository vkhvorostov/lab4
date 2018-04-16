<?
require_once "../inc/common.php";
require_once "../inc/admin_header.php";
?>
<h1>Система администрирования</h1>
<table>
<?
$sql = "select *, date_format(`date_row`,'%d.%m.%Y') as datef from news order by `date_row` desc";
$res = $mysqli->query($sql);
while($data = $res->fetch_assoc()) {
	if ($data['mode'] == 0) {
		$new_mode = 1;
		$mode_str = "деактивировать";
		$class_str = '';
	} else {
		$new_mode = 0;
		$mode_str = "активировать";
		$class_str = ' class="deactivated"';
	}
	?>
	<tr<?=$class_str?>>
		<td><?=$data['datef']?></td>
		<td><?=$data['header']?></td>
		<td>
			<a href="edit.php?id=<?=$data['id']?>">редактировать</a> |
			<a href="mode.php?mode=<?=$new_mode?>&id=<?=$data['id']?>"><?=$mode_str?></a> |
			<a href="delete.php?id=<?=$data['id']?>">удалить</a>
		</td>
	</tr>
	<?php
}
$res->close();
?>
</table>

<?
require_once "../inc/admin_footer.php";
?>