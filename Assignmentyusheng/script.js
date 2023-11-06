const body = document.querySelector("body"),
    sidebar = body.querySelector(".sidebar"),
    toggle = body.querySelector(".toggle"),
    searchBtn = body.querySelector(".search-box"),
    modeSwtich = body.querySelector(".toggle-switch"),
    modeText = body.querySelector(".mode-text");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});


let darkmode = localStorage.getItem("dark-mode");

if (darkmode === "enabled") {
    body.classList.add("dark")
    localStorage.setItem("dark-mode", "enabled")
    modeText.innerText = "Light Mode"
    if (document.getElementById("contact-box") != null) {
        document.getElementById("contact-box").style.backgroundColor = "#242526"
        document.getElementById("h2").style.color = "white"
    }
}

modeSwtich.addEventListener("click", () => {
    darkmode = localStorage.getItem("dark-mode")

    if (darkmode === "disabled") {
        body.classList.add("dark")
        localStorage.setItem("dark-mode", "enabled")
        modeText.innerText = "Light Mode"
        document.getElementById("contact-box").style.backgroundColor = "#242526"
        document.getElementById("h2").style.color = "white"
    } else {
        body.classList.remove("dark")
        localStorage.setItem("dark-mode", "disabled")
        modeText.innerText = "Dark Mode"
        document.getElementById("contact-box").style.backgroundColor = "#fff"
        document.getElementById("h2").style.color = "black"
    }
});