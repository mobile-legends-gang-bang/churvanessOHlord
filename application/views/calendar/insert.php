
<?php

//insert.php

   $db = new PDO('pgsql:dbname=postgres; user=postgres; password=edukit; host=192.168.0.40');
if(isset($_POST["title"]))
{
 $query = "INSERT INTO events (title, start_event, end_event) VALUES (:title, :start_event, :end_event) ";
 $statement = $db->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end']
  )
 );
 
}


?>