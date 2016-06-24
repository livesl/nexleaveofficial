<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php session_start(); ?>
<html >
    <head>
        <link href="js/boostrap/bootstrap.min.js" />
        <link rel="stylesheet" href="js/libs/bootstrap-modal/bootstrap-modal.css" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>-->
        <link href="js/boostrap/jquery.min.js" >
        <link type="text/javascript" href="ng/angular.min.js" />
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>

        <!--// <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />-->

        <meta charset="UTF-8">
        <title>Nex Leave Application</title>

    </head>
    <body ng-app="myApp">

        <div class="credits text-center">
            <h1>
                Dashboard
            </h1>

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
                                    <li class="active"><a href="#" >Dashboard</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">File
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#apply_leave" id="applyleave">Apply Leave</a></li>
                                            <li><a href="#register" id="clickregister" >Register</a></li>
                                            <li><a href="#my_leaves" id="click_myleaves">My Leaves</a></li>

                                            <!--<li><a href="#">Page 1-3</a></li>--> 
                                        </ul>
                                    </li>
                                    <li><a href="#">Settings</a></li> 
                                    <?php 
                                    if($_SESSION['uName']== "admin"){?>
                                    <li><a href="#view_apply_leave_admin" id="click_view_leaveapply">View for Admin</a></li> 
                                    <?php }?>
                                    <li><a href="index">Sign Out</a></li> 

                                </ul>
                            </div>
                        </nav>


                    </div>

                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>



        <!--/////////////////////////////////////register//////////////////////////////////////////////////////////-->

        <div class="jumbotron" id="register">
            <div class="container ">
                <div class="row">
                    <div class="credits text-center">
                        <h3>
                            Register for New User
                        </h3>

                    </div>
                    <br>
                    <div class="col-sm-12 " >
                        <div  class="col-sm-4 ">

                            <div class="form-group">
                                <label for="username">First name:</label> 
                                <input type="text" class="form-control" placeholder="Enter first name" id="first" name="first" />

                            </div>
                            <div class="form-group">
                                <label for="username">Last name:</label> 
                                <input type="text" class="form-control" placeholder="Enter last name" id="last" name="last" />

                            </div>
                            <div class="form-group">
                                <label for="username">Phone No:</label> 
                                <input type="text" class="form-control" placeholder="Enter phone number" id="tp" name="tp"/>

                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="pass"  />

                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password:</label> 
                                <input type="password" class="form-control" placeholder="Confirm Password" id="passmatch" name="passmatch"  />

                            </div>

                        </div>


                        <div class="col-sm-4 " >



                            <div class="form-group">
                                <label for="nic">NIC/PP:</label> 
                                <input type="text" class="form-control" placeholder="Enter NIC/PP" id="nic" name="nic"  />

                            </div>

                            <div class="form-group">
                                <label for="dob">DOB:</label> 
                                <input type="text" class="form-control" placeholder="Enter DOB(yyyy-mm-dd)" id="dob" name="dob"  />

                            </div>

                            <div class="form-group">
                                <label for="eduqlf">Education Qualification:</label> 
                                <input type="text" class="form-control" placeholder="Enter Edu/Qualification" id="eduqlf" name="eduqlf"  />

                            </div>

                            <div class="form-group">
                                <label for="proqlf">Professional Qualification:</label> 
                                <input type="text" class="form-control" placeholder="Enter Pro/Qualification" id="proqlf" name="proqlf"  />

                            </div>

                            <div class="form-group">
                                <label for="basic_salory">Basic Salory:</label> 
                                <input type="text" class="form-control" placeholder="Enter Basic Salory" id="basic_salory" name="basic_salory"  />

                            </div>




                        </div>

                        <div  class="col-sm-4 ">
                            <div class="form-group">

                                <label for="imageuser">Image:</label> 
                                <input type="file"  id="imageuser" name="imageuser"><br>
                                <input type="submit" value="upload" id="uploadsubmit" name="uploadsubmit" class="btn btn-danger" />


                            </div>



                            <!--/////////////////////////////////////////////////////////////////////////////////-->

                            <button type="submit" class="btn btn-primary" id="btn_register">Register</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>





        <!--//////////////////////////////Apply leave - start/////////////////////////////////////////////////////////////////-->

        <div class="jumbotron" ng-app="myApp"   ng-controller="decontroller" id="applyleave_part">
            <div class="container ">
                <div class="row">
                    <div  class="col-sm-4 "></div>


                    <div class="col-sm-4 " id="applyleave">


                        <div class="form-group">
                            <label for="username">Reason:</label> 
                            <input type="text" class="form-control" placeholder="Enter reason" id="reason" name="reason"/>



                        </div>
                        <div  class="form-group"  >
                            <label for="username">Assign Person:</label> 
                            <select  class="form-control" id="assignperson" name="assignperson" ng-model="AP"  ng-options ="AP.name for AP in people track by AP.name  "  >
                                <option value="" selected="">Select</option>
                                <!--                                <option value="AP.name">--Select--</option>-->



                            </select>



                        </div>

                        <div class="form-group">
                            <label for="username">Date(From):</label> 
                            <input type="text" class="form-control" id="datepickerfrom" name="datepickerfrom" placeholder="Click here" >
                            <div class="checkbox">
                                <label> <input type="checkbox" value=""   id="halftime" name="halftime"/> Half Day Only</label>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="username">Date(To):</label> 
                            <input type="text" class="form-control" id="datepickerto" name="datepickerto" placeholder="Click here">

                        </div>

                        <input id="btn_applyleave" name="btn_applyleave" type="submit" class="btn btn-primary" value="Apply" />



                    </div>

                    <div  class="col-sm-4 "></div>
                </div>
            </div>
        </div>


        <!--///////////////////////////////////////////Apply leave- end////////////////////////////////////////////////////-->
        <!--///////////////////////////////////////////view Apply leave admin- start////////////////////////////////////////////////////-->

        <div class="jumbotron" id="view_apply_leave_admin">
            <div class="container ">
                <div class="row" ng-app="myApp" ng-controller="viewdetails">
                    <!--////////code-->
                    <table class="table table-striped " id="tblview" >



                        <tr>
                            <th>
                                #

                            </th>
                            <th>
                                Name

                            </th>
                            <th>
                                Assign Name

                            </th>

                            <th >
                                Reason

                            </th>
                            <th>
                                Leave Date(From)

                            </th>

                            <th>
                                Leave Date(to)

                            </th>
                            <th>
                                Status

                            </th>
                            <th>
                                Admin Status

                            </th>

                        </tr>
                        <tr ng-repeat=" x in views1" >
