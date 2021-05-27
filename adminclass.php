<?php

  class admin 
	{
			

   /* User Details Start */ 
   public function adduser($mysqli) 
   {
	   $date  = date('Y-m-d');
	   if (isset($_POST['fullname'])) {
		$fullname             = mysqli_real_escape_string($mysqli,$_POST['fullname']);		
	}
	   if (isset($_POST['role'])) {
	   $role             = mysqli_real_escape_string($mysqli,$_POST['role']);		
	   }	
	   if (isset($_POST['email'])) {
	   $email               = mysqli_real_escape_string($mysqli,$_POST['email']);		
	   }
	   if (isset($_POST['password'])) {
	   $password               = mysqli_real_escape_string($mysqli,$_POST['password']);		
	   }
	  
	   if(isset($_POST['status']) &&    $_POST['status'] == 'Yes')		
	   {
		   $status=0;
	   }
	   else
	   {
		   $status=1;
	   }
	   $qry = "INSERT INTO user(fullname,user_name,user_password,
	   status) 
	   VALUES ('".strip_tags($fullname)."' ,'".strip_tags($email)."','".strip_tags($password)."',
	   '".strip_tags($status)."');";		
   
	   $res =$mysqli->query($qry)or die("Error in Query".$mysqli->error);
	   $id = 0;
	   $id = $mysqli->insert_id;
   
	   return $id; 
   }
   public function deleteuser($mysqli,$id) 
   {
	   $date  = date('Y-m-d'); 
	   $qry = 'UPDATE  user  SET status="1"  WHERE user_id="'.mysqli_real_escape_string($mysqli,$id).'"'; 
	   $res =$mysqli->query($qry)or die("Error in delete query".$mysqli->error);	
   } 	

	   
   public function getuser($mysqli,$idupd) 
   {
	   $qry = "SELECT * FROM user WHERE user_id='".mysqli_real_escape_string($mysqli,$idupd)."'"; 
	   $res =$mysqli->query($qry)or die("Error in Get All Records".$mysqli->error);
	   $detailrecords = array();
	   if ($mysqli->affected_rows>0)
	   {
		   $row = $res->fetch_object();	
		   $detailrecords['user_id']                    = $row->user_id; 
		   $detailrecords['fullname']       	        = strip_tags($row->fullname);
		   $detailrecords['user_name']       	        = strip_tags($row->user_name);
		   $detailrecords['user_password']              = strip_tags($row->user_password);		  	
		   $detailrecords['status']                     = strip_tags($row->status);		
   
	   }
	   return $detailrecords;
   }
   public function updateuser($mysqli,$id) { 		
	$date  = date('Y-m-d');
	if (isset($_POST['fullname'])) {
		$fullname             = mysqli_real_escape_string($mysqli,$_POST['fullname']);		
	}
	if (isset($_POST['role'])) {
	$role             = mysqli_real_escape_string($mysqli,$_POST['role']);		
	}	
	if (isset($_POST['email'])) {
	$email               = mysqli_real_escape_string($mysqli,$_POST['email']);		
	}
	if (isset($_POST['password'])) {
	$password               = mysqli_real_escape_string($mysqli,$_POST['password']);		
	}	
	if(isset($_POST['status']) &&    $_POST['status'] == 'Yes')		
	{
		$status=0;
	}
	else
	{
		$status=1;
	}
   $updateQry = 'UPDATE  user  SET fullname="'.strip_tags($fullname).'" ,user_name="'.strip_tags($email).'" ,user_password="'.strip_tags($password).'" ,		 
   status="'.$status.'"			
			WHERE user_id="'.mysqli_real_escape_string($mysqli,$id).'"';  

   $res =$mysqli->query($updateQry)or die("Error in in update Query!.".$mysqli->error); 
			
			 
   }	

/* User Details End */ 


