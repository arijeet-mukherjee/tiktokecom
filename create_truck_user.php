<?php
session_start();
$_SESSION['page'] = 'Add form view';
if(empty($_SESSION))
{
    header('Location: login.php');
}
include_once('conn.php');
if(isset($_GET['id']))
{
    $id            = $_GET['id'];
    $reference     = $database->getReference('tables/' . $id);
    $snapshot      = $reference->getSnapshot();
    $tabeldata     = $snapshot->getValue();
    $table_records = $tabeldata['count'];
    $table_records+=1;

}
?>

<!DOCTYPE html>
<head>
    <?php include './layout/head.php';?>
</head>

<body>
<?php include './layout/sidebar.php';?>
<!-- Main content -->
<div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include './layout/topnav.php';?>
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Create Record</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                                
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <h3 class="mb-0">Add Truck Users</h3>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-horizontal" >
                            <form action="code.php" method="POST">
                                <div class="form-group">
                                    
                                    <input required type="text" name="uid" class="form-control"  value="<?php echo mt_rand(1999, 99999)?>">

                                    
                                </div>
                                 <div class="form-group">                                
                                        <input required type="text" name="username" class="form-control" placeholder="Enter Owner Name">                           
                                </div>
                                <div class="form-group">                                
                                        <input required type="email" name="mail" class="form-control" placeholder="Enter Mail">                           
                                </div>
                                <div class="form-group">                                
                                        <input required type="number" name="phone" class="form-control" placeholder="Enter Phone Number">                           
                                </div>
                                <h4>Enter Trucks and Driver Details :</h4>
                                <div class="input_fields_wrap form-group" id="newwrapper">
                                    <button class="add_field_button btn btn-sm btn-info btn-icon-only rounded-circle mt-1 text-white">+</button>
                                    <div class="mx-auto mt-2">
                                        <input required type="text" name="truckname[]" class="form-control" placeholder="Enter Truck Name">
                                        <input required type="number" name="truckcapacity[]" class="form-control" placeholder="Enter Truck Capacity">
                                        <input required type="number" name="truckprice[]" class="form-control" placeholder="Enter Truck Price">
                                        <input required type="text" name="trucknumber[]" class="form-control" placeholder="Enter Truck Number">
                                        <input type="text" required name="drivername[]" class="form-control mt-2" placeholder="Enter Driver's Name">
                                        
                                        <input type="number" required name="driverphone[]" class="form-control" placeholder="Enter Driver's Phone Number">
                                    </div>

                                </div>


                                                      
                            
                        </div>
                    </div>
                    <div class="card-footer">

                        <div class="form-group text-center">
                            <button type="submit" id="get-table-data" class="btn btn-success" name="save_push_truck_data">Save</button>
                            <a href="trucks.php" class="btn btn-info">Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <?php include './layout/footer.php';?>
        <script>
                            $(document).ready(function() {
	                        var max_fields      = 10; //maximum input boxes allowed
	                        var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
	                        var add_button      = $(".add_field_button"); //Add button ID

                            
	
	                        var x = 1; //initlal text box count
	                        $(add_button).click(function(e){ //on add input button click
	                    	e.preventDefault();
		                    if(x < max_fields){ //max input box allowed
		                        	x++; //text box increment
		                        	$(wrapper).append('<div class="mt-2"><input required type="text" name="truckname[]" class="form-control" placeholder="Enter Truck Name"/><input type="number" name="truckcapacity[]" required class="form-control" placeholder="Enter Truck Capacity"><input type="number" name="truckprice[]" required class="form-control" placeholder="Enter Truck Price"><input type="text" name="trucknumber[]" class="form-control" required placeholder="Enter Truck Number"><input type="text" required name="drivername[]" class="form-control mt-2" placeholder="Enter Driver Name"><input type="number" name="driverphone[]" class="form-control" required placeholder="Enter Driver Phone Number"><a href="#" class="remove_field">Remove</a></div>'); //add input box
		                                        }
	                            });
	
	                        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	                    	e.preventDefault(); $(this).parent('div').remove(); x--;
                        	})
                            });


                            //////////////////
                    
                            
        </script>
        <script src="./assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

        <script>
            $(document).on('click', '#get-table-data', function () {
                $("#get-table-data").attr("disabled", true);
                var tableData = [];
                var formData = JSON.stringify(jQuery('#fb-render').serializeArray());

                var id = '<?=$id?>';
                var table_records = '<?=$table_records?>';
                tableData.push(table_records);
                tableData.push(id);
                tableData.push(formData);
                $.ajax({
                    type: "POST",
                    url: "save_table_data.php",
                    dataType: 'json',
                    data: {json: JSON.stringify(tableData)},
                    success: function (data) {
                        $("#get-table-data").attr("disabled", false);
                        if (data.code == 200) {
                            swal({
                                title: "Success",
                                text: "Your table is successfully updated!",
                                type: "success",
                                buttonsStyling: !1,
                                confirmButtonClass: "btn btn-success"
                            });
                            setTimeout(function () {
                                window.location = "view_table.php?id=" + id;
                            }, 2000);

                        } else {
                            swal({
                                title: "Oops",
                                text: "Your table is created fail!",
                                type: "error",
                                buttonsStyling: !1,
                                confirmButtonClass: "btn btn-success"
                            });
                            $("#get-table-data").attr("disabled", false);
                        }
                    }
                });
            });

            jQuery(function ($) {
                formRenderOpts = {
                    formData: <?= $tabeldata['definition']?>
                };
                var renderedForm = $('#fb-render');
                renderedForm.formRender(formRenderOpts);
                $('#view_editor').html(renderedForm.html());

                //apply theme style of checkbox
                $('input[type="checkbox"]').each(function() {
                    $(this).addClass('custom-control-input');
                    $(this).parent().addClass('custom-control custom-checkbox mb-3');
                    $(this).parent().find('label').addClass('custom-control-label')
                    if($(this). prop("checked") == true)
                    {
                        $(this). prop("checked",true);
                    }else{
                        $(this). prop("checked",false);
                    }
                });

                //apply theme style of checkbox
                $('input[type="radio"]').each(function() {
                    $(this).addClass('custom-control-input');
                    $(this).parent().addClass('custom-control custom-radio');
                    $(this).parent().find('label').addClass('custom-control-label')
                });

                //change inout type date to datepicker
                $('input[type="date"]').each(function() {
                    $(this).addClass('datepicker');
                    $(this).attr('type','text');
                    $(this).attr('readonly','true');
                });

                var Datepicker = (function() {
                    // Variables
                    var $datepicker = $('.datepicker');

                    // Methods
                    function init($this) {
                        var options = {
                            disableTouchKeyboard: true,
                            autoclose: false,
                            clearBtn:true,
                            todayBtn: true,
                        };
                        $this.datepicker(options);
                    }
                    // Events
                    if ($datepicker.length) {
                        $datepicker.each(function() {
                            init($(this));
                        });
                    }

                })();
            });
        </script>
</body>
</html>
