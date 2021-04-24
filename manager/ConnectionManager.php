<?php

class ConnectionManager
{

	function ConnectToDb()
	{
		return $this->ConnectToLocal ();
		//return $this->ConnectToProd();
	}

	function ConnectToLocal()
	{
		try
		{
			$dns = 'mysql:host=localhost;dbname=projeltest';
			$username = 'root';
			$password = '';
			$LINK = new PDO ($dns, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			$LINK->setAttribute (PDO::ATTR_EMULATE_PREPARES, false);
			$LINK->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			if (! $LINK)
				die ('Could not connect : ' . mysql_error ());
			else
				return $LINK;
		}
		catch (PDOException $ex)
		{
			echo "An error occured : " . $ex->getMessage ();
			return false;
		}
	}
}
?>
