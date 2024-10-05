<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>SIG PASAR TRADISIONAL PASAR TRADISIONAL - LOGIN ADMIN</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
</head>
<?php
if (isset($_GET['pesan']) && $_GET['pesan'] == "gagal") {
    echo '
        <div id="errorPopup" style="
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #ffdddd;
            color: #721c24;
            padding: 20px 30px;
            border: 1px solid #f5c6cb;
            border-radius: 10px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            animation: popup 0.5s ease-in-out;
            text-align: center;
        ">
            <i class="fas fa-exclamation-circle" style="font-size: 40px; color: #f5c6cb;"></i>
            <p style="font-size: 18px; margin: 15px 0 10px;">Login gagal!</p>
            <p style="font-size: 16px; margin: 0;">Username dan password salah!</p>
            <button onclick="document.getElementById(\'errorPopup\').style.display=\'none\'" style="
                margin-top: 20px;
                background-color: #721c24;
                color: white;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
                font-size: 16px;
            ">Tutup</button>
        </div>

        <style>
            @keyframes popup {
                0% { transform: translate(-50%, -50%) scale(0.5); opacity: 0; }
                100% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
            }
        </style>
        ';
}
?>

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <img src="assets/images/login2.jpg" alt="login" class="login-card-img" />
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="assets/images/Logo.png" alt="logo" class="logo" />
                            </div>
                            <p class="login-card-description">Sign into your account</p>
                            <form class="user" method="post" action="login_cek.php"></form>
                            <form action="#!">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Username</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Username" />
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login" />
                            </form>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>