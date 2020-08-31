<?php
include('../connection.php');
$msg = "";
if (isset($_POST['log'])) {
    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $result = mysqli_query($connection, "select * from volunteers where username='$email' and password='$password';");
        if (mysqli_num_rows($result)) {
            session_destroy();
            session_start();
            $_SESSION['username'] = $email;
            header("Location: home.php");
        } else {
            $msg = "Check your email and password";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap.min.css">
    <title>Log in</title>
</head>

<body>
    <!-- Just an image -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <svg height=30 width=30 aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="svg-inline--fa fa-users fa-w-20">
                <path fill="black" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z" class=""></path>
            </svg>
        </a>
    </nav>
    <div class="container mt-4 col-5">
        <form action="index.php" method="post">
            <input type="hidden" name="log" value=1>
            <div class="m-3 p-3 shadow">
                <h3 class="text-danger"><?php echo $msg; ?></h3>
                <h1>Volunteers <br> Log in : </h1>
                <input required placeholder="username" type="text" name="email" id="" class="form-control mb-3">
                <input required placeholder="password" type="password" name="password" id="" class="form-control mb-3">
                <input name="submit" type="submit" value="Log in" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
</body>

</html>