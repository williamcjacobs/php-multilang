<?php

require '../MultiLang.php';

$ml = new MultiLang();
$ml->setLanguage('JP');

?>
<!DOCTYPE html>

<html>

<head>
	
	<title>Translation <?= $ml->tr('Test') ?> | PHP-MultiLang</title>

	<script src='../MultiLang.js'></script>

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

	<br><br><br>

	<label for="fName">First Name</label><br>
	<input type="text" name="fName">
	
	<br><br>fName

	<label for="lName">Last Name</label><br>
	<input type="text" name="lName">

	<br><br>

	<button type="button" onclick="say_hello();">
		Say Hello
	</button>
	
	<script>

		var ml = new MultiLang('../api.php');
			ml.setLanguage('JP');


		function say_hello(){

			var fName = document.querySelector('[name="fName"]').value,
				lName = document.querySelector('[name="lName"]').value;

			ml.tr('Hello there {{'+fName+'}} {{'+lName+'}}', function(str, translated){

				alert((translated? 'Translated Successfully: ':'No Translation Available: ')+str);

			});

			

		}
			

	</script>

</body>

</html>