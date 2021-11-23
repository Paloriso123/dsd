<?php

class User {

    public function authenticate($conn, $values) {
        $correct = NULL;
        // $msg = new Message;
        $email = validateData($values['email']);
        
        if($this->getDuplicity($conn, $email)) {
            $sql = $conn['conn']->prepare("SELECT userID, firstName, lastName, email, password "
                                          . "FROM users "
                                          . "WHERE email = ?");
            
            $result = $sql->execute([$email]);
            $user = $sql->fetch($result);
            
            if(password_verify($values['password'], $user['password'])) {
                $_SESSION['loggedIn'] = 1;
                $_SESSION['userID'] = $user->userID;
                $_SESSION['firstName'] = $user->firstName;
                $_SESSION['lastName'] = $user->lastName;
                $_SESSION['email'] = $email;
                
                $correct = true;
                header('location:../dist/index.php');
                return $correct;
            } else {
                // $msg->addMessage("Zadané heslo nie je správne|TYPE_ERROR");
                $correct = false;
            }            
        } else {
            // $msg->addMessage("Zadaný email nie je správny|TYPE_ERROR");
            $correct = false;
        }
      
    }

    public function isLoggedIn() {
        if (isset($_SESSION['loggedIn']) == 1 && !empty($_SESSION['userID'])) {
            return true;
        } else {
            return false;
        }
    }

    public function addUser($conn, $values) {
        
        $msg = new Message;
        
        $firstName = validateData($values['firstName']);
        $lastName = validateData($values['lastName']);
        $age = validateData($values['age']);
        $email = validateData($values['email']);
        
        $hashPasword = password_hash($values['password'], PASSWORD_DEFAULT);
        
        if(!$this->getDuplicity($conn, $email)) {
            
            $sql = $conn['conn'] -> prepare("INSERT INTO users (firstName, lastName, age, email, password) "
                                           . "VALUES (?, ?, ?, ?, ?)");
            $sql->execute([$firstName, $lastName, $age, $email, $hashPasword]);
            
            $sql1 = $conn['conn1'] -> prepare("INSERT INTO users (firstName, lastName, age, email, password) "
                                            . "VALUES (?, ?, ?, ?, ?)");
            $sql1->execute([$firstName, $lastName, $age, $email, $hashPasword]);
            
            $sql2 = $conn['conn2'] -> prepare("INSERT INTO users (firstName, lastName, age, email, password) "
                                           . "VALUES (?, ?, ?, ?, ?)");
            $sql2->execute([$firstName, $lastName, $age, $email, $hashPasword]);
            
            $sql3 = $conn['conn3'] -> prepare("INSERT INTO users (firstName, lastName, age, email, password) "
                                           . "VALUES (?, ?, ?, ?, ?)");
            $sql3->execute([$firstName, $lastName, $age, $email, $hashPasword]);
            
            $msg->addMessage('Úspešne ste vytvorili účet|TYPE_SUCCESS');
        } else {
            $msg->addMessage('Túto emailovú adresu už niekto použil|TYPE_ERROR');
        }
       
    }

    public function changePassword($conn, $values) {
        $msg = new Message;
        $email = $values['email'];
        $hashPasword = password_hash($values['password'], PASSWORD_DEFAULT);
        
        $sql = $conn['conn']->prepare("UPDATE users "
                                   . "SET password = ? "
                                   . "WHERE email = ? ");
        
        $sql->execute([$hashPasword, $email]);
        
        $sql1 = $conn['conn1']->prepare("UPDATE users "
                                   . "SET password = ? "
                                   . "WHERE email = ? ");
        
        $sql1->execute([$hashPasword, $email]);

        $sql2 = $conn['conn2']->prepare("UPDATE users "
                                   . "SET password = ? "
                                   . "WHERE email = ? ");
        
        $sql2->execute([$hashPasword, $email]);

        $sql3 = $conn['conn3']->prepare("UPDATE users "
                                   . "SET password = ? "
                                   . "WHERE email = ? ");
        
        $sql3->execute([$hashPasword, $email]);
        
         
        $msg->addMessage("Heslo bolo úspešne zmenené|TYPE_SUCCESS");

    }

    public function getDuplicity($conn, $email) {
        $sql = $conn['conn']->prepare(
                  "SELECT COUNT(email) "
                . "FROM users "
                . "WHERE email = ?"
                );
        $sql->execute([$email]);
        $result = $sql->fetchColumn();

        if ($result != 1) {
            return false;
        } else {
            return true;
        }
    }

    // dostan data z databazy
    
    public function getUser($conn) {
        $sql = $conn['conn']->prepare(
                  "SELECT userAccountID, firstName, lastName, email "
                . "FROM useraccount "
                . "WHERE userAccountID = ? AND deleted IS NULL"
                );

        // $sql->execute([$_SESSION['userAcountID']]);
        
        $row = $sql->fetch();
        
        return $row;
    }
    
}



?>