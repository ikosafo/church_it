<?php include("../../../config.php"); ?>



<div class="card">
    <div id="success_loc"></div>
    <div id="error_loc"></div>
    <h5 class="card-header">Add Tithe Record</h5>
    <form name="branch_form" method="post" autocomplete="off">
        <div class="card-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Date Paid</label>
                <input type="text" class="form-control" id="date_paid"
                       placeholder="Select Date" value="<?php echo date("Y-m-d"); ?>">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Member Name</label>
                <input type="text" class="form-control" id="member_name" placeholder="Select Member">
                <input type="hidden" id="memberid"/>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Telephone</label>
                <input type="text" class="form-control" id="telephone" readonly
                       placeholder="Enter telephone" onkeypress="return isNumber(event);">
            </div>

            Tithe payment for

            <hr/>


            <div class="form-group">
                <label for="exampleInputEmail1">Year - Month</label>
                <input type="text" class="form-control" id="year_month"
                       placeholder="Select Month">
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">Week</label>
                <select id="week">
                    <option value="">Select</option>

                    <option value="Week 1">Week 1</option>
                    <option value="Week 2">Week 2</option>
                    <option value="Week 3">Week 3</option>
                    <option value="Week 4">Week 4</option>
                    <option value="Week 5">Week 5</option>

                </select>
            </div>


        </div>
        <div class="card-footer bg-light">
            <button type="button" class="btn btn-primary" id="save_tithe">Submit</button>
            <button type="button" class="btn btn-secondary clear-form">Clear</button>
        </div>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>






<script>

    $(document).ready(function(){
        $("#member_name").autocomplete({
            source: "ajax/forms/namesearch.php",
            minLength: 1,
            select: function(event, ui) {
                $("#member_name").val(ui.item.value);
                $("#memberid").val(ui.item.id);
            }
        }).data("ui-autocomplete")._renderItem = function( ul, item ) {
            return $( "<li class='ui-autocomplete-row'></li>" )
                .data( "item.autocomplete", item )
                .append( item.label )
                .appendTo( ul );
        };
    });


    $("#year_month").datepicker({

        format: "yyyy-mm",
        startView: "months",
        minViewMode: "months",
        autoclose: true

    });

    $("#date_paid").datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

    $("#week").selectize();


    $("#save_visitor").click(function () {

        var full_name = $("#full_name").val();
        var telephone = $("#telephone").val();
        var residence = $("#residence").val();
        var denomination = $("#denomination").val();
        var hearing_about = $("#hearing_about").val();
        var description = $("#description").val();


        var error = '';

        if (full_name == "") {
            error += 'Please enter full name\n';
            $("#full_name").focus();
        }

        if (telephone == "") {
            error += 'Please enter telephone  \n';
            $("#telephone").focus();
        }

        if (residence == "") {
            error += 'Please enter residence \n';
            $("#residence").focus();
        }

        if (hearing_about == "") {
            error += 'How did you hear about us? \n';
        }

        if (description == "") {
            error += 'Describe how you heard about us \n';
            $("#description").focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/save_visitor.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif" />'
                    });
                },
                data: {

                    full_name: full_name,
                    telephone: telephone,
                    denomination: denomination,
                    residence: residence,
                    hearing_about: hearing_about,
                    description: description

                },
                success: function (text) {

                    //alert(text);

                    if (text == 1) {

                        $('#success_loc').notify("Form submitted", "success");

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


                    } else {

                        $('#error_loc').notify("visitor details already exists", "error");

                    }

                },

                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + " " + thrownError);
                },
                complete: function () {
                    $.unblockUI();
                },

            });


        }
        else {


            $('#error_loc').notify(error);

        }
        return false;


    });


</script>

