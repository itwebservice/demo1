<?php

include_once('../model.php');
global $model;
 
	$today=date('Y-m-d');
		$sq_emplyee = mysqlQuery("SELECT * from emp_master where active_flag='Active' and (MONTH(date_of_join), DAY(date_of_join)) = (MONTH(CURDATE()),DAY(CURDATE()))");
		while($row_emp=mysqli_fetch_assoc($sq_emplyee))
		{
			$name = $row_emp['first_name']." ".$row_emp['last_name'];
			$email = $row_emp['email_id'];
			$contact_no = $row_emp['mobile_no'];


			$sq_count = mysqli_num_rows(mysqlQuery("SELECT * from remainder_status where remainder_name = 'emp_anniversary' and date='$today' and status='Done'"));
			if($sq_count==0)
			{
				 email($name,$email);
			}
		}
		$row=mysqlQuery("SELECT max(id) as max from remainder_status");
	 	$value=mysqli_fetch_assoc($row);
	 	$max=$value['max']+1;
		$sq_check_status=mysqlQuery("INSERT INTO `remainder_status`(`id`, `remainder_name`, `date`, `status`) VALUES ('$max','emp_anniversary','$today','Done')");
		

	function email($name,$email)
	{
	global $app_email_id, $app_name, $app_contact_no, $admin_logo_url, $app_website;
	$content=' ';  
    global $model;
    $subject = 'Wish You Happy Anniversary : '.$name.' .';
	$model->app_email_send('77',$name,$email, $content,$subject,'1');
 
	}

?>