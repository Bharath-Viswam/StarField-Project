const inputs = document.querySelectorAll(".input");

function focusFunc() {
  let parent = this.parentNode;
  parent.classList.add("focus");
}

function blurFunc() {
  let parent = this.parentNode;
  if (this.value == "") {
    parent.classList.remove("focus");
  }
}
// function validateForm() {
//   let username = document.forms["contactForm"]["username"].value;
//   let email = document.forms["contactForm"]["email"].value;
//   let phone = document.forms["contactForm"]["phone"].value;
//   let message = document.forms["contactForm"]["message"].value;

//   if (username == "" || email == "" || phone == "" || message == "") {
//       alert("All fields must be filled out");
//       return false;
//   }

//   let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
//   if (!email.match(emailPattern)) {
//       alert("Invalid email format");
//       return false;
//   }

//   let phonePattern = /^[0-9]{10}$/;
//   if (!phone.match(phonePattern)) {
//       alert("Phone number must be 10 digits");
//       return false;
//   }

//   return true;
// }
// function validateForm2() {
//   let username = document.forms["contactForm"]["username"].value;
//   let email = document.forms["contactForm"]["email"].value;
//   let phone = document.forms["contactForm"]["phone"].value;
//   let message = document.forms["contactForm"]["message"].value;

//   if (username == "" || email == "" || phone == "" || message == "") {
//       alert("All fields must be filled out");
//       return false;
//   }

//   let emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
//   if (!email.match(emailPattern)) {
//       alert("Invalid email format");
//       return false;
//   }

//   let phonePattern = /^[0-9]{10}$/;
//   if (!phone.match(phonePattern)) {
//       alert("Phone number must be 10 digits");
//       return false;
//   }

//   return true;
// }
inputs.forEach((input) => {
  input.addEventListener("focus", focusFunc);
  input.addEventListener("blur", blurFunc);
});