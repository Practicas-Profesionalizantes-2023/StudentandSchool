<?php
class model_sql
{
    private $pdo; // Propiedad para almacenar la conexión

    public function __construct()
    {
        $this->pdo = $this->connectToDatabase();
    }
//funcion que conecta la base de dato
    private function connectToDatabase()
    {
        $hostname = "db";
        $database = getenv("DB_NAME");
        $username = getenv("MYSQL_USER");
        $password = getenv("MYSQL_ROOT_PASSWORD");
        $charset = "utf8";

        try {
            $connection = "mysql:host=" . $hostname . ";dbname=" . $database . ";charset=" . $charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];

            $pdo = new PDO($connection, $username, $password, $options);
            return $pdo;
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
            exit;
        }
    }
//funcion para probar la base de dato
    public function test_db()
    {
        try {
            $stmt = $this->pdo->query('SELECT 1');
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && $result['1'] == 1) {
                echo 'Conexión exitosa a la base de datos.';
            } else {
                echo 'Error al conectar a la base de datos.';
            }
        } catch (PDOException $e) {
            echo 'Error de conexión: ' . $e->getMessage();
        }
    }

    //funcion credencial login
    public function login($user, $password)
{
    $query = "SELECT dni, name FROM internal_users WHERE dni = :user AND password = :password";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':user', $user);
    $statement->bindParam(':password', $password);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        return $row; // Devuelve la fila si las credenciales son correctas
    } else {
        return false; // Devuelve false si las credenciales son incorrectas
    }
}

//funcion para Mostrar un registro

public function show($table){

$query="SELECT * FROM $table";
$statement=$this->pdo->prepare($query);
$statement->execute();
$list_data=$statement->fetchAll();

return $list_data;

}

// Función para la validación de duplicados en una base de datos
public function checkForDuplicates($value1, $value2)
{
    try {
        // Verificar si ya existe un registro con el mismo DNI o correo electrónico
        $checkQuery = "SELECT COUNT(*) FROM pre_registration WHERE dni = :dni OR mail = :mail";
        $checkStatement = $this->pdo->prepare($checkQuery);
        $checkStatement->bindParam(':dni', $value1, PDO::PARAM_STR);
        $checkStatement->bindParam(':mail', $value2, PDO::PARAM_STR);
        $checkStatement->execute();

        $count = $checkStatement->fetchColumn();

        if ($count > 0) {
            // Ya existe un registro con el mismo DNI o correo electrónico
            return "Email o DNI ya registrados anteriormente.";
        }

        return false;
    } catch (PDOException $e) {
        echo "Error en la validación de duplicados: " . $e->getMessage();
        return false;
    }
}

//funcion para insertar alumnos preinscriptos
public function pre_registration($value1, $value2, $value3, $value4
, $value5, $value6
, $value7, $value8, $value9)
{
    $query = "INSERT INTO pre_registration (name, last_name, phone, mail, date, dni, carrer,heigth_street,gender)
              VALUES (:name, :last_name, :phone, :mail, :date, :dni, :career, :heigth_street, :gender)";

    $statement = $this->pdo->prepare($query);

    $statement->bindParam(':name', $value1, PDO::PARAM_STR);
    $statement->bindParam(':last_name', $value2, PDO::PARAM_STR);
    $statement->bindParam(':phone', $value3, PDO::PARAM_STR);
    $statement->bindParam(':mail', $value4, PDO::PARAM_STR);
    $statement->bindParam(':date', $value5, PDO::PARAM_STR);
    $statement->bindParam(':dni', $value6, PDO::PARAM_STR);
    $statement->bindParam(':career', $value7, PDO::PARAM_STR);
    $statement->bindParam(':heigth_street', $value8, PDO::PARAM_STR);
    $statement->bindParam(':gender', $value9, PDO::PARAM_STR);

    try {
        if ($statement->execute()) {
            return true; // Devuelve verdadero si la inserción fue exitosa
        }
    } catch (PDOException $e) {
        echo "Error en la inserción: " . $e->getMessage();
        return false;
    }
}




}
?>