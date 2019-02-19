<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Open API'S</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400i|Roboto" rel="stylesheet"> 

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <style type="text/css">

            body {
                /*font-family: 'Roboto', sans-serif;*/
                /*color: #000;*/
                background: #363B41;
        /*        background: url(http://cdn1.zoedev.com/wp-content/uploads/2016/06/pace-oregon-state-php-mysql-programming-code-web-design.jpg);
                background-size: cover;
                background-position: center center;*/
                /*height: 100vh;*/
                /*z-index: -100;*/
        /*        -webkit-filter: blur(5px);
                -moz-filter: blur(5px);
                -o-filter: blur(5px);
                filter: blur(5px);*/

                background-image: url('http://ontheside.co/wp-content/uploads/2018/04/idea-design-popular-home-ideas.jpg');
                background-position: center 500px;
                background-repeat: no-repeat;
            }
            .form-control {
                min-height: 41px;
                background: #fff;
                box-shadow: none !important;
                border-color: #e3e3e3;

                position: relative;
                top: 0;
            }

            .form-control:focus {
                border-color: #70c5c0;
            }

            .form-control, .btn {        
                border-radius: 2px;
            }

            .login-form {
                width: 350px;
                margin: 0 auto;
                padding: 75px 0 30px;		
            }

            .login-form form {
                color: #7a7a7a;
                border-radius: 2px;
                margin-bottom: 15px;
                font-size: 13px;
                background: #ececec;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 40px 30px 30px 30px;	
                position: relative;	
            }
                .login-form h2 {
                        font-size: 22px;
                margin: 35px 0 25px;
            }
                .login-form .avatar {
                        position: absolute;
                        margin: 0 auto;
                        left: 0;
                        right: 0;
                        top: -50px;
                        width: 95px;
                        height: 95px;
                        border-radius: 50%;
                        z-index: 9;
                        /*background: #70c5c0;*/
                        padding: 0px;
                        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
                }
                .login-form .avatar img {
                        width: 100%;
                }	
            .login-form input[type="checkbox"] {
                margin-top: 2px;
            }
            .login-form .btn {        
                font-size: 16px;
                font-weight: bold;
                        background: #70c5c0;
                        border: none;
                        margin-bottom: 20px;
            }
                .login-form .btn:hover, .login-form .btn:focus {
                        background: #50b8b3;
                outline: none !important;
                }    
                .login-form a {
                        color: #fff;
                        text-decoration: underline;
                }
                .login-form a:hover {
                        text-decoration: none;
                }
                .login-form form a {
                        color: #7a7a7a;
                        text-decoration: none;
                }
                .login-form form a:hover {
                        text-decoration: underline;
                }


            .title {
                /*font-family: 'Indie Flower', cursive;*/
                font-family: 'Roboto', sans-serif;
                font-weight: 800;
                color: transparent;
                font-size: 100px;
                background: #f5f6f7;
                background-position: 40% 50%;
                -webkit-background-clip: text;
                position: relative;
                text-align: center;
                line-height: 120px;
                letter-spacing: -8px;
                /*border:10px solid #fff;*/
            }

            .subtitle {
                font-family: 'Open Sans', sans-serif;
                /*letter-spacing: 3px;*/
                display: block;
                text-align: center;
                /*text-transform: uppercase;*/
                padding-top: 10px;
                color: #f4f5f6;
            }


        </style>
    </head>
    <body>
        <div class="background-image"></div>
        <div class="container" style="padding-top: 20px;" >
            <div class="title">Open Apis</div>
            <div class="subtitle">
                <h3>Diseñado para interactuar con otros sistemas de manera transparente, eficiente y robusta.</h3>
            </div>
        </div>



        <div class="login-form">

            <form action="<?php site_url('home'); ?>" method="post">


                <div class="avatar">
                    <img src="<?php echo base_url('assets\imagenes\webservice.png'); ?>" alt="Webservices">
                </div>
                <h1 class="text-center"></h1> 
                <div class="form-group">
                        <input type="text" class="form-control" name="username" placeholder="Usuario" required="required">
                </div>
                        <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required="required">
                </div>        
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-lg btn-block">Entrar</button>
                </div>

            </form>
        </div>
    </body>
</html>                            