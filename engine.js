function show()
{
    let x = document.getElementById("button");
    let y = document.getElementById("content");
    if (x.style.display == "none") 
    {
      x.style.display = "block";
      y.innerHTML = "Back";
    }
    else 
    {
      x.style.display = "none";
      y.innerHTML = "Dynamic Search";
    }
}

let name=function name(n){
  document.getElementById("demo").innerHTML = name;
  return n;
}

