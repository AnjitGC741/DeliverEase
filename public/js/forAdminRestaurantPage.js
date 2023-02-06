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
fileInput.addEventListener("change",function(){
    var form = document.querySelector("#myForm");
    form.submit();
});