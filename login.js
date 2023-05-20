function show() {
    let x = document.getElementById("password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }

function error()
{
    let x = document.getElementById("Email").value;
    let y = document.getElementById("password").value;
    if(x=="" && y=="")
    {
      alert("field cannot be empty");
    }
}