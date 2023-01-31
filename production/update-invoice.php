<?php

include 'header.php';

$query = $db->prepare("SELECT * FROM invoices WHERE invoice_id=:id");
$query->execute([':id' => @$_GET['invoice_id']]);

$query = $query->fetch();
if (!$query) {
  echo "No invoice found";
  exit;
}

?>
<div class="right_col" role="main">
  <div class="">
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h1>UPDATE INVOICE</h1>
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
            <br />

            <form action="../database/processing.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Invoice No<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="" id="first-name" name="invoice_id" disabled="" value="<?php echo $query->invoice_id ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Invoice Date<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="" id="first-name" name="invoice_date" disabled="" value="<?php echo $query->invoice_date ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="customer_name" value="<?php echo $query->customer_name ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Address<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="customer_address" value="<?php echo $query->customer_address ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Customer Tax Number<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="customer_tax_id" value="<?php echo $query->customer_tax_id ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Amount <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="" id="invoice_amount" onkeyup="Calcuate();" name="invoice_amount" value="<?php echo $query->invoice_amount ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rate Of Vat <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="" id="invoice_vat" onkeyup="Calcuate();" name="invoice_vat" value="<?php echo $query->invoice_vat ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Amount<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="" id="invoice_total_amount" onclick="Calcuate();" name="invoice_total_amount" readonly value="<?php echo $query->invoice_total_amount ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <input type="hidden" name="invoice_id" value="<?php echo $query->invoice_id ?>">

              <div class="ln_solid"></div>
              <div class="form-group">
                <div style="text-align:right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="updateinvoice" class="btn btn-success">UPDATE</button>
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
    //document.getElementById("invoice_total_amount").innerHTML = invoice_total_amount;

  }
</script>