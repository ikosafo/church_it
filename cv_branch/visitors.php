<?php require ('includes/header.php')?>

<!--START PAGE CONTENT -->
<section class="page-content container-fluid">

    <div class="mr-auto">
        <ul class="actions top-right">
            <li>
                <a href="javascript:void(0)" class="btn btn-primary btn-floating">
                    MANAGE VISITORS
                </a>
            </li>
        </ul>
    </div>

    <hr/>

    <div class="row">
        <div class="col-md-4 col-sm-12">
            <div id="visitor_form_div"></div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div id="visitor_table_div"></div>
        </div>
    </div>

</section>

<?php require ('includes/footer.php')?>


<script>


    $.ajax({
        url: "ajax/forms/visitor_form.php",
        beforeSend: function () {
            $.blockUI({
                message: '<img src="assets/img/load.gif" />'
            });
        },

        success: function (text) {
            $('#visitor_form_div').html(text);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
        },
        complete: function () {
            $.unblockUI();
        },

    });


    $.ajax({
        url: "ajax/tables/visitor_table.php",
        beforeSend: function () {
            $.blockUI({
                message: '<img src="assets/img/load.gif" />'
            });
        },

        success: function (text) {
            $('#visitor_table_div').html(text);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status + " " + thrownError);
        },
        complete: function () {
            $.unblockUI();
        },

    });


</script>
