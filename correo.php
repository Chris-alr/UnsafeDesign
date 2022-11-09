<?php 
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['pregunta'])) {
        
        $username = $_POST['username'];
        $pregunta = $_POST['pregunta'];
      

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "form";


      
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
      

      $msql = "SELECT pregunta FROM `registro` WHERE username = '$username';";

      $result = mysqli_query($conn,$msql);

      $preg = mysqli_fetch_row($result);

      $pregDef = $preg[0];

      $sql = "SELECT username FROM `registro` WHERE username = '$username';";

      $results = mysqli_query($conn,$sql);

      $user = mysqli_fetch_row($results);

      $userDef = $user[0];
      
      
     
      if($username==$userDef){
        if($pregunta==$pregDef){
            
            header("Location: CambiarContra.html");
                        die();  
           
           
          }else{
            echo '<script>alert("Las contraseñas no coinciden")</script>';
           
            header("Location: corroborar.html");
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
