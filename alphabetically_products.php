<?php
$page_title = 'All Product';
require_once('includes/load.php');

page_require_level(3);
$products = sort_alphabetically_join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <div class="pull-right">
        <a href="ascending_quantity_products.php" class="btn btn-primary">Sort by quantity</a>
          <a href="recent_products.php" class="btn btn-primary">Sort by date</a>
          <a href="alphabetically_products.php" class = "btn btn-primary">Sort alphabetically</a>
          <a href="add_product.php" class="btn btn-primary">Add New</a>
          
          <a href="print_product.php" class="btn btn-primary text-red-500" ">Save PDF</a>

        </div>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <!-- <th> Photo</th> -->
              <th> Product Title </th>
              <th class="text-center" style="width: 10%;"> Categories </th>
              <th class="text-center" style="width: 10%;"> In-Stock </th>
              <th class="text-center" style="width: 10%;"> Buying Price </th>
              <th class="text-center" style="width: 10%;"> Selling Price </th>
              <th class="text-center" style="width: 10%;"> Product Added </th>
              <th class="text-center" style="width: 100px;"> Actions </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product): ?>
              <tr>
                <td class="text-center">
                  <?php echo count_id(); ?>
                </td>
                <!-- <td>
                 
                </td> -->
                <td>
                  <?php echo remove_junk($product['name']); ?>
                </td>
                <td class="text-center">
                  <?php echo remove_junk($product['categorie']); ?>
                </td>
                <td class="text-center">
                  <?php echo remove_junk($product['quantity']); ?>
                </td>
                <td class="text-center">
                  <?php echo remove_junk($product['buy_price']); ?>
                </td>
                <td class="text-center">
                  <?php echo remove_junk($product['sale_price']); ?>
                </td>
                <td class="text-center">
                  <?php echo read_date($product['date']); ?>
                </td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo (int) $product['id']; ?>" class="btn btn-info btn-xs"
                      title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_product.php?id=<?php echo (int) $product['id']; ?>" class="btn btn-danger btn-xs"
                      title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          </tabel>
      </div>
    </div>
  </div>
</div>
<?php include_once('layouts/footer.php'); ?>