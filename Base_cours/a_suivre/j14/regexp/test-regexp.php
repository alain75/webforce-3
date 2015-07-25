<?php

	//$yearRegexp = "/^\d{4}$/";
	//$yearRegexp = "/^[0-9]{4}$/";

	$yearRegexp = "/^[1-2][0-9]{3}$/";

	$emailRegexp = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9_-]+\.[a-zA-Z]{2,}$/i";

	//$usernameRegexp = "/^[a-zA-Z0-9._-]{2,100}$/";
	$usernameRegexp = "/^[\p{L}0-9._-]{2,100}$/u";


	if (preg_match($usernameRegexp, "djasfl-_éeê")){
		echo "match";
	}
	else {
		echo "no match";
	}