<?php
include("db.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="naam">produt naam</label><br>
		<input type="text" id="naam" name="naam" required><br>

        <label for="prijs">prijs per product</label><br>
		<input type="text" id="prijs" name="prijs" required><br>

        <label for="omschrijving">omschrijving:</label><br>
		<input type="text" id="omschrijving" name="omschrijving" required><br><br>

        <input type="submit" name="submit" value="Verzenden">
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $productnaam = $_POST["naam"];
        $prijsproduct = $_POST["prijs"];
        $omschrijving = $_POST["omschrijving"];

        $sql = 'INSERT INTO producten(product_naam, prijs_per_stuk, omschrijving) VALUES (:naam, :prijs, :omschrijving)';

        $stmt = $pdo->prepare($sql);
        $data = array(
            'naam' => $productnaam,
            'prijs' => $prijsproduct,
            'omschrijving' => $omschrijving
        );
        
        $stmt->execute($data);

        if ($stmt) {
            echo "$productnaam is toegvoegd";
        } else {
            echo "Error";
        }
    
    };
    ?>
</body>
</html>