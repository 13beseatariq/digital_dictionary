<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Dictionary</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/bootstrap.css">
<script src="bootstrap/bootstrap.min.js"> </script>
<script src="bootstrap/jquery-2.1.4.min.js"> </script>

<style>
span
{
	font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
	font-size:18px;
}
</style>
</head>

<body>
    <div class="row" align="center" style="padding-top:50px">
        <div class="col-lg-12">
            <form name="dict_form" action="" method="post">
                <input type="text" name="search" class="btn btn-info" size="50" placeholder="Enter Word"><br><br>
                <input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Search&nbsp;&nbsp;&nbsp;&nbsp;"  class="btn btn-success">
            </form>
        </div>
    </div>

<?php
/*
if (isset($_POST["search"]))
{
	$str = file_get_contents('dictionary.json');
	$json = json_decode($str, true); // decode the JSON into an associative array
	if (array_key_exists($_POST["search"], $json))
	{
		$word = $_POST["search"];
		echo("<h3 align='center'>".$json["$word"]."</h3>");
	}
	else
	{
		echo ("<h3 align='center'>"."Does not exist"."</h3>");	
	}
}
*/

if (isset($_POST["search"]))
{
//	echo ("I am in ");
$str = file_get_contents('dictionary.json');
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($str, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
$keys[] = ("");
$search = $_POST["search"];
foreach ($jsonIterator as $key => $val) 
{
	if (strpos ($key,strtoupper($search))!=NULL)
	{
		echo ("<span style='font-weight:bold'>".$key.":</span> ".$val."<br>");
	}
	//echo strrpos($key, $search);
}
//$word = "$keys[1]";
//echo ($word);
//echo strpos("".$word,"di");
//echo (strpos ($word,"d"));
}

?>



</body>
</html>