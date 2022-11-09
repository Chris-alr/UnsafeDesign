<?php 
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['password'])&& isset($_POST['passwordR'])) {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordR = $_POST['passwordR'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "form";


        $hashedPass = password_hash($password , PASSWORD_DEFAULT);
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        $sql ="UPDATE registro 
        SET 
            password = '$hashedPass'
        WHERE
            username = '$username';";

      $msql = "SELECT username FROM `registro` WHERE username = '$username';";

      $result = mysqli_query($conn,$msql);

      $preg = mysqli_fetch_row($result);

      $pregDef = $preg[0];
      
      
     
      if($username==$pregDef){
        if($password==$passwordR){
            $resultado = mysqli_query($conn, $sql);
           
            if($resultado){
                $msj = "La contraseña del usuario ";
                $msj2= " ha sido cambiada";
                $msjCompleto = $msj.$username.$msj2;
                    echo($msjCompleto);
            }else{
                echo("no se cambiaron");
            }
            if ($conn->connect_error) {
                die('No se pudo conectar a la BD');
            }
           
            else {
                
               
            
          
                
               
        }
          }else{
            echo '<script>alert("Las contraseñas no coinciden")</script>';
           
            header("Location: CambiarContra.html");
            die();  
          }
        
          
      }else{
          echo "El usuario no existe";
      }
    

        
   
    mysqli_close($conn);
}

}
    else {
        echo "Todos los campos son requeridos";
        die();
    }

 




?>
<html>
<a href="http://localhost/demo/index.html">
   <input type="button" value="Volver a registro" />
</a>
</html>
