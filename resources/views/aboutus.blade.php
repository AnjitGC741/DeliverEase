<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="/favicon/favicon1.ico" type="image/x-icon">
    <title>AboutUS</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Baloo 2", cursive;
        }
       

        .container{
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 4rem 18rem;
            padding: 40px 47px;
            box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
            border-radius: 20px;
            width: 800px;
            height: 600px;
        }

        .container img{
            height: 100%;
            width: auto;
            border-radius: 20px;
        }

        .about_details{
            margin: 0 45px;
        }

        .about_details span{
            color: red;
        }
        .about_details h2{
            font-family: Audiowide, fantasy;
            font-weight: 300;
            font-size: 26px;
            letter-spacing: 1px;
            margin-bottom: 20px;

        }

        .about_details p{
            color: gray;
            font-size: 15px;
        }

        .btn{
            margin: 15px 0;
            padding: 8px 20px;
            background-color: transparent;
            border: 1px solid red;
            border-radius: 10px;
            letter-spacing: 1px;
            color: #373737;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }
        .btn:hover{
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
    <img src="img/egg.jpg" alt="food">
    <div class="about_details">
        <span>About Our Restaurant</span>
        <h2>We Provide Good Quality Food To Your Family</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla sed ullamofficiis
         rem velit esse harum suscipit magna ducimus  ab pariatur ipsum.</p>

        <br>

        <p>Lorem ipsum dolor sit, amet consectetur ilique molestias facere id 
            delectus odio, a labore perspiciatis quas .</p>

      <button class="btn">Learn More</button>
    </div>
    </div>
    
</body>
</html>