public function addemployee() {

	


if(isset($_POST['employeecode']))		
	{
	$employeecode = $_POST['employeecode'];
	}
if(isset($_POST['employeename']))		
	{
	$employeename = $_POST['employeename'];
    }
if(isset($_POST['dateofbirth']))		
{
	$dateofbirth = $_POST['dateofbirth'];
}
if(isset($_POST['gender']))		
	{
	$gender = $_POST['gender'];
	}
	if(isset($_POST['emailid']))		
	{
	$emailid = $_POST['emailid'];
	}
	if(isset($_POST['designation']))		
	{
	$designation = $_POST['designation'];
	}
	if(isset($_POST['employeenumber']))		
	{
	$employeenumber = $_POST['employeenumber'];
	}
	if(isset($_POST['dateofjoining']))		
	{
	$dateofjoining = $_POST['dateofjoining'];
	}
	
if(isset($_POST['contact']))		
{
$contact = $_POST['contact'];
}
if(isset($_POST['employeeimage']))		
{
$employeeimage = $_POST['employeeimage'];
}
if(isset($_POST['expertise']))		
{
$expertise = $_POST['expertise'];
}
if(isset($_POST['starrating']))		
{
$starrating = $_POST['starrating'];
}
if(isset($_POST['basic']))		
{
$basic = $_POST['basic'];
}
if(isset($_POST['hra']))		
{
$hra = $_POST['hra'];
}
if(isset($_POST['conveyance']))		
{
$conveyance = $_POST['conveyance'];
}
if(isset($_POST['allowance']))		
{
$allowance = $_POST['allowance'];
}

if(isset($_POST['incentivepercent']))		
	{
	$incentivepercent = $_POST['incentivepercent'];
	}
if(isset($_POST['grosspay']))		
	{
	$grosspay = $_POST['grosspay'];
    }
if(isset($_POST['tds']))		
{
	$tds = $_POST['tds'];
}
if(isset($_POST['pf']))		
	{
	$pf = $_POST['pf'];
	}
	if(isset($_POST['esi']))		
	{
	$esi = $_POST['esi'];
	}
	if(isset($_POST['loans']))		
	{
	$loans = $_POST['loans'];
	}
	if(isset($_POST['salaryadvance']))		
	{
	$salaryadvance = $_POST['salaryadvance'];
	}
	if(isset($_POST['totaldeduction']))		
	{
	$totaldeduction = $_POST['totaldeduction'];
	}
	
if(isset($_POST['anyotherdeduction']))		
{
$anyotherdeduction = $_POST['anyotherdeduction'];
}
if(isset($_POST['institutetype1']))		
{
$institutetype1 = $_POST['institutetype1'];
}
if(isset($_POST['name1']))		
{
$name1 = $_POST['name1'];
}
if(isset($_POST['positionheld1']))		
{
$positionheld1 = $_POST['positionheld1'];
}
if(isset($_POST['place1']))		
{
$place1 = $_POST['place1'];
}
if(isset($_POST['fromperiod1']))		
{
$fromperiod1 = $_POST['fromperiod1'];
}
if(isset($_POST['toperiod1']))		
{
$toperiod1 = $_POST['toperiod1'];
}
if(isset($_POST['date1']))		
{
$date1 = $_POST['date1'];
}


if(isset($_POST['institutetype2']))		
{
$institutetype2 = $_POST['institutetype2'];
}
if(isset($_POST['name2']))		
{
$name12= $_POST['name2'];
}
if(isset($_POST['positionheld2']))		
{
$positionheld2 = $_POST['positionheld2'];
}
if(isset($_POST['place2']))		
{
$place2 = $_POST['place2'];
}
if(isset($_POST['fromperiod2']))		
{
$fromperiod2 = $_POST['fromperiod2'];
}
if(isset($_POST['toperiod2']))		
{
$toperiod2 = $_POST['toperiod2'];
}
if(isset($_POST['date2']))		
{
$date2 = $_POST['date2'];
}



if(isset($_POST['institutetype3']))		
{
$institutetype3 = $_POST['institutetype3'];
}
if(isset($_POST['name3']))		
{
$name3 = $_POST['name3'];
}
if(isset($_POST['positionheld3']))		
{
$positionheld3 = $_POST['positionheld3'];
}
if(isset($_POST['place3']))		
{
$place3 = $_POST['place3'];
}
if(isset($_POST['fromperiod3']))		
{
$fromperiod3 = $_POST['fromperiod3'];
}
if(isset($_POST['toperiod3']))		
{
$toperiod3 = $_POST['toperiod3'];
}
if(isset($_POST['date3']))		
{
$date3 = $_POST['date3'];
}
	




if(isset($_POST['institutetype4']))		
{
$institutetype4 = $_POST['institutetype4'];
}
if(isset($_POST['name4']))		
{
$name4 = $_POST['name4'];
}
if(isset($_POST['positionheld4']))		
{
$positionheld4 = $_POST['positionheld4'];
}
if(isset($_POST['place4']))		
{
$place4 = $_POST['place4'];
}
if(isset($_POST['fromperiod4']))		
{
$fromperiod4 = $_POST['fromperiod4'];
}
if(isset($_POST['toperiod4']))		
{
$toperiod4 = $_POST['toperiod4'];
}
if(isset($_POST['date4']))		
{
$date4 = $_POST['date4'];
}




if(isset($_POST['institutetype5']))		
{
$institutetype5 = $_POST['institutetype5'];
}
if(isset($_POST['name5']))		
{
$name5 = $_POST['name5'];
}
if(isset($_POST['positionheld5']))		
{
$positionheld5 = $_POST['positionheld5'];
}
if(isset($_POST['place5']))		
{
$place5 = $_POST['place5'];
}
if(isset($_POST['fromperiod5']))		
{
$fromperiod5 = $_POST['fromperiod5'];
}
if(isset($_POST['toperiod5']))		
{
$toperiod5 = $_POST['toperiod5'];
}
if(isset($_POST['date5']))		
{
$date5 = $_POST['date5'];
}




if(isset($_POST['title1']))		
{
$title1 = $_POST['title1'];
}
if(isset($_POST['certificate1']))		
{
$certificate1 = $_POST['certificate1'];
}

if(isset($_POST['title2']))		
{
$title2 = $_POST['title2'];
}
if(isset($_POST['certificate2']))		
{
$certificate2 = $_POST['certificate2'];
}

if(isset($_POST['title3']))		
{
$title3 = $_POST['title3'];
}
if(isset($_POST['certificate3']))		
{
$certificate3 = $_POST['certificate3'];
}

if(isset($_POST['title4']))		
{
$title4 = $_POST['title4'];
}
if(isset($_POST['certificate4']))		
{
$certificate4 = $_POST['certificate4'];
}

if(isset($_POST['title5']))		
{
$title5 = $_POST['title5'];
}
if(isset($_POST['certificate5']))		
{
$certificate5 = $_POST['certificate5'];
}


	$qry = "INSERT INTO employee( employeecode, employeename,
	 dateofbirth, 
	gender, emailid, designation, employeenumber, dateofjoining, contact, employeeimage,
	 expertise, starrating, basic, hra, conveyance, allowance, incentivepercent, grosspay,
	tds, pf, esi, loans, salaryadvance, totaldeduction, anyotherdeduction, institutetype1,
	name1, positionheld1, place1, fromperiod1, toperiod1, date1, institutetype2, name2, 
	positionheld2, place2, fromperiod2, toperiod2, date2, institutetype3, name3, positionheld3,
	 place3, fromperiod3, toperiod3, date3, institutetype4, name4, positionheld4, place4,
	fromperiod4, toperiod4, date4, institutetype5, name5, positionheld5, place5, fromperiod5,
   toperiod5, date5, title1, certificate1, title2, certificate2, title3, certificate3,
	title4, certificate4, title5, certificate5) VALUES (
	'".strip_tags($employeecode)."',
	'".strip_tags($employeename)."',
	'".strip_tags($dateofbirth)."',
	'".strip_tags($gender)."',
	'".strip_tags($emailid)."',
	'".strip_tags($designation)."',
	'".strip_tags($employeenumber)."',
	'".strip_tags($dateofjoining)."',
	'".strip_tags($contact)."',
	'".strip_tags($employeeimage)."',
	'".strip_tags($expertise)."',
	'".strip_tags($starrating)."',
	'".strip_tags($basic)."',
	'".strip_tags($hra)."',
	'".strip_tags($conveyance)."',
	'".strip_tags($allowance)."',
	'".strip_tags($incentivepercent)."',
	'".strip_tags($grosspay)."',
	'".strip_tags($tds)."',
	'".strip_tags($pf)."',
	'".strip_tags($esi)."',
	'".strip_tags($loans)."',
	'".strip_tags($salaryadvance)."',
	'".strip_tags($totaldeduction)."',
	'".strip_tags($anyotherdeduction)."',

	'".strip_tags($institutetype1)."',
	'".strip_tags($name1)."',
	'".strip_tags($positionheld1)."',
	'".strip_tags($place1)."',
	'".strip_tags($fromperiod1)."',
	'".strip_tags($toperiod1)."',
	'".strip_tags($date1)."',

	'".strip_tags($institutetype2)."',
	'".strip_tags($name2)."',
	'".strip_tags($positionheld2)."',
	'".strip_tags($place2)."',
	'".strip_tags($fromperiod2)."',
	'".strip_tags($toperiod2)."',
	'".strip_tags($date2)."',

    '".strip_tags($institutetype3)."',
	'".strip_tags($name3)."',
	'".strip_tags($positionheld3)."',
	'".strip_tags($place3)."',
	'".strip_tags($fromperiod3)."',
	'".strip_tags($toperiod3)."',
	'".strip_tags($date3)."',

	'".strip_tags($institutetype4)."',
	'".strip_tags($name4)."',
	'".strip_tags($positionheld4)."',
	'".strip_tags($place4)."',
	'".strip_tags($fromperiod4)."',
	'".strip_tags($toperiod4)."',
	'".strip_tags($date4)."',

	'".strip_tags($institutetype5)."',
	'".strip_tags($name5)."',
	'".strip_tags($positionheld5)."',
	'".strip_tags($place5)."',
	'".strip_tags($fromperiod5)."',
	'".strip_tags($toperiod5)."',
	'".strip_tags($date5)."',


	'".strip_tags($title1)."',
	'".strip_tags($certificate1)."',
	
	'".strip_tags($title2)."',
	'".strip_tags($certificate2)."',
	'".strip_tags($title3)."',
	'".strip_tags($certificate3)."',
	'".strip_tags($title4)."',
	'".strip_tags($certificate4)."',
	'".strip_tags($title5)."',
	'".strip_tags($certificate5)."'

	
	);";
	$res =$mysqli->query($qry)or die("Error in Query".$mysqli->error);
	$id = 0;
	$id = $mysqli->insert_id;
	return $id; 
	
	}

}