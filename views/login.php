
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../images/logo.png" rel="icon">
    <link href="../images/logo.png" rel="apple-touch-icon">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Login</title>
</head>
<header>
	<div class="overlay">
	</div>
</header>
<body>
    <div>
        <div class="fcaja threed">
            <form action="../controllers/c_login.php" method="post">
                <input class="controls" type="text" name="user" placeholder="Usuario">
                <br>
                <div class="password-toggle">
                    <input class="controls" type="password" name="password" placeholder="Contraseña" id="password">
                    <label class="show-password-button" for="showPasswordCheckbox">&#x1f441;</label>
                    <input type="checkbox" id="showPasswordCheckbox" style="display: none;">
                </div>
                <br>
                <input class="button" type="submit" value="Ingresar" name="submit">
                <br>
                <button class="button" name="pre"><a href="../views/pre_register.php">Preinscripción</a></button>
                <button>¿Olvidaste tu contraseña?</button>
            </form>
        </div>

       
       <script>
            const passwordInput = document.getElementById("password");
            const showPasswordCheckbox = document.getElementById("showPasswordCheckbox");

            showPasswordCheckbox.addEventListener("change", function () {
                if (showPasswordCheckbox.checked) {
                    passwordInput.type = "text";
                } else {
                    passwordInput.type = "password";
                }
            });
        </script>



    </div>
<footer>
    <div class="overlay">
	</div>
</footer>
</body>
</html>
