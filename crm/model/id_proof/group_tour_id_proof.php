<?php 
class group_tour_id_proof
{

	public function group_tour_id_proof_upload()
	{
		$traveler_id = $_POST['traveler_id'];
		$id_proof_url = $_POST['id_proof_url'];

		$sq = mysqlQuery("update travelers_details set id_proof_url='$id_proof_url' where traveler_id='$traveler_id'");
		if($sq){
			echo "ID proof uploaded successfully!";
			exit;
		}	
		else{
			echo "error--Sorry, ID Proof not uploaded!";
			exit;
		}

	}

	public function group_tour_pan_card_upload()
	{
		$traveler_id = $_POST['traveler_id'];
		$id_proof_url = $_POST['id_proof_url'];
		$id_proof_url3 = $_POST['id_proof_url3'];
		$id_proof_url4 = $_POST['id_proof_url4'];

		$sq = mysqlQuery("update travelers_details set pan_card_url='$id_proof_url', pan_card_url3='$id_proof_url3', pan_card_url4='$id_proof_url4' where traveler_id='$traveler_id'");
		if($sq){
			echo "ID Proof uploaded successfully!";
			exit;
		}	
		else{
			echo "error--Sorry, ID Proof not uploaded!";
			exit;
		}

	}

}
?>