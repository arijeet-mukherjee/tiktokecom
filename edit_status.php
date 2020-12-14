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
                        <h6 class="h2 text-white d-inline-block mb-0">Update Order status</h6>
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
                        <h3 class="mb-0">Update Status</h3>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-horizontal" >
                            <?php
                            include_once('conn.php');
                            $token=$_GET['token'];
                            $ref='incomingOder/';
                            $getdata=$database->getReference($ref)->getChild($token)->getValue();

                            
                            ?>
                            <form action="code.php" method="POST">
                                <label for="status">Status</label>
                                <input type="hidden" name="token" value="<?php echo $token;?>">
                                <input type="hidden" name="source" value="<?php echo $getdata['source'];?>">
                                <input type="hidden" name="destination" value="<?php echo $getdata['destination'];?>">
                                
                                <input type="hidden" name="weight" value="<?php echo $getdata['weight'];?>">
                                <input type="hidden" name="goodsType" value="<?php echo $getdata['goodsType'];?>">
                                <input type="hidden" name="vehicleType" value="<?php echo $getdata['vehicleType'];?>">
                                <input type="hidden" name="time" value="<?php echo $getdata['time'];?>">
                                <input type="hidden" name="oderId" value="<?php echo $getdata['oderId'];?>">
                                <div class="form-group">
                                    
                                        <input type="number" name="status" value="<?php echo $getdata['status'] ?>" class="form-control" placeholder="Update Status">

                                        <ul class="list-group py-2 mt-2"  >
                                        <li class="list-group-item list-group-item-info">0 : 'Cancel the Order'</li>
                                        <li class="list-group-item list-group-item-info">1 : 'Order Completed'</li>
                                        <li class="list-group-item list-group-item-info">2 : 'Processing the Order'</li>
                                        </ul>

                                    
                                </div>
                                <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 45%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                 <div class="form-group">       
                                        <label for="uid">User Id</label>                         
                                        <input type="text" name="uid" class="form-control" value="<?php echo $getdata['uid'] ?>" placeholder="Donot Change it">                           
                                </div>
                                <div class="form-group">       
                                        <label for="truck_uid">Truck Owner ID</label>                         
                                        <input type="text" required name="truck_uid" class="form-control" placeholder="Enter Truck Owner ID">                           
                                </div>
                                <div class="form-group">     
                                        <label for="price">Total Price</label>                           
                                        <input type="number" required name="price"  class="form-control" placeholder="Enter Total Price Breakdown">                           
                                </div>
                               
                        </div>
                    </div>
                    <div class="card-footer">

                        <div class="form-group text-center">
                            <button type="submit" id="get-table-data" class="btn btn-success" name="update_status_data">Update</button>
                            <a href="order_incoming.php" class="btn btn-info">Cancel</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>


        <?php include './layout/footer.php';?>
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



