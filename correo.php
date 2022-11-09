<?php 
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) ) {
        
       
        $username = $_POST['username'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "form";


     
       

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        $sql = "SELECT email FROM `registro` WHERE username = '$username';";

        $result = mysqli_query($conn,$sql);

        $user = mysqli_fetch_row($result);

        $userDef = $user[0];
        
       //  Aqui deberia enviar un correo electronico a la direccion asociada con el usuario
    
     
            header("Location: corroborar.html");
                    die();  
        
      

        if ($conn->connect_error) {
            die('No se pudo conectar a la BD');
        }
        else {

        ;
      
            
           
    }
    }
}



?>