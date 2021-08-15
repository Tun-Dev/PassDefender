<?php

    class Connection{

        public PDO $pdo;

        public function __construct(){
            $this->pdo = new PDO('mysql:server=localhost;dbname=userreg', 'root', 'Tungbulu1999');
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function getNotes(){
            $usermail =  $_SESSION['username'];
            $statement = $this->pdo->prepare("SELECT * FROM notes where email = '$usermail' ");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }

        public function addNote($note){
            $statement = $this->pdo->prepare("INSERT INTO notes (email, account, password) VALUES (:email, :account, :password)");
            $statement->bindValue('email', $note['email']);
            $statement->bindValue('account', $note['account']);
            $statement->bindValue('password', $note['password']);
            return $statement->execute();
        }

        public function getUserName(){
            $usermail =  $_SESSION['username'];
            $statement = $this->pdo->prepare("SELECT firstName FROM usertable WHERE email ='$usermail'");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }



        public function getNoteById($id){
            $statement = $this->pdo->prepare("SELECT * FROM notes WHERE id = :id");
            $statement->bindValue('id', $id);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public function updateNote($id, $note){
            $statement = $this->pdo->prepare("UPDATE notes SET  account = :account, password = :password WHERE id = :id ");
            $statement->bindValue('id', $id);
            $statement->bindValue('account', $note['account']);
            $statement->bindValue('password', $note['password']);
            return $statement->execute();
        }

        public function removeNote($id){
            $statement = $this->pdo->prepare("DELETE FROM notes WHERE id = :id");
            $statement->bindValue('id',$id);
            return $statement->execute();
        }
    }

    return new Connection();

?>