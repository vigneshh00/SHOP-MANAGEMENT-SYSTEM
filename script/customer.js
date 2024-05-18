const iconContainer = document.getElementById("icon-container");
const sideBar = document.getElementById("side-bar");
const bar1 = document.getElementById("bar1");
const bar2 = document.getElementById("bar2");
const bar3 = document.getElementById("bar3");
const heading = document.getElementById("heading");
const buttonSection = document.getElementById("buttonSection");

function myFunction(x) {
  x.classList.toggle("change");
}

function collapseSidebar() {
  heading.style.transform = "translateX(0)";
  buttonSection.style.paddingLeft = "0px";
  iconContainer.style.transform = "translateX(0)";
  sideBar.style.width = "0";
}

iconContainer.addEventListener("click", () => {
  if (sideBar.style.width == "300px") {
    collapseSidebar();
  } else {
    heading.style.transform = "translateX(300px)";
    buttonSection.style.paddingLeft = "300px";
    iconContainer.style.transform = "translateX(300px)";
    sideBar.style.width = "300px";
  }
});
