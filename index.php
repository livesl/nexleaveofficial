<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
<html>
    <head>
        <link href="js/boostrap/bootstrap.min.js" />
        <link rel="stylesheet" href="js/libs/bootstrap-modal/bootstrap-modal.css" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>-->
        <link href="js/boostrap/jquery.min.js" >
        <link type="text/javascript" href="ng/angular.min.js" />
        <script src="fileinput/fileinput.js"></script>
        <link type="text/css" href="fileinput/fileinput-style.css" />

        <!--// <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />-->

        <meta charset="UTF-8">
        <title>Leave Application System</title>

    </head>
    <body>

        <div class="credits text-center">
            <h1>
                Login
            </h1>

        </div>

        <div class="jumbotron" id="mainlogin">
            <div class="container ">
                <div class="row">
                    <div  class="col-sm-4 ">


                    </div>


                    <div class="col-sm-4 " >

                        <!--                <form role="form" action="welcome/admin" >-->


                        <div class="form-group">
                            <label for="username">User Name:</label> 
                            <input type="text" class="form-control" placeholder="Enter User Name" id="first" name="first" autofocus />

                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label> 
                            <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="pass" />

                        </div>
                        <button type="submit" class="btn btn-primary" id="login">Login</button>



                        <!--                </form>-->



                        <br><br><br>
                     <!--<img src="assest/img/logo.png" class="img-responsive" alt="Cinque Terre" width="304" height="236">--> 



                    </div>

                    <div  class="col-sm-4 "></div>
                </div>
            </div>
        </div> 
        <!--////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="jumbotron"  id="adminpage" >
            <div class="container ">
                <div class="row">
                    <div  class="col-sm-3 ">
                        <label for="username"> 
                            <?php
                            echo 'Welcome ' . $_SESSION['uName'];
                            ?> 
                        </label><br>

                        <input id="btn_login" name="btn_login" type="submit" class="btn btn-primary" value="Logout" />


                    </div>


                    <div class="col-sm-6 " >
                        <nav class="navbar navbar-inverse">
                            <div class="container-fluid">
                                <!--                        <div class="navbar-header">
                                                            <a class="navbar-brand" href="#">WebSiteName</a>
                                                        </div>-->
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="#" ng-click="mydetails()">Dashboard</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">File
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#">Apply Leave</a></li>
                                            <li><a href="#">Register</a></li>
                                            <li><a href="#">My Leaves</a></li>

                                            <!--<li><a href="#">Page 1-3</a></li>--> 
                                        </ul>
                                    </li>
                                    <li><a href="#">Settings</a></li> 

                                    <li><a href="#">Reports</a></li> 

                                    <li><a href="index">Sign Out</a></li> 

                                </ul>
                            </div>
                        </nav>


                    </div>

                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>


      <?php include './php/footer.php';?>
        <script src="js/boostrap/jquery.min.js" type="text/javascript"></script>
        <script src="js/boostrap/bootstrap.min.js" type="text/javascript"></script>

        <script src="js/boostrap/scripts.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>

                                        $(document).ready(function () {
                                            $("#adminpage").hide();
                                        });
                                        $("#btn_login").click(function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: "php/session_unset.php",
                                                data: {},
                                                success: function (data) {
                                                    $("#mainlogin").slideDown();
                                                    $("#adminpage").hide();
                                                    

                                                }

                                            });
                                        });
                                        $("#login").click(function () {
                                            username = $("#first").val();
                                            password = $("#pass").val();
                                            $.ajax({
                                                type: "POST",
                                                url: "php/user_login.php",
                                                data: {username, password},
                                                success: function (data) {
                                                    // alert(data);

                                                    if (data == 1) {
                                                      window.location = "dashboard.php";

//                                                        $("#mainlogin").hide();
//                                                        $("#adminpage").slideDown();
                                                       
                                                    } else {

                                                        alert("Invalid Username or Password!");
                                                        $("#first").val('');
                                                        $("#pass").val('');
                                                        $('input[name=first]').focus();
                                                    }

                                                }


                                            });
                                        });






        </script>



    </body>
</html>
