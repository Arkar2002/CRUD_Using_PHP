<?php

    try {

        $pdo = new PDO("mysql:dbname=school;host=localhost", "root", "");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare("
            UPDATE students
            SET name = :name, email = :email, gender = :gender, dob = :dob, age = :age
            WHERE id = :id
        ");

        $statement->bindParam(":id", $_POST["id"]);

        $statement->bindParam(":name", $_POST["name"]);

        $statement->bindParam(":email", $_POST["email"]);

        $statement->bindParam(":gender", $_POST["gender"]);

        $statement->bindParam(":dob", $_POST["dob"]);

        $statement->bindParam(":age", $_POST["age"]);

        if ($statement->execute()) {

            header("location: index.php");

        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>