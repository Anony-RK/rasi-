<?php
$status =0;
if(isset($_POST['submit']) && $_POST['submit'] != '')
{
 
   if(isset($_POST['id']) && $_POST['id'] >0 && is_numeric($_POST['id'])) {   
   $id = $_POST['id'];   
        $updateemployeemaster = $userObj-> updateemployeemaster($mysqli ,$id);

       ?>
   <script>location.href='<?php echo $HOSTPATH;  ?>employeemaster&msc=1';</script>
       <?php
   } else{
      ?>
    <script>location.href='<?php echo $HOSTPATH;  ?>employeemaster&msc=2';</script>
        <?php
       $addemployeemaster = $userObj-> addemployeemaster($mysqli);
 
 }
}

if(isset($_GET['upd']))
{
$idupd=$_GET['upd'];
}
$status =0;
if($idupd>0)
{
  $getemployeemaster = $userObj->getemployeemaster($mysqli,$idupd); 
  
  if (sizeof($getemployeemaster)>0) {
        for($irollback=0;$irollback<sizeof($getemployeemaster);$irollback++){ 
      $id                        = $getemployeemaster['id'];
      $standard                  = $getemployeemaster['standard'];
      $section                   = $getemployeemaster['section'];
    

      
      $studentname               = $getemployeemaster['studentname'];
      $rollnumber                = $getemployeemaster['rollnumber'];
      $checks                    = $getemployeemaster['checks'];
      $finalresult               = $getemployeemaster['finalresult'];
      $status                    = $getemployeemaster['status'];
        }
      }
    }

$del=0;
if(isset($_GET['del']))
{
$del=$_GET['del'];
}
if($del>0)
{
  $deleteemployeemaster = $userObj->deleteemployeemaster($mysqli,$del); 
  //die;
  ?>
  <script>location.href='<?php echo $HOSTPATH;  ?>employeemaster&msc=3';</script>
<?php 
}

?>

