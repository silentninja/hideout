
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html lang="EN" dir="ltr" xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Word Find Puzzle Maker</title>
<link rel = "stylesheet"
      type = "text/css"
      href = "wordFind.css" />

</head>
<body>
<?php

$user=$_SESSION["user"];
$pass=$_SESSION["pass"];
$conn=$_SESSION["con"];
print $user;
print $password;

print <<<HERE
<form action = "wordFind.php"
      method = "post">
<fieldset>
<label>puzzle name</label>
<input type = "text"
       name = "name"
       value = "My Word Find" />

<label>height</label>       
<input type = "text"
             name = "height"
             value = "10"
             size = "5" />
             
<label>width</label>
<input type = "text"
             name = "width"
             value = "10"
             size = "5" />
<label>Word List</label>
<textarea rows="10" cols="60" name = "wordList"></textarea>

<p>Please enter one word per row, no spaces</p>

<button type="submit">
  make puzzle
</button>
</fieldset>
</form>
HERE;
?>
</body>
</html>
