<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Student</title>
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

        <form action="store.php" method="POST">

            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" required>
            </div>

            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="form-group mb-3">
                <label for="gender">Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="" selected disabled>Choose Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="dob">Date Of Birth</label>
                <input type="date" name="dob" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" placeholder="Age" required>
            </div>

            <button class="btn btn-primary">Create New Student</button>
            <a href="index.php" class="btn btn-danger">Cancel</a>

        </form>

    </div>
    
</body>
</html>