<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../images/logo.png" rel="icon">
    <link href="../images/logo.png" rel="apple-touch-icon">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Preinscripcion</title>
</head>
<body>
    <div>
        <div class="fcaja_2 threed">
            <form>
                <h1>Preinscripcion</h1>
                <label for="name">Nombre Completo:</label>
                <input type="text" name="name" id="name" alt="name">
                <br>
                <label for="l_name">Apellido:</label>
                <input type="text" name="l_name" id="l_name" alt="l_name">
                <br>
                <label for="phone">Celular:</label>
                <input type="tel" name="phone" id="phone" alt="phone">
                <br>
                <label for="email">Correo Electronico:</label>
                <input type="email" name="email" id="email" alt="email">
                <br>
                <label for="date">Fecha de nacimiento:</label>
                <input type="date" name="date" id="date" alt="date">
                <br>
                <label for="dni">Dni:</label>
                <input type="text" name="dni" id="dni">
                <br>
                <label for="carrer">Carrera:</label>
                <select name="carrer" id="lang">
                    <option value="javascript">JavaScript</option>
                    <option value="php">PHP</option>
                    <option value="java">Java</option>
                    <option value="golang">Golang</option>
                    <option value="python">Python</option>
                    <option value="c#">C#</option>
                    <option value="C++">C++</option>
                    <option value="erlang">Erlang</option>
                </select>
                <br>
                <label for="street">Calle y Altura</label>
                <input type="text" name="street" id="street">
                <br>
                <label for="gender">Genero:</label>
                <input type="radio" name="gender" id="Male" value="Masculino">Masculino
                <input type="radio" name="gender" id="Female" value="Femenino">Femenino
                <br>
                <br>
                <input class="button" type="submit" value="Guardar Datos">
            </form>
        </div>
</body>
</html>