<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Forgot Password Form</title>
</head>

<body>
    <script>
        <?php
        if (isset($_GET['pesan'])) {
            $pesan = $_GET['pesan'];
            echo "alert('$pesan')";
        }
        ?>
    </script>

    <!--LOGIN-->
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="koneksiForgot.php" method="POST" class="sign-in-form">
                    <h2 class="title">Forgot Password</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="mother_name" placeholder="Mother Name" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="New Password" required />
                    </div>
                    <a href="LoginRegister.php">
                        <input type="submit" value="Login" class="btn solid" />
                    </a>
                </form>
                </a>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Lupa Password ?</h3>
                    <p>
                        Silahkan masukkan E-mail dan Nama Ibu kemudian Password Baru.
                    </p>
                    <a href="LoginRegister.php">
                        <button class="btn transparent">
                            Sign in
                        </button>
                    </a>
                </div>
                <img src="assets/img/Money_Daily.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>

</html>