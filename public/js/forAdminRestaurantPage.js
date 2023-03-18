let idValue;
let idValueNew;
var fileInput=document.querySelector("#change");
var fileInput2=document.querySelector("#change2");
fileInput.addEventListener("change",function(){
    var form = document.querySelector("#myForm");
    form.submit();
});
fileInput2.addEventListener("change",function(){
  var form2 = document.querySelector("#myForm2");
  form2.submit();
});
function displayBackgroundImgOption()
{
 let editOption = document.getElementById("changeBackgroundImgOption");
 if(editOption.style.visibility === "hidden")
 {
   editOption.style.visibility = "visible";
 }
 else{
   editOption.style.visibility = "hidden";
 }
}
function displayProfileImgOption()
{
 let editOption = document.getElementById("changeProfileImgOption");
 if(editOption.style.visibility === "hidden")
 {
   editOption.style.visibility = "visible";
 }
 else{
   editOption.style.visibility = "hidden";
 }
}
function displayChangeRestaurantData()
{
  let editOption = document.getElementById("changeRestaurantData");
  if(editOption.style.visibility === "hidden")
  {
    editOption.style.visibility = "visible";
  }
  else{
    editOption.style.visibility = "hidden";
  }

}
function displayChangeRestaurantInfo()
{
  document.getElementById('blurBox').style.visibility="visible";
  document.getElementById('editProfileForm').style.visibility="visible";
}
function displayChangeRestaurantLoginInfo(){
  document.getElementById('blurBox').style.visibility="visible";
  document.getElementById('editLoginInfo').style.visibility="visible";
}
function displayAddFood()
{
  document.getElementById('blurBox').style.visibility="visible";
  document.getElementById('addFood').style.visibility="visible";
}
function displayAddImage()
{
  document.getElementById('blurBox').style.visibility="visible";
  document.getElementById('addImage').style.visibility="visible";
}
function hideAll()
{
  document.getElementById('blurBox').style.visibility="hidden";
  document.getElementById('editProfileForm').style.visibility="hidden";
  document.getElementById('editLoginInfo').style.visibility="hidden";
  document.getElementById('addFood').style.visibility="hidden";
  document.getElementById('addImage').style.visibility="hidden";
  document.getElementById("editFood_"+idValue).style.visibility = "hidden";
  document.getElementById("viewOrderDetail_"+idValueNew).style.visibility = "hidden";
}
function openFoodEditBox(x)
{
    idValue=x; 
    document.getElementById("editFood_"+x).style.visibility = "visible";
    document.getElementById('blurBox').style.visibility="visible";
}
function displayFoodSection()
{
  document.getElementById("food-section").style.visibility = "visible";
  document.getElementById("unavailable-food-section").style.visibility = "hidden";
  document.getElementById("order-section").style.visibility = "hidden";
  document.getElementById("photo-gallary-section").style.visibility = "hidden";
  document.getElementById("analysis-section").style.visibility = "hidden";
  document.getElementById("customer-review-section").style.visibility = "hidden";
  document.getElementById("food-section-btn").classList.add("active");
  document.getElementById("unavailable-food-section-btn").classList.remove("active");
  document.getElementById("order-section-btn").classList.remove("active");
  document.getElementById("analysis-section-btn").classList.remove("active");
  document.getElementById("customer-review-section-btn").classList.remove("active");
  document.getElementById("photo-gallary-section-btn").classList.remove("active");
  document.getElementById("food-order-lists").style.visibility = "hidden";
  document.getElementById("food-order-history-lists").style.visibility = "hidden";
}
function displayUnavailableFoodSection()
{
  document.getElementById("food-section").style.visibility = "hidden";
  document.getElementById("unavailable-food-section").style.visibility = "visible";
  document.getElementById("order-section").style.visibility = "hidden";
  document.getElementById("photo-gallary-section").style.visibility = "hidden";
  document.getElementById("analysis-section").style.visibility = "hidden";
  document.getElementById("customer-review-section").style.visibility = "hidden";
  document.getElementById("food-section-btn").classList.remove("active");
  document.getElementById("unavailable-food-section-btn").classList.add("active");
  document.getElementById("order-section-btn").classList.remove("active");
  document.getElementById("analysis-section-btn").classList.remove("active");
  document.getElementById("customer-review-section-btn").classList.remove("active");
  document.getElementById("photo-gallary-section-btn").classList.remove("active");
  document.getElementById("food-order-lists").style.visibility = "hidden";
  document.getElementById("food-order-history-lists").style.visibility = "hidden";

}
function displayOrderSection()
{
  document.getElementById("food-section").style.visibility = "hidden";
  document.getElementById("unavailable-food-section").style.visibility = "hidden";
  document.getElementById("order-section").style.visibility = "visible";
  document.getElementById("photo-gallary-section").style.visibility = "hidden";
  document.getElementById("analysis-section").style.visibility = "hidden";
  document.getElementById("customer-review-section").style.visibility = "hidden";
  document.getElementById("food-order-lists").style.visibility = "visible";
  document.getElementById("food-section-btn").classList.remove("active");
  document.getElementById("unavailable-food-section-btn").classList.remove("active");
  document.getElementById("order-section-btn").classList.add("active");
  document.getElementById("analysis-section-btn").classList.remove("active");
  document.getElementById("customer-review-section-btn").classList.remove("active");
  document.getElementById("photo-gallary-section-btn").classList.remove("active");
}
function displayAnalysisSection()
{
  document.getElementById("food-section").style.visibility = "hidden";
  document.getElementById("unavailable-food-section").style.visibility = "hidden";
  document.getElementById("order-section").style.visibility = "hidden";
  document.getElementById("photo-gallary-section").style.visibility = "hidden";
  document.getElementById("analysis-section").style.visibility = "visible";
  document.getElementById("customer-review-section").style.visibility = "hidden";
  document.getElementById("food-section-btn").classList.remove("active");
  document.getElementById("unavailable-food-section-btn").classList.remove("active");
  document.getElementById("order-section-btn").classList.remove("active");
  document.getElementById("analysis-section-btn").classList.add("active");
  document.getElementById("customer-review-section-btn").classList.remove("active");
  document.getElementById("photo-gallary-section-btn").classList.remove("active");
  document.getElementById("food-order-lists").style.visibility = "hidden";
  document.getElementById("food-order-history-lists").style.visibility = "hidden";
}
function displayPhotoGallarySection()
{
  document.getElementById("food-section").style.visibility = "hidden";
  document.getElementById("unavailable-food-section").style.visibility = "hidden";
  document.getElementById("order-section").style.visibility = "hidden";
  document.getElementById("analysis-section").style.visibility = "hidden";
  document.getElementById("photo-gallary-section").style.visibility = "visible";
  document.getElementById("customer-review-section").style.visibility = "hidden";
  document.getElementById("food-section-btn").classList.remove("active");
  document.getElementById("unavailable-food-section-btn").classList.remove("active");
  document.getElementById("order-section-btn").classList.remove("active");
  document.getElementById("analysis-section-btn").classList.remove("active");
  document.getElementById("customer-review-section-btn").classList.remove("active");
  document.getElementById("photo-gallary-section-btn").classList.add("active");
  document.getElementById("food-order-lists").style.visibility = "hidden";
  document.getElementById("food-order-history-lists").style.visibility = "hidden";
}
function displayCustomerReviewSection()
{
  document.getElementById("food-section").style.visibility = "hidden";
  document.getElementById("unavailable-food-section").style.visibility = "hidden";
  document.getElementById("order-section").style.visibility = "hidden";
  document.getElementById("analysis-section").style.visibility = "hidden";
  document.getElementById("photo-gallary-section").style.visibility = "hidden";
  document.getElementById("customer-review-section").style.visibility = "visible";
  document.getElementById("food-section-btn").classList.remove("active");
  document.getElementById("unavailable-food-section-btn").classList.remove("active");
  document.getElementById("order-section-btn").classList.remove("active");
  document.getElementById("analysis-section-btn").classList.remove("active");
  document.getElementById("customer-review-section-btn").classList.add("active");
  document.getElementById("photo-gallary-section-btn").classList.remove("active");
  document.getElementById("food-order-lists").style.visibility = "hidden";
  document.getElementById("food-order-history-lists").style.visibility = "hidden";
}
function displayRecentOrder(){
  document.getElementById("food-order-lists").style.visibility = "visible";
  document.getElementById("food-order-history-lists").style.visibility = "hidden";
  
}
function displayOrderHistory(){
  document.getElementById("food-order-lists").style.visibility = "hidden";
  document.getElementById("food-order-history-lists").style.visibility = "visible";
}
function showOrderFoodDetail(y)
{
    idValueNew=y; 
    document.getElementById("viewOrderDetail_"+y).style.visibility = "visible";
    document.getElementById('blurBox').style.visibility="visible";
}