<?php
include "../../../model/model.php";
$cur_date = date('d-m-Y');
$cur_date = get_date_db($cur_date);
$query_count = mysqli_num_rows(mysqlQuery("select * from excursion_inventory_master where valid_to_date < '$cur_date'"));
if($query_count>0){
  $query = "select * from excursion_inventory_master where valid_to_date < '$cur_date'";
  $sq_inv = mysqlQuery($query);
  while($row_inv = mysqli_fetch_assoc($sq_inv)){
    $sq_update = mysqlQuery("update excursion_inventory_master set active_flag='Inactive' where entry_id='$row_inv[entry_id]'");
  }
}
$query = "select * from excursion_inventory_master where valid_to_date > '$cur_date'";
$sq_inv = mysqlQuery($query);
while($row_inv = mysqli_fetch_assoc($sq_inv)){
  $sq_update = mysqlQuery("update excursion_inventory_master set active_flag='Active' where entry_id='$row_inv[entry_id]'");
}

?>