function toggleMenu() {
    document.getElementById("profileMenu").classList.toggle("show");
}

// Close on outside click
document.addEventListener("click", function (e) {
    const profile = document.querySelector(".profile");
    const menu = document.getElementById("profileMenu");

    if (!profile.contains(e.target) && !menu.contains(e.target)) {
        menu.classList.remove("show");
    }
});
