<?php
  require_once('includes/load.php');
  
  page_require_level(1);
?>
<?php
  $categorie = find_by_id('suppliers',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","Missing Supplier id.");
    redirect('suppliers.php');
  }
?>
<?php
  $delete_id = delete_by_id('suppliers',(int)$categorie['id']);
  if($delete_id){
      $session->msg("s","Supplier deleted.");
      redirect('suppliers.php');
  } else {
      $session->msg("d","Supplier deletion failed.");
      redirect('supppliers.php');
  }
?>
