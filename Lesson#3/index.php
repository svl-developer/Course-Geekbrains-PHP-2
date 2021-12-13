<?php
spl_autoload_register(function($name){

require __DIR__ . '/'.$name.'.php';

});

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фотографии</title>
</head>
<body>


<?php echo Controllers\MainController::viewMain(); ?>
    
</body>
</html>