<!--                           <td ng-if="$odd" style="background-color:#f1f1f1">-->
                            <td>{{x.id}}</td>
                            <td>{{x.name}}</td>
                            <td>{{x.assign_person_name}}</td>
                            <td>{{x.reason}}</td>
                            <td>{{x.leavedate_from}}</td>
                            <td >{{x.leavedate_to}}</td>

                            <td >{{x.status}}</td>



                            <td><button type="button"  class="btn {{x.status=='Pending'? 'btn-danger':'btn-success'}} " ng-click="changeStatus(x.id)" >Approve</button> </td>






                        </tr>


                    </table>



                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>


        <!--///////////////////////////////////////////view Apply leave admin- end////////////////////////////////////////////////////-->


        <!--///////////////////////////////////////////view Apply leave my- start////////////////////////////////////////////////////-->

        <div class="jumbotron" id="view_apply_leave_my">
            <div class="container ">
                <div class="row" ng-app="myApp" ng-controller="viewdetailsmy">
                    <!--                    ////////code-->
                    <table class="table table-striped " id="tblviewmy" >



                        <tr>
                            <th>
                                #

                            </th>

                            <th>
                                Assign Name

                            </th>

                            <th >
                                Reason

                            </th>
                            <th>
                                Leave Date(From)

                            </th>

                            <th>
                                Leave Date(to)

                            </th>
                            <th>
                                Status

                            </th>


                        </tr>
                        <tr ng-repeat=" x in views2" >
