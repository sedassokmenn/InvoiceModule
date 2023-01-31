<?php

include 'header.php';

$query = $db->query("SELECT * FROM invoices where invoice_id='0'")->fetchAll();

?>

<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h1>ADD TO INVOICE</h1>
                        <?php
                        if (isset($_GET['durum'])) {

                            if ($_GET['durum'] == "ok") { ?>

                                <b style="color:green;">Transaction Successful!</b>

                            <?php } elseif ($_GET['durum'] == "no") { ?>

                                <b style="color:red;">Operation Failed!</b>

                        <?php }
                        } ?>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <form action="../database/processing.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Invoice Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="invoice_id " disabled="" required="required" placeholder="This place will be added automatically." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Invoice Date<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="invoice_date" disabled="" required="required" placeholder="This place will be added automatically." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Name<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="customer_name" required="required" placeholder="Please enter your name and surname." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Address<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea class="ckeditor" id="editor1" style="width: 799px; height: 121px;" name="customer_address"></textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Tax Number<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="first-name" name="customer_tax_id" placeholder="Please enter your tax number." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="invoice_amount" onkeyup="Calcuate();" name="invoice_amount" placeholder="Please enter amount." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rate Of Vat
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="invoice_vat" onkeyup="Calcuate();" name="invoice_vat" required="required" placeholder="Rate of vat" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Invoice Total Amount
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="" id="invoice_total_amount" onclick="Calcuate();" name="invoice_total_amount" readonly placeholder="This place will be added automatically." class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div style="text-align:right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" name="addinvoice" class="btn btn-success">ADD</button>
                                </div>
                            </div>

                        </form>



                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
    function Calcuate() {
        var invoice_amount = Number(document.getElementById("invoice_amount").value);
        var invoice_vat = Number(document.getElementById("invoice_vat").value);
        var invoice_total_amount = invoice_amount + (invoice_amount * invoice_vat / 100);
        document.getElementById("invoice_total_amount").value = invoice_total_amount;
    }
    CKEDITOR.replace('editor1',

        {

            filebrowserBrowseUrl: 'ckfinder/ckfinder.html',

            filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?type=Images',

            filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?type=Flash',

            filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

            filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

            filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

            forcePasteAsPlainText: true

        }

    );
</script>