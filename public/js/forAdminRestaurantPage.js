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
function hideAll()
{
  document.getElementById('blurBox').style.visibility="hidden";
  document.getElementById('editProfileForm').style.visibility="hidden";
  document.getElementById('editLoginInfo').style.visibility="hidden";
}
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