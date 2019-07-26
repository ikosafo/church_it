<?php include ('../../../config.php');

$dep = $mysqli->query("select * from document ORDER by period_uploaded");


?>

<div class="card">

    <h5 class="card-header">Details <strong>

        </strong></h5>
    <div class="card-body">

        <table id="bs4-table" class="table table-striped table-bordered"
               style="width:100% !important;">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>File</th>
                <th>Delete</th>

            </tr>
            </thead>
            <tbody>

            <?php
            while ($resdep = $dep->fetch_assoc()) {


                ?>
                <tr>
                    <td><?php echo $resdep['document_title']; ?></td>
                    <td><?php echo $resdep['document_description']; ?></td>
                    <td>

                        <div>

                            <?php $document_id = $resdep['document_id']; ?>

                            <button type="button"
                                    class="btn btn-sm btn-success view_button"
                                    file_index="<?php echo $resdep['document_id']; ?>"
                                    data-toggle="modal" data-target=".bd-example-modal-lg">
                                Click to View Documents
                            </button>

                            <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                                 aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalTitle2">
                                                View Documents
                                            </h5>
                                            <button type="button" class="close"
                                                    data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true" class="zmdi zmdi-close"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body" style="height: 520px;overflow-y: scroll">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary btn-outline"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </td>

                    <td>

                        <button type="button"
                                data-type="confirm"
                                class="btn btn-sm btn-danger js-sweetalert delete_document"
                                i_index="<?php echo $resdep['document_id']; ?>"
                                title="Delete">
                            <i class="icon-trash" style="color:#fff !important;"></i>
                        </button>

                    </td>




                </tr>

                <?php
            }
            ?>
            </tbody>
            <tfoot>

        </table>


    </div>



</div>

<script>
    $('#bs4-table').DataTable({
        aaSorting: [],
        dom: 'Bfrtip'
    });



    $(document).on('click', '.delete_document', function () {
        var i_index = $(this).attr('i_index');

        //alert(i_index);

        swal({
                title: "Do you want to delete this?",
                text: "You will not be able to recover this data!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {

                    $.ajax({
                        type: "POST",
                        url: "ajax/queries/delete_document.php",
                        data: {
                            i_index: i_index
                        },
                        dataType: "html",

                        success: function (text) {

                            $.ajax({
                                type: "POST",
                                url: "ajax/tables/document_table.php",
                                beforeSend: function () {
                                    $.blockUI({
                                        message: '<img src="assets/img/load.gif"/>'
                                    });
                                },
                                success: function (text) {
                                    $('#document_table_div').html(text);
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    alert(xhr.status + " " + thrownError);
                                },
                                complete: function () {
                                    $.unblockUI();
                                },

                            });

                        },

                        complete: function () {

                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            alert(xhr.status + " " + thrownError);
                        }
                    });

                    swal("Deleted!", "Document has been deleted.", "success");

                } else {
                    swal("Cancelled", "Data is safe.", "error");
                }
            });


    });





    $(document).on('click', '.view_button', function () {
        var file_id= $(this).attr('file_index');
        //alert(file_id);

        $.ajax({
            type: "POST",
            url: "ajax/forms/view_document.php",
            data: {
                file_id: file_id
            },
            dataType: "html",

            success: function (text) {
                $('.modal-body').html(text);
            },
            complete: function () {

            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " " + thrownError);
            }
        });

    });

</script>

