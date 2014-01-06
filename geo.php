<!DOCTYPE html>
<html>
<body>
<p id="demo">Click the button to get your coordinates:</p>
<button onclick="getLocation()">click me</button>
<script type="text/javascript">
function getLocation()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.getCurrentPosition(showPosition);
    }
  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
function showPosition(position)
  {
  document.getElementById("long").value=position.coords.longitude;
	document.getElementById("lat").value=position.coords.latitude;
  }
</script>
<form name="x" method ="post" action="need.php">
<label>name</label>
<input id="name" type="text" name="name">
<label>latitude</label>
<input id="lat" type="text" name="lat">
<input id="long" type="text" name="long">
<input type="submit" value="search">
</form>
</body>
</html>
