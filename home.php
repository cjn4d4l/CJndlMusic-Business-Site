<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$username = $_SESSION['username'] ?? "user";
$loggedin = $_SESSION['loggedin'] ?? false;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&family=Walter+Turncoat&display=swap" rel="stylesheet">
    <link rel="icon" href="images/violinist.png">
    <title>cjndlmusic</title>
</head>
<!-- PAGE STYLE SECTION -->
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

    a {
        text-decoration: none;
    }

    main {
        background-color: rgb(250, 250, 250);
        width: 100%;
        height: calc(100vh - 80px);
        display: grid;
        place-items: center;
        position: sticky;
    }

    .hero {
        text-align: center;
        display: flex;
        flex-direction: column;
        gap: 20px;
        align-items: center;
    }

    .image {
        width: 200px;
        height: 200px;
        margin: auto;
        transition: ease-in-out 0.3s;
    }

    .about {
        background-color: white;
        margin: auto;
        width: 100%;
        height: 600px;
        gap: 20px;
        padding: 20px;
        position: sticky;
    }

    .panels {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        gap: 30px;
    }

    .panel_left {
        background-color: rgb(255, 255, 255);
        width: 400px;
        height: 300px;
    }

    .second_pfp {
        width: 400px;
        justify-content: center;
        border-radius: 10px;
    }

    #second_pfp {
        transition: ease-in-out 0.5s;
    }

    .panel_right {
        background-color: rgb(255, 255, 255);
        width: 300px;
        height: 300px;
        text-align: justify;
    }

    #bookLesson {
        background-color: rgb(250, 250, 250);
        margin: auto;
        width: 100%;
        height: 800px;
        position: sticky;
    }

    .lessonpanel {
        background-color: rgb(255, 255, 255);
        border: solid 2px;
        border-radius: 10px;
        width: 400px;
        height: 500px;
        padding: 20px;
    }

    input {
        width: 300px;
        height: 30px;
        margin: 10px;
        border-radius: 5px;
    }

    select {
        width: 300px;
        height: 30px;
        margin: 10px;
        border-radius: 5px;
    }

    #applybtn {
        background-color: white;
        width: 200px;
        height: 50px;
        margin: 10px;
        border-radius: 10px;
        cursor: pointer;
        transition: ease-in-out 0.3s;
    }

    #applybtn:hover {
        background-color: burlywood;
        transform: translateY(-5px);
    }

    #applybtn:disabled:hover {
        cursor: default;
        transform: translateY(0px);
        background-color: white;
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

    footer {
        background-color: white;
        width: 100%;
        height: 300px;
        position: sticky;
        padding-top: 180px;
    }
