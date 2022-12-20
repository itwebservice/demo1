<?php include "../../../../../model/model.php"; 

$array_s = array();
$temp_arr = array();
$id = $_POST['id'];
$tour_id = $_POST['tour_id'];
$group_id = $_POST['group_id'];
$role = $_SESSION['role'];
$branch_admin_id = $_SESSION['branch_admin_id'];
$branch_status = $_GET['branch_status'];
$count=0;
$cancel_count=0;
$query1 = "select * from travelers_details where 1 and traveler_group_id in(select traveler_group_id from tourwise_traveler_details where delete_status='0')";
if($id != "")
{
	$query1 .= " and traveler_group_id in(select traveler_group_id from tourwise_traveler_details where id='$id' and delete_status='0') ";
}	
if($branch_id!=""){

	$query1 .= " and traveler_group_id in (select traveler_group_id from tourwise_traveler_details where branch_admin_id = '$branch_id' and delete_status='0')";
}
if($branch_status=='yes' && $role=='Branch Admin'){
    $query1 .= " and traveler_group_id in (select traveler_group_id from tourwise_traveler_details where branch_admin_id = '$branch_admin_id' and delete_status='0')";
}
if($tour_id != ''){
	$query1 .= " and traveler_group_id in(select traveler_group_id from tourwise_traveler_details where tour_id='$tour_id' and delete_status='0') ";
}
if( $group_id != ''){
	$query1 .= " and traveler_group_id in(select traveler_group_id from tourwise_traveler_details where tour_group_id='$group_id' and delete_status='0') ";
}

$sq_traveler_det = mysqlQuery($query1);
while($row_traveler_det = mysqli_fetch_assoc($sq_traveler_det))
{
	$count++;
	$sq_entry1 = mysqli_fetch_assoc(mysqlQuery("select * from tourwise_traveler_details where traveler_group_id='$row_traveler_det[traveler_group_id]' and delete_status='0'"));
	if($row_traveler_det['status']=="Cancel"|| $sq_entry1['tour_group_status']=='Cancel') {	$bg = "danger"; 
		$cancel_count++;
	}	
	else { $bg="#000";	}	
	if($row_traveler_det['birth_date']=="") { $birth_date=""; }
	else { $birth_date=date("d-m-Y",strtotime($row_traveler_det['birth_date'])); }
	$temp_arr = array( "data" => array(
		(int)($count),
		$row_traveler_det['first_name']." ".$row_traveler_det['last_name'],
		$row_traveler_det['gender'],
		$birth_date,
		$row_traveler_det['age']
		), "bg" =>$bg);
		array_push($array_s,$temp_arr);
	}
	$footer_data = array("footer_data" => array(
		'total_footers' => 2,
		
		'foot0' => "Total Cancelled Passenger's : ".$cancel_count,
		'col0' => 2,
		'class0' =>"",

		'foot1' => "",
		'col1' => 4,
		'class1' =>""
		)
	);
	array_push($array_s, $footer_data);
	echo json_encode($array_s);
	?>