<?php
include_once 'database.php';
include_once 'session.php';
/**
 * this class used for handle post
 */
class Post
{
  private $db;
  
  public function __construct(){
    $this->db =new Database();
  }
  //insert new post
  public function create($data){
    $title= $data['title'];
    $category_id= $data['category'];
    $description= $data['description'];

    $postImage= $_FILES['postImage']['name'];
    $temp_name= $_FILES["postImage"]["tmp_name"];
    $folder="PostImage/".$postImage;
    move_uploaded_file($temp_name, $folder);  

    try {
      $sql = "insert into post (title,category_id,description,postImage) values ('$title','$category_id','$description','$folder')";
      $query = $this->db->conn->prepare($sql);
      $query->execute();
      if ($query) {
        header('location:admin.php');
      }
    } catch (PDOException $e) {
      die("Datbase not worked " .$e->getMessage());
    }
  }
  //update exiting post
  public function update($data){
    $id=$data['id'];
    $title= $data['title'];
    $category_id= $data['category'];
    $description= $data['description'];
    $postImage= $_FILES['postImage']['name'];
    $oldpostImage=$data['oldpostImage'];
    if ($postImage != "") {
      $temp_name= $_FILES["postImage"]["tmp_name"];
      $folder="PostImage/".$postImage;
      move_uploaded_file($temp_name, $folder);
      unlink($oldpostImage);
    }else{
      $folder= $oldpostImage;
    }
    try {
      $sql = "UPDATE post SET title = '$title', category_id = '$category_id' , description = '$description', postImage = '$folder' WHERE post_id='$id'";
      $query = $this->db->conn->prepare($sql);
      $query->execute();
      if ($query) {
        header('location:admin.php');
      }
    } catch (PDOException $e) {
      die("Datbase not worked " .$e->getMessage());
    }
  }
  //view all post
  public function view(){
    try {
      $sql="SELECT post.*, category.category FROM post INNER JOIN category ON post.category_id=category.category_id";
      $query = $this->db->conn->prepare($sql);
      $query->execute();
      return $query;    
    } catch (PDOException $e) {
      die("somthing wrong " .$e->getMessage());
    }
  }
  //view post 
  public function viewpost($id){
    try {
      $sql="SELECT post.*, category.category FROM post INNER JOIN category ON post.category_id=category.category_id where post_id='$id'";
      $query = $this->db->conn->prepare($sql);
      $query->execute();
      if ($query->rowCount()==1) {
        return $query->fetch(PDO::FETCH_ASSOC);
      }else{
        return 0;
      }
    } catch (PDOException $e) {
      die("somthing wrong " .$e->getMessage());
    }
  }
  //view recent 3 post
  public function recentpost(){
    try {
      $sql="SELECT post.*, category.category FROM post INNER JOIN category ON post.category_id=category.category_id ORDER BY post_id desc LIMIT 3";
      $query = $this->db->conn->prepare($sql);
      $query->execute();
      return $query;
    } catch (PDOException $e) {
      die("somthing wrong " .$e->getMessage());
    }
  }
  //view single post
  public function singleview($id){
    try {
      $sql="select * from post where post_id='$id'";
      $query = $this->db->conn->prepare($sql);
      $query->execute();
      return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("somthing wrong " .$e->getMessage());
    }
  }
  //delete a post 
  public function destroy($id){
     try {
      $sql="select * from post where post_id='$id'";
      $query = $this->db->conn->prepare($sql);
      $query->execute();
      $result=$query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      die("somthing wrong " .$e->getMessage());
    }
    $postimage=$result['postImage'];
    unlink($postimage);
    try {
      $sql="DELETE FROM post WHERE post_id='$id'";
      $query = $this->db->conn->prepare($sql);
      $query->execute();
      header('location:admin.php');    
    } catch (PDOException $e) {
      die("somthing wrong " .$e->getMessage());
    }
  }
}
//create object of category class
$post=new Post();

if(isset($_POST['addpost'] ) && $_SERVER['REQUEST_METHOD'] === 'POST'){
  $post->create($_POST);
}
if(isset($_POST['updatepost'] ) && $_SERVER['REQUEST_METHOD'] === 'POST'){
  $post->update($_POST);
}
if(isset($_GET['delete']) && $_SERVER['REQUEST_METHOD'] === 'GET'){
  $id=$_GET['delete'];
  $post->destroy($id);
}

?>