
<?php
 function connect()
	{
		
				$check=isset($conn);
		if($check)
			{
			return $conn;
			}
			$conn = mysql_connect("localhost:3306", "root", "19950000") or die (mysql_error());
			if(!$conn){
				die('Could not connect: ' . mysql_error());
			}
			mysql_select_db("accounts", $conn);
		return $conn;
		
				
	}

?>
