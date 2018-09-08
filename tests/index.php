<?php

require '../MultiLang.php';

$ml = new MultiLang();
$ml->setLanguage('JP');

?>
<!DOCTYPE html>

<html>

<head>
	<title>Translation <?= $ml->tr('Test') ?></title>
</head>

<body>

	<span>
		This is my <?= $ml->tr('Example Text') ?>
	</span>

	<br><br>

	<span>
		<?= $ml->tr('Design by {{William}} {{Jacobs}}') ?>
	</span>

	<br><br>

	<span>
		<?= $ml->tr('Untranslated Text') ?>
	</span>

</body>

</html>