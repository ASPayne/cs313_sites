<?PHP
// Start the session
//session_start();
include 'session.php';

if (isset($_POST['user'])) {
    $_SESSION['user'] = $_POST['user'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

</head>

<body>
    <?php
    include 'header.php';
    ?>
    <main>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            Name: <input type="text" name="user"><br>
            <button type="submit">Temp Login as Admin</button>
        </form>
        <p>
        </p>
        <?PHP echo $_SESSION['user']; ?>

        <a href="/home.php">Log In as Administrator</a>
        <a href="/home.php">Log In as Tester</a>



        <br>
        <br>
        <br>
        <h2>Enter Username and Password</h2>
        <div class="container form-signin">

            <?php
            $msg = '';

            if (
                isset($_POST['login']) && !empty($_POST['username'])
                && !empty($_POST['password'])
            ) {

                if (
                    $_POST['username'] == 'tutorialspoint' &&
                    $_POST['password'] == '1234'
                ) {
                    $_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
                    $_SESSION['username'] = 'tutorialspoint';

                    echo 'You have entered valid use name and password';
                } else {
                    $msg = 'Wrong username or password';
                }
            }
            ?>
        </div> <!-- /container -->

        <div class="container">

            <form class="form-signin" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                            ?>" method="post">
                <h4 class="form-signin-heading"><?php echo $msg; ?></h4>
                <input type="text" class="form-control" name="username" placeholder="username = tutorialspoint" required autofocus></br>
                <input type="password" class="form-control" name="password" placeholder="password = 1234" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
            </form>

            Click here to clean <a href="logout.php" title="Logout">Session.

        </div>
    </main>

</body>
<?php
include 'footer.php';
?>

</html>