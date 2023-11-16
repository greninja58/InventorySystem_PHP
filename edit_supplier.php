<?php
  $page_title = 'Edit suppliers';
  require_once('includes/load.php');
 
  page_require_level(1);
?>
<?php
  
  $categorie = find_by_id('suppliers',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Missing supplier id.");
    redirect('supplier.php');
  }
?>

<?php
if(isset($_POST['edit_sup'])){
  $req_field = array('supplier-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['supplier-name']));
  if(empty($errors)){
        $sql = "UPDATE suppliers SET name='{$cat_name}'";
       $sql .= " WHERE id='{$categorie['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated suppliers");
       redirect('suppliers.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('suppliers.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('supplires.php',false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editing <?php echo remove_junk(ucfirst($categorie['name']));?></span>
        </strong>
       </div>
       <div class="panel-body">
         <form method="post" action="edit_supplier.php?id=<?php echo (int)$categorie['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="supplier-name" value="<?php echo remove_junk(ucfirst($categorie['name']));?>">
           </div>
           <button type="submit" name="edit_sup" class="btn btn-primary">Update Supplier</button>
       </form>
       </div>
     </div>
   </div>
</div>



<?php include_once('layouts/footer.php'); ?>
