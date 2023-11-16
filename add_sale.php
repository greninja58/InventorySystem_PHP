<?php
  $page_title = 'Add Sale';
  require_once('includes/load.php');
 
   page_require_level(3);
   $products = join_product_table();
?>
<?php

  if(isset($_POST['add_sale'])){
    $req_fields = array('s_id','quantity','price','total', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $temp1 = floatval($_POST['price']) * (int)($_POST['quantity']);
          $s_total   = $db->escape(strval($temp1));
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();

          $temp = find_all_product_info_by_title2($p_id);
          if($temp[0]['quantity'] >= $s_qty){
            $sql  = "INSERT INTO sales (";
          $sql .= " product_id,qty,price,date";
          $sql .= ") VALUES (";
          $sql .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
          $sql .= ")";

                if($db->query($sql)){
                  update_product_qty($s_qty,$p_id);
                  $session->msg('s',"Sale added. ");
                  redirect('add_sale.php', false);
                } else {
                  $session->msg('d',' Sorry failed to add!');
                  redirect('add_sale.php', false);
                }
          }else{
            $session->msg('d',' Please add a quantity value in range of stock!');
            redirect('add_sale.php', false);
          }
          
        } else {
           $session->msg("d", $errors);
           redirect('add_sale.php',false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <!-- <form method="post" action="ajax.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Find It</button>
            </span>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Search for product name">
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form> -->
  </div>
</div>
<div class="row">

  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Sale Eidt</span>
       </strong>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width: 5%;">P_ID</th>
              <!-- <th> Photo</th> -->
              <th class="text-center" style="width: 10%;"> Name of Product </th>
              <th class="text-center" style="width: 10%;"> Current stock quantity</th>
              <!-- <th class="text-center" style="width: 10%;"> Price per qt. </th> -->
              <th class="text-center" style="width: 10%;"> Date of sale </th>
              <th class="text-center" style="width: 10%;">Enter Sale quantity </th>
              
              <th class="text-center" style="width: 10%;"> Sale </th>
              
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product): ?>
              <form method="post" action="add_sale.php">
              <tr>

                <td class="text-center">
                <input type="number" name="s_id" value="<?php echo $product['id']; ?>" readonly>
                  
                </td>
                <!-- <td>
                 
                </td> -->
                <td class="text-center">
                  <?php echo remove_junk($product['name']); ?>
                </td>
                <td class="text-center">
                  <?php echo remove_junk($product['quantity']); ?>
                </td>
                
                <!-- <td class="text-center">
                  <?php echo remove_junk($product['sale_price']); ?>
                </td> -->
                <input type="hidden" class="form-control" name="price" value="<?php echo remove_junk($product['sale_price']); ?>">
                <input type="hidden" class="form-control" name="total" value="<?php echo remove_junk(0); ?>">
                <td class="text-center">
                <input type="date" class="form-control datePicker" name="date" data-date data-date-format="yyyy-mm-dd">
                </td>
                <td class="text-center">
                <input type="text" class="form-control" name="quantity" placeholder="Sale quantity">
                </td>
                
                <td class="text-center">
                  <div class="btn-group">
                  
                  <button type="submit" name="add_sale" class="btn btn-info">Sale Item</button>

                  
                    
                  </div>
                </td>
              </tr>
              </form>
            <?php endforeach; ?>
          </tbody>
          </tabel>
      </div>
    </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>
