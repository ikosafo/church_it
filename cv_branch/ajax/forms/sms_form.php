<?php

include('../../../config.php');

$smsid = date("ymdhis").rand(1,10000);

?>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-header">Send SMS</h5>
            <div class="card-body">

                <form>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Group</label>
                        <input type="text" class="form-control" id="group" readonly
                               value="All Members">
                    </div>

                    <div class="form-group">
                        <label for="demoTextInput1">Message</label>
                        <textarea type="text" class="form-control" id="message" rows="15"
                                  placeholder="Enter Enter Message"></textarea>
                    </div>

                    <div class="form-group">
                        <button style="margin-top: 20px" type="button" class="btn btn-primary"
                                id="savesms"><i class="la la-save" style="color: #fff"></i> Save
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<script>

    $("#savesms").click(function () {

        alert('hi');

        var group = $("#group").val();
        var message = $("#message").val();
        var sms_id = '<?php echo $smsid; ?>';

        //alert(sms_name);

        var error = '';


        if (me'' == "") {
            error += 'Please enter message \n';
            $('#message').focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/saveform_sms.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif"/>'
                    });
                },
                data: {

                    sms_key: sms_key,
                    key_id: key_id
                },
                success: function (text) {

                    //alert(text);

                    if (text == 1 || text == 3) {

                        $.notify("Key Saved", "success", {position: "top center"});

                        $.ajax({
                            type: "POST",
                            url: "ajax/forms/sms_form.php",
                            beforeSend: function () {
                                $.blockUI({
                                    message: '<img src="assets/img/load.gif"/>'
                                });
                            },
                            success: function (text) {
                                $('#sms_form_div').html(text);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            },
                            complete: function () {
                                $.unblockUI();
                            },

                        });


                        $.ajax({
                            type: "POST",
                            url: "ajax/tables/sms_table.php",
                            beforeSend: function () {
                                $.blockUI({
                                    message: '<img src="assets/img/load.gif"/>'
                                });
                            },
                            success: function (text) {
                                $('#sms_table_div').html(text);
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                alert(xhr.status + " " + thrownError);
                            },
                            complete: function () {
                                $.unblockUI();
                            },

                        });

                    }

                    else if (text == 2 || text == 4) {

                        $.notify("Key already exists,", {position: "top center"});

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

            $.notify(error, {position: "top center"});

        }

        return false;

    });

</script>