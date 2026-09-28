
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

const message_p = document.getElementById("message")
document.getElementById("applybtn").addEventListener("click", () => {
    message_p.innerText = "Sending...";
    const message = {
        sender: document.getElementById("sender").value,
        content: document.getElementById("content").value
    }

    if (!message.content) {
        return;
    }

    fetch("https://personalsite-api.fastapicloud.dev/sendFeedback", {
        method: "POST", headers: {"Content-Type": "application/json"}, body: JSON.stringify(message)
    }).then(response => response.json()).then(data => {
        document.getElementById("sender").value = "";
        document.getElementById("content").value = "";
        if (data.status) {
            message_p.innerText = data.message;
        } else {
            message_p.innerText = "Failed to Send Message"
        }
    })
})