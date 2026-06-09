<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include('C:\xampp\htdocs\CJndlMusic Business Site\backend\databaseConnection.php');
$username = $_SESSION['username'] ?? "";
if ($username === 'admin') {
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Walter+Turncoat&display=swap" rel="stylesheet">
    <link rel="icon" href="images/violinist.png">
    <title>cjndlmusic - ADMIN</title>
</head>

<style>
    * {
        font-family: "Outfit", sans-serif;
        font-optical-sizing: auto;
        font-weight: 10px;
        font-style: normal;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        background-color: white;
        width: 100%;
        height: 100px;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        border-bottom: solid 2px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: sticky;
    }

    header h1 {
        margin-left: 50px;
    }

    nav button {
        margin-right: 20px;
    }

    .navbtns {
        background-color: white;
        width: 100px;
        height: 50px;
        margin: 10px;
        border-radius: 10px;
        cursor: pointer;
        transition: ease-in-out 0.3s;
    }

    .navbtns:hover {
        background-color: burlywood;
        transform: translateY(-5px);
    }

    #studenttable {
        margin-top: 30px;
        width: 85%;
        border: 2px solid black;
        border-radius: 10px;
        text-align: center;
    }

    th {
        border-bottom: 2px solid black;
        height: 30px;
    }

    td {
        height: 30px;
    }

    a {
        text-decoration: none;
    }

    dialog {
        margin: 200px auto;
        padding: 10px 10px 10px 10px;
        width: 300px;
        height: 130px;
        border: 2px solid black;
        border-radius: 10px;
    }

    #headDialog {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    #closebtn {
        width: 30px;
        height: 30px;
        background-color: white;
        border-radius: 100%;
        cursor: pointer;
    }

    input {
        width: 100px;
        height: 30px;
        border: 1px solid black;
        border-radius: 10px;
        text-align: center;
    }

    #delete {
        background-color: white;
        width: 50px;
        height: 35px;
        border: 1px solid black;
        border-radius: 10px;
        cursor: pointer;
    }
</style>

<body id="main">
    <header>
        <h1 style="cursor: pointer;">CJndlMusic - ADMIN</h1>
        <nav>
            <button class="navbtns" id="deletebtn">
                Delete Student
            </button>
            <button class="navbtns" id="refresh">
                Refresh
            </button>
            <button class="navbtns" id="logoutbtn">
                Log-out
            </button>
        </nav>
    </header>
    <main>
        <dialog id="deleteDialog">
            <div id="headDialog">
                <h4>Delete Student</h4>
                <button id="closebtn">X</button>
            </div>
            <form action="admin.php" method="post">
                <center>
                    <input type="number" placeholder="Student ID" name="studentid">
                    <button name="deletebtn" id="delete">Delete</button>
                </center>
            </form>
        </dialog>
        <center>
            <table id="studenttable">
                <tr>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Student Gmail</th>
                    <th>Instrument</th>
                    <th>Level</th>
                    <th>Date Enrolled</th>
                </tr>
                <?php
                $sql = "SELECT * FROM students";
                $result = mysqli_query($db_connection, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc(($result))) {
                ?>
                        <tr>
                            <td>
                                <?php echo $row['student_id'] ?>
                            </td>
                            <td>
                                <?php echo $row['student_name'] ?>
                            </td>
                            <td>
                                <?php echo $row['student_gmail'] ?>
                            </td>
                            <td>
                                <?php echo $row['instrument'] ?>
                            </td>
                            <td>
                                <?php echo $row['student_level'] ?>
                            </td>
                            <td>
                                <?php echo $row['date_enrolled'] ?>
                            </td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="6">No Students are enrolled</td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </center>
    </main>

    <script>
        document.getElementById("logoutbtn").addEventListener("click", function() {
            fetch('logout.php');
            window.location.href = 'index.php';
        })

        document.getElementById("deletebtn").addEventListener("click", function() {
            console.log("napindot");
            document.getElementById("deleteDialog").showModal();
        })
        document.getElementById("closebtn").addEventListener("click", function() {
            document.getElementById("deleteDialog").close();
        })

        document.getElementById("refresh").addEventListener("click", function (e) {
            e.preventDefault();
            window.location.href = "admin.php";
        })


        // function refreshPage () {
        //     window.location.href = "admin.php";
        // }

        // setInterval(refreshPage, 10000);
    </script>
</body>

</html>

<?php
} else {
    echo "Access Denied <br>";
    echo "<a href='index.php'>Go Back</a>";
}
if (isset($_POST['deletebtn'])) {
    $student_id = $_POST['studentid'] ?? "";
    $found = false;
    $query = "SELECT student_id FROM students";
    $result = mysqli_query($db_connection, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($student_id == $row['student_id']) {
                $found = true;
                break;
            }
        }
    }
    if ($found) {
        $sql = "DELETE FROM students WHERE student_id = $student_id";
        mysqli_query($db_connection, $sql);
    } else {
        echo "<script>alert('Invalid Student ID')</script>";
    }
}
?>