
<?php session_start();

if(isset($_SESSION['uName'])){
    
    



?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<html >


    <head>
        <meta charset="UTF-8">

        <title>Nex Leave Application</title>

        <link href="js/boostrap/bootstrap.min.js" />
        <link type="text/javascript" href="ng/angular.min.js" />
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
        <link rel="stylesheet" href="js/libs/bootstrap-modal/bootstrap-modal.css" type="text/css"/>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="jquery-ui/jquery-ui.min.js"></script>

        <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>-->
        <!--<link href="js/boostrap/jquery.min.js" >-->


 <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
        <script src="fileinput/fileinput.js"></script>
        <link type="text/css" href="fileinput/fileinput-style.css" />

        <link type="text/css" href="jquery-ui/jquery-ui.css" />

        <!--// <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />-->



    </head>
    <body ng-app="myApp" >

       


        <!--////////////////////////////////////////////////////////////////////////////////////////////////////////-->
        <div class="jumbotron"  id="adminpage" >
            <div class="container ">
                <div class="row">
              

             </div>
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
                                    <li class="active"><a href="dashboard.php" >Dashboard</a></li>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">File
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="#apply_leave" id="applyleave">Apply Leave</a></li>
                                             <?php if ($_SESSION['uName'] == "admin") { ?>
                                            <li><a href="#register" id="clickregister" >Register</a></li>
                                             <?php } ?>
                                            <li><a href="#my_leaves" id="click_myleaves">My Leaves</a></li>
                                            <!--<li><a href="#paymentsadd" id="click_mypayments">Payments</a></li>-->

                                            <!--<li><a href="#">Page 1-3</a></li>--> 
                                        </ul>
                                    </li>
                                    <!--<li><a href="#">Settings</a></li>--> 
                                    <?php if ($_SESSION['uName'] == "admin") { ?>
                                        <li><a href="#view_apply_leave_admin" id="click_view_leaveapply">View Requests</a></li> 
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Payments
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                        <li><a href="#paymentsadd" id="click_mypayments">Payments</a></li> 
                                        <li><a href="#view_payments_search" id="click_find_payments">Find Payments</a></li> 
                                        </ul>
                                        </li>
                                    <?php } ?>
                                        <li><a href="index.php">Sign Out</a></li> 

                                </ul>
                            </div>
                        </nav>


                    </div>

                <div  class="col-sm-3 ">
                    
                         
                    <div style="text-align: right;">
                 <h4 style="color: blueviolet;">
                DASHBOARD
            </h4>
                </div>
                </div>
            </div>
        </div>



        <!--/////////////////////////////////////register//////////////////////////////////////////////////////////-->

        <div  id="register">
            <div class="container ">
                <div class="row">
                   
                   
                    
                    
                    <!--////////////////////////////////////////////////////////////////////////////////-->
                    
           <div id="view_employees">
            <div class="container ">
                <div class="row" ng-app="myApp" ng-controller="viewdetails" >
                    
                    <div class="col-sm-3" style="text-align: center;"> 
                        <div class="form-group" ng-show="search1" >
                               
                            <input type="text" class="form-control" placeholder="Search" id="search" name="search" ng-model="search"  />

                        </div>
                    </div>
                    <div class="col-sm-6" style="text-align: center;"> 
                         <h3>
                            Employee Details
                        </h3>
                       
                    </div>
                    <div class="col-sm-3" style="text-align: right;"> 
                        <button type="button"  class="btn btn-primary " ng-click="add_new_employee()" ng-show="btn_add" >Add New</button><br><br>
                        <button type="button"  class="btn btn-primary " ng-click="view_employee()" ng-show="btn_view" >View</button><br><br>
                    </div>
                    
                   
                    
                    <!--////////code-->
                    <table class="table table-striped " id="tbl_employee_view" ng-show="gridhide">
                        


                        <tr>
                            <th>
                                #

                            </th>
                            <th>
                                User Name

                            </th>
                            <th>
                                Full Name

                            </th>

                            <th >
                                NIC

                            </th>
                            <th>
                                Bank Name

                            </th>

                            <th>
                                Account No

                            </th>
                            
                             <th> 
                             
                             </th>
                           
                             

                        </tr>
                        <tr ng-repeat=" x in views4 |filter:search" >
<!--                           <td ng-if="$odd" style="background-color:#f1f1f1">-->
                            <td>{{x.id}}</td>
                            <td>{{x.first}}</td>
                            <td>{{x.last}}</td>
                            <td>{{x.nic}}</td>
                            <td>{{x.bank_name}}</td>
                            
                            <td >{{x.account_number}}</td> <td><button type="button"  class="btn btn-primary" ng-click="employee_edit(x.id)" >Edit</button> 
                                <!--<button type="button"  class="btn btn-danger " ng-click="changeStatusReject(x.id)" >Reject</button></td>-->
                           

<!-- <td><button type="button"  class="btn {{x.status=='Pending'? 'btn-danger':'btn-success'}} " ng-click="changeStatus(x.id)" >Approval</button> 
                                <button type="button"  class="btn btn-danger " ng-click="changeStatusReject(x.id)" >Reject</button></td>
                           -->




                        </tr>


                    </table>

                    <div class="col-sm-12" ng-hide="gridhide">
                      
                        <div  class="col-sm-4 " >
                            
                            
                           <div class="form-group hidden ">
                               
                               <input type="text" class="form-control"  id="user_id" name="user_id" ng-model="user_id" />

                            </div>
                            <div class="form-group">
                                <label for="username">User name:</label> 
                                <input type="text" class="form-control" placeholder="Enter User name" id="first" name="first" ng-model="first"  />

                            </div>
                            <div class="form-group">
                                <label for="username">Full name:</label> 
                                <input type="text" class="form-control" placeholder="Enter Full name" id="last" name="last" ng-model="last" />

                            </div>
                            <div class="form-group">
                                <label for="username">Phone No:</label> 
                                <input type="text" class="form-control" placeholder="Enter phone number" id="tp" name="tp" ng-model="tp"/>

                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" placeholder="Enter Password" id="pass" name="pass" ng-model="pass" />

                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password:</label> 
                                <input type="password" class="form-control" placeholder="Confirm Password" id="passmatch" name="passmatch" ng-model="passmatch"  />

                            </div>

                        </div>


                        <div class="col-sm-4 " >



                            <div class="form-group">
                                <label for="nic">NIC/PP:</label> 
                                <input type="text" class="form-control" placeholder="Enter NIC/PP" id="nic" name="nic" ng-model="nic"  />

                            </div>

<!--                            <div class="form-group">
                                <label for="dob">DOB:</label> 
                                <input type="text" class="form-control" placeholder="Enter DOB(yyyy-mm-dd)" id="dob" name="dob" />
                                 <P style="color: red;font-size: small; ">Required!!!</P>
                            </div>-->
                            
                            <div class="form-group">
                            <label for="username">DOB:</label> 
                            <input type="text" class="form-control" id="datepickerfromdob" name="datepickerfromdob" placeholder="Click here(yyyy-mm-dd)" ng-model="datepickerfromdob" >
                           <P style="color: red;font-size: small; ">Required!!!</P>

                        </div>

                            <div class="form-group">
                                <label for="eduqlf">Education Qualification:</label> 
                                <input type="text" class="form-control" placeholder="Enter Edu/Qualification" id="eduqlf" name="eduqlf" ng-model="eduqlf" />

                            </div>

                            <div class="form-group">
                                <label for="proqlf">Professional Qualification:</label> 
                                <input type="text" class="form-control" placeholder="Enter Pro/Qualification" id="proqlf" name="proqlf" ng-model="proqlf" />

                            </div>

                            <div class="form-group">
                                <label for="basic_salory">Basic Salory:</label> 
                                <input type="text" class="form-control" placeholder="Enter Basic Salory" id="basic_salory" name="basic_salory" ng-model="basic_salory" />

                            </div>




                        </div>

                        <div  class="col-sm-4 ">
                            
                        <div  class="form-group"  >
                            <label for="bankname">Bank Name:</label> 
                            <select  class="form-control" id="bankname" name="bankname" ng-model="bankname"  >
                                <option value="" selected="">Select</option>
                                <option value="BOC" selected="">BOC</option>
                                <option value="LB" selected="">LB</option>
                                <!--                                <option value="AP.name">--Select--</option>-->



                            </select>



                        </div>
                            
                             <div class="form-group">
                                <label for="accountno">Account Number:</label> 
                                <input type="text" class="form-control" placeholder="Enter Account No" id="accountno" name="accountno" ng-model="accountno" />

                            </div>
                            
                            
                            <div class="form-group">

                                <label for="imageuser">Image:</label> 
<!--                                <input type="file"  id="imageuser" name="imageuser"><br>
                                <input type="submit" value="upload" id="uploadsubmit" name="uploadsubmit" class="btn btn-danger" />-->

                                <input  data-title="Please Select Product Image " required="" placeholder="200 w x 200 h" type="text" class="form-control " readonly id="filetxt0"  aria-describedby="basic-addon2" ng-model="filename"/>
                                <input type="hidden" name="filename"  />

                                <button type="button" class="btn btn-default" onclick="imageinput('0', 'clr', 200, 200)"  id="clbtn"  >
                                    <span class="glyphicon glyphicon-remove"></span> Clear
                                </button>
                                <div id="sbtn" class="btn btn-default" onclick="imageinput('0', 'brow', 200, 200)"  >
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    Browse
                                </div>

                                <div >  
                                    <img   width="150" alt="no image" style="" id="fileimg0" src="{{filename}}"/>

                                </div>


                                <input type="file" accept="image/png, image/jpeg, image/gif" name="file1" id="file0" style="display: none;" />


                                <label id="filelbl0"  style="color: red;" ></label>

                                 <P style="color: red;font-size: small; ">Required!!!</P>
                            </div>
                             



                            <!--/////////////////////////////////////////////////////////////////////////////////-->

                            <button type="submit" class="btn btn-primary" id="btn_register">Register</button>

                        </div>
                    </div>

                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>

                    
                    <!--////////////////////////////////////////////////////////////////////////////-->
<!--                    <div class="col-sm-4" style="text-align: center;">
                         <div class="form-group ">
                               
                               <input type="text" class="form-control" placeholder="Enter User name" id="find_user_name" name="find_user_name" ng-model="find_user_name" />
                               <br><button type="submit" class="btn btn-primary" id="btn_find_username" ng-click="btn_find_username()">Find</button>

                            </div>
                        
                    </div>-->
           
                </div>
            </div>
        </div>


        <!--//////////////////////////////////////////////////////////////////////////////////////////////////////////-->




        <!--//////////////////////////////Apply leave - start/////////////////////////////////////////////////////////////////-->

        <div class="jumbotron"    ng-controller="decontroller" id="applyleave_part">
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



                            <td><button type="button"  class="btn btn-primary" ng-click="changeStatus(x.id)" >Approval</button> 
                                <button type="button"  class="btn btn-danger " ng-click="changeStatusReject(x.id)" >Reject</button></td>
                           

<!-- <td><button type="button"  class="btn {{x.status=='Pending'? 'btn-danger':'btn-success'}} " ng-click="changeStatus(x.id)" >Approval</button> 
                                <button type="button"  class="btn btn-danger " ng-click="changeStatusReject(x.id)" >Reject</button></td>
                           -->




                        </tr>


                    </table>



                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>


        <!--///////////////////////////////////////////view Apply leave admin- end////////////////////////////////////////////////////-->
        
        <!--//////////////////////////////////////////////////view payments search start//////////////////////////////////////////////////////////////-->
        <div class="jumbotron" id="view_payments_search">
            <div class="container " ng-app="myApp" ng-controller="viewdetails">
                <div class="row"  >
                   
                        <div class="col-sm-3">
                            <div  class="form-group"  >
                            <label for="username">Employee Name:</label> 
                            <select  class="form-control" id="employee_name" name="employee_name" ng-model="form.employee_name"  ng-options ="employee_name.name for employee_name in people track by employee_name.name  "   >
                            <option value="" selected="">Select</option>
                                <!-- <option value="AP.name">--Select--</option>-->
                            </select>
                            </div>
                            
                            
                        </div>
                    <div class="col-sm-3">
                            <div  class="form-group"  >
                            <label for="username">Month:</label> 
                            <select class="form-control" id="month_name" name="month_name" ng-model="form.month_name" >
                            <option value="" selected="">Select</option>
                            <option value="January" >January</option>
                            <option value="February" >February</option>
                            <option value="March" >March</option>
                            <option value="April" >April</option>
                            <option value="May" >May</option>
                            <option value="June" >June</option>
                            <option value="July" >July</option>
                            <option value="August" >August</option>
                            <option value="September" >September</option>
                            <option value="October" >October</option>
                            <option value="November" >November</option>
                            <option value="December" >December</option>
                     
                            </select>
                           
                            </div>
                        
                      
                            
                        </div>
                     <div class="col-sm-3">
                            
                            <div class="form-group">
                            <br>
                            <input id="btn_find_payments" name="btn_find_payments_byMonth" type="submit" class="btn btn-primary" value="Find" ng-click="btn_find_payments_byMonth()" /><br>
                            </div>
                           
                            
                        </div>
<!--                        <div class="col-sm-3">
                            <div class="form-group" >
                            <label for="username">Date(From):</label> 
                            <input type="text" class="form-control" id="datepickerfrompayments" name="datepickerfrompayments" placeholder="Click here" ng-model="form.datepickerfrompayments" >    
                            </div>
                            
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group" >
                            <label for="username">Date(To):</label> 
                            <input type="text" class="form-control" id="datepickertopayments" name="datepickertopayments" placeholder="Click here" ng-model="form.datepickertopayments">
                            </div>
                            
                        </div>
                        <div class="col-sm-3">
                            
                            <div class="form-group">
                            <br>
                            <input id="btn_find_payments" name="btn_find_payments" type="submit" class="btn btn-primary" value="Find" ng-click="loadPaymentsdata()" /><br>
                            </div>
                           
                            
                        </div>-->
                    <!--////////code-->
                  
                </div><br>
                    
                   

                  

                    <div class="row" >
                        <div class="col-sm-4" >
                    
                            <table class="table table-striped " id="tblview" >
                        


                        <tr>
                            <th>
                                #

                            </th>
                            <th>
                                Date

                            </th>
                            <th>
                                Amount

                            </th>

                           
                             

                        </tr>
                        <tr ng-repeat=" x in views5" >
<!--                           <td ng-if="$odd" style="background-color:#f1f1f1">-->
                            <td>{{x.id}}</td>
                            <td>{{x.date}}</td>
                            <td>{{x.amount}}</td>
                            
                        </tr>


                            </table>
                    </div>
                        
                        <div class="col-sm-8">
                            
                            <div class="form-group">
                                <label for="total">Total:<span style="color: red;">  {{payment_total}}</span></label> 
                            <!--<input style="width: 150px;" type="text" class="form-control" placeholder="" id="total" name="total" ng-model="total"/>-->
                            </div>
                          
                        </div>    
                  </div>

<!--                    <div  class="col-sm-1 "></div>

                    <div  class="col-sm-1 "></div>-->
                </div>
            </div>
      

        <!--/////////////////////////////////////////////////////view payments search end///////////////////////////////////////////////////////////-->
        
        
        
        


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
                            <td >{{x.status}}</td>


                            <!--<td><button type="button"  class="btn {{x.status=='Pending'? 'btn-danger':'btn-success'}} " ng-click="show_rights_alerts()">Status</button> </td>-->


                        </tr>


                    </table>



                    <div  class="col-sm-3 "></div>
                </div>
            </div>
        </div>


        <!--///////////////////////////////////////////view Apply leave my- end////////////////////////////////////////////////////-->


        <!--//////////////////////////////////////////////payments/////////////////////////////////-->
        <div class="jumbotron"   id="paymentsadd" ng-controller="paymentscontroller">
            <div class="container ">
                <div class="row">
                    <!--<div  class="col-sm-4 "></div>-->


                    <div class="col-sm-4 " id="addpayments">


                        <div class="form-group">
                            <label for="username">Date:</label> 
                            <input type="text" class="form-control" id="datepickerpayments" ng-model="datepickerpayments" name="datepickerfrom" placeholder="Click here" >

                        </div>



                        <div  class="form-group"  >
                            <label for="username">Name:</label> 
                            <select  class="form-control" id="assignperson1" name="assignperson1" ng-model="names.select_name"  ng-options ="AP1.name for AP1 in set_names_array track by AP1.name  "  >
                                <option value="" selected="">Select</option>
                                <!--<option value="" selected="">Select</option>-->
                               



                            </select>



                        </div>
                        

                        <div class="form-group">
                            <label for="username">Amount:</label> 
                            <input type="text" class="form-control" placeholder="Enter Amount" id="amount" name="amount" ng-model="amount"/>
                            <input type="text" class="form-control hidden" placeholder="payment_id" id="payment_id" name="payment_id" ng-model="payment_id"/>

                        </div>

                        <input id="btn_addpayments" name="btn_addpayments" type="submit" class="btn btn-primary" value="Pay" />
                        <!--<input id="btn_addpayments_update" name="btn_addpayments_update" type="submit" class="btn btn-primary" value="Update" />-->

                    </div>

                    <div  class="col-sm-8 " >
                        <table class="table table-striped " id="tblview" >



                        <tr>
                            <th>
                                #

                            </th>
                            <th>
                                Date

                            </th>
                            <th>
                                Name

                            </th>

                            <th >
                                Amount

                            </th>
                             <th >
                               

                            </th>
                            

                        </tr>
                        <tr ng-repeat=" x in views3" >
<!--                           <td ng-if="$odd" style="background-color:#f1f1f1">-->
                            <td>{{x.id}}</td>
                            <td>{{x.date}}</td>
                            <td>{{x.person_name}}</td>
                            <td>{{x.amount}}</td>
                            



                            <td><button type="button"  class="btn {{'btn-danger'}} " ng-click="updatepayments(views3.indexOf(x),x.id)">Edit</button> </td>






                        </tr>


                    </table>

                        
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <!--/////////////////////////////////////////////////payments////////////////////////////-->




        <?php include './php/footer.php'; ?>
         <!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>-->
        <script src="js/boostrap/jquery.min.js" type="text/javascript"></script>
        <!--<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>-->
        
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
                                        $("#paymentsadd").hide();
                                        $("#btn_addpayments_update").hide();
                                        $("#view_payments_search").hide();
                                       
                                        $("#datepickerpayments").datepicker({dateFormat: 'yy-mm-dd',changeYear: true});
                                        $('#datepickerpayments').datepicker('setDate', 'today');
                                        
                                        
                                        
                                        
                                        clickRegister();
                                        clickApplyleave();
                                        clickViewapplyadmin();
                                        click_myleaves();
                                        upload();
                                        click_mypayments();
                                        click_find_payments();
                                        
                                        
                                });
                                
                                var griddata= [];
                                
                                         $(function () {
                                            $("#datepickerfrompayments").datepicker({dateFormat: 'yy-mm-dd',changeYear: true});
                                           
                                             
                                            $("#datepickertopayments").datepicker({dateFormat: 'yy-mm-dd',changeYear: true});
                                        });
                                        $(function () {
                                            $("#datepickerfrom").datepicker({dateFormat: 'yy-mm-dd', minDate: 0,changeYear: true});
                                            $("#datepickerto").datepicker({dateFormat: 'yy-mm-dd', minDate: 0,changeYear: true});
                                        });
                                        
                                        
                                         $(function () {
                                            $("#datepickerpayments").datepicker({dateFormat: 'yy-mm-dd',changeYear: true});  
                                        });
                                        
                                        $(function (){
                                            
                                            $("#datepickerfromdob").datepicker({dateFormat: 'yy-mm-dd',changeYear: true});
                                        })
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
                                        $("#paymentsadd").hide();
                                        $("#view_payments_search").hide();
                                });
                                }

                                function click_mypayments(){
                                $("#click_mypayments").click(function (){
                                $("#view_apply_leave_admin").hide();
                                 $("#applyleave_part").hide();
                                $("#view_apply_leave_my").hide();
                                $("#register").hide();
                                $("#paymentsadd").slideDown();
                                $("#view_payments_search").hide();
                                });
                                }
                                
                                function click_find_payments(){
                                $("#click_find_payments").click(function (){
                                $("#view_apply_leave_admin").hide();
                                $("#applyleave_part").hide();
                                $("#view_apply_leave_my").hide();
                                $("#register").hide();
                                $("#paymentsadd").hide();
                                $("#view_payments_search").slideDown();
                                });
                                    
                                    
                                }

                                function clickViewapplyadmin(){
                                $("#click_view_leaveapply").click(function (){
                                $("#register").hide();
                                        $("#applyleave_part").hide();
                                        $("#view_apply_leave_my").hide();
                                        $("#paymentsadd").hide();
                                        $("#view_apply_leave_admin").slideDown();
                                        $("#view_payments_search").hide();
                                });
                                }

                                function clickApplyleave() {
                                $("#applyleave").click(function () {
                                $("#applyleave_part").slideDown();
                                        $("#paymentsadd").hide();
                                        $("#view_apply_leave_my").hide();
                                        $("#register").hide();
                                        $("#view_apply_leave_admin").hide();
                                        $("#view_payments_search").hide();
                                });
                                }

                                function click_myleaves(){
                                $("#click_myleaves").click(function () {
                                $("#view_apply_leave_my").slideDown();
                                        $("#paymentsadd").hide();
                                        $("#register").hide();
                                        $("#view_apply_leave_admin").hide();
                                        $("#applyleave_part").hide();
                                        $("#view_payments_search").hide();
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
                                
                                /////////////////////////////////////find user payments////////////////////
//                                $("#btn_find_payments").click(function (){
////                                    alert("find");
//                                    
//                                    
//                                });
                                /////////////////////////////////////find user payments////////////////////
                                
                                
                                
                                
                                
                                
                                
                                /////////////////////////////////////////save payments///////////////////////////
                                
                                $("#btn_addpayments").click(function (){
                                    payment_id="";
                                    date = $("#datepickerpayments").val();
                                    payname = $("#assignperson1").val();
                                    amount = $("#amount").val();
                                    payment_id = $("#payment_id").val();
                                    alert(payment_id);
                                    
                                  if(payment_id==""){
                                      $.ajax({
                                        type: 'POST',
                                        url: "php/payments.php",
                                        data: {date,payname,amount},
                                        success: function (data) {
                                            console.log(data);
                                             if (data == 1){
                                                alert("Data Saved!");
                                                        window.location = "dashboard.php";
                                                } else{
                                                alert("Error!");
                                                }
                        
                                        }
                                        
                                        
                                    });
                                      
                                      
                                  }else{
                                       $.ajax({
                                        type: 'POST',
                                        url: "php/paymentsupdate.php",
                                        data: {payment_id,date,payname,amount},
                                        success: function (data) {
                                            console.log(data);
                                             if (data == 1){
                                                alert("Data Updated!");
                                                        window.location = "dashboard.php";
                                                } else{
                                                alert("Error!");
                                                }
                        
                                        }
                                        
                                        
                                    });
                                      
                                      
                                  }
                                    
                                    
                                    
                                });
                               
                                /////////////////////////////////////////save payments///////////////////////////
                                ///////////////////////////update payments/////////////////////////
//                                $("#btn_addpayments_update").click(function (){
//                                    
//                                    
//                                    
//                                    
//                                });
                                
                                
                                
                                
                                ///////////////////////////update payments/////////////////////////
                                
                                
                                
                                
                                
                                        /////////////////////////////////////////////////////////////click register-start//////////////////////////////







///////////////////////////////////////////////////////////click register- end//////////////////////////////

//////////////////////////////////////////////////////////register save-start//////////////////////////////

                                        $("#btn_register").click(function () {
                                            
                                           
                                        user_id=$("#user_id").val();        
                                        first = $("#first").val();
                                        last = $("#last").val();
                                        tp = $("#tp").val();
                                        pass = $("#pass").val();
                                        passmatch = $("#passmatch").val();
                                        nic = $("#nic").val();
                                        datepickerfromdob = $("#datepickerfromdob").val();
                                        eduqlf = $("#eduqlf").val();
                                        proqlf = $("#proqlf").val();
                                        salory = $("#basic_salory").val();
                                        bankname=$("#bankname").val();
                                        accountno=$("#accountno").val();
                                        var file_data = $("#file0").prop("files")[0]; // Getting the properties of file from file field
                                        var form_data = new FormData(); // Creating object of FormData class
                                        form_data.append("file", file_data)              // Appending parameter named file with properties of file_field to form_data
                                        form_data.append("user_id",user_id)
                                        form_data.append("first", first)                 // Adding extra parameters to form_data
                                        form_data.append("last", last)
                                        form_data.append("tp", tp)
                                        form_data.append("pass", pass)
                                        form_data.append("passmatch", passmatch)
                                        form_data.append("nic", nic)
                                        form_data.append("datepickerfromdob", datepickerfromdob)
                                        form_data.append("eduqlf", eduqlf)
                                        form_data.append("proqlf", proqlf)
                                        form_data.append("salory", salory)
                                        form_data.append("bankname", bankname)
                                        form_data.append("accountno", accountno)
                                        // Adding extra parameters to form_data
                                        usid=$("#user_id").val();
                                         if(usid == ""){
                                                $.ajax({


                                        url: "php/register.php",
                                                //dataType: 'script',
                                                cache: false,
                                                contentType: false,
                                                processData: false,
                                                data: form_data, // Setting the data attribute of ajax with file_data
                                                type: 'post',
                                                success: function (data) {
                                                console.log(data);
                                                        alert("Data Saved");
                                                      window.location = "dashboard.php";

                                                       

                                                }



                                        });
                                                
                                            }else{
                                               $.ajax({


                                       
                                                //dataType: 'script',
                                                type: 'post',
                                                url: "php/register_update.php",
                                                data: {user_id,first,last,tp,pass,passmatch,nic,datepickerfromdob,eduqlf,proqlf,salory,bankname,accountno}, // Setting the data attribute of ajax with file_data
                                                
                                                success: function (data) {
                                                console.log(data);
                                               if (data == 1){
                                                alert("Data Updated!!");
                                                        window.location = "dashboard.php";
                                                } else{
                                                alert("Error!");
                                                }

                                                       

                                                }



                                        });
                                                
                                            }
                                        
                                        
//                                        $.ajax({
//                                        type: 'POST',
////                    url: "php/register.php?action = save_Register",
//                                                url: "php/register.php",
//                                                data: {first, last, tp, pass, passmatch, nic, dob, eduqlf, proqlf, salory, image_user},
//                                                success: function (data) {
//                                                if (data == 1) {
//                                                alert("Data Saved!");
//                                                        window.location = "dashboard.php";
//                                                } else {
//                                                alert("Unsuccessfully!");
//                                                }
//
//                                                }
//
//
//                                        });



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
                                        
                                        ////////////////load user name for payments////////////////////
                                        
//                                       var app = angular.module('myApp', []);
                                        app.controller('paymentscontroller', function ($scope, $http) {

                                       // $scope.people1 = [];
                                       ////////////////initialize the array//////////// 
                                         $scope.names = {
                                                  set_names_array: [],
                                                  select_name: {} 
                                        };
                                         ////////////////initialize the array//////////// 
                                         
                                          ////////////////dropdown filling//////////// 
                                        $http.get("php/load_user_name.php").success(function (result) {
                                        //$scope.people1 = result;
                                        $scope.set_names_array = result;
                                       
                                        });
                                        ////////////////dropdown filling//////////// 
                                         
                                        
                                        $scope.updatepayments = function (x,id){
                                                    
                                                   alert("index"+x);
                                                   $("#btn_addpayments_update").show();
                                                   console.log(griddata);
                                                   $scope.amount=griddata[x]["amount"];
                                                   $scope.datepickerpayments=griddata[x]["date"];
                                                   $scope.payment_id=id;
                                                   
                                                   
                                                 
                        $scope.names.select_name = {
                             'id': griddata[x]['user_id'],
                             'name': griddata[x]['person_name']
                                };
                                                   
                                                   
//                                                   $scope.amount=100;
//                                           $scope.Users_role = {
//                                              'user_role_id': load_data[array_index]['user_role_id'],
//                                              'role_name': Users_role
//                                           };
                                                    
                                           };
                                           
                                           
                                        $scope.loadData = function () {

                                        $http.get("php/view_payments.php").success(function (response) {
                                        $scope.views3 = response;
                                                //alert(response);
                                                console.log(response);
                                                
                                                 griddata = response;
                                        });
//                                        
                                        };
                                        
                                        $scope.loadData();
                                           
                                         
                                           
                                           
                                           
                                          
                                        
                                        });
                                        
                                        
                                        ////////////////load user name for payments////////////////////
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
/////////////////////////////////////////////////////////////view details admin- start////////////////////////////
                                        app.controller('viewdetails', function ($scope, $http) {
                                            
                                        $scope.loadData_employee = function () {

                                        $http.get("php/find_details_from_username.php").success(function (response) {
                                        $scope.views4 = response;
                                                //alert(response);
                                                console.log(response);
                                                
                                                 
                                        });
//                                        
                                        };
                                        $scope.loadData_employee();
                                        $scope.gridhide=true;
                                        $scope.btn_view=false;
                                        $scope.btn_add=true;
                                        $scope.search1=true;
                                       
                                        
                                        $scope.add_new_employee=function (){
//                                            
                                            $scope.gridhide=false;
                                            $scope.btn_view=true;
                                            $scope.btn_add=false;
                                            $scope.search1=false;
                                           
                                                             $scope.user_id="";
                                                             $scope.first="";
                                                             $scope.last="";
                                                             $scope.tp="";
                                                             $scope.pass="";
                                                             $scope.passmatch="";
                                                             $scope.basic_salory="";
                                                             $scope.eduqlf="";
                                                             $scope.proqlf="";
                                                             $scope.filename="";
                                                             $scope.nic="";
                                                             $scope.datepickerfromdob="";
                                                             $scope.bankname="";
                                                             $scope.accountno="";
                                           
                                            
                                        };
                                        $scope.view_employee=function (){
//                                           
                                            $scope.gridhide=true;
                                            $scope.btn_view=false;
                                            $scope.btn_add=true;
                                            $scope.search1=true;
                                           
                                           
                                        };
                                        
                                        $scope.employee_edit=function (id){
                                           
                                            $scope.gridhide=false;
                                            $scope.btn_view=true;
                                            $scope.btn_add=false;
                                           $scope.search1=false;
                                             
                                            
                                            
                                           $.ajax({
                                                type: 'POST',
                                                        url: "php/find_details_from_username_1.php",
                                                        dataType: 'json',
                                                        data: {user_id:id},
                                                        success: function (data) {
                                                        console.log(data);
                                                        $scope.$apply(function () {
                                                             $scope.user_id=data[0]["id"];
                                                             $scope.first=data[0]["first"];
                                                             $scope.last=data[0]["last"];
                                                             $scope.tp=data[0]["tp"];
                                                             $scope.pass=data[0]["pass"];
                                                             $scope.passmatch=data[0]["confirmpass"];
                                                             $scope.basic_salory=data[0]["basic_salory"];
                                                             $scope.eduqlf=data[0]["education_qualifications"];
                                                             $scope.proqlf=data[0]["professional_qualifications"];
                                                             $scope.filename=data[0]["imageurl"];
                                                             $scope.nic=data[0]["nic"];
                                                             $scope.datepickerfromdob=data[0]["dob"];
                                                             $scope.bankname=data[0]["bank_name"];
                                                             $scope.accountno=data[0]["account_number"];

                                                        });
                                                       
                                                        
                                                        
                                                        }


                                                });

//                                                $http.get("php/find_details_from_username_1.php",{params:{"user_id":id}}).success(function (response) {
//                                        $scope.views5 = response;
//                                                //alert(response);
//                                                console.log(response);
//                                                
//                                                 
//                                        });
                                       
                                        
                                         };
                                         
                                          $scope.people = [];
                                                $http.get("php/load_user_name.php").success(function (result) {
                                        $scope.people = result;
                                        });
                                         
                                         
                                         ///////////////////////////////////////////////////////
//                                          $scope.form={employee_name:'',datepickerfrompayments:'',datepickertopayments:''};
//                                           $scope.loadPaymentsdata = function () {
//                                               
//                                           
//                                           $http({
//                                               method:'POST',
//                                               url:'php/view_payments_search.php',
//                                               data:{'employee_name':$("#employee_name").val(),'date_from_pay':$("#datepickerfrompayments").val(),'date_to_pay':$("#datepickertopayments").val()},
////                                               data:{'employee_name':"ranjan",'date_from_pay':"2016-09-01",'date_to_pay':"2016-09-30"},
//                                               headers: {'Content-Type': 'application/x-www-form-urlencoded:charset=utf-8;'}
//                                             
//                                             
//                                             /////////////no need///////////////  
////                                           }).then(function successCallback(response){
////                                           $scope.views5 = response['data_set'];
////                                           $scope.payment_total=response['total'];
////                                           console.log(response);
////                                               
////                                           }
////                                           ,function errorCallback(response) {
////                                               alert(response);
////                                               
////                                            });
//                                              ///////////////////////no need///////////////
//                                              
//                                                }).success(function (response){
//                                           $scope.views5 = response['data_set'];
//                                           $scope.payment_total=response['total'];
//                                           console.log(response);
//                                               
//                                           });
//                                          
//                                         
//                                         };
//                                          
////                                        $scope.loadPaymentsdata();
                                        ////////////////////////////////////
                                         $scope.form={employee_name:'', month_name:''};
//                                         $scope.form1={employee_name:$("#employee_name").val(), month_name:$("#month_name").val()};
                                         //$scope.form={'employee_name':$scope.form.employee_name.name,'month_name':$scope.form.month_name};
                                         
                                       $scope.btn_find_payments_byMonth= function (){
                                           
                                           $http({
                                               method:'POST',
                                               url:'php/view_payments_search_by_month.php',
//                                               data:$scope.form1,
                                               data:{'employee_name':$("#employee_name").val(),'month_name':$("#month_name").val()},
                                               headers: {'Content-Type': 'application/x-www-form-urlencoded:charset=utf-8;'}
                                             
                                                }).success(function (response){ 
                                                    $scope.views5 = response['data_set'];
                                                    $scope.payment_total=response['total'];        
                                           });
                                           
                                       };
                                        
//                                         $scope.btn_find_payments_byMonth();
                                        
                                        
                                        ///////////////////////////////////////////////////////////
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
//                                        $scope.btn_find_username=function (){
//                                            alert("asd");
//                                            
//                                            
//                                        };
                                        
                                        
                                        ////////////////////reject/////////////////////////////////
                                        $scope.changeStatusReject = function (x) {
                                        $.ajax({
                                        type: 'POST',
                                                url: "php/changeStatusReject.php",
                                                data: {id: x},
                                                success: function (data) {
                                                alert("Rejected!");
                                                        $scope.loadData();
                                                }



                                        });
//                                                $.ajax({
//                                                type: 'POST',
//                                                        url: "php/sendmail.php",
//                                                        data: {},
//                                                        success: function (data) {
//                                                        //
//                                                        }
//
//
//
//                                                });
                                        };
                                      
                                        ////////////////////reject/////////////////////////////////
                                        
                                        
                                        
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

                                        
//                                        app.controller('viewpayments', function ($scope, $http) {
////                                        $scope.loadData = function () {
////
////                                        $http.get("php/view_payments.php").success(function (response) {
////                                        $scope.views3 = response;
////                                                //alert(response);
////                                                console.log(response);
////                                                 griddata = response;
////                                        });
////                                        };
////                                                $scope.loadData();
//                                                
////                                                $scope.show_rights_alerts = function(){
////                                                alert("You have no rights for this!");
////                                                }
//                                              
//
//                                        });

     
        
    </script>



    </body>
</html>
<?php
}else{
    header("location:index.php");  
    
}
?>