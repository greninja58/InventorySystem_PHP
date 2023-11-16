<?php
  $page_title = 'All categories';
  require_once('includes/load.php');
  
  page_require_level(3);
  
  $all_suppliers = find_all('suppliers')
?>
<?php
 if(isset($_POST['add_sup'])){
   $req_field = array('supplier-name');
   validate_fields($req_field);
   $sup_name = remove_junk($db->escape($_POST['supplier-name']));
   if(empty($errors)){
      $sql  = "INSERT INTO supplier (name)";
      $sql .= " VALUES ('{$sup_name}')";
      if($db->query($sql)){
        $session->msg("s", "Successfully Added New Supplier");
        redirect('suppliers.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
        redirect('add_supplier.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('suppliers.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
  </div>
   <div class="row">
    <div class="col-md-15">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Supplier</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="add_supplier.php">
            <div class="form-group">
                <input type="text" class="form-control" name="supplier-name" placeholder="Supplier Name">
            </div>
            <button type="submit" name="add_sup" class="btn btn-primary">Add Supplier</button>
        </form>
        </div>
      </div>
    </div>
    <!-- <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>All Categories</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Categories</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_suppliers as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="delete_categorie.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                      </div>
                    </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
       </div>
    </div>
    </div> -->
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
