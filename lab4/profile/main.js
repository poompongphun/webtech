const doc = document.documentElement;
const section = doc.querySelectorAll("section");
const navMenu = document.getElementById("navMenu");
const navA = navMenu.querySelectorAll("a");
const navbar = document.getElementsByClassName("navbar")[0];
let currentSection = "home";
let isStarted = false;
// navA.forEach((a) => {
//   a.onclick = () => {
//     activeBtn(a.href.split("#")[1]);
//   };
// });

window.onscroll = () => {
  let val = document.documentElement.scrollTop;
  if (val == 0) {
    navbar.style.height = "86px";
  } else {
    navbar.style.height = "56px";
  }
  let top = doc.scrollTop + 56;
  let bottom = top + doc.offsetHeight;
  let arr = [];
  section.forEach((ele) => {
    if (
      (ele.offsetTop < top && top < ele.offsetTop + ele.offsetHeight) ||
      (ele.offsetTop < bottom && bottom < ele.offsetTop + ele.offsetHeight)
    ) {
      arr.push(ele.id);
    }
  });
  if (arr[0] && arr[0] != currentSection) {
    currentSection = arr[0];
    activeBtn(currentSection);
  }
};

function activeBtn(id) {
  navA.forEach((aa) => {
    if (aa.classList.contains("active")) {
      aa.classList.remove("active");
    } else if (aa.href.split("#")[1] == id) {
      aa.classList.add("active");
    }
  });
}
