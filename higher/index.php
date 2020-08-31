<?php
$msg = '';
if (isset($_POST['username']))
    if (($_POST['username'] == 'admin') && ($_POST['password'] == 123)) {
        session_start();
        $_SESSION['username'] = 'admin';
        header("Location: home.php");
    } else {
        $msg = "Username or password is wrong";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Higher Authorities</title>
</head>

<body class="bg-dark">
    <div class="container col-4 mt-4 border p-4 bg-white shadow">
        <h1>Only for higher Authorities</h1>
        <p class="text-danger"><?php echo $msg; ?></p>
        <form action="index.php" method="post">
            <label for="username">Username : </label>
            <input required class="form-control" type="text" name="username" id="">
            <label for="password">Password : </label>
            <input required class="form-control" type="password" name="password" id="">
            <input type="submit" value="Log in" class="mt-3 btn btn-primary">
        </form>
    </div>
</body>

</html>