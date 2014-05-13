<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>

<?php
require "class.File.php";
if (file_exists("example.txt")){
	$file = new File();
	$file->loadFile("example.txt");
	$fileContents = $file->getContents();
}else {
	$fileContents = "";
}
if ($_POST){
	$text = $_POST["text"];
	$file = new File($text);
	$file->saveFile("example.txt");
	$fileContents = $text;
}
?>

<form action="" method="post">
	<textarea name="text" cols="30" rows="10"><?php echo htmlspecialchars($fileContents); ?></textarea><br />
	<button type="submit">Kaydet</button>
</form>

</body>
</html>
