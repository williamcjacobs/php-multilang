# PHP-MultiLang

Simple PHP Library for Building Multi-Language Sites

# SETUP

Download "MultiLang.php" and require it in the head of your PHP file:

    <?php  require 'path/to/MultiLang.php';

Create a new MultiLang object and set the language you will be translating to:

    $ml = new MultiLang();
    $ml->setLanguage('JP');

The `setLanguage` function accepts a two-letter language code as its only parameter.
By default, this stores a `$_SESSION` variable, so on subsequent page loads the language will already be set for the user the function was called for.

The `setLanguage` function, then, could be called from a user login function to set the display language to a user's preference.

To store the language setting as a cookie in the user's browser instead of as a session variable, initialize the `MultiLang` with the first parameter `$use_cookies` set to true: 

`$ml = new MultiLang(true);`

# USAGE

Once the `MultiLang` object is initialized, you can call the `tr` function in-line from your html markup within your php files:


    <h1>
		<?= $ml->tr('Welcome to My Site') ?>!
	</h1>

Calling the `tr` function will look up the lower-case version of the string passed as a parameter (in this case "welcome to my site") in the a dictionary file: 

    languages/[Current Two-Letter Language Code].php

The "languages" folder is created relative to the "MultiLang.php" file.

By default, a dictionary file will be created if it can not be found in the languages folder, and will look something like the following:

	<?php

	$JP=[
    	'example text'=>'例文'
	];

	/** Not Yet Translated **/
	// welcome to my site

The automatic creation of files is disabled when loading the language setting from cookies as a security measure.

Notice that "welcome to my site" was appended to the file as a comment because it was requested but not yet defined in the `$JP` dictionary. This feature is also disabled when loading from cookies, and can be manually disabled by passing `false` as the second parameter of the `MultiLang` object as follows:

	new MultiLang($use_cookies = false, $untranslated_logging = true)


To translate the "welcome to my site" text, simply add it to the `$JP` array as follows:

	$JP=[
    	'example text'=>'例文',
    	'welcome to my site'=>'私のサイトへようこそ'
	];

The above dictionary and code would produce the following html:

	<h1>
		私のサイトへようこそ!
	</h1>


# Working with Variables

Sometimes you may need to work with variables such as names or numbers.
MultiLang supports variables in translations for these purposes using double curly brackets:

	<?php
		$first_name = 'John';
		$last_name = 'Smith';
	?>

	<span>
		<?= $ml->tr('Welcome {{'.$first_name.'}} {{'.$last_name.'}}!') ?>
	</span>

This could then be translated in the dictionary as follows:

	$JP=[
    	'example text'=>'例文',
    	'welcome !'=>'{{2}}・{{1}}さん、ようこそ！'
	];

Which would produce:

	<span>
		Smith・Johnさん、ようこそ！
	</span>

**Note that in the dictionary entry, the key (text being translated from) excludes all double brackets and their content. Keys must also be written in all lower-case and are white-space sensitive.**