<?php session_start(); ?>
<!doctype html>
<html lang="nl">

<head>
    <title>StoringApp</title>
    <?php require_once 'resources/views/head.php'; ?>
</head>

<body>
    <?php require_once 'resources/views/header.php'; ?>
    <main>
        <div class="bodyInlog">
            <div class="mainInlog">
                <input type="checkbox" id="chk" aria-hidden="true">

                <div class="login">
                    <form action="<?php echo $base_url; ?>/controllers/loginController.php" method="post">
                        <label for="chk" aria-hidden="true" style="background-color: white;">Login</label>
                        <input type="text" name="username" placeholder="user1 t/m 3" required="">
                        <input type="password" name="password" placeholder="password1 t/m 3" required="">
                        <button>Login</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>