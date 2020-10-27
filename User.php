<?php
include_once 'Account.php';
class User implements Account{
	private $fname;
	private $sname;
	private $email;
	private $city;
	private $password;
	private $bio;
	private $image;
	//public $pdo;
	private $oldpass;
	private $newpass;
	private $username;
	private $confirm;

	function _construct($fn, $sn, $em,$lo, $pa){
		$this->$fname = $fn;
		$this->sname = $sn;
		$this->$email = $em;
		$this->$location = $lo;
		$this->$password = $pa;
	}

	function setFname($na){
		$this->fname = $na;
	}
	function getFname(){
		return $this->fname;
	}
	function setSname($na){
		$this->sname = $na;
	}
	function getSname(){
		return $this->sname;
	}
	function setEmail($em){
		$this->email = $em;
	}
	function getEmail(){
		return $this->email;
	}
	function setCity($lo){
		$this->city = $lo;
	}
	function getCity(){
		return $this->city;
	}
	function setPassword($pa){
		$this->password = $pa;
	}
	function getPassword(){
		return $this->password;
	}

	function setBio($bio){
		$this->bio = $bio;
	}
	function getBio(){
		return $this->bio;
	}

	function setImage($im){
		$this->image = $im;
	}
	function getImage(){
		return $this->image;
	}

	function setNewPass($np){
		$this->newpass = $np;
	}
	function getNewPass(){
		return $this->newpass;
	}

	function setOldPass($op){
		$this->oldpass = $op;
	}
	function getOldPass(){
		return $this->oldpass;
	}

	function setUsername($un){
		$this->username = $un;
	}
	function getUsername(){
		return $this->username;
	}
	function setConfirmPass($cp){
		$this->confirm = $cp;
	}
	function getConfirmPass(){
		return $this->confirm;
	}

	public function register($pdo){
		$hashedPassword = password_hash($this->getPassword(), PASSWORD_DEFAULT);
		try{
			//prepare a query
			$stmt = $pdo->prepare("INSERT INTO user_details (First_name, Second_name, Email_address, City, Password, Profile_image, Bio) VALUES (?,?,?,?,?,?,?)");
			$stmt->execute([$this->getFname(),$this->getSname(), $this->getEmail(), $this->getCity(), $hashedPassword, $this->getImage(), $this->getBio()]);
			echo "<script>alert('Registration Successful')</script>";
    		echo "<script>window.location='login.php'</script>";
		}
		catch (PDOException $ex){
			return $ex->getMessage();
		}
	}
	public function login ($pdo){
		try{
			//prepare a query
			$stmt = $pdo->prepare("SELECT * FROM user_details WHERE First_name = ? AND Password = ?");
			$fname = $this->getFname();
			$password = $this->getPassword();
			$stmt->bindParam("ss", $fname, $password);
			$stmt->execute();
			$result=$stmt->get_result();
			$row=$result->fetch_assoc();
			  

			session_regenerate_id();
			$_SESSION['username']=$row['First_name'];
			$_SESSION['password']=$row['Password'];

			session_write_close();
			$result=$stmt->get_result();
			$row=$result->fetch_assoc();
			  	 

		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}
	public function changePassword($pdo){
		try{
			if($this->getOldPass() == $this->getPassword()){
				if($this->getNewPass()== $this->getConfirmPass()){
					//prepare statement
					$stmt = $pdo->prepare("UPDATE `user_details`(`Password`) VALUES (?");
			$stmt->execute($this->getPassword());
			return "Password Update!";
				}
			}
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}
	public function logout($pdo){
		session_start();
		session_destroy();

		return "Logged Out!";

	}
}


?>