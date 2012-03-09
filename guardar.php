<?php
if(!empty($_POST))
{
     $nombre=$_POST["nombre"];
     $URL=$_POST["URL"];
     $comentario=$_POST["comentario"];
     $db=new mysqli("localhost","root","","marcadores");

     if ($db->connect_error)
     {
         die("Error de coneccion ".$db->connect_erno);
     }
    
    $sql1="select url from marcadores where url='".$URL."'"; 
    $result=$db->query($sql1);
      if($db->affected_rows>=1)
      {
          echo "Esta url ya existe, no guardaremos tu marcador";
      }
      else
      { 
           $sql="insert into marcadores values ('','".$nombre."','".$URL."','".$comentario."')"; 
           if ($db->query($sql) === TRUE)
           {
                echo "Tu marcador ha sido guardado";
            }
      }




 $db->close();
     
}
else {
echo "erroor!!!!!!!";

}

?>
