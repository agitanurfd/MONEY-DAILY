<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <script>
        <?php
        if (isset($_GET['pesan'])) { // memeriksa apakah suatu variabel sudah diatur atau belum.
            $pesan = $_GET['pesan'];
            echo "alert('$pesan')";
        }
        ?>
    </script>

    <!--LOGIN-->
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="koneksiLogin.php" method="POST" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" name="email" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>


                    <!-- FORGOT PASSWORD -->
                    <p>Lupa Password?<a href="ForgotPassword.php">Klik Disini</a></p>
                    <a href="index.php">
                        <input type="submit" value="Login" class="btn solid" />
                    </a>
                </form>
                </a>


                <!--REGISTER-->
                <form action="koneksiRegister.php" method="POST" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="name" placeholder="Name" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="mother_name" placeholder="Mother Name" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" required />
                    </div>
                    <a href="LoginRegister.php">
                        <input type="submit" class="btn" value="Sign up" />
                    </a>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Daftarkan akunmu untuk menggunakan aplikasi Money Daily sekarang.
                    </p>

                    <button class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>

                </div>
                <img src="assets/img/Money_Daily.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Sudah punya akun? Login disini sekarang.
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>

                </div>
                <img src="assets/img/saving.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="assets/js/app.js"></script>
</body>

</html>