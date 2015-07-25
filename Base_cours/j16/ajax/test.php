<?php

	include("db.php");

	$sql = "SELECT Name 
			FROM country 
			WHERE Name LIKE :kw";

	$sth = $dbh->prepare($sql);

	$sth->bindValue(":kw", $_GET['kw'] . '%');

	$sth->execute();

	$countries = $sth->fetchAll();

	foreach($countries as $country){
		echo $country['Name'] . '<br />';
	}