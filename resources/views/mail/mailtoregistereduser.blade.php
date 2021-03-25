<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            overflow-x: hidden;
        }

        .container{
            max-width: 1140px;
            margin: auto;
        }

        .social img{
            max-width: 20px;
            max-height: 20px;
        }

        .mailOverlap{
            height:48vh;
            min-height: 500px;
            background-color: #F6F6F6;
        }

        .mailOverlap .container img{
            margin-top: 20px;
            filter: brightness(-10);
        }

        .mailOverlap .bgImg{
            min-width:  500px;
            min-height: 500px;
            background-repeat: no-repeat;
            background-size: contain;
            position: absolute;

            right: 100px;
            top: 0;
        }

        .mailHead{
            margin-top:-320px;


        }

        .mailCard{
            padding: 30px;
            position: relative;
            z-index: 5;
            background-color: #fff;
            margin: auto;
            box-shadow: 0 0 25px rgba(0, 0,0, 0.07);
        }


        .mailCard h1 {
            font-size: 42px;
            color:#20AE2E;
            margin-bottom: 30px;
        }

        .mailCard p {
            font-family: 'Open Sans';
            font-size: 20px;
            line-height: 1.5;
        }

        .mailBy{
            font-family: 'Open Sans';
            font-size: 20px;
            font-weight: 500;
            margin-top: 20px;
        }


        .mailFooter{
            padding: 30px;
            text-align: center;
            margin-top: 30px;


        }

        .mailFooter ul {
            list-style: none;
            display: flex;
            margin-top: 20px;
            justify-content: center;
        }

        .mailFooter ul li{
            display: inline-block;
            min-width: 20px;
            margin: 0 6px;
        }


        @media (max-width:1200px){
            .container{max-width: 992px;}
        }

        @media (max-width:992px){
            .mailOverlap .bgImg{right: 0;}
            .container{max-width: 768px;}
            .mailCard h1{font-size: 36px;}
            .mailCard p,.mailBy{font-size: 18px;}

        }

        @media (max-width:800px){
            .container{max-width: 600px;}
            .logo{position:relative;z-index:5;filter: brightness(0);}
        }

        @media screen and (max-width:575px) {
            .mailOverlap .bgImg {transform: translateX(50%);}
        }


    </style>
</head>
<body>
<section class="mailHead">
    <div class="container">
        <div class="mailCard">
            <h1>Thank you for connecting with Hamrakisan..</h1>
            <br>
            <p>Your account has been created, please activate your account by clicking this link</p>
            <p><a href="{{ route('verify',$user->email_verification_token) }}">
               Activate Account 
            </a></p>
            {{--  <p>Dear User, Your account is under review. Once the admin verify, you will be able to login.</p>  --}}
            <p>We will get back to you soon. Take care. </p>
            <div class="mailBy">
                Thanks
                <br>
                Hamrakisan.com
            </div>
        </div>
    </div>
</section>

<section class="mailFooter">
    <div class="container">
        <h2>Keep on touch With Us</h2>
        <p class="copyrights">
            Copyright © 2020 hamrakisan.com. All rights reserved.
        </p>
    </div>
</section>
</body>
</html>
