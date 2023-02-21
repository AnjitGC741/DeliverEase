
let idValue;
function plus(){
  var quantity=document.getElementById("foodQuantity").value;
  quantity++;
  document.getElementById("funnyBox").style.visibility="hidden";
  document.getElementById("foodQuantity").value = quantity;
}
function minus(){
  var quantity=document.getElementById("foodQuantity").value;
  if(quantity > 1)
  {
  quantity--;
  }
  else
  {
    document.getElementById("funnyBox").style.visibility="visible";
  }
  document.getElementById("foodQuantity").value = quantity;
}

function toggleMenu(){
let subMenu = document.getElementById("subMenu");
subMenu.classList.toggle("open-menu");
} 
function changeVisibilityCartBox(){
document.getElementById("myCart").classList.toggle("hidden");
document.getElementById("blurBox").classList.toggle("hidden");
}
function hideAll()
{
document.getElementById("myCart").classList.toggle("hidden");
document.getElementById("blurBox").classList.toggle("hidden");

document.getElementById("editQuantity_"+idValue).classList.add("hidden");
document.getElementById("funnyBox").style.visibility="hidden";
}
function openFoodEditBox(x)
{
idValue=x;
document.getElementById("editQuantity_"+x).classList.toggle("hidden");
}