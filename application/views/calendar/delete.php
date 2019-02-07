<?php

//delete.php

   $db = new PDO('pgsql:dbname=postgres; user=postgres; password=edukit; host=192.168.0.40');
if(isset($_POST["id"]))
{
   $db = new PDO('pgsql:dbname=postgres; user=postgres; password=edukit; host=192.168.0.40');

 $query = "DELETE from events WHERE id=:id";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>