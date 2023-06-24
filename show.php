<?php

    try {

        $pdo = new PDO("mysql:dbname=school;host=localhost", "root", "");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare("SELECT * FROM `students` WHERE id = :id");

        $statement->bindParam(":id", $_GET["id"]);

        if ($statement->execute()) {

            $student = $statement->fetch(PDO::FETCH_OBJ);

        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Student Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<style>

    body {
        height: 100vh;
        display: grid;
        place-items: center;
        overflow: hidden;
    }

</style>
<body>

    <div class="container">

        <div class="col-8 mx-auto">

            <a href="index.php" class="btn btn-primary mb-5">Home</a>

            <?php if ($student) : ?>
                
                <h3>Id : <?php echo $student->id ?></h3>

                <h3>Name : <?php echo $student->name ?></h3>

                <h3>Email : <?php echo $student->email ?></h3>

                <h3>Gender : <?php echo $student->gender ?></h3>

                <h3>Dob : <?php echo $student->dob ?></h3>

                <h3>Age : <?php echo $student->age ?></h3>

                <a href="edit.php?id=<?php echo $student->id ?>" class="btn btn-info">Edit</a>
                <a href="destory.php?id=<?php echo $student->id ?>" class="btn btn-danger">Delete</a>
                
            <?php endif ; ?>
            <hr>
        </div>

    </div>
    
</body>
</html>