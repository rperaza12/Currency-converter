<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<?php
$converted = null;
$error = '';

$flagMap = [
    "CAN" => "flags/canada-flag-xs.png",
    "USD" => "flags/united-states-of-america-flag-xs.png",
    "EUR" => "flags/germany-flag-xs.png",
    "GBP" => "flags/united-kingdom-flag-xs.png",
    "CNY" => "flags/china-flag-xs.png"
];

$exchangerates = [
    "CAN" => ["USD" => 0.75, "EUR" => 0.70, "GBP" => 0.60, "CNY" => 5.2],
    "USD" => ["CAN" => 1.33, "EUR" => 0.93, "GBP" => 0.79, "CNY" => 7.0],
    "EUR" => ["CAN" => 1.42, "USD" => 1.08, "GBP" => 0.85, "CNY" => 7.5],
    "GBP" => ["CAN" => 1.67, "USD" => 1.27, "EUR" => 1.17, "CNY" => 8.1],
    "CNY" => ["CAN" => 0.19, "USD" => 0.14, "EUR" => 0.13, "GBP" => 0.12]
];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $amount = $_POST["amount"];
    $from = $_POST["from"];
    $to = $_POST["to"];

    if (!is_numeric($amount)) {
        $error = "Please enter a valid number.";
    } else {
        if ($from === $to) {
            $converted = $amount;
        } else {
            $converted = round($amount * $exchangerates[$from][$to], 2);
        }
    }
}
?>
    <h2>Welcome to Currency Converter</h2>
    <form action="currency.php" method="post">

        <!-- Asks for input -->
        <label> Amount</label> 
        <input type="text" name="amount" placeholder="Enter amount" required>
        <br><br>

        
        <!-- From conversion -->
        <div class="radio-group">
            <label>Convert From:</label>
            <label><input type="radio" name="from" value="CAN" required><img src="flags/canada-flag-xs.png" alt="Canada Flag" width="20"> CAD </label>
            <label><input type="radio" name="from" value="USD" required><img src="flags/united-states-of-america-flag-xs.png" alt="US Flag" width="20"> USD </label>
            <label><input type="radio" name="from" value="EUR" required><img src="flags/germany-flag-xs.png" alt="GER Flag" width="20"> EUR </label>
            <label><input type="radio" name="from" value="GBP" required><img src="flags/united-kingdom-flag-xs.png" alt="GBP Flag" width="20"> GBP </label>
            <label><input type="radio" name="from" value="CNY" required><img src="flags/china-flag-xs.png" alt="CNY Flag" width="20"> CNY </label>
        </div>

        <br><br>

        <div class="radio-group">
            <label>Convert To:</label>
            <label><input type="radio" name="to" value="CAN" required><img src="flags/canada-flag-xs.png" alt="Canada Flag" width="20"> CAD </label>
            <label><input type="radio" name="to" value="USD" required><img src="flags/united-states-of-america-flag-xs.png" alt="US Flag" width="20"> USD </label>
            <label><input type="radio" name="to" value="EUR" required><img src="flags/germany-flag-xs.png" alt="GER Flag" width="20"> EUR </label>
            <label><input type="radio" name="to" value="GBP" required><img src="flags/united-kingdom-flag-xs.png" alt="GBP Flag" width="20"> GBP </label>
            <label><input type="radio" name="to" value="CNY" required><img src="flags/china-flag-xs.png" alt="CNY Flag" width="20"> CNY </label>
        </div>
        <br><br><br>
        <input type="submit" value="Convert">
</form>
<?php if ($error): ?>
    <p class="result" style="color:red;"><?php echo $error; ?></p>
<?php elseif ($converted !== null): ?>
    <div class="result">
        <img src="<?php echo $flagMap[$from]; ?>" width="20">
        <?php echo $from . ' ' . $amount; ?> =
        <img src="<?php echo $flagMap[$to]; ?>" width="20">
        <?php echo $to . ' ' . $converted; ?>
    </div>
<?php endif; ?>
</body>
</html>