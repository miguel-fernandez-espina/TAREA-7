<!DOCTYPE html>
<html>
<head>
   <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="style.css" rel="stylesheet" >
    
    

    <title>Registros</title>
</head>
<body>
<?php

$Rut=$_POST['Rut'];
$Nombre=$_POST['Nombre'];
$Apellido=$_POST['Apellido'];
$Direccion=$_POST['Direccion'];
$Email=$_POST['Email'];
$Telefono=$_POST['Telefono'];
$Numero_Caso=$_POST['Numero_Caso'];
$Descripcion_Caso=$_POST['Descripcion_Caso'];
$Fecha_Inicio=$_POST['Fecha_Inicio'];
$Estado_Caso=$_POST['Estado_Caso'];
$Descripcion_Sentencia=$_POST['Descripcion_Sentencia'];
$Fecha_Cierre=$_POST['Fecha_Cierre'];


if(isset($_POST['ingresar'])) {

$ingresar=$_POST['ingresar'];
}else {
$ingresar='';
}
if(isset($_POST['modificar'])) {
$modificar=$_POST['modificar'];
}else {
$modificar='';
}
if(isset($_POST['consultar'])) {
$consultar=$_POST['consultar'];
}else {
$consultar='';
}

if(isset($_POST['eliminar'])) {
$eliminar=$_POST['eliminar'];
}else {
$eliminar='';
if($Rut!='' && $Nombre!='' && $Apellido!='' && $Direccion!='' && $Email!='' && $Telefono!=''
            && $Numero_Caso!=''&& $Descripcion_Caso!=''&& $Fecha_Inicio!=''&& $Estado_Caso!=''
            && $Descripcion_Sentencia!=''&& $Fecha_Cierre!='')


{
$user="root";
$password='';
$bd="justicia_abogados";
$host="localhost";
$result=NULL;
$exito=0;


$mysqli = new mysqli($host, $user, $password, $bd); if($mysqli!=NULL) {
if($ingresar == 'Ingresar') {
$query = "insert into registroclientes values('" . $Rut . "', '" . $Nombre . "', '" . $Apellido . "', '". $Direccion . "', '". $Email. "', '". $Telefono. "', '". $Numero_Caso. "', '". $Descripcion_Caso. "', '". $Fecha_Inicio. "', '". $Estado_Caso. "', '". $Descripcion_Sentencia. "', '". $Fecha_Cierre. "')";
$result = $mysqli->query($query);

if($result===TRUE) {
echo "<br/><center><a href='./index.html'>Se ha registrado correctamente!!!, haga clic aqui para regresar<a></center>";

}
}
}
}
}

if($modificar == 'Modificar') {
$query = "update registroclientes set Rut='" . $Rut . "', Nombre='" . $Nombre . "', Apellido='" . $Apellido . "', Direccion='". $Direccion . "', Email='" . $Email . "', Telefono='" . $Telefono. "', 
     Numero_Caso='" . $Numero_Caso. "', Descripcion_Caso='" . $Descripcion_Caso. "', Fecha_Inicio='" . $Fecha_Inicio. "', Estado_Caso='" . $Estado_Caso. "', Descripcion_Sentencia='" . $Descripcion_Sentencia. "', Fecha_Cierre='" . $Fecha_Cierre. "'"
. " where Rut='" . $Rut . "'";
$result = $mysqli->query($query); 

if($result==TRUE) {
    echo "<br/><center><a  href='./index.html'>Se ha modificado correctamente!!!, haga clic aqui para regresar<a></center>";
    }
    }

    $user="root";
    $password='';
    $bd="justicia_abogados";
    $host="localhost";
    $result=NULL;
    $exito=0;
    $mysqli = new mysqli($host, $user, $password, $bd); 


    if($eliminar == 'Eliminar') {
    $query2 = "delete from registroclientes where Rut='" . $Rut . "'";
    echo $query2;
    $result = $mysqli->query($query2);
    echo "<br/><center><a href='./index.html'>Datos eliminados correctamente!!!, haga clic aqui para regresar 
    al formulario<a></center>"; 

    }else if($Rut != '') {
    $user="root";
    $password='';
    $bd="justicia_abogados";
    $host="localhost";
    $result=NULL;
    $exito=0;
    $mysqli = new mysqli($host, $user, $password, $bd); if($mysqli!=NULL) {
    if($consultar == 'Consultar') {
    $query = "select * from registroclientes where Rut='".$Rut."'";
    $result = $mysqli->query($query);

    echo "<br >";

    echo "<table >"; 
   
     while($row = $result->fetch_assoc()) {
       
        echo " <thead>

        <tr center>
           <th  COLSPAN=15>Registro de Clientes</>
           
        </tr>

        <tr  >
        <td>Rut</td><br>
        <td>Nombre</td><br>
        <td>Apellido</td>
        <td>Direccion</td>
        <td>Email</td>
        <td>Telefono</td>
        <td>Numero_Caso</td>
        <td>Descripcion_Caso Caso</td>
        <td>Fecha_Inicio</td>
        <td>Estado_Caso</td>
        <td>Descripcion_Sentencia</td>
        <td>Fecha_Cierre</td>    
        </tr>
        </thead>"
        ;
        printf(" <tbody><tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s
            </td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr></tbody>"
        ,$row['Rut'],$row['Nombre'],$row['Apellido'],$row['Direccion'],$row['Email'],$row['Telefono']
        ,$row['Numero_Caso'],$row['Descripcion_Caso'],$newDate = date("d-m-Y", strtotime($row ['Fecha_Inicio'])),$row['Estado_Caso'],$row['Descripcion_Sentencia'],$newDate = date("d-m-Y", strtotime($row ['Fecha_Cierre'])));
        $exito=1;
        }
        echo "</table>"; 

        if($exito==0){
        echo "<br/>
        <center><a href='./index.html'> NO registrado, haga clic aqui para regresar<a>
            
        </center>";
        }else {
        echo "<br/><center><a href='./index.html'>Se ha consultado correctamente!!!, haga clic aqui para regresar<a></center>";         
        }
        }
        }
        $mysqli->close();
        }else {
        echo "Debe ingresar todos los datos para ingresar o modificar algún registro.<br/>"; 
        echo "Para consultar sólo debe ingresar la Rut.<br/>";
        echo "<br/><a href='./index.html'>Haga clic aqui para regresar<a>";
        }
        ?>  
</body>
</html>