<!--                            <td ng-if="$odd" style="background-color:#f1f1f1">-->
                            <td>{{x.id}}</td>
                            <td>{{x.assign_person_name}}</td>
                            <td>{{x.reason}}</td>
                            <td>{{x.leavedate_from}}</td>
                            <td >{{x.leavedate_to}}</td>


                            <td><button type="button"  class="btn {{x.status=='Pending'? 'btn-danger':'btn-success'}} " ng-click="show_rights_alerts()">Status</button> </td>


                        </tr>


                    </table>



                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>


        <!--///////////////////////////////////////////view Apply leave my- end////////////////////////////////////////////////////-->





        <div class="credits text-center">
            <p>
                <a href="#" target="_top">Leave Management Application</a>
            </p>
            <p>
                <a href="#" target="_top">NexSoft.io</a>
            </p>
        </div>
        <script src="js/boostrap/jquery.min.js" type="text/javascript"></script>
        <script src="js/boostrap/bootstrap.min.js" type="text/javascript"></script>

        <script src="js/boostrap/scripts.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <link rel="stylesheet" href="/resources/demos/style.css">

        <link rel="stylesheet" href="/code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <link rel="stylesheet" href="/resources/demos/style.css">
        <script>

                                        $(document).ready(function () {
                                $("#register").hide();
                                        $("#applyleave_part").hide();
                                        $("#view_apply_leave_admin").hide();
                                        $("#view_apply_leave_my").hide();
                                        clickRegister();
                                        clickApplyleave();
                                        clickViewapplyadmin();
                                        click_myleaves();
                                        upload();
                                });
                                        $(function () {


                                        $("#datepickerfrom").datepicker({dateFormat: 'yy-mm-dd', minDate: 0});
                                                $("#datepickerto").datepicker({dateFormat: 'yy-mm-dd', minDate: 0});
                                        });
                                        function upload() {
                                        $("#uploadsubmit").click(function () {
                                        image_user_upload = $("#imageuser").val();
                                                $.ajax({
                                                type: 'POST',
                                                        url: "php/image_upload_register.php",
                                                        data: {image_user_upload},
                                                        success: function (data) {

                                                        }


                                                });
                                        });
                                        }

                                function clickRegister() {
                                $("#clickregister").click(function () {
                               
                                        $("#applyleave_part").hide();
                                        $("#view_apply_leave_admin").hide();
                                        $("#view_apply_leave_my").hide();
                                        $("#register").slideDown();
                                        
                                });
                                }

                                function clickViewapplyadmin(){
                                $("#click_view_leaveapply").click(function (){
                                        $("#register").hide();
                                        $("#applyleave_part").hide();
                                        $("#view_apply_leave_my").hide();
                                        $("#view_apply_leave_admin").slideDown();
                                        
                                });
                                }

                                function clickApplyleave() {
                                $("#applyleave").click(function () {
                                        $("#applyleave_part").slideDown();
                                        $("#view_apply_leave_my").hide();
                                        $("#register").hide();
                                        $("#view_apply_leave_admin").hide();
                                });
                                }

                                function click_myleaves(){
                                $("#click_myleaves").click(function () {
                                        $("#view_apply_leave_my").slideDown();
                                        $("#register").hide();
                                        $("#view_apply_leave_admin").hide();
                                        $("#applyleave_part").hide();
                                      
                                });
                                }

                                $("#btn_login").click(function () {
                                $.ajax({
                                type: 'POST',
                                        url: "php/session_unset.php",
                                        data: {},
                                        success: function (data) {

                                        window.location = "index.php";
//                                                    $("#mainlogin").slideDown();
//                                                    $("#adminpage").hide();


                                        }

                                });
                                });
                                        /////////////////////////////////////////////////////////////click register-start//////////////////////////////







///////////////////////////////////////////////////////////click register- end//////////////////////////////

