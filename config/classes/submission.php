<?php

    include_once('../db.php');

    class SaveToDatabase extends Database {

        public function saveData ($data) {

            $mysqli = $this->connect('blog');
            $sql = "INSERT INTO posts(name, title, message, email) VALUES(?, ?, ?, ?);";
            $stmt = $mysqli->stmt_init();

            if (!$stmt->prepare($sql)) {

                header('Location: /blog/submit.php?error=sqlerror');
                exit();

            } else {

                $stmt->bind_param(
                    "ssss",
                    $data['name'],
                    $data['title'],
                    $data['message'],
                    $data['email']
                );
    
                $stmt->execute();

            }
            
            $stmt->close();
            $mysqli->close();
        }
       
    }