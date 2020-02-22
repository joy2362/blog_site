<?php
include_once 'category.php';
$category=new Category();
require 'adminTemplate.php';
?>
   <div class="row m-3">
       <div class="col-sm-12">
           <table class="table">
               <thead>
                   <tr>
                       <th>#</th>
                       <th>Category</th>
                       <th>Slug</th>
                       <th class="text-center">Acton</th>
                   </tr>
               </thead>
               <tbody>
                 
                  <?php
                    $viwecategory=$category->view();
                    while ($row = $viwecategory->fetch(PDO::FETCH_ASSOC)){
                  ?>
                  <tr>
                     <td><?php echo $row['category_id'];?></td>
                      <td><?php echo $row['category'];?></td>
                      <td><?php echo $row['slug'];?></td>
                      <td class="text-center">
                        <a href="addcategory.php?update=<?php echo $row['category_id'];?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                        <a href="category.php?delete=<?php echo $row['category_id'];?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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