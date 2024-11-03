<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vendo Machine</title>
</head>
<body>

    <h3>Vendo Machine</h3>
    <form method="post">
        <fieldset>
            <legend>Products:</legend> 
                <input type="checkbox" name="drinkProducts[]" value="Coke"> Coke - ₱15<br>
                <input type="checkbox" name="drinkProducts[]" value="Sprite"> Sprite - ₱20<br>
                <input type="checkbox" name="drinkProducts[]" value="Royal"> Royal - ₱20<br>
                <input type="checkbox" name="drinkProducts[]" value="Pepsi"> Pepsi - ₱15<br>
                <input type="checkbox" name="drinkProducts[]" value="Mountain Dew"> Mountain Dew - ₱20
        </fieldset>

        <fieldset>
            <legend>Options:</legend>
            <label for="size">Size:</label>
            <select id="size" name="size">
                <option value="regular">Regular</option>
                <option value="up-size">Up-Size (add ₱5)</option>
                <option value="jumbo">Jumbo (add ₱10)</option>
            </select>
            
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" value="1">
            <button type="submit" name="checkout">Check Out</button>
        </fieldset>
    </form>


<?php
	if (isset($_POST['checkout'])):
	    $drinksPrices = [
	        'Coke' => 15,
	        'Sprite' => 20,
	        'Royal' => 20,
	        'Pepsi' => 15,
	        'Mountain Dew' => 20,
	    ];
	    $selectedProducts = $_POST['drinkProducts'] ?? [];
	    $size = $_POST['size'];
	    $quantity = $_POST['quantity'];
        
	    if (empty($selectedProducts) && $quantity === 0) {
	        echo "<hr>";
	        echo "<p>No Selected Item.</p>"; 
	    } else {
	        $addPrice = 0;
	        if ($size === 'up-size') {
	            $addPrice = 5;
	        } elseif ($size === 'jumbo') {
	            $addPrice = 10;
	        }

	        $ttlItem = 0;
	        $totalP = 0;
	        
	        echo "<hr>"; 
	        echo "<h4>Purchase Summary:</h4>";
	        echo "<ul>";
	        
	        foreach ($selectedProducts as $product){
                $productPrice = $drinksPrices[$product];
	            $itemTotal = ($productPrice + $addPrice) * $quantity;
	            $totalP += $itemTotal;
	            $ttlItem += $quantity;

	            $quantityText = ($quantity > 1) ? "$quantity pieces of" : "1 piece of";
	            
	            $sizeText = ucfirst($size); 
	            echo "<li>$quantityText $sizeText $product amounting to ₱$itemTotal</li>";
            }
	        echo "</ul>";
	        echo "<p><b>Total Number of Items:</b> $ttlItem</p>";
	        echo "<p><b>Total Price:</b> ₱$totalP</p>";
    }
    endif; 
?>
</body>
</html>