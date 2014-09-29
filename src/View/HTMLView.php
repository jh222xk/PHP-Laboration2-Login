<?php

require_once 'CurrentDateTime.php';

class HTMLView{
	
	public function echoHTML($body){
		$currentTime = new \view\CurrentDateTime();
		echo "<!DOCTYPE html>
				<html>
				<head>
					<meta charset='utf-8'>
					<link rel='stylesheet' type='text/css' media='all' href='CSS/style.css' />
				</head>
				<body>
				$body
				" . $currentTime->getCurrentDateTime() . "
				</body>
				</html>";
	}
}