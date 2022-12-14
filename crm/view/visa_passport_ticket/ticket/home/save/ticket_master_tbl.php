<tr>
    <td><input class="css-checkbox" id="chk_ticket1" type="checkbox" checked><label class="css-label" for="chk_ticket1"> <label></td>
    <td><input maxlength="15" value="1" type="text" name="username" placeholder="Sr. No." class="form-control" disabled /></td>
    <td><input type="text" id="first_name1" name="first_name" title="First Name" onchange="fname_validate(this.id)" placeholder="*First Name" style="width:120px;" /></td>
    <td><input type="text" id="middle_name1" name="middle_name" onchange="fname_validate(this.id)" placeholder="Middle Name" title="Middle Name" style="width:120px;"/></td>
    <td><input type="text" id="last_name1" name="last_name" onchange="fname_validate(this.id)" placeholder="Last Name" title="Last Name" style="width:120px;"/></td> 
    <td class="hidden"><input type="text" id="birth_date1" name="birth_date" class="app_datepicker" placeholder="DOB" title="DOB" onchange="adolescence_reflect(this.id)" value="<?= date('d-m-Y',  strtotime(' -1 day'))?>"/></td>    
    <td><select id="adolescence1" name="adolescence" placeholder="*Adolescence" title="Adolescence" style="width:164px;">
        <option value="">Select Adolescence</option>
        <option>Adult</option>
        <option>Child</option>
        <option>Infant</option>
    </select></td>
    <td><input type="text" id="ticket_no1" style="text-transform: uppercase;width:125px;" onchange="validate_spaces(this.id)" name="ticket_no" placeholder="Ticket No" title="Ticket No"/></td>
    <td><input type="text" id="gds_pnr1" name="gds_pnr" style="text-transform: uppercase;width:125px;" onchange="validate_spaces(this.id)" placeholder="Airline PNR" title="Airline PNR"></td>
    <td><input type="text" id="baggage_info1" name="baggage_info" onchange="validate_spaces(this.id)" placeholder="Check-In & Cabin Baggage" title="Check-In & Cabin Baggage" style="width:218px;"></td>
    <td><input type="text" id="seat_no1" name="seat_no" onchange="validate_spaces(this.id)" placeholder="Seat No." title="Seat No." style="width:125px;"></td>
    <td><input type="text" id="meal_plan1" name="meal_plan" placeholder="Meal Plan" title="Meal Plan" style="width:125px;"></td>
    <td><input type="hidden" id="main_ticket1" name="main_ticket" style="text-transform: uppercase;width:175px;" onchange="validate_spaces(this.id)" placeholder="*Main Ticket Number" class="form-control main_ticket" title="Main Ticket Number"></td>
    <td class="hidden"><textarea id="flight_details1" name="flight_details1" class="form-control hidden"></textarea></td>
    <td><button type="button" class="btn btn-info btn-iti btn-sm" id="add_trips1" title="Add Flight Ticket Details" onclick="add_flight_details(this.id,'save')" data-toggle="tooltip"><i class="fa fa-plus"></i></button></td>
</tr>

<script>
var date = new Date();
var yest = date.setDate(date.getDate()-1);
$('#birth_date1').datetimepicker({ timepicker:false, maxDate:yest, format:'d-m-Y' });
</script>