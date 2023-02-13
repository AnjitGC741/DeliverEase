const inputValue=document.getElementsByTagName("input");
console.log(inputValue);
for(var i=1;i<=2;i++)
{
inputValue[i].addEventListener('input',function()  {
        if(inputValue[1].value.length > 0 && inputValue[2].value.length > 0)
        {
            document.getElementById("btn-login").style.backgroundColor="#FF7F00";
        }
        else{
            document.getElementById("btn-login").style.backgroundColor="#5C636A";
        }
});
}
function showPassword()
{
    var x = document.getElementById("myPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}