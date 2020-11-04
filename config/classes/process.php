<?php
    include_once('submission.php');

    if (isset($_POST['submit'])) {

        if (
            empty($_POST['name']) ||
            empty($_POST['title']) ||
            empty($_POST['message']) ||
            empty($_POST['email'])

        ) {

            header('Location: /blog/submit.php?error=emptyfields');
            exit();

        } else {

            $formData = [

                "name" => $_POST['name'],
                "title" => $_POST['title'],
                "message" => htmlentities($_POST['message']),
                "email" => $_POST['email']
            ];


            $init = new SaveToDatabase;
            $init->saveData($formData);

            header('Location: /blog/submit.php?status=success');
        }
        
        
        
    }