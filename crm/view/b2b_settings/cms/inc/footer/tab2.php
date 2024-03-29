<div class="row mg_bt_20">
    <div class="col-md-4">
        <label>Select Display Status</label>
        <select class="form-control" style="width:100%" name="display_status" id="display_status2" title="Display Status" data-toggle="tooltip">
            <?php if ($col2[0]->display_status != '') { ?>
                <option value="<?= $col2[0]->display_status ?>"><?= $col2[0]->display_status ?></option>
            <?php } ?>
            <?php if ($col2[0]->display_status != 'Hide') { ?>
                <option value="Hide">Hide</option>
            <?php } ?>
            <?php if ($col2[0]->display_status != 'Show') { ?>
                <option value="Show">Show</option>
            <?php } ?>
        </select>
    </div>
    <div class="col-md-8 text-right mg_tp_20">
        <button type="button" class="btn btn-excel btn-sm" title="Note : For saving activities keep checkbox selected!"><i class="fa fa-question-circle"></i></button>
        <button type="button" class="btn btn-excel btn-sm" onclick="addRow('tbl_activities');city_lzloading('.city_excursion');" title="Add Row"><i class="fa fa-plus"></i></button>
        <button type="button" class="btn btn-pdf btn-sm" onclick="deleteRow('tbl_activities');" title="Delete Row"><i class="fa fa-trash"></i></button>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <table id="tbl_activities" name="tbl_activities" class="table border_0 table-hover no-marg">
            <?php
            if (sizeof($col2) == 0) { ?>
                <tr>
                    <td><input id="chk_city1" type="checkbox" checked></td>
                    <td><input maxlength="15" value="1" type="text" name="no" placeholder="Sr. No." class="form-control" disabled /></td>
                    <td><select name="city_name-1" id="city_name-11" title="Select City" onchange="excursion_dynamic_reflect(this.id)" style="width:100%" class="form-control app_select2 city_excursion">
                        </select>
                        </select></td>
                    <td><select id="exc-11" name="exc-11" title="Select Activity" class="form-control" style="width:100%">
                            <option value="">*Select Activity</option>
                        </select></td>
                </tr>
                <script>
                    $('#city_name-11').select2();
                </script>
                <?php
            } else {
                for ($i = 0; $i < sizeof($col2[0]->activities); $i++) {
                    $city_id = $col2[0]->activities[$i]->city_id;
                    $sq_city = mysqli_fetch_assoc(mysqlQuery("select city_id,city_name from city_master where city_id='$city_id'"));
                ?>
                    <tr>
                        <td><input id="chk_city_act1<?= $i ?>_u" type="checkbox" checked></td>
                        <td><input maxlength="15" value="<?= ($i + 1) ?>" type="text" name="no" placeholder="Sr. No." class="form-control" disabled /></td>
                        <td><select name="city_name-1<?= $i ?>_u" id="city_name-1<?= $i ?>_u" title="Select City" onchange="excursion_dynamic_reflect(this.id)" style="width:100%" class="form-control app_select2 city_excursion">
                                <?php if ($city_id != '') { ?>
                                    <option value="<?= $sq_city['city_id'] ?>"><?= $sq_city['city_name'] ?></option>
                                <?php } ?>
                            </select>
                            </select></td>
                        <td><select id="exc-1<?= $i ?>_u" name="exc-1<?= $i ?>_u" title="Select Activity" class="form-control" style="width:100%">
                                <?php if ($col2[0]->activities[$i]->exc_id != '') { ?>
                                    <option value="<?= $col2[0]->activities[$i]->exc_id ?>"><?= $col2[0]->activities[$i]->exc_id ?></option>
                                <?php } ?>
                                <option value="">*Select Activity</option>
                            </select></td>
                    </tr>
                    <script>
                        $('#city_name-1<?= $i ?>_u').select2();
                    </script>
            <?php }
            } ?>
        </table>
    </div>
</div>
<script>
    city_lzloading('.city_excursion');
</script>