<?php require_once '../controllers/crud_pre_registration.php';
      require_once '../controllers/message_control.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/pre_register.css">
    
    <title>institutec</title>
</head>
<body>
    <?php show_messages_verify('mail_correcto', "revise su casilla de correo, registro exitoso!");  ?>
    <section class="login">
        <div class="login_box">
            <div class="left">
                <div class="top_link"><a href="../index.php"><img src="https://drive.google.com/u/0/uc?id=16U__U5dJdaTfNGobB_OpwAJ73vM50rPV&export=download" alt="">Return home</a></div>
                <div class="contact">
                    <form action="../controllers/crud_pre_registration.php" method="post">
                        <?php show_messages_error('campo', "debe llenar todos los campos"); ?>
                        <h3>Pre Inscribirse</h3>
                        <input type="text" placeholder="Ingrese su Nombre Completo" name="name">
                        <input type="text" placeholder="Ingrese su Apellido" name="l_name">
                        <input type="text" placeholder="Ingrese su Celular " name="phone">
                        <input type="text" placeholder="Ingrese su Email" name="email">
                        <input type="date" placeholder="Ingrese su Fecha de Nacimiento" name="date">
                        <input type="text" placeholder="Ingrese su Dni" name="dni">
                        <label for="carrer">Carrera:</label>
                        <select name="carrer" id="carrer">
                            <?php foreach ($carrerData as $carrer) { ?>
                                <option value="<?php echo $carrer['career_name']; ?>"><?php echo $carrer['career_name']; ?></option>
                            <?php } ?>
                        </select>
                        <input type="text" placeholder="Ingrese su Direccion" name="street">
                        <div class="gender-radio">
                            <label for="gender">Género:</label>
                            <input type="radio" name="gender" id="Male" value="Masculino">
                            <label for="Male">Masculino</label>
                            <input type="radio" name="gender" id="Female" value="Femenino">
                            <label for="Female">Femenino</label>
                        </div>
                        <button class="submit" name="save_data">Enviar Datos</button>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="right-text">
                    <h2>Institutec</h2>
                    <h5>Escuela Educativa</h5>
                </div>
                <div class="right-inductor"><img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt=""></div>
            </div>
        </div>
    </section>
</body>
</html>
