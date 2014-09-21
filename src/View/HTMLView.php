<?php

class HTMLView{
	
	public function echoHTML($body){
		setlocale(LC_ALL, "sv");
		$clock = strftime("%A, den %d %B år %Y. Klockan är [%X]");
		echo "<!DOCTYPE html>
				<meta charset = \'UTF-8'\>
				<link rel='stylesheet' type='text/css' media='all' href='CSS/style.css' />
				<html>
				<body>
				$body
				$clock
				</body>
				</html>";
	}
}