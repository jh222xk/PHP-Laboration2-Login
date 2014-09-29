<?php

class LoginModel{
	
	//Privata variabler..
	private $isTheUserAuthenticated = false;
	private $randomString = "ffsdsfdfsdffsd";
	private $storedUsername;
	
	//Funktion som tar emot filtrerade användarnamn och lösenord.
	public function loginValidation($username, $password)
	{	
		//Specificerar uppgifter för anslutning mot önskad datorbas samt SQL-Query
		$myConnection = new mysqli("127.0.0.1", "appUser", "password", "lab4");
		$sqlCommand = "SELECT * FROM members WHERE User='$username' AND Password='$password'";
	
		//Sparar undan resultatet i variabler
		$result = mysqli_query($myConnection, $sqlCommand);
		$row_count = mysqli_num_rows($result);
		
		//Kontroll för om lösenord och användarnamn var korrekt
		if($row_count > 0){
			$_SESSION["ValidLogin"] = $username;
			$username = $this->storedUsername;
			return true;
		}else{return false;}
	}
	
	//Kontroll för om användaren är inloggad sedan tidigare med sessions eller ej..
	public function getUserIsAuthenticated($userAgent){
		if(isset($_SESSION["ValidLogin"])){
			if(isset($_SESSION["ValidLogin"])){
				$this->isTheUserAuthenticated = true;
				}
				else{return false;}
			}
			return $this->isTheUserAuthenticated;
	}
	
	//Hämtar randomstring variablen som är privat ovan
	public function getRandomString(){
		return $this->randomString;
	}
	
	//Sparar ned tid i exs.txt dokumentet
	public function saveTheCookieTime($time){
		file_put_contents("exs.txt", $time);
	}
	
	public function checkTheCookieValue($cookieValue, $userAgent){
	
		$time = file_get_contents("exs.txt");
		if($time < time()){
			return $this->isTheUserAuthenticated = false;
		}
		else{
			if($this->randomString === $cookieValue)
			{
				$_SESSION["ValidLogin"] = $this->storedUsername;
				$_SESSION["UserAgent"] = $userAgent;
				return $this->isTheUserAuthenticated = true;
			}
		}
	}
	
	//Tar bort en existerande session när användaren loggar ut
	public function destroySession(){
		if(isset($_SESSION["ValidLogin"])){
		unset($_SESSION["ValidLogin"]);
		}
		return $this->isTheUserAuthenticated = false;
	}	
}