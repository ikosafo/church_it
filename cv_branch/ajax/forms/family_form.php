<?php include("../../../config.php");

$memberid = $_POST['member_id'];

?>

<style>

    .buttonwrapper {
        display:inline-block;
    }

</style>

<script>
    function SelectFather(val) {
        var element = document.getElementById('divfather');
        if (val == 'Yes')
            element.style.display = 'block';
        else
            element.style.display = 'none';
    }

    function SelectMother(val) {
        var element = document.getElementById('divmother');
        if (val == 'Yes')
            element.style.display = 'block';
        else
            element.style.display = 'none';
    }

    function SelectSpouse(val) {
        var element = document.getElementById('divspouse');
        if (val == 'Married')
            element.style.display = 'block';
        else
            element.style.display = 'none';
    }

    function SelectChildren(val) {
        var element = document.getElementById('divchildren');
        if (val == 'Yes')
            element.style.display = 'block';
        else
            element.style.display = 'none';
    }
</script>

<div id="success_loc"></div>
<div id="error_loc"></div>
<h5 class="card-header">Field with * are required</h5>
<form name="educbus_form" method="post" autocomplete="off">
    <div class="card-body">

        <div class="row">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="marital_status">Marital Status *</label>

                    <select id="marital_status" style="width: 100%" onchange='SelectSpouse(this.value);'>

                        <option value="">Select</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Separated">Separated</option>
                        <option value="Engaged">Engaged</option>
                    </select>
                </div>

                <div class="form-group">
                    <div id="divspouse" style="display: none">
                        <label for="spouse">Name of Spouse</label>
                        <input type="text" class="form-control" id="spouse"
                               placeholder="Enter name of spouse">

                    </div>
                </div>


                <div class="form-group">
                    <label for="father_alive">Is your father alive? *</label>
                    <select id="father_alive" style="width: 100%" onchange='SelectFather(this.value);'>

                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <div id="divfather" style="display: none">
                        <label for="father">Name of Father</label>
                        <input type="text" class="form-control" id="father"
                               placeholder="Enter name of father">

                    </div>
                </div>


            </div>

            <div class="col-md-4">


                <div class="form-group">
                    <label for="mother_alive">Is your mother alive? *</label>
                    <select id="mother_alive" style="width: 100%" onchange='SelectMother(this.value);'>

                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <div id="divmother" style="display: none">
                        <label for="mother">Name of Mother</label>
                        <input type="text" class="form-control" id="mother"
                               placeholder="Enter name of mother">

                    </div>
                </div>


                <div class="form-group">
                    <label for="have_children">Do you have children? *</label>
                    <select id="have_children" style="width: 100%" onchange='SelectChildren(this.value);'>

                        <option value="">Select</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>


            </div>


            <div class="col-md-4">
                <div class="form-group">
                    <div id="divchildren" style="display: none">
                        <label for="child_name">Name of Child</label>
                        <div class="input-group mb-3">
                            <input type="text" id="child_name" class="form-control"
                                   placeholder="Enter name of child">
                            <div class="input-group-append">
                                <button class="btn btn-primary" id="savechild" type="button">Add</button>
                            </div>
                        </div>


                        <div id="child_table_div"></div>


                    </div>
                </div>


            </div>

        </div>


    </div>


</form>


<div class="bg-light">

    <button type="button" style="float: right" class="btn btn-primary" id="save_family">Save and Continue
    </button>

</div>


<script>

    $("#marital_status").selectize();
    $("#father_alive").selectize();
    $("#mother_alive").selectize();
    $("#have_children").selectize();


    //Move to Education and Business
    $("#previous_educbus").click(function () {

        $("#member_form a[href='#educbus']").tab('show');
        $('#educbus-id').removeClass('educbus-class');
        $('#educbus-id').addClass('educbus-change');


    });



    $("#save_family").click(function () {

        var member_id = '<?php echo $memberid; ?>';
        var marital_status = $("#marital_status").val();
        var spouse = $("#spouse").val();
        var father_alive = $("#father_alive").val();
        var father = $("#father").val();
        var mother_alive = $("#mother_alive").val();
        var mother = $("#mother").val();
        var have_children = $("#have_children").val();

        //alert(member_id);

        var error = '';


        if (marital_status == "") {
            error += 'Please select marital status \n';
        }

        if (marital_status == "Married" && spouse == "") {
            error += 'Please enter name of spouse \n';
            $("#spouse").focus();
        }

        if (father_alive == "") {
            error += 'Please select status of father \n';
        }

        if (father_alive == "Yes" && father == "") {
            error += 'Please enter name of father \n';
            $("#father").focus();
        }

        if (mother_alive == "") {
            error += 'Please select status of mother \n';
        }

        if (mother_alive == "Yes" && mother == "") {
            error += 'Please enter name of mother \n';
            $("#mother").focus();
        }

        if (have_children == "") {
            error += 'Please select number of children \n';
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/save_family.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif" />'
                    });
                },
                data: {

                    member_id: member_id,
                    marital_status: marital_status,
                    spouse: spouse,
                    father_alive: father_alive,
                    father: father,
                    mother_alive: mother_alive,
                    mother: mother,
                    have_children: have_children

                },
                success: function (text) {

                    //alert(text);

                    $.notify("Family Details Saved", "success", {position: "top center"});

                    $("#member_form a[href='#ministry']").tab('show');
                    $('#ministry-id').removeClass('ministry-class');
                    $('#ministry-id').addClass('ministry-change');


                    $.ajax({
                        type: "POST",
                        url: "ajax/forms/memministry_form.php",
                        data: {member_id: member_id},
                        success: function (text) {
                            $('#ministry_form_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },

                    });


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







    $("#savechild").click(function () {

        var member_id = '<?php echo $memberid; ?>';
        var child_name = $("#child_name").val();


        //alert(member_id);

        var error = '';


        if (child_name == "") {
            error += "Please enter child's name \n";
            $("#child_name").focus();
        }


        if (error == "") {


            $.ajax({
                type: "POST",
                url: "ajax/queries/save_child.php",
                beforeSend: function () {
                    $.blockUI({
                        message: '<img src="assets/img/load.gif" />'
                    });
                },
                data: {

                    member_id: member_id,
                    child_name: child_name

                },
                success: function (text) {

                    //alert(text);

                    $.notify("Child Saved", "success", {position: "top center"});
                    $("#child_name").val(" ")


                    $.ajax({
                        type: "POST",
                        url: "ajax/tables/child_table.php",
                        data: {
                            member_id: member_id
                        },
                        success: function (text) {
                            $('#child_table_div').html(text);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        },

                    });


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
