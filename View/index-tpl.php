<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>

<body>

    <?php 
        if(isset($wellcome_message)){

            echo $wellcome_message;

        }
    ?>

    <h1 style="text-align: center;">User Profile</h1>
    <a href="logout">Logout</a>
    <ul>

    </ul>
</body>

</html>