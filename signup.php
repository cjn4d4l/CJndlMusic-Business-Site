<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Walter+Turncoat&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/violinist.png" type="image/x-icon">
    <title>Signup</title>
</head>

<style>
    * {
        font-family: "outfit", sans-serif;
    }

    #container {
        margin: 100px auto;
        padding-top: 50px;
        width: 400px;
        height: 400px;
        border: 2px solid black;
        border-radius: 15px;
        text-align: center;
        transition: ease-in-out 0.3s;
    }

    #container:hover {
        transform: translateY(-5px);
        box-shadow: 0px 1px 5px black;
    }

    .inputs {
        margin: 10px;
        width: 230px;
        height: 35px;
        border: 2px solid black;
        border-radius: 10px;
    }

    button {
        width: 130px;
        height: 50px;
        border-radius: 10px;
        margin: 20px;
        border: 2px solid black;
        cursor: pointer;
    }
</style>

<body>
    <div id="container">
        <h1>Sign-Up</h1>
        <form action="signup.php" method="post">
            <input class="inputs" type="text" id="username" placeholder="username" name="username"> <br>
            <input class="inputs" type="password" id="password" placeholder="password" name="password"> <br>
            <input type="checkbox" id="showpass"> Show Password <br>
            <a href="index.php">Back to Log-in</a> <br>
            <button type="submit" name="signup">Signup</button> <br>
            <span id="feedback" style="color: red;">
                <?php
                if (isset($_POST['signup'])) {
                    include('C:\xampp\htdocs\CJndlMusic Business Site\backend\databaseConnection.php');

                    $valid = true;
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    if (empty(trim($username)) && empty(trim($password))) {
                        echo "Invalid username or password";
                        return;
                    }
                    if (strlen($password) < 4) {
                        echo "Invalid username or password";
                        return;
                    }
                    if (!preg_match("/[a-z]/i", $username)) {
                        echo "Invalid username or password";
                        return;
                    }
                    if (strlen($username) < 4) {
                        echo "Invalid username or password";
                        return;
                    }
                    if (!(preg_match("/[A-Z]/", $password) && preg_match("/[a-z]/", $password) && preg_match("/[0-9]/", $password) && preg_match("/[!@#$%^&*]/", $password))) {
                        echo "Invalid username or password";
                        return;
                    }

                    $query = "SELECT * FROM users";
                    $result = mysqli_query($db_connection, $query);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['username'] === $username) {
                                echo "username is already registered";
                                return;
                            }
                        }
                    }

                    if ($valid) {
                        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
                        if (mysqli_query($db_connection, $sql)) {
                            header('Location: index.php');
                        }
                    }
                    mysqli_close($db_connection);
                }
                ?>
            </span>
        </form>
    </div>
</body>

<script>
    function detectInput() {
        document.getElementById("feedback").innerHTML = "";
    }
    document.getElementById("username").addEventListener("input", detectInput);
    document.getElementById("password").addEventListener("input", detectInput);

    document.getElementById("showpass").addEventListener("input", function() {
        const password = document.getElementById("password");
        if (this.checked) {
            password.type = "text";
        } else {
            password.type = "password";
        }
    })
</script>

</html>