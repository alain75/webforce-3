<?php

	if (preg_match("#^[\p{L}\d_-]*$#u", "aéa-_&54Fds")){
		echo "match !";
	}
	else {
		echo "no match !";
	}