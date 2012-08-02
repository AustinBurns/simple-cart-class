<?php require("cart.php"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Simple OOP PHP Cart</title>	
	</head>
	<body>
		<?php
			if(!$cart && !isset($_SESSION['cart_action']) && !isset($_POST['cart_action']))
				$_SESSION['cart'] = new cart();
			else{
				
				$cart = $_SESSION['cart'];

				if(isset($_POST['cart_action']))
					$_SESSION['cart_action'] = $_POST['cart_action'];
				elseif(isset($_POST['go_back']))
					$_SESSION['cart_action'] = 3;

				switch($_SESSION['cart_action']){
					
					case 1:
						if($_POST['item_name'] == ""  || $_POST['item_price'] == "")
							$cart->item_form("add");
						else
							$cart->add_item($_POST['item_name'], $_POST['item_price'], $_POST['item_qty']);
						break;
					case 2:
						if($_POST['item_name'] == "" || $_POST['item_qty'] == "")
							$cart->item_form("delete");
						else
							$cart->delete_item($_POST['item_name'], $_POST['item_qty']);
						break;
					case 3:
						$cart->cart_success(1);
						break;
					case 4:
						$cart->cart_success(6);
						break;
					case 5:
						$cart->cart_success(7);
						break;
					default:
						$cart->cart_error(2);
						break;	
				}
			}
		?>
	</body>
</html>