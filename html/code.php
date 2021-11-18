<html>
<head>
	<title>
	TeamTrojan - Connect.php testing
	</title>
<h1>
Person Counter
</h1>
<style>
div {
	background-color: lightgrey;
	width: 60px;
	border: 15px;
	padding: 50px;
	margin: 20px;
}
</style>
</head>
<div>
<?php
include 'connect.php'



# This code block selects the values we want (The current Counter value)
$SelSql = "Select * from counterlog.log order by currtime desc limit 1";
$result = $conn->query($SelSql);

#var_dump($result); 
#var_dump returns false or your object varriables

# Have to fetch the associations (fields) before you can use them
$row = $result->fetch_assoc();
$curr = $row["Counter"]; # Setting curr to most recient Counter value


# This code block tells the program what to do when a button (Created below) is pressed
if(isset($_POST['Increase'])) {            # Have to pre-increment/decriment
	$InsSql = "INSERT INTO counterlog.log (Counter) VALUES (".++$curr.")";
	$conn->query($InsSql);
	# echo "<br>Increased count by 1<br>";}
	}
if(isset($_POST['Decrease'])){
	if ($curr > 0){
	$DecSql = "INSERT INTO counterlog.log (Counter) VALUES (".--$curr.")";
	}else {$DecSql = "INSERT INTO counterlog.log (Counter) Values ('0')";
	}
	$conn->query($DecSql);
	# echo "<br>Decreased count by 1<br>";}
	}
if(isset($_POST['Reset'])){
	$RstSql = "INSERT INTO counterlog.log (Counter) VALUES ('0')";
	$conn->query($RstSql);
	# echo "<br>Count reset to 0<br>";
	}

echo "Current Count: ";
echo $curr;  
# Having the count output here updates it after user presses a button
?>
</div>

<form method="post">
	<input type="submit" name="Increase" value="Increase"/>
	<input type="submit" name="Decrease" value="Decrease"/>
	<input type="submit" name="Reset" value="Reset"/>
</form>
</html>

