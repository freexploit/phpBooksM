<?php

if (!empty ($_GET))
{
     $db =new mysqli("localhost","root","","marcadores");

     
     
         $sql="select * from marcadores order by nombre";
     
       
       $response=get_json($sql,$db);
       header("Content-type: text/json; charset=utf8");
       echo $response;
       $db->close();
     

}
    function get_json($sql,$db)
    {
       if ($result=$db->query($sql))
       {
          while($row=$result->fetch_object())
	  {
	      $rows[]=$row; 
	  }
	  $result->close();
       }
       
       $dirty_json= json_encode($rows);
       $dirty_json=str_replace("\/","/",$dirty_json);
       $dirty_json=str_replace('"','\\"',$dirty_json);

       $clean_json=json_decode('"'.$dirty_json.'"');
       return $clean_json;
       

     }

?>
