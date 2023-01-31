<?php
include 'db.php';

if (isset($_POST['addinvoice'])) {

    $query = $db->prepare("INSERT into invoices SET
    customer_name=:customer_name,
    customer_address=:customer_address,
    customer_tax_id=:customer_tax_id,
    invoice_amount=:invoice_amount,
    invoice_vat=:invoice_vat,
    invoice_total_amount=:invoice_total_amount
        ");

    $insert = $query->execute(array(
        'customer_name' => $_POST['customer_name'],
        'customer_address' => $_POST['customer_address'],
        'customer_tax_id' => $_POST['customer_tax_id'],
        'invoice_amount' => $_POST['invoice_amount'],
        'invoice_vat' => $_POST['invoice_vat'],
        'invoice_total_amount' => $_POST['invoice_total_amount']
    ));


    if ($insert) {

       header("Location:../production/index.php");
    } else {

        header("Location:../production/add-invoice.php?durum=no");
    }
}

if (isset($_POST['updateinvoice'])) {


    $invoice_id = $_POST['invoice_id'];

    $query = $db->prepare("UPDATE invoices SET
    invoice_date=:invoice_date,
    customer_name=:customer_name,
    customer_address=:customer_address,
    customer_tax_id=:customer_tax_id,
    invoice_amount=:invoice_amount,
    invoice_vat=:invoice_vat,
    invoice_total_amount=:invoice_total_amount
    
    WHERE invoice_id={$_POST['invoice_id']}");

    $update = $query->execute(array(
        'invoice_date' => $_POST['invoice_date'],
        'customer_name' => $_POST['customer_name'],
        'customer_address' => $_POST['customer_address'],
        'customer_tax_id' => $_POST['customer_tax_id'],
        'invoice_amount' => $_POST['invoice_amount'],
        'invoice_vat' => $_POST['invoice_vat'],
        'invoice_total_amount' => $_POST['invoice_total_amount']
    ));


    if ($update) {

        header("Location:../production/index.php");


    } else {

        Header("Location:../production/update-invoice.php?invoice_id=$invoice_id&durum=no");
    }
}
if ($_GET['deleteinvoice'] == "ok") {


    $delete = $db->prepare("DELETE from invoices where invoice_id=:id");
    $control = $delete->execute(array(
        'id' => $_GET['invoice_id']
    ));


    if ($control) {


        header("location:../production/index.php?sil=ok");
    } else {

        header("location:../production/index.php?sil=no");
    }
}
