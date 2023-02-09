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