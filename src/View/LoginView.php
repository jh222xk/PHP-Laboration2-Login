<?php 

	class LoginView{
	
	private $username;
	private $password;
	private $message;

	public function ViewLogin(){
		$returnViewLogInHTML = "<h2>Laborationskod för jh222vp</h2>
								<h3>Du är inte inloggad</h3>
								<p>$this->message</p>
								<form method='post' action='?Login'>
								Användarnamn: <input type='text' name='username' value='$this->username'>
								Lösenord: <input type='password' name='password'>
								Håll mig inloggad <input type='checkbox' name='check'>
								<input type='submit' value='Logga in' name='submit'>
								</form>";
							
		return $returnViewLogInHTML;
	}
	
	//Funktion som kontrollerar om användarnamn och lösenord är satt
	//samt sparar unden dessa..
	public function getInformationFromUser(){
		$usernameValue = $_POST['username'];
		$passwordValue = $_POST['password'];

		if(isset($usernameValue)){
			$this->username = $_POST['username'];
		}

		if(isset($passwordValue)){
			$this->password = $_POST['password'];
		}
	}
	
	//Funktion som lyssnar/hämtar knapptrycket "login"
	public function getSubmit(){
		if(isset($_POST['submit'])){
			return true;
		}else{
			return false;}
	}
	
	//Sätter username i den privata variabeln ovan
	public function getUsername(){
	return $this->username;
	}
	
	//Sätter password i den privata variabeln ovan
	public function getPassword(){
	return $this->password;
	}
	
	//Kontrollerar om något av fälten är tomma och sparar sedan undan felmeddelandet
	//i message variabeln som tillslut skrivs ut.
	public function logInFailed($username, $password){
	if($username === ""){
		$this->message = "Användarnamn saknas";}
	else if($password === ""){
		$this->message = "Lösenord saknas";
	}
	else{
		$this->message = "Felaktigt användarnamn och/eller lösenord";}
	}
	
	//Meddelande som talar om att inloggningen lyckades.
	public function LogInWasSuccessful(){
	return $this->message = "Inloggning lyckades";
	}
	
	//Sätter meddelandet
	public function displayMessage($message){
	$this->message = $message;
	}
	
	public function stayLoggedIn(){
		if(isset($_POST['check'])){
			return true;
		}else{return false;}
	}	
}