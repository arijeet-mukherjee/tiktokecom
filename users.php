<?php
session_start();

$_SESSION['page'] = 'users';
if(empty($_SESSION))
{
    header('Location: login.php');
}
include_once('conn.php');
$reference      = $database->getReference('users');
$snapshot       = $reference->getSnapshot();
$_key           = $snapshot->getKey();
$result         = $snapshot->getValue();
$values_records = [];
$key_records = [];
$_keys =[];
if(!empty($result))
{
    $values_records = array_values($result);
    $key_records    = array_keys($result);
   // console.log($values_records);
}
?>
<!DOCTYPE html>
<head>
    <?php include './layout/head.php';?>

    <link rel="stylesheet" href="./assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="./assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
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
                        <h6 class="h2 text-white d-inline-block mb-0">List of Table</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="dashboard.php"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">List of Table</li>
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


                    <div class="card-header">
                        <div class="row"><div class="col-6">
                                <?php
                                if(isset($_SESSION['status']) && $_SESSION['status']!="")
                                {
                                    ?>
                                          

                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <strong>Well Done!</strong> <?php echo $_SESSION['status']?>
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                            </div>
                                            
                                    <?php
                                  unset($_SESSION['status']);
                                }
                                ?>
                                <h4 class=" text-uppercase text-muted  font-weight-bold mt-3">Tables</h4>
                            </div>
                            <div class="col-6 align-middle d-flex justify-content-end">
                                <a href="./create_table.php" class=" btn btn-primary text-white btn-icon-only rounded-circle mt-1">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="table-responsive py-4">
                        <table class="table table-flush " id="custom-datatable" >
                            <thead class="thead-light">
                            <tr>
                                <th class="w-25">ID</th>
                                <th class="w-50">Email</th>
                                <th class="w-25">Phone Number</th>
                                
                                
                                <th class="w-25 disabled-sorting text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php 
                            
                                include_once('conn.php');
                                $ref_new="users/";
                                $fetchdata=$database->getReference($ref_new)->getValue();
                                if($fetchdata >0){

                                foreach ($fetchdata as $key => $row_new) {
                                    
                                
                                ?>
                                <tr>
                                    <td><?php echo $row_new['uid']; ?></td>
                                    <td><?php echo $row_new['mail']; ?></td>
                                    <td><?php echo $row_new['phone']; ?></td>
                                    <td class="text-right">
                                       

                                        <a href="create_user.php" class="btn btn-sm btn-info btn-icon-only rounded-circle mt-1 text-white" data-toggle="tooltip"  title="New">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a href="user_edit.php?token=<?php echo $key?>" class="btn btn-sm btn-primary btn-icon-only rounded-circle mt-1 text-white" data-toggle="tooltip"  title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <a  href="user_delete.php?token=<?php echo $key?>"  class="btn btn-sm btn-danger btn-icon-only rounded-circle mt-1 text-white remove" data-toggle="tooltip"  title="Remove">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php }
                                }else{

                                    ?>
                                    <tr>
                                        <td colspan="4">No Users Registered</td>
                                    </tr>
                                    <?php
                                }
                                 ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <?php include './layout/footer.php';?>

        <!-- Optional JS -->
        <script src="./assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="./assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="./assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="./assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                var DatatableBasic = (function() {
                    var $dtBasic = $('#custom-datatable');
                    function init($this) {
                        var options = {
                            keys: !0,
                            select: false,
                            language: {
                                paginate: {
                                    previous: "<i class='fas fa-angle-left'>",
                                    next: "<i class='fas fa-angle-right'>"
                                }
                            },
                        };
                        var table = $this.on('init.dt', function() {
                           // $('div.dataTables_length select').removeClass('custom-select custom-select-sm');

                        }).DataTable(options);
                    }
                    if ($dtBasic.length) {
                        init($dtBasic);
                    }
                })();


                $(document).on('click', '.remove', function (e) {
                    var id = $(this).data("id");
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#0CC27E",
                        cancelButtonColor: "#FF586B",
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        confirmButtonClass: "btn btn-success mr-5",
                        cancelButtonClass: "btn btn-danger",
                        buttonsStyling: !1
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                type: "POST",
                                url: "table_form_data_delete.php",
                                dataType: 'json',
                                data: {id: id},
                                success: function (data) {
                                    if (data.code == 200) {
                                        swal({
                                            title: "Success",
                                            text: "Your table is successfully deleted",
                                            type: "success",
                                            buttonsStyling: !1,
                                            confirmButtonClass: "btn btn-success"
                                        });
                                        setTimeout(function () {
                                            window.location = "list_table.php";
                                        }, 2000);
                                    } else {
                                        swal({
                                            title: "Oops",
                                            text: "Your table is deleted fail!",
                                            type: "error",
                                            buttonsStyling: !1,
                                            confirmButtonClass: "btn btn-success"
                                        });
                                    }
                                }
                            });
                        }
                    });
                });
            });

        </script>


</body>

</html>