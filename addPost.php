<?php
require 'adminTemplate.php';
$flag=0;
include_once 'category.php ';
include_once 'postHandler.php';
$category=new Category();
$post=new Post();
if(isset($_GET['update'] ) && $_SERVER['REQUEST_METHOD'] === 'GET'){
    $id=$_GET['update'];
    $flag=1;
}
?>
<div class="row">
    <div class="col-sm-12 text-center">
         <?php 
            if ($flag==1) {
               ?>
                <h2>Update Post</h2>
                <?php
            }else{
                ?>
                <h2>New Post</h2>
                <?php
            }
        ?>
    </div>
</div>
    <div class="row mt-2 ">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
             <?php 
                if ($flag==1) {
                $single=$post->singleview($id);
               ?>
               <form action="postHandler.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $single['title'];?>" name="title">
                </div>
               <div class="form-group ">
                    <select name="category" class="form-control">
                        <?php 
                        $viwecategory=$category->view();
                        while ($row = $viwecategory->fetch(PDO::FETCH_ASSOC)){
                            if ($row['category_id'] == $single['category_id']) {
                                ?>
                               <option value="<?php echo $row['category_id'];?>" selected><?php echo $row['category'];?></option>
                               <?php
                            }else{
                                ?>
                                <option value="<?php echo $row['category_id'];?>"><?php echo $row['category'];?></option>
                                <?php
                            }
                        ?>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                 <div class="form-group ">
                    <textarea class="form-control" rows="4" name="description" ><?php echo $single['description'];?></textarea>
                </div>
                <div class="form-group ">
                    <img src="<?php echo $single['postImage'];?>" height="100px;" width="100px">
                </div>
                <input type="hidden" name="id" value="<?php echo $single['post_id'];?>">
                <input type="hidden" name="oldpostImage" value="<?php echo $single['postImage'];?>">
                <div class="custom-file mb-3">
                  <input type="file"  class="custom-file-input" id="customFile" name="postImage" accept="image/*">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <input type="submit" name="updatepost" value="update" class="btn btn-outline-success">
            </form>
                <?php
            }else{
                ?>
            <form action="postHandler.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" required class="form-control" placeholder="Title" name="title">
                </div>
               <div class="form-group ">
                    <select name="category" required class="form-control">
                        <option selected value="">Categories</option>
                        <?php 
                        $viwecategory=$category->view();
                        while ($row = $viwecategory->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option value="<?php echo $row['category_id'];?>"><?php echo $row['category'];?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                 <div class="form-group ">
                    <textarea class="form-control"  required rows="4" name="description" placeholder="Post Description"></textarea>
                </div>
                <div class="custom-file mb-3">
                  <input type="file" required class="custom-file-input" id="customFile" name="postImage" accept="image/*">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                <input type="submit" name="addpost" value="Save" class="btn btn-outline-success">
            </form>
             <?php
            }
        ?>
        </div>
        <div class="col-sm-2"></div>
    </div>
   
<?php
require 'adminFooter.php';
?>