//////////////////////////////////////////////////////////register save-start//////////////////////////////

                                        $("#btn_register").click(function () {
                                first = $("#first").val();
                                        last = $("#last").val();
                                        tp = $("#tp").val();
                                        pass = $("#pass").val();
                                        passmatch = $("#passmatch").val();
                                        nic = $("#nic").val();
                                        dob = $("#dob").val();
                                        eduqlf = $("#eduqlf").val();
                                        proqlf = $("#proqlf").val();
                                        salory = $("#basic_salory").val();
                                        image_user = $("#imageuser").val();
                                        $.ajax({
                                        type: 'POST',
//                    url: "php/register.php?action = save_Register",
                                                url: "php/register.php",
                                                data: {first, last, tp, pass, passmatch, nic, dob, eduqlf, proqlf, salory, image_user},
                                                success: function (data) {
                                                if (data == 1) {
                                                alert("Data Saved!");
                                                        window.location = "dashboard.php";
                                                } else {
                                                alert("Unsuccessfully!");
                                                }

                                                }


                                        });
                                });
                                        ///////////////////////////////////////////register save-end//////////////////////////////////////////////////
                                        ///////////////////////////////////////////leave apply save-start//////////////////////////////////////////////////

                                        $("#btn_applyleave").click(function (){

                                reason = $("#reason").val();
                                        assignperson = $("#assignperson").val();
                                        datepickerfrom = $("#datepickerfrom").val();
//                                        halftime = $("#halftime").val();
                                        halftime = $("#halftime").prop('checked');
                                        if (halftime == true){
                                halftime = "1";
//                                        alert("1");
                                } else{
                                halftime = "0";
//                                        alert("0");
                                }
                                datepickerto = $("#datepickerto").val();
                                        $.ajax({
                                        type: 'POST',
                                                url: "php/apply_leave.php",
                                                data: {reason, assignperson, datepickerfrom, halftime, datepickerto},
                                                success: function (data) {
                                                alert(data);
                                                        if (data == 1){
                                                alert("Data Saved!");
                                                        window.location = "dashboard.php";
                                                } else{
                                                alert("Error!");
                                                }
//                                                    alert("Data Saved!");
//                                                        window.location = "dashboard.php";

//                                               
                                                }


                                        });
                                });
                                        ///////////////////////////////////////////leave apply save-end//////////////////////////////////////////////////

                                        ///////////////////////////////////////////////////load names - angular -start///////////////////////////////////////////////////////
                                        var app = angular.module('myApp', []);
                                        app.controller('decontroller', function ($scope, $http) {

                                        $scope.people = [];
                                                $http.get("php/load_user_name.php").success(function (result) {
                                        $scope.people = result;
                                        });
                                        });
                                        
                                        ///////////////////////////////////////load names-end//////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////view details admin- start////////////////////////////
                                        app.controller('viewdetails', function ($scope, $http) {
                                        $scope.loadData = function () {

                                        $http.get("php/view_leaveapply_admin.php").success(function (response) {
                                        $scope.views1 = response;
                                                //alert(response);
                                                console.log(response);
                                        });
                                        };
                                                $scope.loadData();
                                                $scope.show_rights_alerts = function(){
                                                alert("You have no rights for this!");
                                                }
                                        $scope.changeStatus = function (x) {
                                        $.ajax({
                                        type: 'POST',
                                                url: "php/changeStatusApprove.php",
                                                data: {id: x},
                                                success: function (data) {
                                                alert("Approved");
                                                        $scope.loadData();
                                                }



                                        });
                                                $.ajax({
                                                type: 'POST',
                                                        url: "php/sendmail.php",
                                                        data: {},
                                                        success: function (data) {
                                                        //
                                                        }



                                                });
                                        };
                                        });
                                        
                         ////////////////////////////////////////end///////////////////////////////////////////        
                         
                         ///////////////////////////////////////view my leave-start//////////////////////////////////////////////////
                        app.controller('viewdetailsmy', function ($scope, $http) {
                                        $scope.loadData = function () {

                                        $http.get("php/view_leaveapply_my.php").success(function (response) {
                                        $scope.views2 = response;
                                                //alert(response);
                                                console.log(response);
                                        });
                                        };
                                                $scope.loadData();
                                                $scope.show_rights_alerts = function(){
                                                alert("You have no rights for this!");
                                                }
                                       
                                        });
                                        
                         ///////////////////////////////////////view my leave-end//////////////////////////////////////////////////
                                        
////                                                };
//                                        });


        </script>



    </body>
</html>
