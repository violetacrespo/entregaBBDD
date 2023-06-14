
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Formulario de Registro SCIII</title>
<link href="estilos.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="group">

    <form method="POST" action=""> 
    <h2><em>Formulario de Registro</em></h2>
        <label for="nombre">Nombre<span><em>(requerido)</em></span></label>
        <input type="text" name="nombre" class="form-imput" required />
        

        <label for="apellidos">Apellidos<span><em>(requerido)</em></span></label>
        <input type="text" name="apellidos" class="form-imput" required />

        <label for="email">Email<span><em>(requerido)</em></span></label>
        <input type="email" name="email" class="form-imput" required />

        <input class ="form-btn" name="submit" type="submit" value="Suscribirse"/>
    
    
<?php
IF($_POST){ //si existe algun valor en $post, es decir, si el usuario ha metido datos en el formulario entonces crea las vbles
    $nombre = $_POST['nombre']; //las buscamos por el name
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];

    //conexión
    $servername= "localhost";
    $username= "root";
    $password= "";
    $dbname= "cursssqlentrega4";

    //creamos la conexión a la base de daros
    $conn= new mysqli($servername, $username, $password, $dbname);
    //comprobamos que la conexión se haya completado correctaente
    if($conn->connect_error){
        die("conecction failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO  usuario(nombre, apellidos, email) VALUES ('$nombre','$apellidos', '$email')";

    if($conn->query($sql)==TRUE){
        echo "New record created succesfully";
    }else {
        echo "Error: ". $sql . "<br>" . $conn -> error;
    }

    $conn->close();//cerramos la conexión con la BBDD
}

?>
    
    </form>
</div>
</body>
</html>



