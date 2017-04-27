<?php
   include_once ('class.database.php');

   class ManageUsers{
       public $link;

       function __construct(){
           try {
                $db_connection = new dbConnection();
                $this->link = $db_connection->connect();
                return $this->link;
           } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
           }

       }

       function createTodo($username, $title, $description, $due_date, $created_on, $status )  {
           try{
                $query = $this->link->prepare("INSERT INTO todo (username, title, description, due_date, created_date,status) VALUES( ?,?,?,?,?,?)" );

                $values = array ($username, $title, $description, $due_date, $created_on, $status);
                $query->execute($values);
                $count = $query->rowCount();

                $return $count;
           } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
           }
       }

       function listTodo($username, $status) {
           try{
                $query = $this->link->query("SELECT * FROM todo WHERE username ='$username' AND status='$status' ");
                $count = $query->rowCount();
                if($count >= 1){
                    $result = $query->fetchAll();
                } else {
                    $result = $count;
                }
                return $result;
           } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
           }
       }

       function countTodo($username, $status) {
           try{
                $query = $this->link->query(" SELECT count(*) AS TOTAL_TODO WHERE username='$username' AND status='$status' ");
                $query->setFetchMode(PDO::FETCH_OBJ);
                $count = $query->fetchAll();
                return $count;
           } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
           }
       }

       function editTodo( $username, $id, $values) {
         try {
            $x=0;
            foreach ( $values as $key => $value ) {
                $query = $this->link->query(" UPDATE todo SET $key= '$value' WHERE username='$username' AND id = '$id' ");
                $x++;
            }
            return x;
         } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
         }
       }

       function deleteTodo($username, $id) {
           try{
                $query = $this->link->query("DELETE FROM todo WHERE username='$username' AND id = '$id'");
                $count = $query->rowCount();
                return $count;
           } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
           }
       }

   }

?>