</style>
<!-- END OF PAGE STYLE SECTION -->
<body id="main">
    <header>
        <h1 onclick="scrollToSection('main')" style="cursor: pointer;">CJndlMusic</h1>
        <nav>
            <button class="navbtns" onclick="scrollToSection('main')">
                Home
            </button>
            <button class="navbtns" onclick="scrollToSection('about')">
                About
            </button>
            <button class="navbtns" id="logoutbtn">
                <?php
                if ($loggedin) {
                    echo "Log-Out";
                } else {
                    echo "Log-In";
                }
                ?>
            </button>
        </nav>
    </header>
    <main>
        <div class="hero">
            <img src="images/violinist.png" alt="pfp" class="image" id="pfp">
            <h2>
                <?php
                if ($loggedin) {
                    echo "Welcome " . $username . "!";
                } else {
                    echo "Welcome!";
                }
                ?>
            </h2>
            <h1>Hi, I'm CJ Nadal</h1>
            <p>I'm an Aspiring Software Engineer with a Background in Music <br> I'm mainly a violinist playing on events</p>
            <?php if ($loggedin) { ?>
            <button id="lessonbtn" class="navbtns" onclick="scrollToSection('bookLesson')">Book a Lesson</button>
            <?php } ?>
        </div>
    </main>
    <hr>
    <section class="about" id="about">
        <h1 style="margin: 0.5in 0in 0.2in 0in; text-align:center;">About Me</h1>
        <div class="panels">
            <div class="panel_left">
                <img src="" alt="pfp" id="second_pfp" class="second_pfp">
            </div>
            <div class="panel_right">
                <p>
                    I am Christian James Nadal Tejolan, call me CJ for short, 20 years old, i am taking up Bachelor of 
                    Science in Information Technology at the College of Computing, Multimedia Arts and Digital Innovation 
                    in Romblon State University, I am an aspiring
                    developer and software engineer, aside from that, I want to become a Music Instructor teaching
                    violin and piano.
                </p>
            </div>
        </div>
    </section>
    <hr>
    <section id="bookLesson">
        <br> <br>
        <h1 style="text-align:center; margin-top: 60px; margin-bottom: 20px;">Music Lessons</h1>
        <div class="panels">
            <div class="lessonpanel">
                <h3>One on One Violin Lessons</h3> <br>
                <p style="text-align: justify;">Offering personalized lessons for beginners and aspiring musicians of all ages. Whether you’re picking up the violin for the first time or looking to improve your skills, I’m here to guide you every step of the way.</p>
                <p>What I offer:</p> <br>
                <ul style="margin-left: 30px;">
                    <li>Beginner-Friendly lessons</li>
                    <li>Proper technique & music fundamentals</li>
                    <li>Fun and engaging practice sessions</li>
                    <li>Flexible scheduling</li>
                </ul> <br>
                <p>Let’s turn your love for music into something beautiful. Book a lesson now!</p>
            </div>
            <div class="lessonpanel">
                <center>
                    <form id="apply">
                        <h3>Student Details</h3> <br>
                        <label for="student_name">Student's Name</label> <br>
                        <input type="text" name="student_name" id="student_name" placeholder="Students Fullname" required> <br>
                        <p style="color: red;" id="errorMessName"></p> <br>
                        <label for="student_gmail">Gmail Address</label> <br>
                        <input type="gmail" name="student_gmail" id="student_gmail" placeholder="example@gmail.com" required> <br>
                        <p id="errorMessGmail" style="color: red;"></p>
                        <label for="instrument">Select Instrument</label> <br>
                        <select name="instrument" id="instrument">
                            <option value="Violin" default>Violin</option>
                            <option value="Piano">Piano</option>
                        </select> <br>
                        <label for="level">Select Level</label> <br>
                        <select name="level" id="level">
                            <option value="Beginner" default>Beginner</option>
                            <option value="Intermediete">Intermediete</option>
                        </select> <br>
                        <button id="applybtn" disabled>I'm Interested!</button>
                        <p id="response"></p>
                    </form>
                </center>
            </div>
        </div>
    </section>
    <hr>
    <footer>
        <center>
            <a href="https://www.facebook.com/cjn4d4l" target="_blank"><img src="images/facebook.png" alt="facebook" style="width: 50px;"></a>
            <p id="footerCreds">@ CJndlMusic <?php echo date('Y'); ?> <br> All Rights Reserved</p>
        </center>
    </footer>
    <script>
        document.getElementById("pfp").addEventListener("mouseover", function() {
            this.style.scale = "1.05";
        })

        document.getElementById("pfp").addEventListener("mouseleave", function() {
            this.style.scale = "1.00";
        })

        //scroll function

        function scrollToSection(id) {
            document.getElementById(id).scrollIntoView({
                behavior: "smooth"
            })
        }

        // input functions
        // input validation real time frontend

        const applybtn = document.getElementById("applybtn");

        document.getElementById("apply").addEventListener("input",  function () {
            const student_name = document.getElementById("student_name").value;
            const student_gmail = document.getElementById("student_gmail").value;
            let errorMessName = document.getElementById("errorMessName");
            let errorMessGmail = document.getElementById("errorMessGmail");
            document.getElementById("response").innerHTML = "";
            if (student_name.trim() === "") {
                applybtn.disabled = true;
                errorMessName.innerHTML = "Name Should not be empty";
                errorMessName.style.opacity = "1";
            } else if (/[0-9,!@#$%^&*]/.test(student_name)) {
                applybtn.disabled = true;
                errorMessName.innerHTML = "Name Should not contain Symbols or numbers";
                errorMessName.style.opacity = "1";
            } else {
                applybtn.disabled = false;
                errorMessName.style.opacity = "0";
            }

            if (student_gmail.trim() === "") {
                applybtn.disabled = true;
                errorMessGmail.innerHTML = "Gmail Should not be empty";
                errorMessGmail.style.opacity = "1";
            } else if (!(student_gmail.includes('@gmail.com'))) {
                applybtn.disabled = true;
                errorMessGmail.innerHTML = "Invalid Gmail";
                errorMessGmail.style.opacity = "1";
            } else {
                applybtn.disabled = false;
                errorMessGmail.style.opacity = "0";
            }
        })

        //image randomizer
        function imageSlider() {
            let n = Math.floor(Math.random() * 2) + 1;
            let image = document.getElementById("second_pfp");
            if (n == 1) {
                image.src = "images/pfp" + n + ".jpg";
            } else if (n == 2) {
                image.src = "images/pfp" + n + ".jpg";
            }
        }

        document.addEventListener("DOMContentLoaded", imageSlider); // DOMContentLoaded event, fires when the html file is loaded

        // AJAX functionalities
        document.getElementById("logoutbtn").addEventListener("click", function() {
            console.log("gumana");
            fetch('logout.php');
            window.location.href = 'index.php';
        });

        function clearForm () {
            document.getElementById("student_name").value = "";
            document.getElementById("student_gmail").value = "";
        }

        document.getElementById("apply").addEventListener("submit", function(e) {
            e.preventDefault(); //prevents reload
            const student_name = document.getElementById("student_name").value; //obtaining input values
            const student_gmail = document.getElementById("student_gmail").value;
            const instrument = document.getElementById("instrument").value;
            const level = document.getElementById("level").value;
            console.log("Enrolled"); //test if working
            fetch('enrollStudents.php', { //fetch from file
                method: 'POST', //specifiy what method
                headers: { // how to interpret data
                    "Content-type": "application/x-www-form-urlencoded"
                }, //body sends the data to the specified php file
                body: `student_name=${encodeURIComponent(student_name)}&student_gmail=${encodeURIComponent(student_gmail)}&instrument=${encodeURIComponent(instrument)}&level=${encodeURIComponent(level)}`
            })
            .then(Response => { //converts data into readable format, handles the request
                if (!Response.ok) {
                    throw new Error("Network Problem");
                }
                return Response.text();
            })
            .catch(error => {
                console.error("Error: ", error);
            })
            document.getElementById("response").innerHTML = "Thank You for your Interest!";
            clearForm();
            applybtn.disabled = true;
        })
    </script>
</body>

</html>