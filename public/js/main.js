let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};
//modal deconnexion
document.getElementById('logoutButton').addEventListener('click', function() {
  $('#logoutModal').modal('show');
});
//datatable
$(document).ready(function() {
  $('#exemple').DataTable();
});

// password visualization
function togglePasswordVisibility() {
  var passwordInput = document.getElementById('pass');
  var eyeIcons = document.querySelectorAll(".eye-icon");

  if (passwordInput.type === "password") {
      passwordInput.type = "text";
      eyeIcons.forEach(icon => icon.classList.add("open"));
  } else {
      passwordInput.type = "password";
      eyeIcons.forEach(icon => icon.classList.remove("open"));
  }
}

