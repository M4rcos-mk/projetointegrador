<?php

session_start();
include('db.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query($con,"SELECT * FROM `produtos` WHERE `code`='$code'");
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
	$status = "<div class='box'>Produto adicionado ao carrinho!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Produto já está no carrinho!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Produto adicionado ao carrinho!!</div>";
	}

	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
	<title>Back in Black Discos e Camisas</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		
		<?php
		if(!empty($_SESSION["shopping_cart"])) {
		$cart_count = count(array_keys($_SESSION["shopping_cart"])); 
		include_once 'carrito.php';
		}
		include_once 'menu.php';
		?>
					
					<div class="row text-center mt-2">
		<?php
		$result = mysqli_query($con,"SELECT * FROM `produtos` WHERE `tipo` = 'disco'");					
		while($row = mysqli_fetch_assoc($result)){
		?>			
					
		        	<div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
		        		<form role="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			        	<div class="card text-center">
				       	<div class="card-header cardcolor"><?php echo $row['name']; ?></div>
				       	<div class="card-body"><img src="<?php echo $row['image']; ?>" class="cardsize"></div>
				       	<div class="card-footer cardcolor"><input class="buy btn btn-dark" type="submit" value="Comprar"></div>
				       	<input type='hidden' name='code' value="<?php echo $row['code']; ?>"/>
				       	<input type='hidden' name='price' value="<?php echo $row['price']; ?>"/>
		       			</div>
		       			</form>
		       		</div>
		       	
	    <?php 
				};
			mysqli_close($con);
		?>
     				</div>

					

					
			
	</div>
	<div style="clear:both;"></div>

	<div class="message_box" style="margin:10px 0px;">
	<?php echo $status; ?>
	</div>

</body>
</html>