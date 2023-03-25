let click = document.querySelector(".click");
let list = document.querySelector(".list");
click.addEventListener("click", () => {
    list.classList.toggle("newlist");
    var icon = document.getElementById("filter-down-icon");
    var icon1 = document.getElementById("filter-up-icon");
    if (icon1.style.visibility === "visible") {
        icon1.style.visibility = "hidden";
    } else {
        icon1.style.visibility = "visible";
    }
    if (icon.style.visibility === "hidden") {
        icon.style.visibility = "visible";
    } else {
        icon.style.visibility = "hidden";
    }
});
let click1 = document.querySelector(".click1");
let list1 = document.querySelector(".list1");
click1.addEventListener("click", () => {
    list1.classList.toggle("newlist1");
    var icon = document.getElementById("sort-down-icon");
    var icon1 = document.getElementById("sort-up-icon");
    if (icon1.style.visibility === "visible") {
        icon1.style.visibility = "hidden";
    } else {
        icon1.style.visibility = "visible";
    }
    if (icon.style.visibility === "hidden") {
        icon.style.visibility = "visible";
    } else {
        icon.style.visibility = "hidden";
    }
});
let click2 = document.querySelector(".click2");
let list2 = document.querySelector(".list2");
click2.addEventListener("click", () => {
    list2.classList.toggle("newlist2");
    var icon = document.getElementById("location-down-icon");
    var icon1 = document.getElementById("location-up-icon");
    if (icon1.style.visibility === "visible") {
        icon1.style.visibility = "hidden";
    } else {
        icon1.style.visibility = "visible";
    }
    if (icon.style.visibility === "hidden") {
        icon.style.visibility = "visible";
    } else {
        icon.style.visibility = "hidden";
    }
});
