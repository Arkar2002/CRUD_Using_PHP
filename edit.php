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
    <title>Update Student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <style>

        body {
            height: 100vh;
            display: grid;
            place-items: center;
            overflow: hidden;
        }

    </style>
</head>
<body>

    <div class="container">

        <h2>Create New User</h2>

        <?php if ($student) : ?>
            <form action="update.php" method="POST">

                <input type="hidden" name="id" value="<?php echo $student->id; ?>">

                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $student->name; ?>" placeholder="Name" required>
                </div>

                <div class="form-group mb-3">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $student->email; ?>" placeholder="Email" required>
                </div>

                <div class="form-group mb-3">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" required>
                        <option value="" disabled>Choose Gender</option>
                        <option value="male" <?php if ($student->gender == "male") echo "selected"; ?>>Male</option>
                        <option value="female" <?php if ($student->gender == "female") echo "selected"; ?>>Female</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="dob">Date Of Birth</label>
                    <input type="date" name="dob" class="form-control" value="<?php echo $student->dob; ?>" required>
                </div>

                <div class="form-group mb-3">
                    <label for="age">Age</label>
                    <input type="number" name="age" class="form-control" placeholder="Age" value="<?php echo $student->age; ?>" required>
                </div>

                <button class="btn btn-primary">Update Student</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>

            </form>
        <?php endif ; ?>

    </div>
    
</body>
</html>