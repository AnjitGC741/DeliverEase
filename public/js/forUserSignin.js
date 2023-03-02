const inputValue=document.getElementsByTagName("input");
        console.log(inputValue);
        for(var i=1;i<=4;i++)
        {
        inputValue[i].addEventListener('input',function()  {
                if((inputValue[1].value.length > 0) && (inputValue[2].value.length > 0) && (inputValue[3].value.length > 0) && (inputValue[4].value.length > 0))
                {
                    document.getElementById("btn-login").style.backgroundColor="#D9A47A";
                }
                else{
                    document.getElementById("btn-login").style.backgroundColor="#5C636A";
                }
        });
        }
        function showPassword()
        {
            var x = document.getElementById("myPassword");
            var y = document.getElementById("confirmPassword");
            if (x.type === "password" || y.type === "password") {
                x.type = "text";
                y.type = "text";
            } else {
                x.type = "password";
                y.type = "password";
            }
        }