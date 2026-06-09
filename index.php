<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Walter+Turncoat&display=swap" rel="stylesheet">
    <link rel="icon" href="images/violinist.png">
    <title>Log-in</title>
</head>

<style>
    * {
        font-family: "outfit", sans-serif;
    }

    main {
        margin: 100px auto;
        padding-top: 50px;
        width: 400px;
        height: 400px;
        border: 2px solid black;
        border-radius: 15px;
        text-align: center;
        transition: ease-in-out 0.3s;
    }

    main:hover {
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
        background-color: white;
        width: 130px;
        height: 50px;
        border-radius: 10px;
        margin: 20px;
        border: 2px solid black;
        cursor: pointer;
    }
</style>

<body>
    <main>
        <h1>Log-In</h1>
        <form action="index.php" method="post">
            <input type="text" placeholder="username" class="inputs" name="username" id="username"> <br>
            <span style="opacity: 0; color: red;" id="errorname">username cannot be empty</span> <br>
            <input type="password" placeholder="password" class="inputs" name="password" id="password"> <br>
            <span style="opacity: 0; color: red;" id="errorpass">password cannot be empty</span> <br>
            <input type="checkbox" id="showpassword"> Show Password <br>
            <a href="signup.php">Sign-up</a> <br>
            <button type="submit" name="login" id="loginbtn">Log-In</button> <br>
            <span style="color: red;">
                <?php
                session_start();
                include('C:\xampp\htdocs\CJndlMusic Business Site\backend\databaseConnection.php');
                if (isset($_POST['login'])) {
                    $username = $_POST['username'] ?? "";
                    $password = $_POST['password'] ?? "";
                    $notfound = true;
                    if (!(empty($username) || empty($password))) {
                        $_SESSION["username"] = $username;
                        $_SESSION["loggedin"] = true;
                        $sql = "SELECT * FROM users";
                        $result = mysqli_query($db_connection, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if (in_array($username, $row) && in_array($password, $row)) {
                                    $notfound = false;
                                    if ($username == "admin" && $password == "admin") {
                                        header("Location: admin.php");
                                    } else {
                                        header("Location: home.php");
                                    }
                                }
                            }
                        }
                        if ($notfound) {
                            echo "User not Found";
                        }
                    } else {
                        echo "username or password is empty";
                    }
                    mysqli_close($db_connection);
                }
                ?>
            </span>
        </form>
    </main>
</body>

<script>
    function checkValid(id, inputid) {
        const input = document.getElementById(inputid).value;
        const message = document.getElementById(id);
        if (input.trim() === "") {
            validInputs = false;
            message.style.opacity = "1";
        } else {
            validInputs = true;
            message.style.opacity = "0";
        }
    }
    document.getElementById("username").addEventListener("input", () => checkValid("errorname", "username"));
    document.getElementById("password").addEventListener("input", () => checkValid("errorpass", "password"));

    document.getElementById("showpassword").addEventListener("input", function() {
        if (this.checked) {
            document.getElementById("password").type = "text";
        } else {
            document.getElementById("password").type = "password";
        }
    })
</script>

</html>