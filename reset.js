function show() {
    let x = document.getElementById("password");
    let y = document.getElementById("confirmpassword");
    if (x.type === "password" && y.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  }
