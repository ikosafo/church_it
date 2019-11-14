<?php include('../config.php');

if (!isset($_SESSION['emailaddress'])) {
    header("location:login");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/styles.php') ?>
</head>
<body>
<!-- START APP WRAPPER -->
<div id="app">
    <!-- END MENU SIDEBAR WRAPPER -->
    <div class="content-wrapper">
        <!-- START LOGO WRAPPER -->
        <?php include('includes/navbar.php') ?>
        <!-- END TOP TOOLBAR WRAPPER -->
        <div class="content">
            <!--START PAGE HEADER -->

            <!--END PAGE HEADER -->
            <!--START PAGE CONTENT -->
            <section class="page-content container-fluid">


                <div class="row">

                    <div class="col-12">

                        <div class="card">
                            <div id="success_loc"></div>
                            <div id="error_loc"></div>
                            <h5 class="card-header">Login Account Details</h5>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Select Year</label>
                                            <input type="text" id="select_year"
                                                   class="form-control"
                                                   placeholder="Select Year"
                                                   data-date-format="yyyy" autocomplete="off">
                                        </div>
                                    </div>

                                </div>

                                <hr/>

                                <div class="row">
                                    <div class="col-md-12">

                                        <div id="accounts_table_div"></div>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


            </section>
            <!--END PAGE CONTENT -->
        </div>
        <!-- SIDEBAR QUICK PANNEL WRAPPER -->

        <!-- END SIDEBAR QUICK PANNEL WRAPPER -->
    </div>
</div>
<!-- END CONTENT WRAPPER -->
<!-- ================== GLOBAL VENDOR SCRIPTS ==================-->
<?php include('includes/scripts.php') ?>

<script>
    $('#select_year').datepicker({
        format: 'yyyy',
        autoclose: true,
        orientation: "bottom",
        viewMode: "years",
        minViewMode: "years",
        templates: {
            leftArrow: '<i class="icon dripicons-chevron-left"></i>',
            rightArrow: '<i class="icon dripicons-chevron-right"></i>'
        }
    });
</script>


<script>

    $('.year-picker').datepicker({
        minViewMode: 2,
        format: 'yyyy'
    });

    $("#select_year").change(function () {
        var year_search = $("#select_year").val();
        $.ajax({
            type: "POST",
            url: "ajax/tables/accounts_table.php",
            beforeSend: function () {
                $.blockUI({
                    message: '<img src="../assets/img/wait.gif" style="border:0 !important"/>'
                });
            },
            data: {
                year_search: year_search
            },
            success: function (text) {
                $('#accounts_table_div').html(text);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            },
            complete: function () {
                $.unblockUI();
            },

        });
    });

</script>
</body>
</html>
