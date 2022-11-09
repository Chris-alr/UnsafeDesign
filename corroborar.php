<?php 
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['codigo'])) {
        
        $username = $_POST['username'];
        $codigo = $_POST['codigo'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "form";


     
       

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        $sql = "SELECT username FROM `registro` WHERE username = '$username';";

        $result = mysqli_query($conn,$sql);

        $preg = mysqli_fetch_row($result);

        $pregDef = $preg[0];
        
        
       
        if($username==$pregDef){
            if($codigo=="X2X2X2"){
                echo "El codigo es correcto";
                header("Location: CambiarContra.html");
                        die();  
            }
            else{
                echo "El codigo es incorrecto";
            }
            
        }else{
            echo "El usuario no existe";
        }
      

        if ($conn->connect_error) {
            die('No se pudo conectar a la BD');
        }
        else {
            
            //$Insert = "INSERT INTO registro(username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
        ;
      
            
           
    }
}
}
    else {
        echo "Todos los campos son requeridos";
        die();
    }






?>
