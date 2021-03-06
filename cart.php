<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		Produto Removido!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}		
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break;
    }
}
  	
}
?>
<html>
<head>
<title>Carrinho</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
	<title>Back in Black Discos e Camisas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<?php
		include_once 'menu.php';
		?>
   

		<?php
		if(!empty($_SESSION["shopping_cart"])) {
		$cart_count = count(array_keys($_SESSION["shopping_cart"]));
		include_once 'carrito.php';		
		}
		?>
		<div class="cart">
		<?php
		if(isset($_SESSION["shopping_cart"])){
		    $total_price = 0;
		?>	
		<table class="table">
		<tbody>
		<tr>
		<td></td>
		<td>Produto</td>
		<td>Quantidade</td>
		<td>Preço</td>
		<td>Total</td>
		</tr>	
		<?php		
		foreach ($_SESSION["shopping_cart"] as $product){
		?>
		<tr>
		<td><img src='<?php echo $product["image"]; ?>' width="100" height="100" /></td>
		<td><?php echo $product["name"]; ?><br />
		<form method='post' action=''>
		<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
		<input type='hidden' name='action' value="remove" />
		<button type='submit' class='remove'>Remover</button>
		</form>
		</td>
		<td>
		<form method='post' action=''>
		<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
		<input type='hidden' name='action' value="change" />
		<select name='quantity' class='quantity' onchange="this.form.submit()">
		<option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
		<option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
		<option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
		<option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
		<option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
		</select>
		</form>
		</td>
		<td><?php echo "$".$product["price"]; ?></td>
		<td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
		</tr>
		<?php
		$total_price += ($product["price"]*$product["quantity"]);
		}
		?>
		<tr>
		<td colspan="5" align="right">
		<strong>Total: <?php echo "$".$total_price; ?></strong>
		</td>
		</tr>
		</tbody>
		</table>		
		  <?php
		}else{
			echo "<h3>Carrinho vazio!</h3>";
			}
		?>
		</div>

		<div style="clear:both;"></div>

		<div class="message_box" style="margin:10px 0px;">
		<?php echo $status; ?>
		</div>
	</div>



</div>
</body>
</html>