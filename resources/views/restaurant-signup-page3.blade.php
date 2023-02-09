<!DOCTYPE html>
<html lang="en">

<head>

        <style>
            .input-error{
                color: #ff5555;
                margin-top: -300px;
                margin-bottom: 80px;
            }
        </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- css link -->
    <link rel="stylesheet" href="/css/restaurant-signup.css">
    <title>Resturant signup</title>
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
</head>

<body>
    <section class="main-box" style="margin-top: 90px;">
       
    @if(Session::has('fail'))
    <div class="alert text-center alert-danger" role="alert">
         {{Session::get('fail')}}
        </div>
        @endif
      
        <p class="text-1">STEP <b>3</b> OF <b>3</b></p>
        <h1 class="text-2">Almost there</h1>
        <p class="text-3">Enter your restaurant login info</p>
        <form action="{{route('save-restaurant-loginInfo')}}" method="post" class="restaurant-register-form1">
         @csrf
            <label>Restaurant id</label>
            <input type="text" class="form-control" name="id" placeholder="Enter your restaurant id" readonly value="{{$value->id}}">

            <div class="mb-3">
            <label>password</label>
            <input type="Password" class="form-control" placeholder="Enter the password" id="myPassword" name="password">
            <span style="color: red;">@error('password'){{$message}}@enderror</span>
            </div>
           
            <div class="mb-3">
            <label>Confirm password</label>
            <input type="password" class="form-control" placeholder="Confirm your password" id="confirmPassword" name="confirmPassword">
            <span style="color: red;">@error('confirmPassword'){{$message}}@enderror</span>
            </div>
          
            
            <div class="forPassword-and-terms">
            <div style="display: flex; align-items:center">
                <input style="height: 15px;" type="checkbox" class="form-check-input" onclick="showPassword();"><span style="margin-left:8px;margin-top:-15px;font-size:13px;">Show Password</span>
            </div>
            <div style="display: flex; align-items:center">
                <input style="height: 15px;" type="checkbox"  class="form-check-input"><span style="margin-left:8px;margin-top:-15px;font-size:13px;">Terms & Condition</span>
            </div>
            </div>
            <button type="submit">Next</button>
        </form>
    </section>
    <script>
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
    </script>
</body>

</html>