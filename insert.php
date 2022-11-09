<?php




if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password']) &&
        isset($_POST['gender']) && isset($_POST['email']) &&
        isset($_POST['phoneCode']) && isset($_POST['phone'])) {
        session_start();

        
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phoneCode = $_POST['phoneCode'];
        $phone = $_POST['phone'];
        

        

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "form";

        $hashedPass = password_hash($password , PASSWORD_DEFAULT);
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('No se pudo conectar a la BD');
        }
        else {
            $Select = "SELECT email FROM registro WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO registro(username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssii",$username, $hashedPass, $gender, $email, $phoneCode, $phone);
                if ($stmt->execute()) {
                    echo "Registro guardado exitosamente";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Alguien ya posee este email";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "Todos los campos son requeridos";
        die();
    }



}
else {
    echo "Submit button is not set";
}


?>
<html>
<a href="http://localhost/demo/formEmail.html">
   <input type="button" value="Recuperar Contrasena" />
</a>
</html>