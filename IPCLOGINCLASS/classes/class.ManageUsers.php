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

       function registerUsers($username, $email, $password, $ip_address, $reg_time,$reg_date) {
           try {
                $query = $this->link->prepare("INSERT into user(email,username, password, ip_address, time, date) VALUES (?,?,?,?,?,?) ");
                $values = array($email,$username, $password, $ip_address,$reg_time, $reg_date);
                $query->execute($values);
                $counts = $query->rowCount();
                return $counts;
           } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
           }
       }

       function loginUsers($username, $password)
       {
           try{

                $statement = $this->link->prepare("select * from user where username = :username AND password = :password ");
                $statement->bindValue(':username',$username);
                $statement->bindValue(':password',$password);
                $statement->execute();           

                if($statement->rowCount() > 0 ) {
                    return true;
                }  else {
                    return false;
                }
           } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
           }     
       }

       function getUserInfo($username){
           try {
                $query = $this->link->query("SELECT * FROM user WHERE username='$username' ");
                $rowcount = $query->rowCount();
                if ($rowcount == 1)
                {
                    $result = $query->fetchAll();
                    return $result;
                } else {
                    return $rowcount;
                }
           } catch (Exception $e) {
               echo 'Message: ' .$e->getMessage();
           }
       }
   }


?>