<!-- Page header start -->
<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">Employee Master</li>
					</ol>

					<ul class="app-actions">
						<li>
							<a href="#" id="reportrange">
								<span class="range-text"></span>
								<i class="icon-chevron-down"></i>	
							</a>
						</li>
						<li>
							<a href="#">
								<i class="icon-export"></i> Export
							</a>
						</li>
					</ul>
				</div>
				<!-- Page header end -->

				<!-- Main container start -->
				<div class="main-container">


					<!--------form start-->
					<form id = "employee" name="employee" action="" method="post"> 
 		<!-- Row start -->
         <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
					<div class="card-header">
						<div class="card-title">General Info</div>
					</div>
                    <div class="card-body">
                        
                        <div class="row gutters">
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label >Employee Code <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="employeecode" name="employeecode" >
									<label id="employeecode_valid" class="text-danger">Enter Employee Code</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Employee Name<span class="required">*</span></label>
                                    <input type="text" id="employeename" name="employeename" class="form-control"  >
									<label id="employeename_valid" class="text-danger">Enter Employee Name</label>
                                </div>
                            </div>
			
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="inputEmail">Date Of birth <span class="required">*</span></label>
                                    <input type="date" class="form-control" id="dateofbirth" name="dateofbirth" >
									<label id="dateofbirth_valid" class="text-danger">Select Date Of Birth</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Gender <span class="required">*</span></label>
                                    <select class="form-control " id="gender" name="gender">
                                        
                                        <option value=""> Select Gender</option>
                                        <option value="Male"> Male</option>
                                        <option value="Female"> FeMale</option>
                                    </select>
									<label id="gender_valid" class="text-danger">Select Gender</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="inputReadOnly">E-Mail Id <span class="required">*</span></label>
                                    <input class="form-control" id="emailid" name="emailid" type="text" >
									<label id="emailid_valid" class="text-danger">Enter Email Id</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Designation <span class="required">*</span></label>
                                    <div class="d-flex">
										<select class="form-control w-75" id="designation" name="designation">
											<option value=""> Select Designation</option>
                                            <option value="Manager">Manager </option>
                                            <option value="Supervisor">Supervisor</option>
                                            <option value="Sales Executive"> Sales Executive</option>
										</select>
									<button style="width: 35px;height: 35px;margin-left: 20px;font-size: 20px; border: none;outline: none;color:#fff;background: #af772a;"type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button></div>
									<label id="designation_valid" class="text-danger">Enter Designation</label>
                                </div>
                            </div>
							<style>
								modal-ku {
									width: 750px;
									margin: auto;
									}
							</style>
 									<!-- Modal -->
									<div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Designation</h5>
											<!-- <button type="button" class="btn-close" ></button> -->
											<button type="button" class="btn-close" aria-label="Close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<div class="align-items-center">
													<label for="">Designation</label>
													<input type="text" id="adddesignation" name="adddesignation" class="form-control" >
													<label for="">Designation List</label>
													<div class="d-flex justify-content-between">
														<div class="d-flex justify-content-around">
															<button style=" border: none;outline: none;color:#fff;background: #af772a;"type="button" class="ml-1">Copy</button>
															<button style=" border: none;outline: none;color:#fff;background: #af772a;"type="button" class="ml-1">Excel</button>
															<button style=" border: none;outline: none;color:#fff;background: #af772a;"type="button" class="ml-1">Print</button>
															<button style=" border: none;outline: none;color:#fff;background: #af772a;"type="button" class="ml-1">PDF</button>
															<button style=" border: none;outline: none;color:#fff;background: #af772a;"type="button" class="ml-1">Column Visibility</button>

														</div>
														<div class="d-flex align-items-center">
															<label for="">Search:</label> 
															<input type="text" id="searchitems" name="searchitems" class="form-control" >

														</div>
													
													</div>
													<!---Table-->

													<table class="table table-bordered mt-4">
														<thead>
														  <tr>
															<th scope="col">Name</th>
															<th scope="col">Actions</th>
															
														  </tr>
														</thead>
														<tbody>
														  <tr>
															<th scope="row">first Name</th>
															<td><i class="fa fa-pencil-square" aria-hidden="true" style="font-size: 20px; border: none;outline: none;color: #af772a;"></i>
																<i class="fa fa-trash" aria-hidden="true" style="font-size: 20px; border: none;outline: none;color: #af772a;"></i></td>
															
														  </tr>
														  <tr>
															<th scope="row">Second Name</th>
															<td>
																<i class="fa fa-pencil-square" aria-hidden="true"  style="font-size: 20px; border: none;outline: none;color: #af772a;"></i>
																<i class="fa fa-trash" aria-hidden="true"  style=" font-size: 20px; border: none;outline: none;color: #af772a;"></i>
															</td>
															
														  </tr>
														
														</tbody>
													  </table>

													  <div class="d-flex justify-content-between">
														  <p>Showing 1 to 7 of 7 entries</p>
														  <div class="d-flex justify-content-around ">
															  <a href="#" class="ml-1">First</a>
															  <a href="#" class="ml-1">Previous</a>
															  <button style=" border: none;outline: none;color:#fff;background: #af772a;" type="button" class="ml-1">2</button>
															  <a href="#" class="ml-1">Next</a>
															  <a href="#" class="ml-1">Last</a>
															  
														  </div>
													  </div>
												</div>


											</div>
											
										</div>
										</div>
									</div>
                           
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Employee Number <span class="required">*</span></label>
                                    <input type="text" id="employeenumber" name="employeenumber" class="form-control"  >
									<label id="employeenumber_valid" class="text-danger">Enter Employee Number</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Date Of Joining <span class="required">*</span></label>
                                    <input type="date" id="dateofjoining" name="dateofjoining" class="form-control" >
									<label id="dateofjoining_valid" class="text-danger">Select Data Of Joining</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Contact <span class="required">*</span></label>
                                    <input type="text" id="contact" name="contact" class="form-control"  >
									<label id="contact_valid" class="text-danger">Enter Contact Number</label>
                                </div>
                            </div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group" > 
                                     <img width="150" style="height:200px; margin: 0px auto;" id="viewimage" >
                                    <input type="file" class="form-control w-50" accept="image/*" onchange="loadFile(event)" id="employeeimage" name="employeeimage" >
									<label id="employeeimage_valid" class="text-danger">Select Employee Photo</label>
                                </div>
                            </div>
							<script>
								var loadFile = function(event) {
									var image = document.getElementById("viewimage");
									image.src = URL.createObjectURL(event.target.files[0]);
								};
							</script>
                            
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
					<div class="card-header">
						<div class="card-title">Expertise</div>
					</div>
                    <div class="card-body">
                        
                        <div class="row gutters">
                          
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Expertise <span class="required">*</span></label>
                                    <input type="text" id="expertise"  name="expertise" class="form-control" placeholder="Expertise" >
									<label id="expertise_valid" class="text-danger">Enter Expertise</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="inputEmail">Star Rating<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="starrating" name="starrating" placeholder="Star Rating">
									<label id="starrating_valid" class="text-danger">Enter Star Rating</label>
                                </div>
                            </div>
                          
                            
                        </div>

                    </div>
                </div>
            </div>
            
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
					<div class="card-header">
						<div class="card-title">Pay Structure</div>
					</div>
                    <div class="card-body">
                        
                        <div class="row gutters">
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="inputName">Basic<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="basic" name="basic">
									<label id="basic_valid" class="text-danger">Enter Basic</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">HRA<span class="required">*</span></label>
                                    <input type="text" id="hra" name="hra" class="form-control"  >
									<label id="hra_valid" class="text-danger">Enter HRA</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="inputEmail">Conveyance<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="conveyance" name="conveyance" >
									<label id="conveyance_valid" class="text-danger">Enter Conveyance</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="inputPwd">Allowance<span class="required">*</span></label>
                                    <input type="text" class="form-control" id="allowance" name="allowance" >
									<label id="allowance_valid" class="text-danger">Enter Allowance</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="inputReadOnly">Incentive Percent<span class="required">*</span></label>
                                    <input class="form-control" id="incentivepercent" name="incentivepercent" type="text" >
									<label id="incentivepercent_valid" class="text-danger">Enter Incentive Percent</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Gross Pay<span class="required">*</span></label>
                                    <input type="text" id="grosspay" name="grosspay" class="form-control"  >
									<label id="grosspay_valid" class="text-danger">Enter Gross Pay</label>
                                </div>
                            </div>
                           
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">TDS<span class="required">*</span></label>
                                    <input type="text" id="tds" name="tds" class="form-control" >
									<label id="tds_valid" class="text-danger">Enter TDS</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">PF<span class="required">*</span></label>
                                    <input type="text" id="pf" name="pf" class="form-control" >
									<label id="pf_valid" class="text-danger">Enter PF</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">ESI<span class="required">*</span></label>
                                    <input type="text" id="esi" name="esi" class="form-control" >
									<label id="esi_valid" class="text-danger">Enter ESI</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="Input">Loans<span class="required">*</span></label>
                                    <input type="text" id="loans" name="loans" class="form-control"  >
									<label id="loans_valid" class="text-danger">Enter Loans</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Salary Advance<span class="required">*</span></label>
                                    <input type="text" id="salaryadvance" name="salaryadvance" class="form-control"  >
									<label id="salaryadvance_valid" class="text-danger">Enter Salary Advance</label>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Total Deduction<span class="required">*</span></label>
                                    <input type="text" id="totaldeduction" name="totaldeduction" class="form-control"  >
									<label id="totaldeduction_valid" class="text-danger">Enter Total Deduction</label>
                                </div>
                            </div>
							<div class="col-xl-4 col-lglg-4 col-md-4 col-sm-4 col-12">
                                <div class="form-group">
                                    <label for="disabledInput">Any Other Deduction<span class="required">*</span></label>
                                    <input type="text" id="anyotherdeduction" name="anyotherdeduction" class="form-control"  >
									<label id="anyotherdeduction_valid" class="text-danger">Any Other Deduction</label>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Staff Experience Details <span class="required">*</span></div>
                    </div>
					
                    <div class="card-body">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col" class="text-center text-white">Type</th>
                                <th scope="col" class="text-center text-white">Name</th>
                                <th scope="col" class="text-center text-white">Position Held</th>
                                <th scope="col" class="text-center text-white">Place </th>
                                <th scope="col" class="text-center text-white">From period</th>
                                <th scope="col" class="text-center text-white">To Period</th>
                                <th scope="col" class="text-center text-white">Date</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <th>  <div class="form-group">
                                    <select class="form-control form-control-lg" id="institutetype1" name="institutetype1">
                                        <option>Select Institute Type</option>
                                    </select>
                                </div></th>
                                <td> <input type="text" id="name1" name="name1" class="form-control"  ></td>
                                <td><input type="text" id="positionheld1" name="positionheld1" class="form-control"  > </td>
                                <td><input type="text" id="place1" name="place1" class="form-control"  ></td>
                                <td><input type="text" id="fromperiod1" name="fromperiod1" class="form-control"  ></td>
                                <td><input type="text" id="toperiod1" name="toperiod1" class="form-control"  ></td>
                                <td><input type="text" id="date1" name="date1" class="form-control"  ></td>
                              </tr>
                              <tr>
                                <th>  <div class="form-group">
                                    <select class="form-control form-control-lg" id="institutetype2" name="institutetype2">
                                        <option>Select Institute Type</option>
                                    </select>
                                </div></th>
                                <td> <input type="text" id="name2" name="name2" class="form-control"  ></td>
                                <td><input type="text" id="positionheld2" name="positionheld2" class="form-control"  > </td>
                                <td><input type="text" id="place2" name="place2" class="form-control"  ></td>
                                <td><input type="text" id="fromperiod2" name="fromperiod2" class="form-control"  ></td>
                                <td><input type="text" id="toperiod2" name="toperiod2" class="form-control"  ></td>
                                <td><input type="text" id="date2" name="date2" class="form-control"  ></td>
                              </tr>
                              <tr>
                                <th>  <div class="form-group">
                                    <select class="form-control form-control-lg" id="institutetype3" name="institutetype3">
                                        <option>Select Institute Type</option>
                                    </select>
                                </div></th>
                                <td> <input type="text" id="name3" name="name3" class="form-control"  ></td>
                                <td><input type="text" id="positionheld3" name="positionheld3" class="form-control"  > </td>
                                <td><input type="text" id="place3" name="place3" class="form-control"  ></td>
                                <td><input type="text" id="fromperiod3" name="fromperiod3" class="form-control"  ></td>
                                <td><input type="text" id="toperiod3" name="toperiod3" class="form-control"  ></td>
                                <td><input type="text" id="date3" name="date3" class="form-control"  ></td>
                              </tr>
                              <tr>
                                <th>  <div class="form-group">
                                    <select class="form-control form-control-lg" id="institutetype4" name="institutetype4">
                                        <option>Select Institute Type</option>
                                    </select>
                                </div></th>
                                <td> <input type="text" id="name4" name="name4" class="form-control"  ></td>
                                <td><input type="text" id="positionheld4" name="positionheld4" class="form-control"  > </td>
                                <td><input type="text" id="place4" name="place4" class="form-control"  ></td>
                                <td><input type="text" id="fromperiod4" name="fromperiod4" class="form-control"  ></td>
                                <td><input type="text" id="toperiod4" name="toperiod4" class="form-control"  ></td>
                                <td><input type="text" id="date4" name="date4" class="form-control"  ></td>
                              </tr>
                              <tr>
                                <th> <div class="form-group w-100">
										<select class="form-control form-control-lg" id="institutetype5" name="institutetype5">
											<option>Select Institute Type</option>
										</select>
                                    </div>
							    </th>
                                <td> <input type="text" id="name5" name="name5" class="form-control"  ></td>
                                <td><input type="text" id="positionheld5" name="positionheld5" class="form-control"> </td>
                                <td><input type="text" id="place5" name="place5" class="form-control"  ></td>
                                <td><input type="text" id="fromperiod5" name="fromperiod5" class="form-control"  ></td>
                                <td><input type="text" id="toperiod5" name="toperiod5" class="form-control"  ></td>
                                <td><input type="text" id="date5" name="date5" class="form-control"></td>
                              </tr>
                            </tbody>
                          </table>

                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Certificates <span class="required">*</span></div>
                    </div>
                    <div class="card-body">
                        
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label ">Title</label>
                            <div class="col-sm-10 d-flex align-items-center">
                                <input type="text"  class="form-control w-50 " id="title1" name="title1">
								<input type="file"  id="certificate1" name="certificate1" accept="application/pdf" class="ml-4">

							</div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label ">Title</label>
                            <div class="col-sm-10 d-flex align-items-center">
								<input type="text"  class="form-control w-50 " id="title2" name="title2" >
								<input type="file"    id="certificate2" name="certificate2" accept="application/pdf"  class="ml-4">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label ">Title</label>
                            <div class="col-sm-10 d-flex align-items-center">
								<input type="text"  class="form-control w-50 " id="title3" name="title3" >
								<input type="file"  id="certificate3" name="certificate3" accept="application/pdf"  class="ml-4">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label ">Title</label>
                            <div class="col-sm-10 d-flex align-items-center">
								<input type="text"  class="form-control w-50 " id="title4" name="title4" >
								<input type="file"  id="certificate4" name="certificate4" accept="application/pdf"  class="ml-4">
                            </div>
                        </div>
						<div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label ">Title</label>
                            <div class="col-sm-10 d-flex align-items-center">
								<input type="text"  class="form-control w-50 " id="title5" name="title5">
								<input type="file"  id="certificate5" name="certificate5" accept="application/pdf" class="ml-4">
                            </div>
                        </div>

                    </div>
                </div>
				
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
               
                   <div class="row">
					   <div class="col-md-2 " >
						<button type="submit" class="btn btn-primary mb-2 " >Download</button>
						<button type="submit" class="btn btn-primary mb-2">Upload</button>
					   </div>
					   <div class="col-md-2">
						

					   </div>
					   <div class="col-md-2"></div>
					   <div class="col-md-2"></div>
					   <div class="col-md-2"></div>
					<div class="col-md-2">
						
							<button type="button" name="submit" id="submit" class="btn btn-primary ">Submit</button>
						    <button type="submit" class="btn btn-primary ">Cancel</button>
					

					</div>

				 
                 
                </div>
            </div>


        </div>
        <!-- Row end -->


</form>

</div>
<!-- Main container end -->
