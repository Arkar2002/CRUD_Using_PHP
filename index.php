<?php

    try {

        $pdo = new PDO("mysql:dbname=school;host=localhost", "root", "");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->query("SELECT * FROM `students`");

        if ($statement) {

            $students = $statement->fetchAll(PDO::FETCH_OBJ);

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
    <title>List of Students</title>
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

            <?php if ($students) : ?>
                <?php foreach ($students as $student) : ?>
                    <p><a href="show.php?id=<?php echo $student->id; ?>" class="btn btn-primary btn-large"><?php echo $student->name; ?></a></p>
                <?php endforeach ; ?>
            <?php else : ?>
                <p>No student is found</p>
            <?php endif ; ?>
            <hr>
            <a href="create.php" class="btn btn-info">Create New Student</a>
        </div>

    </div>
    
</body>
</html>