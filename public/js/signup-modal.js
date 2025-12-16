function openSignup() {
  document.getElementById("loginModal").style.display = "none";
  document.getElementById("signupModal").style.display = "flex";
}

function closeSignup() {
  document.getElementById("signupModal").style.display = "none";
}

function toggleSignupPassword() {
  const pwd = document.getElementById("signupPassword");
  pwd.type = pwd.type === "password" ? "text" : "password";
}

/* Close on backdrop click */
document.getElementById("signupModal").addEventListener("click", function (e) {
  if (e.target === this) {
    closeSignup();
  }
});
