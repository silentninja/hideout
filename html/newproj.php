<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
       <title>New Project!</title>
</head>
<body>
<?php
print "Enter details of your project in given form";//form for project follows
$detlist=<<<HERE
<form action = "projcreate.php"
        method = "post"
				id = "newproj">
				<div>
   <fieldset>
   <label>Enter the name of your project</label>
   <input type="text" id="pname" name="pname"/></br>
   <label>Select the project type</label>
   <select name="ptype">
  <option value="rmc">Robotics/microcontroller</option>
  <option value="Alog">Analog</option>
  <option value="Dig">Digital</option>
  <option value="Mech">mechanical</option>
</select>
</br>
<label>Tags to associate your project with</label>
<input type="textarea" id="tags" name="tags"/>
</br>

</fieldset>
   	
  <input type = "submit"
         value = "Create project" />
         </fieldset>
         </form>
</div>

HERE;
print "$detlist";
   		  
   
?>
</body>
</html>
