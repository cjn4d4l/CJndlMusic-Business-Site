
function openDialog(id) {
    document.getElementById(id).showModal();
}

function closeDialog(id) {
    document.getElementById(id).close();
}

document.getElementById("pfp").addEventListener("mouseover", function () {
    this.style.scale = "1.05";
})

document.getElementById("pfp").addEventListener("mouseleave", function () {
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

document.addEventListener("DOMContentLoaded", imageSlider); // DOMContentLoaded event, fires when the html file is load

function clearForm() {
    document.getElementById("student_name").value = "";
    document.getElementById("student_gmail").value = "";
}

let students = [];

document.getElementById("submitForm").addEventListener("click", () => {
    students = JSON.parse(localStorage.getItem("students") || '[]');
    const student = {
        student_name: document.getElementById("student_name").value.trim(),
        gmail: document.getElementById("student_gmail").value,
        instrument: document.getElementById("instrument").value,
        level: document.getElementById("level").value
    }

    if (student.student_name === '') {
        document.getElementById("errorMessName").innerHTML = "Name Cannot be Empty";
        return;
    }

    if (student.gmail === '') {
        document.getElementById("errorMessGmail").innerHTML = "Gmail Cannot be Empty";
        return;
    }
    students.push(student);
    localStorage.setItem("students", JSON.stringify(students));
    document.getElementById("response").innerHTML = "Success";
})

document.getElementById("student_name").addEventListener("input", () => {
    document.getElementById("errorMessName").innerHTML = "";
})

document.getElementById("student_gmail").addEventListener("input", () => {
    document.getElementById("errorMessGmail").innerHTML = "";
})