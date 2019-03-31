<?php

include('conn.php');

if(isset($_POST["action"]))
{
	if($_POST["action"] == "insert")
	{
		$query = "
		INSERT INTO tbl_sample (first_name, last_name) VALUES ('".$_POST["fname"]."', '".$_POST["lname"]."')
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Inserted...</p>';
	}
	if($_POST["action"] == "get_data")
	{
		$query = "
		SELECT * FROM tbl_sample WHERE id = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll();
		foreach($result as $row)
		{
			$output['first_name'] = $row['first_name'];
			$output['last_name'] = $row['last_name'];
		}
		echo json_encode($output);
	}
	if($_POST["action"] == "update")
	{
		$query = "
		UPDATE tbl_sample 
		SET first_name = '".$_POST["fname"]."', 
		last_name = '".$_POST["lname"]."' 
		WHERE id = '".$_POST["id"]."'
		";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Updated</p>';
	}
	if($_POST["action"] == "delete")
	{
		$query = "DELETE FROM tbl_sample WHERE id = '".$_POST["id"]."'";
		$statement = $connect->prepare($query);
		$statement->execute();
		echo '<p>Data Deleted</p>';
	}
}

?>