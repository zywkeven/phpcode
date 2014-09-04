<?php
include "../Ajax.php";
$ajax = new Ajax();
?>

<html>
<head>
<title>My Sample In Place Editor</title>

<?=$ajax->js('../js/');?>
<style>

form.inplaceeditor-form { /* The form */
}

form.inplaceeditor-form input[type="text"] { /* Input box */
}

form.inplaceeditor-form textarea { /* Textarea, if multiple columns */
}

form.inplaceeditor-form input[type="submit"] { /* The submit button */
  margin-left:1em;
}

form.inplaceeditor-form a { /* The cancel link */
  margin-left:1em;
}

</style>
</head>
<body>

<p id="editme">Click me, click me!</p>

<!-- On the array bellow you can set more options. See the User Guide -->

<?=$ajax->in_place_editor('editme',array('url' => 'example_inplace_editor_data.php'));?>

</body>
</html>