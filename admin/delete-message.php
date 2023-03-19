<?php 

    //Include constants.php file here
    include('../config/constants.php');

    // 1. get the ID of message to be deleted
    $id = $_GET['id'];

    //2. Create SQL Query to Delete message
    $sql = "DELETE FROM tbl_contacts WHERE id=$id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    // Check whether the query executed successfully or not
    if($res==true)
    {
        //Query Executed Successully and message Deleted
        //echo "message Deleted";
        //Create SEssion Variable to Display Message
        $_SESSION['delete'] = "<div class='success'>Message Deleted Successfully.</div>";
        //Redirect to Manage message Page
        header('location:'.SITEURL.'admin/manage-contacts.php');
    }
    else
    {
        //Failed to Delete message
        //echo "Failed to Delete message";

        $_SESSION['delete'] = "<div class='error'>Failed to Delete Message. Try Again Later.</div>";
        header('location:'.SITEURL.'admin/manage-contacts.php');
    }
