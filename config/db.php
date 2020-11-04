<?php

    class Database {

        public function connect ($tableName) {

            $databaseProperties = [
                
                "server" => "localhost",
                "username" => "root",
                "password" => "123",
                "database" => $tableName
            ];
            
            $conn = new mysqli(

                $databaseProperties['server'],
                $databaseProperties['username'],
                $databaseProperties['password'],
                $databaseProperties['database']
            );

            if ($conn->connect_error) {

                die("Connection failed :" . $conn->connect_error);
            }

            return $conn;

            $conn->close();

        }
    }   

    