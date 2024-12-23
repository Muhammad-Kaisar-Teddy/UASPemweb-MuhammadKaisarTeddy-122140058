// script.js

document.getElementById("registerBtn").addEventListener("click", function () {
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const terms = document.getElementById("terms").checked;
  
    if (!username || !email || !password || !confirmPassword) {
      alert("Please fill in all fields.");
      return;
    }
  
    if (password !== confirmPassword) {
      alert("Passwords do not match.");
      return;
    }
  
    if (!terms) {
      alert("You must agree to the terms of service.");
      return;
    }
  
    alert(`Registration successful! Welcome, ${username}!`);
  });
  