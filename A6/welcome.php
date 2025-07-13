<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Welcome</title>
</head>
<body>
    <h1>If you want a custom greeting message, please do the following: </h1>
 <fieldset>
 <ol>
 <li>In your address bar, append a '?' symbol </li>
 <li>Then write 'firstName=' with your first name next to it</li>
 <li>Then write '&' followed by 'lastName' with your last name next to it</li>
 <li>Hit ENTER and see your customized message in the greeting below</li>
 </ol>
 </fieldset>

<div class="greeting">
<?php
if(isset($_GET['firstName']) && !empty($_GET[ 'firstName' ])){
    echo "Greeting: Howdy " . htmlspecialchars($_GET[ 'firstName' ]);
}elseif(isset($_GET['lastName']) && !empty($_GET[ 'lastName' ])){
    echo "Greeting: Howdy " . htmlspecialchars($_GET[ 'lastName' ]);
} else{
    echo "Greeting: Howdy no names";
}
?>
</div>

</body>
</html>