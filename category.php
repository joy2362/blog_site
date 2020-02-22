<?php
include_once 'database.php';
include_once 'session.php';
/**
 * this class used for handle category
 */
class Category
{
	private $db;
	
	public function __construct(){
		$this->db =new Database();
	}
	//insert new category
	public function create($data){
		$category = $data['category'];
		$slug = $data['slug'];
		try {
			$sql = "insert into category (category,slug) values ('$category','$slug')";
			$query = $this->db->conn->prepare($sql);
			$query->execute();
			if ($query) {
				header('location:viewcategory.php');
			}
		} catch (PDOException $e) {
			die("Datbase not worked " .$e->getMessage());
		}
	}
	//update exiting category
	public function update($data){
		$id=$data['id'];
		$category = $data['category'];
		$slug = $data['slug'];
		try {
			$sql = "UPDATE category SET category = '$category', slug = '$slug' WHERE category_id='$id'";
			$query = $this->db->conn->prepare($sql);
			$query->execute();
			if ($query) {
				header('location:viewcategory.php');
			}
		} catch (PDOException $e) {
			die("Datbase not worked " .$e->getMessage());
		}
	}
	//view all category
	public function view(){
		try {
			$sql="select * from category";
			$query = $this->db->conn->prepare($sql);
			$query->execute();
			return $query;		
		} catch (PDOException $e) {
			die("somthing wrong " .$e->getMessage());
		}
	}
	//view single category
	public function singleview($id){
		try {
			$sql="select * from category where category_id='$id'";
			$query = $this->db->conn->prepare($sql);
			$query->execute();
			return $query->fetch(PDO::FETCH_ASSOC);
			
		} catch (PDOException $e) {
			die("somthing wrong " .$e->getMessage());
		}
	}
	//delete a category 
	public function destroy($id){
		try {
			$sql="DELETE FROM category WHERE category_id='$id'";
			$query = $this->db->conn->prepare($sql);
			$query->execute();
			header('location:viewcategory.php');		
		} catch (PDOException $e) {
			die("somthing wrong " .$e->getMessage());
		}
	}
}
//create object of category class
$category=new Category();


if(isset($_POST['addcategory'] ) && $_SERVER['REQUEST_METHOD'] === 'POST'){
	$category->create($_POST);
}
if(isset($_POST['updatecategory'] ) && $_SERVER['REQUEST_METHOD'] === 'POST'){
	$category->update($_POST);
}
if(isset($_GET['delete'] ) && $_SERVER['REQUEST_METHOD'] === 'GET'){
	$id=$_GET['delete'];
	$category->destroy($id);
}

?>