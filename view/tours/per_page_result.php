<?php
include '../../config.php';
include BASE_URL.'model/model.php';
$tours_result_array = ($_POST['data']!='')?$_POST['data']:[];
$coupon_list_arr = array();
$coupon_info_arr= array();
if(sizeof($tours_result_array)>0){
  for($i=0;$i<sizeof($tours_result_array);$i++){
    $h_currency_id = $tours_result_array[$i]['currency_id'];
    $adult_count = $tours_result_array[$i]['adult_count'];
    $child_wocount = $tours_result_array[$i]['child_wocount'];
    $child_wicount = $tours_result_array[$i]['child_wicount'];
    $extra_bed_count = $tours_result_array[$i]['extra_bed_count'];
    $infant_count = $tours_result_array[$i]['infant_count'];
    $travel_date = $tours_result_array[$i]['travel_date'];
  ?>
  <input type="hidden" id="adult_count" value="<?= $adult_count ?>"/>
  <input type="hidden" id="child_wocount" value="<?= $child_wocount ?>"/>
  <input type="hidden" id="child_wicount" value="<?= $child_wicount ?>"/>
  <input type="hidden" id="extra_bed_count" value="<?= $extra_bed_count ?>"/>
  <input type="hidden" id="infant_count" value="<?= $infant_count ?>"/>
  <input type="hidden" id="travel_date" value="<?= $travel_date ?>"/>
  <input type="hidden" id="taxation-<?=$tours_result_array[$i]['package_id']?>" value='<?= $tours_result_array[$i]['taxation'][0]['taxation_type'].'-'.$tours_result_array[$i]['taxation'][0]['service_tax']?>'>
  <!-- ***** Tours Card ***** -->
  <div class="c-cardList type-hotel">
    <div class="c-cardListTable">
      <!-- *** Tours Card image *** -->
      <div class="cardList-image">
        <img src="<?= $tours_result_array[$i]['image']?>" alt="iTours" />
        <input type="hidden" value="<?= $tours_result_array[$i]['image'] ?>" id="image-<?= $tours_result_array[$i]['package_id'] ?>"/>
        <div class="typeOverlay">
          <div class="c-discount c-hide" id='discount<?= $tours_result_array[$i]['package_id'] ?>'>
              <div class="discount-text">
                  <span class="currency-icon"></span>
                  <span class='offer-currency-price' id="offer-currency-price<?= $tours_result_array[$i]['package_id'] ?>"></span>&nbsp;&nbsp;<span id='discount_text<?= $tours_result_array[$i]['package_id'] ?>'></span>
                  <span class='c-hide offer-currency-id' id="offer-currency-id<?= $tours_result_array[$i]['package_id'] ?>"></span>
              </div>
          </div>
        </div>
      </div>
      <!-- *** Tours Card image End *** -->

      <!-- *** Tours Card Info *** -->
      <div class="cardList-info" role="button">
        <button class="expandSect">View Details</button>
        <div class="dividerSection type-1 noborder">
          <div class="divider s1" role="button" data-toggle="collapse" href="#collapseExample<?= $tours_result_array[$i]['package_id']?>"
            aria-expanded="false" aria-controls="collapseExample">
            <a><h4 class="cardTitle"><span id="package-<?= $tours_result_array[$i]['package_id'] ?>"><?= $tours_result_array[$i]['package_name']?></span>
            <span class="c-tag" id="package_code-<?= $tours_result_array[$i]['package_id'] ?>"><?= $tours_result_array[$i]['package_code']?></span>
            </h4></a>

            <div class="infoSection">
              <span class="cardInfoLine">
                <?= $tours_result_array[$i]['dest_name']?>
              </span>
            </div>

            <div class="infoSection">
              <span class="cardInfoLine cust">
                <i class="icon it itours-calendar"></i>
                <?= $tours_result_array[$i]['total_nights']?> Nights <?= $tours_result_array[$i]['total_days']?> Days
                <input type="hidden" value="<?= $tours_result_array[$i]['total_nights'].'-'.$tours_result_array[$i]['total_days'] ?>" id="days-<?= $tours_result_array[$i]['package_id'] ?>"/>
              </span>
            </div>
          </div>

          <div class="divider s2">
            <div class="priceTag">
            <?php
            if($tours_result_array[$i]['best_org_cost']['org_cost'] != '' && $tours_result_array[$i]['best_org_cost']['org_cost'] != $tours_result_array[$i]['best_lowest_cost']['cost']){
              ?>
                <div class="p-old">
                    <span class="o_lbl">Old Price</span>
                    <span class="o_price">
                    <span class="p_currency currency-icon"></span>
                    <span class="p_cost best-tours-orgamount"><?= $tours_result_array[$i]['best_org_cost']['org_cost']?></span>
                    <span class="c-hide best-tours-orgcurrency-id"><?= $h_currency_id ?></span>
                    </span>
                </div>
              <?php } ?>
              <div class="p-old">
                <span class="o_lbl">Starting Price</span>
                <span class="price_main">
                  <span class="p_currency currency-icon"></span>
                  <span class="p_cost best-currency-price"><?= $tours_result_array[$i]['best_lowest_cost']['cost']?></span>
                  <span class="c-hide best-currency-id"><?= $h_currency_id ?></span>
                </span>
              </div>
            </div>
          </div>
        </div>


      </div>
      <!-- *** Tours Card Info End *** -->
    </div>

    <!-- *** Tours Details Accordian *** -->
    <div class="collapse" id="collapseExample<?= $tours_result_array[$i]['package_id']?>">
      <div class="cardList-accordian">
        <!-- ***** Tours Info Tabs ***** -->
        <div class="c-compTabs">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="itinerary-tab" data-toggle="tab" href="#itinerary-tab<?= $tours_result_array[$i]['package_id']?>" role="tab"
                aria-controls="itinerary" aria-selected="true">Itinerary</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="travel-tab" data-toggle="tab" href="#travel-tab<?= $tours_result_array[$i]['package_id']?>" role="tab"
                aria-controls="travel" aria-selected="true">Travel & Stay</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="inclusion-tab" data-toggle="tab" href="#inclusion-tab<?= $tours_result_array[$i]['package_id']?>" role="tab"
                aria-controls="inclusion" aria-selected="true">INCLUSIONS/EXCLUSIONS</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="costing-tab" data-toggle="tab" href="#costing-tab<?= $tours_result_array[$i]['package_id']?>" role="tab"
                aria-controls="costing" aria-selected="true">Costing</a>
            </li>
          </ul>

          <div class="tab-content" id="myTabContent">
            <!-- **** Tab costing **** -->
            <div class="tab-pane fade" id="costing-tab<?= $tours_result_array[$i]['package_id']?>" role="tabpanel" aria-labelledby="costing-tab">
              <!-- ///////////////////// -->
              <?php
              $room_cost1 = 0;  
              $package_type_arr = array();
              $tours_result_array[$i]['costing_array'] = ($tours_result_array[$i]['costing_array']==NULL) ? []: $tours_result_array[$i]['costing_array'];  
              for($j=0;$j<sizeof($tours_result_array[$i]['costing_array']);$j++){

                $room_cost = $tours_result_array[$i]['costing_array'][$j]['total_cost'];
                $org_cost = $tours_result_array[$i]['costing_array'][$j]['org_cost'];

                if($tours_result_array[$i]['offer_options_array'][0]['offer_type'] != ''){
                  if($tours_result_array[$i]['offer_options_array'][0]['offer_type'] == 'Offer'){
                    if($tours_result_array[$i]['offer_options_array'][0]['offer_in'] == 'Percentage'){
                      $text = '%';
                      $test = ($org_cost * ($tours_result_array[$i]['offer_options_array'][0]['offer_amount']/100));
                      $room_cost1 = $org_cost - $test;
                    }
                    else{
                      $text = '';
                      $room_cost1 = $org_cost - floatval($tours_result_array[$i]['offer_options_array'][0]['offer_amount']);
                    }
                  }
                  else if($tours_result_array[$i]['offer_options_array'][0]['offer_type'] == 'Coupon'){
                    if($tours_result_array[$i]['offer_options_array'][0]['offer_in'] == 'Percentage'){
                      $text = '%';
                    }
                    else{
                      $text = '';
                    }
                  }
                  $offer_amount = $tours_result_array[$i]['offer_options_array'][0]['offer_amount'];
                  $offer_text = $text.' '.$tours_result_array[$i]['offer_options_array'][0]['offer_type'];
                }else{
                    $offer_text = '';
                    $room_cost1 = 0;
                }
                if($tours_result_array[$i]['offer_options_array'][0]['offer_type'] == 'Coupon' && $tours_result_array[$i]['offer_options_array'][0]['coupon_code'] != ""){
                  
                  $coupon_array = ($tours_result_array[$i]['offer_options_array'][0]['coupon_array'] == NULL) ? []: $tours_result_array[$i]['offer_options_array'][0]['coupon_array'] ;
                  for($c_i = 0;$c_i<sizeof($coupon_array);$c_i++){
                    $arr = array(
                      'offer_in'=>$tours_result_array[$i]['offer_options_array'][0]['coupon_array'][$c_i]['offer_in'],
                      'offer_amount'=>$tours_result_array[$i]['offer_options_array'][0]['coupon_array'][$c_i]['offer_amount'],
                      'coupon_code'=>$tours_result_array[$i]['offer_options_array'][0]['coupon_array'][$c_i]['coupon_code'],
                      'agent_type'=>$tours_result_array[$i]['offer_options_array'][0]['coupon_array'][$c_i]['agent_type'],
                      'currency_id'=>$h_currency_id
                    );
                    array_push($coupon_info_arr, $arr);
                  }
                }
                $coupon_list_arr['coupon_info_arr'] = $coupon_info_arr;
                array_push($package_type_arr,$tours_result_array[$i]['costing_array'][$j]['type']);
                ?>
                <script>
                    setTimeout(function(){
                        //Offer red strip display
                        if('<?= $offer_text ?>' != ''){
                          document.getElementById("discount<?= $tours_result_array[$i]['package_id'] ?>").classList.remove("c-hide");
                          document.getElementById("discount<?= $tours_result_array[$i]['package_id'] ?>").classList.add("c-show");
                          
                          document.getElementById("offer-currency-price<?= $tours_result_array[$i]['package_id'] ?>").innerHTML= '<?= $offer_amount ?>';
                          document.getElementById("offer-currency-id<?= $tours_result_array[$i]['package_id'] ?>").innerHTML= '<?= $h_currency_id ?>';
                          document.getElementById("discount_text<?= $tours_result_array[$i]['package_id'] ?>").innerHTML='<?= $offer_text ?>';
                        }else{
                            document.getElementById("discount<?= $tours_result_array[$i]['package_id'] ?>").classList.add("c-hide");
                        }                 
                    }, 50);
                </script>
                <!-- ***** Type List Card ***** -->
                <div class="c-cardListHolder">
                  <div class="c-cardListTable type-2">

                    <input type="hidden" id="coupon-<?=$tours_result_array[$i]['package_id'] ?>" value='<?php echo json_encode($coupon_list_arr); ?>'>
                    <!-- *** Type Card Info *** -->
                    <label class="cardList-info" for="<?=$tours_result_array[$i]['package_id'].$j?>">
                      <div class="flexGrid">

                          <div class="gridItem">
                              <div class="infoCard">
                              <span class="infoCard_data">
                              <?php echo strtoupper($tours_result_array[$i]['costing_array'][$j]['type']);?>
                              </span>
                              </div>
                              <div class="styleForMobile">
                                  <div class="infoCard c-halfText m0">
                                      <span class="sect">Min/Max Guests:</span>
                                      <span class="sect s2"><?= $tours_result_array[$i]['costing_array'][$j]['min_pax'].'-'.$tours_result_array[$i]['costing_array'][$j]['max_pax']?></span>
                                  </div>
                              </div>
                          </div>
                        
                          <?php if($org_cost != 0 && $org_cost != $room_cost){ ?>
                          <div class="gridItem">
                            <div class="infoCard m0">
                              <div class="M-infoCard">
                                <span class="infoCard_label">OLD PRICE</span>
                                <div class="infoCard_price strike">
                                  <span class="p_currency currency-icon"></span>
                                  <span class="p_cost tours-orgcurrency-price"><?= $org_cost ?></span>
                                  <span class="c-hide tours-orgcurrency-id"><?= $h_currency_id ?></span>
                                </div>
                                <span class="infoCard_priceTax">(exclusive of all taxes)</span>
                              </div>
                            </div>
                          </div>
                          <?php } ?>

                          <div class="gridItem">
                            <div class="infoCard m0">
                              <div class="M-infoCard">
                                <span class="infoCard_label">New Price</span>
                                <div class="infoCard_price">
                                  <span class="p_currency currency-icon"></span>
                                  <span class="p_cost tours-currency-price"><?= $room_cost ?></span>
                                  <span class="c-hide tours-currency-id"><?= $h_currency_id ?></span>
                                </div>
                                <span class="infoCard_priceTax">(exclusive of all taxes)</span>
                              </div>
                            </div>
                          </div>
                      </div>
                    </label>
                    <!-- *** Type Card Info End *** -->
                  </div>
                </div>
                <!-- ***** Type List Card End ***** -->
              <?php } ?>
            </div>
            <!-- **** Tab costing End **** -->

            <!-- **** Tab itenary **** -->
            <div class="tab-pane fade show active" id="itinerary-tab<?= $tours_result_array[$i]['package_id']?>" role="tabpanel" aria-labelledby="itinerary-tab">

              <!-- **** Day Info List **** -->
              <div class="c-cardListInfo">
                <div class="cardListInfo-row">
                  <!-- **** List **** -->
                  <?php for($pi=0;$pi<sizeof($tours_result_array[$i]['program_array']);$pi++){ ?>
                    <div class="ListInfo-col">

                      <div class="dayCount">
                        <span class="s1">DAY</span>
                        <span class="s2"><?= ($pi+1) ?></span>
                      </div>

                      <div class="dayInfo">
                        <h5 class="h1"><?= $tours_result_array[$i]['program_array'][$pi]['attraction'] ?></h5>
                        <span class="staticText">
                          <?= $tours_result_array[$i]['program_array'][$pi]['day_wise_program'] ?>
                        </span>
                        <div class="itemList">
                          <span class="item">
                            <i class="icon it itours-bed"></i>
                            <?= $tours_result_array[$i]['program_array'][$pi]['stay'] ?>
                          </span>
                          <?php if($tours_result_array[$i]['program_array'][$pi]['meal_plan']!=''){ ?>
                            <span class="item">
                              <i class="icon it itours-cutlery"></i>
                              <?= $tours_result_array[$i]['program_array'][$pi]['meal_plan'] ?>
                            </span>
                          <?php } ?>
                        </div>
                      </div>

                    </div>
                  <?php } ?>
                  <!-- **** List End **** -->
                </div>
              </div>
              <!-- **** Day Info List **** -->
            </div>
            <!-- **** Tab itenary End **** -->

            <!-- **** Tab Tours Car **** -->
            <div class="tab-pane fade" id="travel-tab<?= $tours_result_array[$i]['package_id']?>" role="tabpanel" aria-labelledby="travel-tab">
                <!-- **** Tab Hotel Car **** -->
                  <div class="clearfix m20-btm">
                    <div class="row">
                      <div class="col-12 m20-btm">
                        <h3 class="c-heading">
                          Hotel Details
                        </h3>
                        <?php
                        for($hotel_i = 0;$hotel_i < sizeof($tours_result_array[$i]['hotels_array']);$hotel_i++){
                          ?>
                        <!-- *** Hotel Card Info *** -->
                        <div class="c-cardListHolder">
                          <div class="c-cardListTable type-3">

                            <div class="cardList-info">
                              <div class="flexGrid">
                                <div class="gridItem">
                                  <div class="infoCard">
                                    <span class="infoCard_price"><?= $tours_result_array[$i]['hotels_array'][$hotel_i]['hotel']?></span>
                                    <span class="infoCard_data"><?= $tours_result_array[$i]['hotels_array'][$hotel_i]['city']?></span>
                                  </div>
                                </div>

                                <div class="gridItem">
                                  <div class="infoCard c-halfText m0">
                                    <span class="infoCard_label">Hotel Category</span>
                                    <span class="infoCard_price"><?= $tours_result_array[$i]['hotels_array'][$hotel_i]['hotel_type']?></span>
                                  </div>
                                </div>

                                <div class="gridItem styleForMobile M-m0">
                                  <div class="infoCard m5-btm">
                                    <span class="infoCard_label">Stay Duration</span>
                                    <span class="infoCard_price"><?= $tours_result_array[$i]['hotels_array'][$hotel_i]['nights']?> Nights</span>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                        <!-- *** Hotel Card Info End *** -->
                        <?php } ?>

                      </div>

                      <?php
                      $tours_result_array[$i]['transport_array'] = ($tours_result_array[$i]['transport_array'] != '') ? $tours_result_array[$i]['transport_array'] : [];
                      if(sizeof($tours_result_array[$i]['transport_array'])>0){ ?>
                      <div class="col-12 m20-btm">
                        <h3 class="c-heading">
                          Transport Details
                        </h3>
                        <?php
                        for($tr_i = 0;$tr_i < sizeof($tours_result_array[$i]['transport_array']);$tr_i++){ ?>
                          <div class="c-cardListHolder">
                            <div class="c-cardListTable type-3">
  
                              <div class="cardList-info">
                                <div class="flexGrid">
                                  <div class="gridItem">
                                    <div class="infoCard">
                                      <span class="infoCard_label">Vehicle name</span>
                                      <span class="infoCard_price"><?= $tours_result_array[$i]['transport_array'][$tr_i]['vehicle']?></span>
                                    </div>
                                  </div>
  
                                  <div class="gridItem">
                                    <div class="infoCard c-halfText m0">
                                      <span class="infoCard_label">Pickup Location</span>
                                      <span class="infoCard_price"><?= $tours_result_array[$i]['transport_array'][$tr_i]['pickup']?></span>
                                    </div>
                                  </div>
  
                                  <div class="gridItem styleForMobile M-m0">
                                    <div class="infoCard m5-btm">
                                      <span class="infoCard_label">Drop Location</span>
                                      <span class="infoCard_price"><?= $tours_result_array[$i]['transport_array'][$tr_i]['drop'] ?></span>
                                    </div>
                                  </div>
                                </div>
                              </div>
  
                            </div>
                          </div>
                        <?php } ?>
                      </div>
                      <?php } ?>
                    </div>

                  </div>
                <!-- **** Tab Hotel Car End **** -->
            </div>
            <!-- **** Tab Tours Car End **** -->
            <!-- **** Tab Policies **** -->
            <div class="tab-pane fade" id="inclusion-tab<?= $tours_result_array[$i]['package_id']?>" role="tabpanel" aria-labelledby="inclusion-tab">
              <!-- **** Policies List **** -->
              <div class="clearfix margin20-bottom">
                <?php if($tours_result_array[$i]['inclusions'] != ''){?>
                <h3 class="c-heading">
                  Inclusions
                </h3>
                <div class="custom_texteditor">
                    <?= $tours_result_array[$i]['inclusions']?>
                </div>
                <?php } ?>
                <?php if($tours_result_array[$i]['inclusions'] != ''){?>
                <h3 class="c-heading">
                  Exclusions
                </h3>
                <div class="custom_texteditor">
                <?= $tours_result_array[$i]['exclusions']?>
                </div>
                <?php } ?>
                <?php if($tours_result_array[$i]['terms_condition'] != ''){?>
                <h3 class="c-heading">
                  Terms & Conditions
                </h3>
                <div class="custom_texteditor">
                <?= $tours_result_array[$i]['terms_condition']?>
                </div>
                <?php } ?>
                <?php if($tours_result_array[$i]['note'] != ''){?>
                <h3 class="c-heading">
                  Note
                </h3>
                <div class="custom_texteditor" id="note"><?= $tours_result_array[$i]['note']?></div>
                <?php } ?>
              </div>
              <!-- **** Policies List End **** -->
            </div>
            <!-- **** Tab Policies End **** -->

            <div class="clearfix text-right">
              <button class="c-button md" id='<?=$tours_result_array[$i]['package_id']?>' onclick='redirect_to_action_page("<?= $tours_result_array[$i]["package_id"]?>","1",<?= json_encode($package_type_arr)?>,<?=$adult_count?>,<?=$child_wocount?>,<?=$child_wicount?>,<?=$extra_bed_count?>,<?=$infant_count?>,"<?=$travel_date?>")'><i class="fa fa-phone-square" aria-hidden="true"></i>  Enquiry</button>
              <button class="c-button g-button md" id='<?=$tours_result_array[$i]['package_id']?>' onclick='redirect_to_action_page("<?= $tours_result_array[$i]["package_id"]?>","1",<?= json_encode($package_type_arr)?>,<?=$adult_count?>,<?=$child_wocount?>,<?=$child_wicount?>,<?=$extra_bed_count?>,<?=$infant_count?>,"<?=$travel_date?>")'><i class="fa fa-address-book" aria-hidden="true"></i>  Book</button>
            </div>
            
          </div>
        </div>
        <!-- ***** Tours Info Tabs End***** -->
      </div>
    </div>
    <!-- *** Tours Details Accordian End *** -->
  </div>
  <!-- ***** Tours Card End ***** -->
            
    <?php
    }
} //Activity arrays for loop
?>
<script>
$(document).ready(function () {

    clearTimeout(b);
    var b = setTimeout(function() {

      var amount_list = document.querySelectorAll(".tours-currency-price");
      var amount_id = document.querySelectorAll(".tours-currency-id");

      var orgamount_list = document.querySelectorAll(".tours-orgcurrency-price");
      var orgamount_id = document.querySelectorAll(".tours-orgcurrency-id");
      
      var amount_list1 = document.querySelectorAll(".best-currency-price");
      var amount_id1 = document.querySelectorAll(".best-currency-id");

      var orgamount_list1 = document.querySelectorAll(".best-tours-orgamount");
      var orgamount_id1 = document.querySelectorAll(".best-tours-orgcurrency-id");

      // var adult_price_list = document.querySelectorAll(".adult_cost-currency-price");
      // var adult_price_cid = document.querySelectorAll(".adult-currency-id");

      // var childwo_price_list = document.querySelectorAll(".childwo_cost-currency-price");
      // var childwo_price_cid = document.querySelectorAll(".childwo-currency-id");

      // var childwi_price_list = document.querySelectorAll(".childwi_cost-currency-price");
      // var childwi_price_cid = document.querySelectorAll(".childwi-currency-id");

      // var extrabed_price_list = document.querySelectorAll(".extrabed-currency-price");
      // var extrabed_price_id = document.querySelectorAll(".extrabed-currency-id");
      
      // var infant_price_list = document.querySelectorAll(".infant_cost-currency-price");
      // var infant_price_id = document.querySelectorAll(".infant-currency-id");

      //Tours Cost
      var amount_arr = [];
      for(var i=0;i<amount_list.length;i++){
        amount_arr.push({
            'amount':amount_list[i].innerHTML,
            'id':amount_id[i].innerHTML});
      }
      sessionStorage.setItem('tours_amount_list',JSON.stringify(amount_arr));

      //Tours Org Cost
      var org_amount_arr = [];
      for(var i=0;i<orgamount_list.length;i++){
        org_amount_arr.push({
            'amount':orgamount_list[i].innerHTML,
            'id':orgamount_id[i].innerHTML});
      }
      sessionStorage.setItem('tours_orgamount_list',JSON.stringify(org_amount_arr));

      //Tours Best Cost
      var amount_arr1 = [];
      for(var i=0;i<amount_list1.length;i++){
        amount_arr1.push({
            'amount':amount_list1[i].innerHTML,
            'id':amount_id1[i].innerHTML});
      }
      sessionStorage.setItem('tours_best_amount_list',JSON.stringify(amount_arr1));

      //Tours best Org Cost
      var org_amount_arr1 = [];
      for(var i=0;i<orgamount_list1.length;i++){
        org_amount_arr1.push({
            'amount':orgamount_list1[i].innerHTML,
            'id':orgamount_id1[i].innerHTML});
      }
      sessionStorage.setItem('tours_best_orgamount_list',JSON.stringify(org_amount_arr1));
      var current_page_url = document.URL;
      tours_page_currencies(current_page_url);
    },500);
});
</script>