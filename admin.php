<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5')
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <a href="users.php" style="color:black;">
		<div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background: #1b1e62;">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Users</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="categorie.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background: #1b1e62;">
          <i class="glyphicon glyphicon-th-large"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Categories</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="product.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background: #1b1e62;">
          <i class="glyphicon glyphicon-shopping-cart"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
          <p class="text-muted">Products</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="sales.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background: #1b1e62;">
          <i class="fa fa-inr"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
          <p class="text-muted">Sales</p>
        </div>
       </div>
    </div>
	</a>
</div>
  
  <div class="row">
   <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Highest Selling Products</span>
         </strong>
       </div>
       <div class="panel-body">
         <table id = "highest_selling" class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <th>Title</th>
             <th>Total Sold</th>
             <th>Total Quantity</th>
           <tr>
          </thead>
          <tbody>
            <?php foreach ($products_sold as  $product_sold): ?>
              <tr>
                <td id = "name_highest"><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                <td id = "qty_highest"><?php echo (int)$product_sold['totalQty']; ?></td>
              </tr>
            <?php endforeach; ?>
          <tbody>
         </table>
       </div>
     </div>
   </div>
   <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>LATEST SALES</span>
          </strong>
        </div>
        <div class="panel-body">
          <table id="latest_sales" class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Product Name</th>
           <th>Date</th>
           <th>Total Sale</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td id = "name_latest">
            <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td id = "sale_latest"><icon class="fa fa-inr"></icon><?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Recently Added Products</span>
        </strong>
      </div>
      <div class="panel-body">

        <div id = "recently_added" class="list-group">
      <?php foreach ($recent_products as  $recent_product): ?>
            <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>">
                <h4 class="list-group-item-heading">
                 <!-- <?php if($recent_product['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.png" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="" />
                <?php endif;?> -->
                <span id = "name_recently">
                  <?php echo remove_junk(first_character($recent_product['name']));?>
                </span>
                  <span id="price_recently" class="label label-warning pull-right">
                  <icon class="fa fa-inr"></icon><?php echo (int)$recent_product['sale_price']; ?>
                  </span>
                </h4>
                <span class="list-group-item-text pull-right">
                <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
              </span>
          </a>
      <?php endforeach; ?>
      
    </div>
  </div>
 </div>
 
</div>

 </div>
 <canvas id="myChart1" style="max-width: 900px; display: block; margin: auto; height: 450px; width: 900px;"></canvas>
 
<script>
let xValuesHighest = [];
let yValuesHighest = [];
let xValuesLatest = [];
let yValuesLatest = [];
let xValuesRecently = [];
let yValuesRecently = [];
let maxLatest = 0;
let maxHighest = 0;
let maxRecently = 0;

document.addEventListener("DOMContentLoaded", function(event) {
  var table = document.getElementById("highest_selling");
  var table2 = document.getElementById("latest_sales");
    
for (var i = 0, row; row = table.rows[i]; i++) {

   for (var j = 0, col; col = row.cells[j]; j++) {
     if(col.id === "name_highest"){
      xValuesHighest.push(col.innerText);
      
     }else if(col.id === "qty_highest"){
      yValuesHighest.push(col.innerText);
      maxHighest = Math.max(yValuesHighest[yValuesHighest.length - 1], maxHighest);
     }
   }  
}
new Chart("myChart1", {
  type: "line",
  data: { 
    labels: xValuesHighest,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1.0)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValuesHighest
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:maxHighest}}],
    }
  }
});

// for (var i = 0, row; row = table2.rows[i]; i++) {

// for (var j = 0, col; col = row.cells[j]; j++) {
//   if(col.id === "name_latest"){
//     xValuesLatest.push(col.innerText);
   
//   }else if(col.id === "sale_latest"){
  
//    yValuesLatest.push(col.innerText.substring(1, col.innerText.length));
//    maxLatest = Math.max(yValuesLatest[yValuesLatest.length - 1], maxLatest);
//   }
// }  
// }
// new Chart("myChart2", {
//   type: "line",
//   data: { 
//     labels: xValuesLatest,
//     datasets: [{
//       fill: false,
//       lineTension: 0,
//       backgroundColor: "rgba(0,0,255,1.0)",
//       borderColor: "rgba(0,0,255,0.1)",
//       data: yValuesLatest
//     }]
//   },
//   options: {
//     legend: {display: false},
//     scales: {
//       yAxes: [{ticks: {min: 0, max:maxLatest}}],
//     }
//   }
// });


// var divE =document.getElementById("recently_added");
// for(let i = 0;i<divE.children.length;i++){
//   xValuesRecently.push(divE.children[i].querySelector('#name_recently').innerText);
//   yValuesRecently.push(divE.children[i].querySelector('#price_recently').innerText.substring(1, divE.children[i].querySelector('#price_recently').innerText.length));
//   maxRecently = Math.max(yValuesRecently[yValuesRecently.length - 1], maxRecently);
// }

// new Chart("myChart3", {
//   type: "line",
//   data: { 
//     labels: xValuesRecently,
//     datasets: [{
//       fill: false,
//       lineTension: 0,
//       backgroundColor: "rgba(0,0,255,1.0)",
//       borderColor: "rgba(0,0,255,0.1)",
//       data: yValuesRecently
//     }]
//   },
//   options: {
//     legend: {display: false},
//     scales: {
//       yAxes: [{ticks: {min: 0, max:maxRecently}}],
//     }
//   }
// });

});



</script>
  <div class="row">

  </div>

<?php include_once('layouts/footer.php'); ?>
