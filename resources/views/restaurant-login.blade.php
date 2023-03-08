<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
    <!-- font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <title>Restaurant login</title>
     <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body{
            background-color: #F6F7FC;
            font-family: 'Roboto', sans-serif;
            line-height: 1;
        }
        .mainBox {
            display: grid;
            grid-template-columns: 1fr 1fr;
            width: 60%;
            margin: 0 auto;
            min-height: 400px;
            margin-top: 100px;
            border-radius: 10px;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            background-color: #fff;
            overflow: hidden;
        }
        .imgBox img {
            width: 100%;
            height: 100%;
        }
        .btn1{
            height: 40px;
            color: white;
            width: 100%;
            border-style: none;
            border-radius: 5px;
            transition: all 0.3s;
        }
        .btn-login:hover:hover{
            transform: scale(1.1);
        }
        .btn-login{
            background-color: #5C636A;
            margin-top: 15px;
            margin-bottom: 5px;
        }
     </style>
     @vite(['resources/js/app.js'])
</head>
<body>

     <section>
        <div class="mainBox">
            <div class="imgBox">
                <img src="/img/restauant-login.jpg" alt="">
            </div>
            <div class="p-5">
                @if(Session::has('fail'))
                <div class="alert text-center alert-danger" role="alert">
                {{Session::get('fail')}}
                </div>
                @endif
                <h2 class="mb-4 mt-4">Login</h1>
                <form action="#" method="#">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Restaurant id</label>
                        <input type="email"  class="form-control" id="exampleInputEmail1"  name="email" value="{{old('customerName')}}">
                        <span style="color: red;"> @error('email'){{$message}}@enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control"  name="password" id="myPassword">
                        <span style="color: red;"> @error('password'){{$message}}@enderror</span>
                    </div>
                    <div>
                        <input type="checkbox" class="form-check-input" onclick="showPassword();"><span style="margin-left:5px;font-size:13px;">Show Password</span>
                    </div>
                    <button type="submit" class="btn1 btn-login" id="btn-login">Log In</button>
                </form>
                <p class="mt-3" style="letter-spacing: 0.5px;">Have not register restauant! <a href="{{url('/restaurant-signup1')}}" style="text-decoration: none;">Register now</a></p>
    
            </div>
    
        </div>
     </section>
     <script src="./js/forRestaurantLogin.js"></script>
</body>
</html>