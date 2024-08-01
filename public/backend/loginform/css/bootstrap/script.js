document.addEventListener("DOMContentLoaded", function () {
    // Simulate loading time
    setTimeout(() => {
        document.getElementById("preloader").style.display = "none";
        document.querySelector(".content").style.display = "block";
    }, 3000); // Adjust the timeout as needed
});
