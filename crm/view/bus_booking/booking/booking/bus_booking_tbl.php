<?php



function get_dyn_tbl()

{

?>

<tr>

    <td><input class="css-checkbox" id="chk_booking1" type="checkbox" checked><label class="css-label"
            for="chk_booking1"> <label></td>

    <td><input maxlength="15" value="1" type="text" name="username" placeholder="Sr. No." class="form-control"
            disabled /></td>

    <td><input type="text" id="company_name1" name="company_name" onchange="validate_specialChar(this.id)"
            placeholder="*Bus Operator" title="Bus Operator" style="width:135px" /></td>

    <td><select name="seat_type" id="bus_type1" title="Seat Type" style="width: 125px;">

            <option value="">Seat Type</option>

            <option value="Seating">Seating</option>

            <option value="Semi Sleeper">Semi Sleeper</option>

            <option value="Sleeper">Sleeper</option>

            <option value="Window">Window</option>

        </select></td>

    <td><select name="bus_type" id="bus_type_new1" title="Bus Type" style="width: 125px;">

            <option value="">Bus Type</option>

            <option value="AC">AC</option>

            <option value="Non Ac">Non Ac</option>

        </select></td>

    <td><input type="text" id="pnr_no1" name="pnr_no" style="text-transform: uppercase;width:118px"
            onchange="validate_specialChar(this.id)" placeholder="PNR Number" title="PNR Number" /></td>

    <td><input type="text" id="origin1" name="origin" onchange="validate_city(this.id)" placeholder="*Source"
            title="Source" style="width:150px" /></td>

    <td><input type="text" id="destination1" onchange="validate_city(this.id)" name="destination"
            placeholder="*Destination" title="Destination" style="width:150px" /></td>

    <td><input type="text" id="date_of_journey1" name="date_of_journey" class="app_datetimepicker"
            placeholder="Journey Date & Time" title="Journey Date & Time" value="<?= date('d-m-Y H:i') ?>"
            style="width:150px" /></td>

    <td><input type="text" id="reporting_time1" name="reporting_time" placeholder="Reporting Time"
            title="Reporting Time" class="app_timepicker" style="width:135px" /></td>

    <td><input type="text" id="boarding_point_access1" name="boarding_point_access" placeholder="Boarding Point Access"
            title="Boarding Point Access" style="width: 190px;" /></td>

</tr>

<script>
$('#date_of_journey1').datetimepicker({
    format: 'd-m-Y H:i'
});

$('#reporting_time1').datetimepicker({
    datepicker: false,
    format: 'H:i'
});
</script>

<?php

}

if (!$update_form) {

	get_dyn_tbl();
} else {

	$sq_entry_count = mysqli_num_rows(mysqlQuery("select entry_id from bus_booking_entries where booking_id='$booking_id'"));

	if ($sq_entry_count == 0) {

		get_dyn_tbl();
	} else {

		$count = 0;

		$sq_entry = mysqlQuery("select * from bus_booking_entries where booking_id='$booking_id'");

		while ($row_entry = mysqli_fetch_assoc($sq_entry)) {

			$bg = "";

			if ($row_entry['status'] == 'Cancel') {

				$bg = "danger";
			} else {

				$bg = "FFF";
			}

			$count++;

	?>

<tr>

    <td><input class="css-checkbox" id="chk_booking<?= $count ?>_u" type="checkbox" checked><label
            class="css-label" for="chk_booking<?= $count ?>_u"> <label></td>

    <td><input maxlength="15" value="<?= $count ?>" type="text" name="username" placeholder="Sr. No."
            class="form-control" disabled /></td>

    <td><input type="text" onchange="validate_specialChar(this.id);" id="company_name<?= $count ?>_u"
            name="company_name" placeholder="Bus Operator" title="Bus Operator"
            value="<?= $row_entry['company_name'] ?>" style="width:120px" /></td>

    <td><select name="seat_type" id="bus_type<?= $count ?>_u" title="Seat Type" style="width: 125px;">
            <?php if ($row_entry['seat_type'] != '') { ?>
            <option value="<?= $row_entry['seat_type'] ?>"><?= $row_entry['seat_type'] ?></option>

            <option value="">Seat Type</option>

            <option value="Seating">Seating</option>

            <option value="Semi Sleeper">Semi Sleeper</option>

            <option value="Sleeper">Sleeper</option>

            <option value="Window">Window</option>
            <?php } else { ?>
            <option value="">Seat Type</option>

            <option value="Seating">Seating</option>

            <option value="Semi Sleeper">Semi Sleeper</option>

            <option value="Sleeper">Sleeper</option>

            <option value="Window">Window</option>
            <?php } ?>
        </select></td>

    <td><select name="bus_type" id="bus_type_new<?= $count ?>_u" title="Bus Type" style="width: 125px;">
            <?php if ($row_entry['bus_type'] != '') { ?>
            <option value="<?= $row_entry['bus_type'] ?>"><?= $row_entry['bus_type'] ?></option>

            <option value="">Bus Type</option>

            <option value="AC">AC</option>

            <option value="Non Ac">Non Ac</option>
            <?php } else { ?>
            <option value="">Bus Type</option>

            <option value="AC">AC</option>

            <option value="Non Ac">Non Ac</option>
            <?php } ?>
        </select></td>

    <td><input type="text" id="pnr_no<?= $count ?>_u" name="pnr_no" style="text-transform: uppercase;width:120px"
            onchange="validate_specialChar(this.id)" placeholder="PNR Number" title="PNR Number"
            value="<?= $row_entry['pnr_no'] ?>" /></td>

    <td><input type="text" id="origin<?= $count ?>_u" name="origin" onchange="validate_city(this.id)"
            placeholder="Source" title="Source" value="<?= $row_entry['origin'] ?>" style="width:120px" /></td>

    <td><input type="text" id="destination<?= $count ?>_u" onchange="validate_city(this.id)" name="destination"
            placeholder="Destination" title="Destination" value="<?= $row_entry['destination'] ?>"
            style="width:120px" /></td>

    <td><input type="text" id="date_of_journey<?= $count ?>_u" name="date_of_journey" placeholder="Journey Date"
            title="Journey Date and Time" class="app_datetimepicker"
            value="<?= ($row_entry['date_of_journey'] == '1970-01-01 05:30:00') ? "" : get_datetime_user($row_entry['date_of_journey']) ?>"
            style="width:140px" /></td>

    <td><input type="text" id="reporting_time<?= $count ?>_u" name="reporting_time" placeholder="Reporting Time"
            title="Reporting Time" class="app_timepicker" value="<?= $row_entry['reporting_time'] ?>"
            style="width:135px" /></td>

    <td><input type="text" id="boarding_point_access<?= $count ?>_u" name="boarding_point_access"
            placeholder="Boarding Point Access" title="Boarding Point Access"
            value="<?= $row_entry['boarding_point_access'] ?>" style="width: 180px;" /></td>

    <td class="hidden"><input type="text" value="<?= $row_entry['entry_id'] ?>"></td>

</tr>

<script>
$('#date_of_journey<?= $count ?>_u').datetimepicker({
    format: 'd-m-Y H:i'
});

$('#reporting_time<?= $count ?>_u').datetimepicker({
    datepicker: false,
    format: 'H:i'
});
</script>

<?php

		}
	}
}

?>