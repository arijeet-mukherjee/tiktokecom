<?php
session_start();
include_once('conn.php');

if(isset($_POST['save_push_data']))
{
    $uid=$_POST['uid'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];

    $data=[
        'uid'=>$uid,
        'mail'=>$mail,
        'phone'=>$phone
    ];

    $ref='users/';
    $postdata = $database->getReference($ref)->push($data);
    if($postdata)
    {
        $_SESSION['status']="Data Inserted";
        header("Location: users.php");
    }
    else {
        # code...
        $_SESSION['status']="Data Insertion Unsuccessful";
        header("Location: create_user.php");
    }

}


if(isset($_POST['save_push_truck_data']))
{
    $uid=$_POST['uid'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    $name=$_POST['username'];
    $truckname=$_POST['truckname'];
    $truckcapacity=$_POST['truckcapacity'];
    $truckprice=$_POST['truckprice'];
    $trucknumber=$_POST['trucknumber'];
    $drivername=$_POST['drivername'];
    $driverphone=$_POST['driverphone'];
   
    
    $arrlength = count($truckname);
    
    for($x = 0; $x < $arrlength; $x++) {
        $data1[]=array($truckname[$x],$truckcapacity[$x],$trucknumber[$x],$truckprice[$x]);
       // echo $truckname[$x],$truckcapacity[$x],$trucknumber[$x],$truckprice[$x];
        //echo "<br>";
    }

   $len= sizeof($truckname);
   //echo $data[0][1  ];

   for($y=0;$y<$len;$y++)
   {
       for($z=0;$z<4;$z++)
       {
        //   echo $data1[$y][$z];
           
       }
      // echo "<br>-----------------------<br>";
   }


   $len_driver= sizeof($drivername);
    for($k = 0; $k < $len_driver; $k++) {
        $data2[]=array($drivername[$k],$driverphone[$k]);
       // echo $truckname[$x],$truckcapacity[$x],$trucknumber[$x],$truckprice[$x];
        //echo "<br>";
    }
   for($i=0;$i<$len_driver;$i++)
   {
       for($j=0;$j<2;$j++)
       {
          // echo $data2[$i][$j];
           
       }
      // echo "<br>-----------------------<br>";
   }


    $data=[
        'truck_uid'=>$uid,
        'mail'=>$mail,
        'phone'=>$phone,
        'name'=>$name,
        'trucks'=>$data1,
        'driver'=>$data2
        
    ];


    
   # echo $name,$uid,$truckname[][0],$truckname[1];

    $ref='truckOwner/';
    $postdata = $database->getReference($ref)->push($data);
    if($postdata)
    {
        $_SESSION['status']="Data Inserted";
        header("Location: trucks.php");
    }
    else {
        # code...
        $_SESSION['status']="Data Insertion Unsuccessful";
        header("Location: create_truck_user.php");
    }

   

}


if(isset($_POST['update_data']))
{
    $uid=$_POST['uid'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    $token=$_POST['token'];

    $data=[
        'uid'=>$uid,
        'mail'=>$mail,
        'phone'=>$phone
    ];

    $ref='users/'.$token;
    $postdata = $database->getReference($ref)->update($data);
    if($postdata)
    {
        $_SESSION['status']="Data Updated Successfully";
        header("Location: users.php");
    }
    else {
        # code...
        $_SESSION['status']="Data Insertion Unsuccessful";
        header("Location: create_user.php");
    }

}
if(isset($_POST['update_status_data']))
{
    $uid=$_POST['uid'];
    $status=$_POST['status'];
    $price=$_POST['price'];
    $token=$_POST['token'];
    $truck_uid=$_POST['truck_uid'];

    

    $stat=['status'=>$status];

    $ref='incomingOder/'.$token;
    $postdata = $database->getReference($ref)->update($stat);
   
    if($status==1)
    {
        $source=$_POST['source'];
        $destination=$_POST['destination'];
        $time=$_POST['time'];
        $vehicleType=$_POST['vehicleType'];
        $goodsType=$_POST['goodsType'];
        $weight=$_POST['weight'];
        $oderId=$_POST['oderId'];
        $data=[
        'uid'=>$uid,
        'price'=>$price,
        'truck_uid'=>$truck_uid,
        'source'=>$source,
        'destination'=>$destination,
        'time'=>$time,
        'vehicleType'=>$vehicleType,
        'goodsType'=>$goodsType,
        'weight'=>$weight,
        'oderId'=>$oderId
    ];

    $refnew='odersCompleted/';
    $postdatanew = $database->getReference($refnew)->push($data);
   
   }
    if($postdatanew )
    {
        $_SESSION['status']="Data Updated Successfully";
        header("Location: completed_orders.php");
    }
        
    else {
        # code...
        $_SESSION['status']="Data Insertion Unsuccessful";
        header("Location: order_incoming.php");
    }

}


if(isset($_POST['update_settings_data']))
{
    $google_api=$_POST['google_api'];
    $firebase_key=$_POST['firebase_msg_api'];
    $razorpay_api=$_POST['razorpay_api'];
    //$token=$_POST['token'];

    $data=[
        'google_api'=>$google_api,
        'firebase_msg_api'=>$firebase_key,
        'razorpay_api'=>$razorpay_api
    ];

    $ref='settings/';
    $postdata = $database->getReference($ref)->update($data);
    if($postdata)
    {
        $_SESSION['status']="Data Updated Successfully";
        header("Location: settings.php");
    }
    else {
        # code...
        $_SESSION['status']="Data Insertion Unsuccessful";
        header("Location: settings.php");
    }

}


if(isset($_POST['update_truck_data']))
{
    $uid=$_POST['uid'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    $token=$_POST['token'];
    $name=$_POST['name'];
    $data=[
        'truck_uid'=>$uid,
        'mail'=>$mail,
        'phone'=>$phone,
        'name'=>$name
    ];

    $ref='truckOwner/'.$token;
    $postdata = $database->getReference($ref)->update($data);
    if($postdata)
    {
        $_SESSION['status']="Data Updated Successfully";
        header("Location: trucks.php");
    }
    else {
        # code...
        $_SESSION['status']="Data Insertion Unsuccessful";
        header("Location: create_truck_user.php");
    }

}


if(isset($_POST['delete_data']))
{
    $uid=$_POST['uid'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    $token=$_POST['token'];

    $data=[
        'uid'=>$uid,
        'mail'=>$mail,
        'phone'=>$phone
    ];

    $ref='users/'.$token;
    $postdata = $database->getReference($ref)->remove();
    if($postdata)
    {
        $_SESSION['status']="Data Removed Successfully";
        header("Location: users.php");
    }
    else {
        # code...
        $_SESSION['status']="Data Removing Unsuccessful";
        header("Location: create_user.php");
    }

}

if(isset($_POST['delete_oder_data']))
{
    
    $token=$_POST['token'];

   

    $ref='odersCompleted//'.$token;
    $postdata = $database->getReference($ref)->remove();
    if($postdata)
    {
        $_SESSION['status']="Oder Removed Successfully";
        header("Location: completed_orders.php");
    }
    else {
        # code...
        $_SESSION['status']="Ad Removing Unsuccessful";
        header("Location: truck_sell_table.php");
    }

}

if(isset($_POST['delete_ad']))
{
    
    $token=$_POST['token'];

   

    $ref='olx/'.$token;
    $postdata = $database->getReference($ref)->remove();
    if($postdata)
    {
        $_SESSION['status']="Ad Removed Successfully";
        header("Location: truck_sell_table.php");
    }
    else {
        # code...
        $_SESSION['status']="Ad Removing Unsuccessful";
        header("Location: truck_sell_table.php");
    }

}

if(isset($_POST['delete_truck_data']))
{
    $uid=$_POST['uid'];
    $mail=$_POST['mail'];
    $phone=$_POST['phone'];
    $token=$_POST['token'];
    $name=$_POST['name'];
    $data=[
        'truck_uid'=>$uid,
        'mail'=>$mail,
        'phone'=>$phone,
        'name'=>$name
    ];


    $ref='truckOwner/'.$token;
    $postdata = $database->getReference($ref)->remove();
    if($postdata)
    {
        $_SESSION['status']="Data Removed Successfully";
        header("Location: trucks.php");
    }
    else {
        # code...
        $_SESSION['status']="Data Removing Unsuccessful";
        header("Location: create_truck_user.php");
    }

}


if(isset($_POST['delete_incoming_order_data']))
{
   
    $token=$_POST['token'];

   

    $ref='incomingOder/'.$token;
    $postdata = $database->getReference($ref)->remove();
    if($postdata)
    {
        $_SESSION['status']="Data Removed Successfully";
        header("Location: order_incoming.php");
    }
    else {
        # code...
        $_SESSION['status']="Data Removing Unsuccessful";
        header("Location: order_incoming.php");
    }

}