const menuBtns = document.querySelectorAll(".menu-btn");
const foodItems = document.querySelectorAll(".room-item");

let activeBtn = "livingroom";

showRooms(activeBtn);

menuBtns.forEach((btn) => {
  btn.addEventListener("click", () => {
    resetActiveBtn();
    showRooms(btn.id);
    btn.classList.add("active-btn");
  });
});

function resetActiveBtn() {
  menuBtns.forEach((btn) => {
    btn.classList.remove("active-btn");
  });
}

function showRooms(newMenuBtn) {
  activeBtn = newMenuBtn;
  foodItems.forEach((item) => {
    if (item.classList.contains(activeBtn)) {
      item.style.display = "grid";
    } else {
      item.style.display = "none";
    }
  });
}
