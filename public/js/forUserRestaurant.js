
let idValue=0;
window.addEventListener('load', function() {
  var loader = document.querySelector('.loader');
  setTimeout(function() {
    loader.style.opacity = '0';
    setTimeout(function() {
      loader.style.display = 'none';
    }, 1000);
  }, 2000); 
});
window.onload = function() {
  var child = document.getElementById("food-menu-category");
  var childHeight = child.offsetHeight;
  document.getElementById("multiple-div").style.height = childHeight + "px";
};
function plus(value){
  var quantity=document.getElementById("foodQuantity_"+value).value;
  quantity++;
  document.getElementById("funnyBox").style.visibility="hidden";
  document.getElementById("foodQuantity_"+value).value = quantity;
}
function minus(value){
  var quantity=document.getElementById("foodQuantity_"+value).value;
  if(quantity > 1)
  {
  quantity--;
  }
  else
  {
    document.getElementById("funnyBox").style.visibility="visible";
  }
  document.getElementById("foodQuantity_"+value).value = quantity;
}
function toggleMenu(){
let subMenu = document.getElementById("subMenu");
subMenu.classList.toggle("open-menu");
} 
function changeVisibilityCartBox(){
document.getElementById("cart-and-edit-box1").style.display="block";
document.getElementById("myCart").classList.toggle("hidden");
document.getElementById("blurBox").classList.toggle("hidden");
}
function hideAll()
{
document.getElementById("myCart").classList.toggle("hidden");
document.getElementById("blurBox").classList.toggle("hidden");
document.getElementById("cart-and-edit-box1").style.display="none";

if(idValue > 0)
{
  document.getElementById("editQuantity_"+idValue).style.display = "none";
}
document.getElementById("funnyBox").style.visibility="hidden";
}
function openFoodEditBox(x)
{
  if( document.getElementById("editQuantity_"+x).style.display != "block"){
    if(idValue > 0)
    {
      document.getElementById("editQuantity_"+idValue).style.display = "none";
    }
    document.getElementById("editQuantity_"+x).style.display = "block";
    
  }
  else
  {
    if(idValue > 0)
    {
      document.getElementById("editQuantity_"+idValue).style.display = "none";
    }
    document.getElementById("editQuantity_"+x).style.display = "none";
  }
  document.getElementById("funnyBox").style.visibility="hidden";
   idValue=x; 
}
function showMenu()
{
  var child = document.getElementById("food-menu-category");
  var childHeight = child.offsetHeight;
  document.getElementById("multiple-div").style.height = childHeight + "px";
  document.getElementById("food-menu-category").style.visibility="visible";
  document.getElementById("restaurant-photo-gallary").style.visibility="hidden";
  document.getElementById("restaurant-customer-review").style.visibility="hidden";
  document.getElementById("food-menu-category-btn").classList.add("active1");
  document.getElementById("restaurant-photo-gallary-btn").classList.remove("active1");
  document.getElementById("restaurant-customer-review-btn").classList.remove("active1");
}
function showCustomerReview()
{
  var child = document.getElementById("restaurant-customer-review");
  var childHeight = child.offsetHeight;
  document.getElementById("multiple-div").style.height = childHeight + "px";
  document.getElementById("food-menu-category").style.visibility="hidden";
  document.getElementById("restaurant-photo-gallary").style.visibility="hidden";
  document.getElementById("restaurant-customer-review").style.visibility="visible";
  document.getElementById("food-menu-category-btn").classList.remove("active1");
  document.getElementById("restaurant-photo-gallary-btn").classList.remove("active1");
  document.getElementById("restaurant-customer-review-btn").classList.add("active1");
}
function showPhotoGallary()
{
  var child = document.getElementById("restaurant-photo-gallary");
  var childHeight = child.offsetHeight;
  document.getElementById("multiple-div").style.height = childHeight + "px";
  document.getElementById("food-menu-category").style.visibility="hidden";
  document.getElementById("restaurant-photo-gallary").style.visibility="visible";
  document.getElementById("restaurant-customer-review").style.visibility="hidden";
  document.getElementById("food-menu-category-btn").classList.remove("active1");
  document.getElementById("restaurant-photo-gallary-btn").classList.add("active1");
  document.getElementById("restaurant-customer-review-btn").classList.remove("active1");
}
function showRatingBox()
{
  document.getElementById("rating-box").style.display="block";
}
function closeRatingBox()
{
  document.getElementById("rating-box").style.display="none";
}
