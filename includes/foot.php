
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">&copy; 2023 Visitor Tbs</a></li>
                    <li class="list-inline-item"><a href="terms.php">Terms of Use</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>





<!-- jQuery -->
<script src="../assets/js/jquery-3.2.1.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>

<!-- Slimscroll JS -->
<script src="../assets/js/jquery.slimscroll.min.js"></script>

<!-- Chart JS -->
<script src="../assets/plugins/morris/morris.min.js"></script>
<script src="../assets/plugins/raphael/raphael.min.js"></script>
<script src="../assets/js/chart.js"></script>

<!-- Custom JS -->
<script src="../assets/js/app.js"></script>

<!-- Form Validation JS -->
<script src="../assets/js/form-validation.js"></script>

<!-- Select2 JS -->
<script src="../assets/js/select2.min.js"></script>

<!-- Datatable JS -->

<!-- <script src="../assets/plugins/DataTables/datatables.min.js"></script> -->
<script src="../assets/js/jquery.dataTables.min.js"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js"></script>

<!-- Task JS -->
<script src="../assets/js/task.js"></script>

<!-- Task JS -->
<script src="../assets/js/mask.js"></script>

<!-- Tagsinput JS -->
<script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

<!-- Datetimepicker JS -->
<script src="../assets/js/moment.min.js"></script>
<script src="../assets/js/bootstrap-datetimepicker.min.js"></script>

<script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>


<script>
    function checkAvailability() 
    {
        $("#loaderIcon").show();
        jQuery.ajax(
        {
            url: "check_availability.php",
            data:'emailid='+$("#emailid").val(),
            type: "POST",
            success:function(data)
            {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();

            },error:function (){

            }}); }
        </script>

        <script>
            function checkAvailability2() 
            {
                $("#loaderIcon").show();
                jQuery.ajax(
                {
                    url: "check_availability.php",
                    data:'pf_no='+$("#pf_no").val(),
                    type: "POST",
                    success:function(data)
                    {
                        $("#user-availability-status2").html(data);
                        $("#loaderIcon").hide();
                    },error:function (){


                    }});}
                </script>

                <script>
                    function checkAvailability3()
                    {
                        if(document.signup.password.value!= document.signup.cpassword.value)
                        {
                            alert("Password and Confirm Password Field do not match  !!");
                            document.signup.cpassword.focus();
                            return false;
                        }
                        return true;}
                    </script>

                    <script>
                        function checkAvailability4() 
                        {
                            $("#loaderIcon").show();
                            jQuery.ajax(
                            {
                                url: "check_availability.php",
                                data:'mobileid='+$("#mobileid").val(),
                                type: "POST",
                                success:function(data)
                                {
                                    $("#user-availability-status4").html(data);
                                    $("#loaderIcon").hide();
                                },error:function (){


                                }});}
                            </script>

                            <script>
                                function checkAvailability5() 
                                {

                                    jQuery.ajax(
                                    {
                                        url: "check_availability.php",
                                        data:'region_name='+$("#region_name").val(),
                                        type: "POST",
                                        success:function(data)
                                        {
                                            $("#user-availability-status5").html(data);
                                            $("#loaderIcon").hide();
                                        },error:function (){


                                        }});}
                                    </script>
                                    <script>
                                        function checkAvailability6() 
                                        {

                                            jQuery.ajax(
                                            {
                                                url: "check_availability.php",
                                                data:'postal_code='+$("#postal_code").val(),
                                                type: "POST",
                                                success:function(data)
                                                {
                                                    $("#user-availability-status6").html(data);
                                                    $("#loaderIcon").hide();
                                                },error:function (){


                                                }});}
                                            </script>
                                            <script>
                                                function checkAvailability7() 
                                                {
                                                    $("#loaderIcon").show();
                                                    jQuery.ajax(
                                                    {
                                                        url: "check_availability.php",
                                                        data:'region_update='+$("#region_update").val(),
                                                        type: "POST",
                                                        success:function(data)
                                                        {
                                                            $("#user-availability-status7").html(data);
                                                            $("#loaderIcon").hide();
                                                        },error:function (){


                                                        }});}
                                                    </script>      
                                                    <script>
                                                        function checkAvailability8() 
                                                        {
                                                            $("#loaderIcon").show();
                                                            jQuery.ajax(
                                                            {
                                                                url: "check_availability.php",
                                                                data:'postal_update='+$("#postal_update").val(),
                                                                type: "POST",
                                                                success:function(data)
                                                                {
                                                                    $("#user-availability-status8").html(data);
                                                                    $("#loaderIcon").hide();
                                                                },error:function (){


                                                                }});}
                                                            </script>                              




                                                            <script type="text/javascript">
                                                                $(document).ready(function(){
                                                                    $(document).on('click','.edit_office',function()
                                                                    {
                                                                        var btn btn-primary btn-sm=$(this).attr('id');
                                                                        $.ajax(
                                                                        {
                                                                            url:"update_office.php",
                                                                            type:"post",
                                                                            data:{edit_office:edit_office},

                                                                            success:function(data)
                                                                            {
                                                                                $("#edit_office").html(data);
                                                                                $("#edit_office").modal('show');
                                                                            }

                                                                        });
                                                                    });
                                                                });
                                                            </script>






<!-- 
     <script type="text/javascript" language="javascript" src="../assets/js/script/jquery79.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/script/jquery.dataTables.man.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/script/dataTables.buttons.man.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/script/jszip.man.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/script/pdfmake/pdfmake.man.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/script/vfs_fontsy.js"></script>
    <script type="text/javascript" language="javascript" src="../assets/js/script/buttons.html5.man.js"></script>
-->

<script type="text/javascript" class="init">

    $(document).ready(function() {
        $('#active-visitor').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
                'excelHtml5',
            // 'csvHtml5',
                'pdfHtml5'
                ]
        } );
    } );



</script>

<script type="text/javascript" class="init">

    $(document).ready(function() {
        $('#visitor-logs').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
                'excelHtml5',
            // 'csvHtml5',
                'pdfHtml5'
                ]
        } );
    } );



</script>

<script type="text/javascript" class="init">

    $(document).ready(function() {
        $('#visitorsu').DataTable( {

            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
                'excelHtml5',
            // 'csvHtml5',
                'pdf'
                ]
        } );
    } );



</script>

<script type="text/javascript" class="init">

    $(document).ready(function() {
        $('#view-visitor').DataTable( {

            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
                'excelHtml5',
            // 'csvHtml5',
                'pdf'
                ],
            "title":"Test Title"
        } );
    } );



</script>


<script type="text/javascript" class="init">

    $(document).ready(function() {
        $('#kagua').DataTable( {

            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
                'excelHtml5',
            // 'csvHtml5',
                'pdf'
                ]
        } );
    } );

</script>

<script type="text/javascript" class="init">

    $(document).ready(function() {
        $('#view-users').DataTable( {

            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
                'excelHtml5',
            // 'csvHtml5',
                'pdf'
                ],
            "title":"Test Title"
        } );
    } );



</script>

<script type="text/javascript" class="init">

    $(document).ready(function() {
        $('#grace').DataTable( {

            dom: 'Bfrtip',
            buttons: [
            // 'copyHtml5',
                'excelHtml5',
            // 'csvHtml5',
                'pdf'
                ],
            "title":"Test Title"
        } );
    } );



</script>

<!-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5f.1.js"></script> -->
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="../assets/js/select2/select2.full.min.js"></script>
<script src="../assets/js/select2/select2-active.js"></script>
 <script src="../assets/js/pages/demo.toastr.js"></script>



