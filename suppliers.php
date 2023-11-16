<?php
  $page_title = 'All categories';
  require_once('includes/load.php');
  
  page_require_level(3);
  
  $all_categories = find_all('suppliers')
?>

<?php include_once('layouts/header.php'); ?>

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
    <!-- <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Category</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="categorie.php">
            <div class="form-group">
                <input type="text" class="form-control" name="categorie-name" placeholder="Category Name">
            </div>
            <button type="submit" name="add_cat" class="btn btn-primary">Add Category</button>
        </form>
        </div>
      </div>
    </div> -->
    <div class="col-md-15">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          
          <span>View Suppliers</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Suppliers</th>
                    <th class="text-center" style="width: 100px;">Edit/Delete</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_categories as $cat):?>
                
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                     <td><a href="supplied.php?id=<?php echo (int)$cat['id'];?>"><?php echo remove_junk(ucfirst($cat['name'])); ?></a></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_supplier.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                        <strong>Edit</strong>
                        </a>
                        <a href="delete_supplier.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                        <strong>Delete</strong>
                        </a>
                      </div>
                    </td>

                </tr>
                
              <?php endforeach; ?>
            </tbody>
          </table>
       </div>
    </div>
    </div>
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
