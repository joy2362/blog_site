<?php
include_once 'category.php';
$category=new Category();
$flag=0;
require 'adminTemplate.php';
if(isset($_GET['update'] ) && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $id=$_GET['update'];
    $flag=1;
}
?>
<div class="row mt-2">
    <div class="col-sm-12 text-center">
        <?php 
            if ($flag==1) {
               ?>
                <h2>Update category</h2>
                <?php
            }else{
                ?>
                <h2>New category</h2>
                <?php
            }
        ?>
    </div>
</div>
    <div class="row mt-4 ">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
             <?php 
                if ($flag==1) {
                 
                    $single=$category->singleview($id);
               ?>
                 <form action="category.php" name="addcategory" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $single['category'];?>" name="category" required>
                </div>
                <div class="form-group">
                    <input type="text" required class="form-control" value="<?php echo $single['slug'];?>" name="slug">
                </div>
                <input type="hidden" name="id" value="<?php echo $single['category_id'];?>">
                <input type="submit" name="updatecategory" value="Update" class="btn btn-outline-success">
            </form>
                <?php
            }else{
                ?>
               <form action="category.php" name="addcategory" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Category Name" name="category" required>
                </div>
                <div class="form-group">
                    <input type="text" required class="form-control" placeholder="Slug" name="slug">
                </div>
                <input type="submit" name="addcategory" value="Add" class="btn btn-outline-success">
                <input type="reset" name="reset" value="Reset" class="btn btn-outline-danger">
            </form>
                <?php
            }
        ?>
        </div>
        <div class="col-sm-4"></div>
    </div>
    <?php
require 'adminFooter.php';
?>
