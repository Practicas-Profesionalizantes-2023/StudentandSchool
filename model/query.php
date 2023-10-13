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
        $username = "root";
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
    // Función credencial login
 public function login($user, $password)
 {
    $query = "SELECT dni, name, fk_rol_id, state,password_changed,id_user, password FROM internal_users WHERE dni = :user";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':user', $user);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Verifica si la contraseña coincide usando password_verify
        if (password_verify($password, $row['password'])) {
            return $row; // Devuelve la fila si las credenciales son correctas
        }
    }
    
    return false; // Devuelve false si las credenciales son incorrectas
}


public function show_table($table){

    $query="SELECT * FROM $table";
    $statement=$this->pdo->prepare($query);
    $statement->execute();
    $list_data=$statement->fetchAll();
    
    return $list_data;
    
    }

//para mostrar de la tabla los que tengan estado 1
public function show_state($table){

    $query="SELECT * FROM $table WHERE state = 1";
    $statement=$this->pdo->prepare($query);
    $statement->execute();
    $list_data=$statement->fetchAll();
    
    return $list_data;
    
    }
    //mostrar un elemento de la tabla
    public function getSingleShow($table,$value)
    {
        $query = "SELECT * FROM $table WHERE id_pre_user = :id_pre_user AND state = 1";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_pre_user', $value, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getFirstValidCredential(){
        $query = "SELECT email, token FROM credential_email";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    
// Función para la validación de duplicados en una base de datos
public function checkForDuplicates($table,$value1, $value2)
{
    try {
        // Verificar si ya existe un registro con el mismo DNI o correo electrónico
        $checkQuery = "SELECT COUNT(*) FROM $table WHERE dni = :dni OR mail = :mail";
        $checkStatement = $this->pdo->prepare($checkQuery);
        $checkStatement->bindParam(':dni', $value1, PDO::PARAM_STR);
        $checkStatement->bindParam(':mail', $value2, PDO::PARAM_STR);
        $checkStatement->execute();

        $count = $checkStatement->fetchColumn();

        if ($count > 0) {
            
              
         return true;
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
    $query = "INSERT INTO pre_registration (name, last_name, phone, mail, date, dni, carrer,heigth_street,gender,state)
              VALUES (:name, :last_name, :phone, :mail, :date, :dni, :career, :heigth_street, :gender,1)";

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
//buscador para los pre_inscriptos
public function search_pre_register($search) {
    $query = "SELECT * FROM pre_registration 
            WHERE name LIKE :name 
            OR mail LIKE :mail";


         
    
    // Preparar la declaración
    $statement = $this->pdo->prepare($query);

    // Asignar el valor de búsqueda a los marcadores de posición
    $searchParam = "%$search%"; // Agregar comodines para buscar coincidencias parciales
    $statement->bindParam(':name', $searchParam, PDO::PARAM_STR);
    $statement->bindParam(':mail', $searchParam, PDO::PARAM_STR);

 

    // Ejecutar la consulta
    $statement->execute();

    // Obtener y devolver los resultados
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    return $results;
}

public function updateUserData($user_id, $name, $last_name, $phone, $mail, $career, $heigth_street)
{
    try {
        // Create the SQL query
        $query = "UPDATE pre_registration SET 
                name = :name, 
                last_name = :last_name, 
                phone = :phone, 
                mail = :mail, 
                carrer = :career, 
                heigth_street = :heigth_street 
                WHERE id_pre_user = :user_id";

        // Prepare and execute the SQL statement
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':mail', $mail, PDO::PARAM_STR);
        $statement->bindParam(':career', $career, PDO::PARAM_STR);
        $statement->bindParam(':heigth_street', $heigth_street, PDO::PARAM_STR);

        $result = $statement->execute();

        return $result; 
    } catch (PDOException $e) {
        echo "Error in update: " . $e->getMessage();
        return false;
    }
}

function eliminated_register($table, $id_user)
{
    try {
        // Luego, actualiza el estado del registro a 0
        $query = "UPDATE $table SET state = 0 WHERE id_pre_user = :id_user";
        $updateStatement = $this->pdo->prepare($query);
        $updateStatement->bindParam(':id_user', $id_user, PDO::PARAM_INT);

        // Ejecuta la actualización
        $updateStatement->execute();

        // Verifica si se actualizó al menos una fila
        $rowCount = $updateStatement->rowCount();

        if ($rowCount > 0) {
            // La eliminación se realizó con éxito
            return true;
        } 
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
        return false;
    }
}

function create_account($value1,$value2,$value3,$value4,$value5){
    $query = "INSERT INTO internal_users (name, dni, password,mail, fk_rol_id, state)
          VALUES (:name, :dni, :password,:mail, :fk_rol_id, 1)";


$statement = $this->pdo->prepare($query);
$statement->bindParam(':name', $value1, PDO::PARAM_STR);
$statement->bindParam(':dni', $value2, PDO::PARAM_STR);
$statement->bindParam(':password', $value3, PDO::PARAM_STR);
$statement->bindParam(':mail', $value4, PDO::PARAM_STR);
$statement->bindParam(':fk_rol_id', $value5, PDO::PARAM_INT);

try{
    if($statement->execute()){
        return true;
    }
}catch (PDOException $e) {
    echo "Error en la inserción: " . $e->getMessage();
    return false;
}

}

function union_table(){
    $query = "SELECT
      internal_users.id_user AS 'id_user',
      internal_users.password AS 'password',
      internal_users.name 'name',
      internal_users.dni AS 'dni',
      internal_users.state AS 'state',
      internal_users.mail AS 'mail',
      rol.details AS 'details'
    FROM internal_users
    JOIN rol ON internal_users.fk_rol_id = rol.id_rol"; 
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    $union_data = $statement->fetchAll();
    return $union_data;
  }
  

  public function disableUser($user_id) {
    try {
        $query = "UPDATE internal_users SET state = 0 WHERE id_user = :user_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        return true; 
    } catch (PDOException $e) {
       
        return false; 
    }
}

public function enableUser($user_id) {
    try {
        $query = "UPDATE internal_users SET state = 1 WHERE id_user = :user_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->execute();
        return true;
    } catch (PDOException $e) {
        
        return false; 
    }
}


public function search_internal_users($search) {
    $query = "SELECT internal_users.id_user AS 'id_user', internal_users.name AS 'name'
            , internal_users.dni AS 'dni', internal_users.mail AS 'mail', rol.details AS 'details',
            internal_users.state AS 'state' 
              FROM internal_users 
              JOIN rol ON internal_users.fk_rol_id = rol.id_rol 
              WHERE internal_users.mail LIKE :search_name
              or internal_users.name LIKE :search_mail" ;

    // Preparar la declaración
    $statement = $this->pdo->prepare($query);

    // Asignar el valor de búsqueda a los marcadores de posición
    $searchParam = "%$search%"; // Agregar comodines para buscar coincidencias parciales
    $statement->bindParam(':search_name', $searchParam, PDO::PARAM_STR);
    $statement->bindParam(':search_mail', $searchParam, PDO::PARAM_STR);

    // Ejecutar la consulta
    $statement->execute();

    // Obtener y devolver los resultados
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $results;
}



public function getSingleuser($table,$value)
{
    $query = "SELECT * FROM $table WHERE id_user = :id_user";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_user', $value, PDO::PARAM_INT);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}

//borrar un usuario interno
public function deleteUserData($table, $user_id) {
    $query = "DELETE FROM $table WHERE id_user = :user_id";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    return $statement->execute();
}

public function update_password($table,$user_id,$password){
   try{
    $query = "UPDATE $table SET password=:password, password_changed=1
    WHERE id_user=:id_user";
    
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_user', $user_id, PDO::PARAM_INT);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    $result = $statement->execute();

    return $result; 
} catch (PDOException $e) {
    echo "Error in update: " . $e->getMessage();
    return false;
}
   

}
function insertCareer($career, $title, $amount) {
    
    
     $query = "INSERT INTO careers (career_name , title, amount_subjects, date_high, state, fk_book_career_id)
      VALUES (:careers,:title, :amount_subjects, CURRENT_TIMESTAMP, '1', '1')";

    $consulta = $this->pdo->prepare($query);


    $consulta->bindParam(':careers', $career, PDO::PARAM_STR);
    $consulta->bindParam(':title', $title, PDO::PARAM_STR);
    $consulta->bindParam(':amount_subjects', $amount, PDO::PARAM_INT);
  
    try {
        if ($consulta->execute()) {
            return true; // Devuelve verdadero si la inserción fue exitosa
        }
    } catch (PDOException $e) {
        echo "Error en la inserción: " . $e->getMessage();
        return false;
    }
}

public function getSingleShowCareer($table,$value)
    {
        $query = "SELECT * FROM $table WHERE id_career = :id_career AND state = 1";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_career', $value, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    function eliminated_career($table, $id_user)
{
    try {
        // Luego, actualiza el estado del registro a 0
        $query = "UPDATE $table SET state = 0 WHERE id_career = :id_career";
        $updateStatement = $this->pdo->prepare($query);
        $updateStatement->bindParam(':id_career', $id_user, PDO::PARAM_INT);

        // Ejecuta la actualización
        $updateStatement->execute();

        // Verifica si se actualizó al menos una fila
        $rowCount = $updateStatement->rowCount();

        if ($rowCount > 0) {
            // La eliminación se realizó con éxito
            return true;
        } 
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
        return false;
    }
}
public function getUserCareer($idcareer)
{
    $query = "SELECT * FROM careers WHERE id_career = :id_career and state=1";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_career', $idcareer, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}
public function updateUserCareer($id_career, $career, $title, $subjects)
{
    try {
        // Create the SQL query
        $query = "UPDATE careers SET 
                career_name = :career, 
                title = :title, 
                amount_subjects = :subjects
                WHERE id_career = :id_career";

        // Prepare and execute the SQL statement
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_career', $id_career, PDO::PARAM_INT);
        $statement->bindParam(':career', $career, PDO::PARAM_STR);
        $statement->bindParam(':title', $title, PDO::PARAM_STR);
        $statement->bindParam(':subjects', $subjects, PDO::PARAM_INT);
       
        

        $result = $statement->execute();

        return $result; 
    } catch (PDOException $e) {
        echo "Error in update: " . $e->getMessage();
        return false;
    }
}

//mostrar un solo registro del dni que coincida con el front

public function getSingleuserByDNI($table, $dni) {
    try {
        $query = "SELECT * FROM $table WHERE dni = :dni";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':dni', $dni, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error al buscar usuario por DNI: ' . $e->getMessage();
        return false;
    }
}

//actualizar la contraseña si el dni ingresado es el mismo que el de la base de dato
public function forgot_password($table, $dni, $password) {
    try {
       
        $query = "UPDATE $table SET password = :password WHERE dni = :dni";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':dni', $dni, PDO::PARAM_INT); // Debe ser INT si el ID es un entero.
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        return $statement->execute();
    } catch (PDOException $e) {
        echo 'Error al actualizar la contraseña: ' . $e->getMessage();
        return false;
    }
}

// Insertar una materia asociada a una carrera
public function insert_subject($subject_name,$details,$fk_career_id) {
    $query = "INSERT INTO subjects (subject_name,details,create_date,state, fk_career_id)
              VALUES (:subject_name,:details,CURRENT_TIMESTAMP, '1', :fk_career_id)";

    $statement = $this->pdo->prepare($query);

    $statement->bindParam(':subject_name', $subject_name, PDO::PARAM_STR);
    $statement->bindParam(':details', $details, PDO::PARAM_STR);
    $statement->bindParam(':fk_career_id', $fk_career_id, PDO::PARAM_INT);
   
  
    try {
        if ($statement->execute()) {
            return true; // Devuelve verdadero si la inserción fue exitosa
        }
    } catch (PDOException $e) {
        echo "Error en la inserción: " . $e->getMessage();
        return false;
    }
}

//mostrando los datos de materia y carrerra donde los id coinciden
public function show_date_id_career($value) {
    try {
        $query = "SELECT
            subjects.id_subjects AS id_subjects,
            subjects.subject_name AS subject_name,
            subjects.details AS details,
            subjects.create_date AS create_date,
            subjects.state AS state,
            subjects.fk_career_id AS fk_career_id,
            careers.id_career AS id_career,
            careers.career_name AS career_name
        FROM
            subjects
        JOIN
            careers ON subjects.fk_career_id = careers.id_career
        WHERE
            subjects.fk_career_id = :fk_career_id
            AND subjects.state = 1
           "; // Agrega esta condición

        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':fk_career_id', $value, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error al buscar la carrera: ' . $e->getMessage();
        return false;
    }
}



// seleccionar donde los id acoincidan
public function getSingle_subject($table,$value)
{
    $query = "SELECT * FROM $table WHERE id_subjects = :id_subjects";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_subjects', $value, PDO::PARAM_INT);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}



public function update_subject($value1, $value2)
{
    try {
        // Create the SQL query
        $query = "UPDATE subjects SET 
        subject_name = :subject_name
        WHERE id_subjects = :id_subjects";

        // Prepare and execute the SQL statement
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_subjects', $value1, PDO::PARAM_INT);
        $statement->bindParam(':subject_name', $value2, PDO::PARAM_STR);
       
       
        

        $result = $statement->execute();

        return $result; 
    } catch (PDOException $e) {
        echo "Error in update: " . $e->getMessage();
        return false;
    }
}

// eliminar una materia cambiando su estado a 0


function eliminated_subject($table, $value)
{
    try {
        // Luego, actualiza el estado del registro a 0
        $query = "UPDATE $table SET state = 0 WHERE id_subjects = :id_subjects";
        $updateStatement = $this->pdo->prepare($query);
        $updateStatement->bindParam(':id_subjects', $value, PDO::PARAM_INT);

        // Ejecuta la actualización
        $updateStatement->execute();

        // Verifica si se actualizó al menos una fila
        $rowCount = $updateStatement->rowCount();

        if ($rowCount > 0) {
            // La eliminación se realizó con éxito
            return true;
        } 
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
        return false;
    }
}
function insertTeacher($name, $surname, $phone, $email, $direction, $height, $dni, $fk_gender_id) {
    $query = "INSERT INTO teachers (name, surname, phone, mail, direction, height, state, dni, fk_gender_id, fech)
              VALUES (:name, :surname, :phone, :email, :direction, :height, 1, :dni, :gender, NOW())";

    $consulta = $this->pdo->prepare($query);

    $consulta->bindParam(':name', $name, PDO::PARAM_STR);
    $consulta->bindParam(':surname', $surname, PDO::PARAM_STR);
    $consulta->bindParam(':phone', $phone, PDO::PARAM_INT);
    $consulta->bindParam(':email', $email, PDO::PARAM_STR);
    $consulta->bindParam(':direction', $direction, PDO::PARAM_STR);
    $consulta->bindParam(':height', $height, PDO::PARAM_STR);
    $consulta->bindParam(':dni', $dni, PDO::PARAM_INT);
    $consulta->bindParam(':gender', $fk_gender_id, PDO::PARAM_INT);

    try {
        if ($consulta->execute()) {
            return true; // Devuelve verdadero si la inserción fue exitosa
        }
    } catch (PDOException $e) {
        echo "Error en la inserción: " . $e->getMessage();
        return false;
    }
}

public function getUserTeacher($id_teacher)
{
    $query = "SELECT * FROM teachers WHERE id_teacher = :id_teacher and state=1";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

public function updateUserTeacher($id_teacher, $name, $surname, $phone, $mail, $direction, $height)
{
    try {
        // Create the SQL query
        $query = "UPDATE teachers SET 
                name = :name,
                surname = :surname,  
                phone = :phone,
                mail = :mail,  -- Agrega una coma aquí
                direction = :direction,  -- Agrega una coma aquí
                height = :height
                WHERE id_teacher = :id_teacher";

        // Prepare and execute the SQL statement
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':surname', $surname, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_INT);
        $statement->bindParam(':direction', $direction, PDO::PARAM_STR);
        $statement->bindParam(':height', $height, PDO::PARAM_INT);
        $statement->bindParam(':mail', $mail, PDO::PARAM_STR);

        $result = $statement->execute();

        return $result; 
    } catch (PDOException $e) {
        echo "Error in update: " . $e->getMessage();
        return false;
    }
}


public function getSingleShowTeacher($table,$value)
    {
        $query = "SELECT * FROM $table WHERE id_teacher = :id_teacher AND state = 1";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_teacher', $value, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
   public function eliminated_Teacher($table, $id_user)
{
    try {
        // Luego, actualiza el estado del registro a 0
        $query = "UPDATE $table SET state = 0 WHERE id_teacher = :id_teacher";
        $updateStatement = $this->pdo->prepare($query);
        $updateStatement->bindParam(':id_teacher', $id_user, PDO::PARAM_INT);

        // Ejecuta la actualización
        $updateStatement->execute();

        // Verifica si se actualizó al menos una fila
        $rowCount = $updateStatement->rowCount();

        if ($rowCount > 0) {
            // La eliminación se realizó con éxito
            return true;
        } 
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
        return false;
    }
}

//parte para poder habilitar y desabilitar las preinscripciones
public function get_state($table,$value)
    {
        $query = "SELECT state FROM $table WHERE id_control = :id_control";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_control', $value, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

public function disable_preinscription($table, $value2)
{
    try {
        // Create the SQL query
        $query = "UPDATE $table SET state = 0 WHERE id_control = :id_control";

        // Prepare and execute the SQL statement
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_control', $value2, PDO::PARAM_INT);
      
       
       
        

        $result = $statement->execute();

        return $result; 
    } catch (PDOException $e) {
        echo "Error in update: " . $e->getMessage();
        return false;
    }
}


public function enable_preinscription($table, $value2)
{
    try {
        // Create the SQL query
        $query = "UPDATE $table SET state = 1 WHERE id_control = :id_control";

        // Prepare and execute the SQL statement
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_control', $value2, PDO::PARAM_INT);
      
       
       
        

        $result = $statement->execute();

        return $result; 
    } catch (PDOException $e) {
        echo "Error in update: " . $e->getMessage();
        return false;
    }
}




//mostrando los datos de materia y el profesor donde los id coinciden
public function show_date_id_teacher($teacherId) {
    try {
        $query = "SELECT
    teachers.name AS teacher_name,
    teachers.surname AS teacher_surname,
    subjects.subject_name AS subject_name,
    subjects.state AS 'state',
    subjects.details AS 'details',
    teachers_subjects.id_teacher_subject AS 'id_teacher_subject',
    careers.career_name AS 'name_career'
FROM
    teachers_subjects
JOIN
    teachers ON teachers_subjects.fk_teacher_id = teachers.id_teacher
JOIN
    subjects ON teachers_subjects.fk_subject_id = subjects.id_subjects
JOIN 
    careers ON subjects.fk_career_id = careers.id_career
WHERE
    teachers.id_teacher = :teacher_id
    AND teachers.state = 1
    AND subjects.state = 1;";


        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':teacher_id', $teacherId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo 'Error al obtener los datos del maestro y las materias: ' . $e->getMessage();
        return false;
    }
}

public function insert_subject_teacher($value1,$value2) {
    $query = "INSERT INTO teachers_subjects (fk_subject_id,fk_teacher_id)
              VALUES (:fk_subject_id,:fk_teacher_id)";

    $statement = $this->pdo->prepare($query);

    $statement->bindParam(':fk_subject_id', $value1, PDO::PARAM_INT);
    $statement->bindParam(':fk_teacher_id', $value2, PDO::PARAM_INT);
  
    try {
        if ($statement->execute()) {
            return true; // Devuelve verdadero si la inserción fue exitosa
        }
    } catch (PDOException $e) {
        echo "Error en la inserción: " . $e->getMessage();
        return false;
    }
}

// seleccionar donde los id acoincidan
public function getSingle_subject_teacher($table,$value)
{
    $query = "SELECT * FROM $table WHERE id_teacher_subject = :id_teacher_subject";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_teacher_subject', $value, PDO::PARAM_INT);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}

//borrar un usuario interno
public function delete_teacher_subject($table, $value) {
    $query = "DELETE FROM $table WHERE id_teacher_subject = :id_teacher_subject";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_teacher_subject', $value, PDO::PARAM_INT);
    return $statement->execute();
}



function insertStudent($name, $last_name, $direction, $height, $uk_dni, $email, $phone, $school_year,$fk_career_id,$birth_date,$fk_id_gender) {
    $query = "INSERT INTO estudents (name, last_name, direction, height, uk_dni, email, state, phone,school_year, fk_career_id, birth_date,fech_creation,fk_id_gender)
              VALUES (:name, :last_name, :direction, :height, :uk_dni, :email, 1, :phone,:school_year,:fk_career_id,:birth_date , NOW(),:fk_id_gender)";


        
    $consulta = $this->pdo->prepare($query);

    $consulta->bindParam(':name', $name, PDO::PARAM_STR);
    $consulta->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $consulta->bindParam(':direction', $direction, PDO::PARAM_STR);
    $consulta->bindParam(':height', $height, PDO::PARAM_STR);
    $consulta->bindParam(':uk_dni', $uk_dni, PDO::PARAM_STR);
    $consulta->bindParam(':email', $email, PDO::PARAM_STR);
    $consulta->bindParam(':phone', $phone, PDO::PARAM_INT);
    $consulta->bindParam(':school_year', $school_year, PDO::PARAM_STR);
    $consulta->bindParam(':fk_id_gender', $fk_id_gender, PDO::PARAM_INT);
    $consulta->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
    $consulta->bindParam(':fk_career_id', $fk_career_id, PDO::PARAM_INT);

    try {
        if ($consulta->execute()) {
            return true; // Devuelve verdadero si la inserción fue exitosa
        }
    } catch (PDOException $e) {
        echo "Error en la inserción: " . $e->getMessage();
        return false;
    }
}


public function getCareerIdByStudentId($student_id) {
    $query = "SELECT fk_career_id FROM estudents WHERE id_estudents = :student_id";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_COLUMN);
}


public function getSubjectsByCareerId($career_id) {
    $query = "SELECT id_subjects FROM subjects WHERE fk_career_id = :career_id AND details='Primer Año'";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':career_id', $career_id, PDO::PARAM_INT);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_COLUMN);
}

public function getLastInsertId() {
    return $this->pdo->lastInsertId();
}

function union_Student_gender_career(){
    $query = "SELECT
    estudents.id_estudents AS 'id_estudents',
    estudents.name AS 'name',
    estudents.last_name AS 'last_name',
    estudents.birth_date AS 'birth_date',
    estudents.direction AS 'direction',
    estudents.height AS 'height',
    estudents.uk_dni AS 'uk_dni',
    estudents.email AS 'email',
    estudents.phone AS 'phone',
    estudents.school_year AS 'school_year',
    estudents.state AS 'state',
    estudents.fech_creation AS 'fech_creation',
    careers.career_name AS 'career_name',
    genders.details AS 'details'
  
  FROM estudents
  JOIN careers ON estudents.fk_career_id = careers.id_career
  JOIN genders ON estudents.fk_id_gender = genders.id_gender
  WHERE estudents.state = 1"; // Agregamos esta condición para filtrar por estado igual a 1
  
    $statement = $this->pdo->prepare($query);
    $statement->execute();
    $union_Student = $statement->fetchAll();
    return $union_Student;
}

  public function getStudent($id_student)
{
    $query = "SELECT * FROM estudents WHERE id_estudents = :id_estudents and state=1";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_estudents', $id_student, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}
  public function updateStudent($id_student, $name,$last_name,$direction,$height,$uk_dni, $email,$phone)
{
    try {
        // Create the SQL query
        $query = "UPDATE estudents SET 
        name = :name, 
        last_name = :last_name, 
        direction = :direction,
        height = :height,
        uk_dni = :uk_dni,
        email = :email,
        phone = :phone
        WHERE id_estudents = :id_estudents";

        // Prepare and execute the SQL statement
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id_estudents', $id_student, PDO::PARAM_INT);
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $statement->bindParam(':direction', $direction, PDO::PARAM_STR);
        $statement->bindParam(':height', $height, PDO::PARAM_INT);
        $statement->bindParam(':uk_dni', $uk_dni, PDO::PARAM_INT);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_INT);
       

      
       
        

        $result = $statement->execute();

        return $result; 
    } catch (PDOException $e) {
        echo "Error in update: " . $e->getMessage();
        return false;
    }
}
    
   
function eliminated_Student($table, $id_user)
{
    try {
        // Luego, actualiza el estado del registro a 0
        $query = "UPDATE $table SET state = 0 WHERE id_estudents = :id_estudents";
        $updateStatement = $this->pdo->prepare($query);
        $updateStatement->bindParam(':id_estudents', $id_user, PDO::PARAM_INT);

        // Ejecuta la actualización
        $updateStatement->execute();

        // Verifica si se actualizó al menos una fila
        $rowCount = $updateStatement->rowCount();

        if ($rowCount > 0) {
            // La eliminación se realizó con éxito
            return true;
        } 
    } catch (PDOException $e) {
        echo "Error al actualizar: " . $e->getMessage();
        return false;
    }
}

//join entre alumno y materia 

function union_Student_subject($value){
    $query = "SELECT
    students_subjects.student_subject_id AS 'id',
    estudents.name AS 'name',
    estudents.last_name AS 'last_name',
    estudents.state AS 'state_student',
    subjects.subject_name AS 'subject_name',
    subjects.state AS 'state_subject',
    students_subjects.school_year AS  'school_year',
    careers.career_name AS 'name_career'
    FROM students_subjects
    JOIN estudents ON students_subjects.fk_student_id = estudents.id_estudents
    JOIN subjects ON students_subjects.fk_subject_id = subjects.id_subjects
    JOIN careers ON subjects.fk_career_id = careers.id_career
    WHERE  subjects.id_subjects = :subject_id AND estudents.state=1 AND subjects.state=1";

  
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':subject_id', $value, PDO::PARAM_INT); 

    $statement->execute();
    $union_Student = $statement->fetchAll();
    return $union_Student;
}



public function insert_student_subject($value1,$value2,$value3) {
    $query = "INSERT INTO students_subjects (fk_student_id,fk_subject_id,school_year)
              VALUES (:fk_student_id,:fk_subject_id,:school_year)";

    $statement = $this->pdo->prepare($query);

    $statement->bindParam(':fk_student_id', $value1, PDO::PARAM_INT);
    $statement->bindParam(':fk_subject_id', $value2, PDO::PARAM_INT);
    $statement->bindParam(':school_year', $value3, PDO::PARAM_STR);
  
    try {
        if ($statement->execute()) {
            return true; // Devuelve verdadero si la inserción fue exitosa
        }
    } catch (PDOException $e) {
        echo "Error en la inserción: " . $e->getMessage();
        return false;
    }
}


public function get_Student_subject($value)
{
    $query = "SELECT * FROM students_subjects WHERE id_subjects = :id_subjects and state=1";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_subjects', $value, PDO::PARAM_INT);
    $statement->execute();

    return $statement->fetch(PDO::FETCH_ASSOC);
}

public function getSingle_subject_students($value)
{
    $query = "SELECT * FROM students_subjects WHERE student_subject_id = :student_subject_id";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':student_subject_id', $value, PDO::PARAM_INT);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}

public function delete_students_subject($value) {
    $query = "DELETE FROM students_subjects WHERE student_subject_id = :id_student_subject";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_student_subject', $value, PDO::PARAM_INT);
    return $statement->execute();
}

//preguntar sobre los nombres de preinscripcion y carrer para sacar el id

public function getCareerIDByName($career_name) {
    $query = "SELECT id_career FROM careers WHERE career_name = :career_name";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':career_name', $career_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['id_career'];
}

// Obtener el ID de género por el nombre
public function getGenderIDByName($gender_name) {
    $query = "SELECT id_gender FROM genders WHERE details = :details";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindParam(':details', $gender_name);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    return $row['id_gender'];
}

//borrar a un preinscripto ya transferido
public function delete_preinscription($value) {
    $query = "DELETE FROM pre_registration WHERE id_pre_user= :id_pre_user";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_pre_user', $value, PDO::PARAM_INT);
    return $statement->execute();
}
function union_correlative_subject(){
    $query = "SELECT 
    correlatives.id_correlative AS 'id',
    correlatives.details AS 'details',
    subjects.subject_name AS 'subject_name'
    FROM correlatives
    JOIN subjects ON correlatives.fk_id_subject=subjects.id_subjects";
 

  
    $statement = $this->pdo->prepare($query);


    $statement->execute();
    $union_correlative = $statement->fetchAll();
    return $union_correlative;
}




public function insert_Correlatives($value1,$value2) {
    $query = "INSERT INTO correlatives (details,fk_id_subject)
              VALUES (:details,:fk_id_subject)";

    $statement = $this->pdo->prepare($query);

    $statement->bindParam(':details', $value1, PDO::PARAM_INT);
    $statement->bindParam(':fk_id_subject', $value2, PDO::PARAM_INT);
  
    try {
        if ($statement->execute()) {
            return true; // Devuelve verdadero si la inserción fue exitosa
        }
    } catch (PDOException $e) {
        echo "Error en la inserción: " . $e->getMessage();
        return false;
    }
}
public function getSingle_Correlative($value)
{
    $query = "SELECT * FROM correlatives WHERE id_correlative = :id_correlative";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_correlative', $value, PDO::PARAM_INT);
    $statement->execute();
    
    return $statement->fetch(PDO::FETCH_ASSOC);
}
public function delete_Correlative($value) {
    $query = "DELETE FROM correlatives WHERE id_correlative = :id_correlative";
    $statement = $this->pdo->prepare($query);
    $statement->bindParam(':id_correlative', $value, PDO::PARAM_INT);
    return $statement->execute();
}

}

?>
