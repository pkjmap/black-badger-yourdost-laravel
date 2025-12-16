const megaParent = document.querySelector(".has-mega");
const megaMenu = document.querySelector(".mega-menu");

megaParent.addEventListener("mouseenter", () => {
  megaMenu.style.display = "flex";
});

megaParent.addEventListener("mouseleave", () => {
  megaMenu.style.display = "none";
});


const logoTrack = document.querySelector(".logo-track");

logoTrack.addEventListener("mouseenter", () => {
  logoTrack.style.animationPlayState = "paused";
});

logoTrack.addEventListener("mouseleave", () => {
  logoTrack.style.animationPlayState = "running";
});
