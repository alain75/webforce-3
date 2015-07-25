<?php 
	function convertDateToFrench($dateMysql)
	{
		$unix = strtotime($dateMysql);
		$frenchDate = date("d-m-Y H:i", $unix);

		return $frenchDate;
	}

	function ptr($myTable)// array permet de typer la variable
	{
		echo "<pre style='background:#E91E63; color:#FFF;'>";
		print_r($myTable);
		echo "</pre>";
	}