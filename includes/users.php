<?php
    class Users{
        
        function user_exist($name){
            //Checking for the exisiting user
            global $pdo;
            $query = $pdo->prepare("SELECT * FROM user WHERE user_name = ?");
            $query->bindValue(1,$name);
            $query->execute();
            $num = $query->rowCount();
            return $num;
        }
        function register_user($user_name, $user_email,$user_pass){
            //function to insert data in the database
            global $pdo;
            $query = $pdo->prepare("INSERT INTO user ( user_name, user_email, user_pass)
                                    VALUES(?,?,?)");
            $query->bindValue(1,$user_name);
            $query->bindValue(2,$user_email);
            $query->bindValue(3,$user_pass);  
            return $query->execute();                  
        }
    }
?>