<?php
include_once 'postHandler.php';
$post=new Post();
require 'adminTemplate.php';
?>
   <div class="row m-3">
       <div class="col-sm-12">
           <table class="table">
               <thead>
                   <tr>
                       <th>#</th>
                       <th>Tittle</th>
                       <th>Category</th>
                       <th>Description</th>
                       <th>Image</th>
                       <th>Acton</th>
                   </tr>
               </thead>
               <tbody>
                  <?php
                    $viewpost=$post->view();
                    while ($row = $viewpost->fetch(PDO::FETCH_ASSOC)){
                    ?>
                 <tr>
                     <td><?php echo $row['post_id'];?></td>
                      <td><?php echo $row['title'];?></td>
                      <td><?php echo $row['category'];?></td>
                      <td><?php echo substr($row['description'],0,75)."....";?></td>
                      <td><img src="<?php echo $row['postImage'];?>" alt="...." height="50px" width="50px"></td>
                      <td>
                        <a href="blog-details.php?id=<?php echo $row['post_id'];?>" class="btn btn-primary"><i class="far fa-eye"></i></a>
                        <a href="addPost.php?update=<?php echo $row['post_id'];?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <a href="postHandler.php?delete=<?php echo $row['post_id'];?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                      </td>
                  </tr>  
                  <?php
                      }
                        ?>
               </tbody>
           </table>
       </div>
   </div>
<?php
require 'adminFooter.php';
?>