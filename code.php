<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_contact']))
{
    $contact_id = mysqli_real_escape_string($con, $_POST['delete_contact']);

    $query = "DELETE FROM contacts WHERE id='$contact_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "contact Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "contact Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_contact']))
{
    $contact_id = mysqli_real_escape_string($con, $_POST['contact_id']);

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "UPDATE contacts SET fname='$fname', lname='$lname', email='$email', phone='$phone' WHERE id='$contact_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "contact Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "contact Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_contact']))
{
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    $query = "INSERT INTO contacts (fname,lname,email,phone) VALUES ('$fname','$lname','$email','$phone')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "contact Created Successfully";
        header("Location: contact-create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "contact Not Created";
        header("Location: contact-create.php");
        exit(0);
    }
}

?>