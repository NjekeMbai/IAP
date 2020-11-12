<?php
include_once 'Account.php';
session_start();
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
			/*$stmt = $pdo->prepare("SELECT * FROM user_details WHERE First_name = ? AND Password = ?");
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
			$row=$result->fetch_assoc();*/

			$sql = "SELECT * FROM user_details WHERE First_name = :First_name";
			$stmt = $pdo->prepare($sql);
			$username = $this->getFname();
			$password = $this->getPassword();
			//bind values
			$stmt->bindValue(':First_name', $username);
			//execute
			$stmt->execute();
			//fetch row
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//if $row is false
			if($row == false){
				//could not find a user with the username
				die('Incorrect username or password');
			}  
			else{
				//user account found. Check if password is a match to hashed password in DB
				$validPassword = password_verify($password, $row['Password']);
				//if passwords match then login is successful
				if($validPassword){
					//provide the user with a login session
					session_regenerate_id();
					$_SESSION['logged_in'] = time();
					$_SESSION['username'] = $row['First_name'];
					$_SESSION['password'] = $row['Password'];
					session_write_close();
					//redirect to our new page
					header('Location: display.php');

				}
				else{
					//if the password was false
					echo "<script>alert('Password was incorrect!')</script>";
					echo "<script>window.location='login.php'</script>";
				}
			}	 

		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}
	public function changePassword($pdo){
		try{
			
			$sql = "SELECT * FROM user_details WHERE First_name = :First_name";
			$stmt = $pdo->prepare($sql);
			$username = $this->getFname();
			$password = $this->getPassword();

			$oldpass = $this->getOldPass();
			$newpass = $this->getNewPass();
			$confirm = $this->getConfirmPass();

			//bind values
			$stmt->bindValue(':First_name', $username);
			//execute
			$stmt->execute();
			//fetch row
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			//if $row is false
			if($row == false){
				//could not find a user with the username
				die('Incorrect username or password');
			}  
			else{
				//user account found. Check if password is a match to hashed password in DB
				$validPassword = password_verify($oldpass, $row['Password']);
				//if passwords match then login is successful
				if($validPassword){
					if($newpass == $confirm){
						$hashedPassword = password_hash($newpass, PASSWORD_DEFAULT);
						$sql = "UPDATE user_details SET Password = '$hashedPassword' WHERE First_name = '$username'";
						$stmt = $pdo->prepare($sql);
						$stmt->execute();

						echo "<script>alert('Password Updated!')</script>";
						echo "<script>window.location: display.php</script>";
					}
					else{
						echo "<script>alert(New and confirmed passwords do not match!)</script>";
						echo "<script>window.location: edit.php</script>";
					}
				}


			}
		}
		catch(PDOException $e){
			return $e->getMessage();
		}
	}
	public function logout($pdo){
		
		session_destroy();

		echo "<script>alert('Logged out!')</script>";
		echo "<script>window.location='login.php'</script>";

	}

}


?>