<?php

include 'config.php';

//Include header

include 'layouts/header.php';
$_SESSION['page_type'] = 'terms';

$terms_cond = $cached_array[0]->cms_data[0]->terms_of_use;

?>

<div class="c-pageTitleSect">

    <div class="container">

        <div class="row">

            <div class="col-md-7 col-12">

                <!-- *** Search Head **** -->

                <div class="searchHeading">

                <span class="pageTitle m0">Terms Of Use</span>

                </div>

                <!-- *** Search Head End **** -->

            </div>



            <div class="col-md-5 col-12 c-breadcrumbs">

                <ul>

                <li>

                    <a href="<?= BASE_URL_B2C ?>">Home</a>

                </li>

                <li class="st-active">

                    <a href="javascript:void(0)">Terms and Conditions</a>

                </li>

                </ul>

            </div>

        </div>

    </div>

</div>

<!-- ********** Component :: Page Title End ********** -->

<div class='c-containerDark clearfix'>

    <div class="container">

        <div class="row">

            <div class="col-12">

            <div class="custom_texteditor"><?= $terms_cond ?></div>

            </div>

        </div>

    </div>

</div>

<?php

include 'layouts/footer.php';

?>