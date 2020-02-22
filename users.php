<?php
include_once 'database.php';
include_once 'session.php';
/**
 * this class used for handle users or admin
 */
class User
{
	private $db;

	public function __construct(){
		$this->db =new Database();
	}
	//user login
	public function login($data){
		$username=$data['username'];
		$pass=sha1($data['pass']);
		try{
			$sql="select * from users where username='$username' and passwoard = '$pass'";
			$query=$this->db->conn->prepare($sql);
			$query->execute();
			if($query->rowCount()==1){
				$result=$query->fetch(PDO::FETCH_ASSOC);
				Session::init();
				Session::set("id" , $result['user_id']);
				header('location:admin.php');
			}else{
				header('location:login.php');
			}
		} catch (PDOException $e) {
			die("Datbase not worked " .$e->getMessage());
		}
	}
	//user details
	public function view($id){
		try{
			$sql="select * from users where  user_id = '$id'";
			$query=$this->db->conn->prepare($sql);
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $e) {
			die("Datbase not worked " .$e->getMessage());
		}
	}
	public function logout(){
		Session::destroy();
		header('location:index.php');
	}
}
$user=new User();

if(isset($_POST['wp-submit'] ) && $_SERVER['REQUEST_METHOD'] === 'POST'){
	$user->login($_POST);
}

if (isset($_GET['action']) && $_GET['action']=="logout") {
    $user->logout();
}
?>