<?php

include 'header.php';

$query = $db->query("SELECT * FROM invoices")->fetchAll();

?>

<body class="nav-md">
  <div class="container body">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h1>INVOICES </h1>
            <div class="clearfix"></div>
            <div style="text-align:right">
              <a href="add-invoice.php"><button class="btn btn-success btn-xl">Add New Invoice</button></a>
            </div>
          </div>
          <div class="x_content">
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Invoice number </th>
                    <th class="column-title">Invoice Date </th>
                    <th class="column-title">Invoice to Name </th>
                    <th class="column-title">Amount </th>
                    <th class="column-title">Rate of Vat </th>
                    <th class="column-title no-link last"><span class="nobr">Total Amount</span>
                    </th>
                    <th></th>
                    <th></th>
                    <th></th>

                  </tr>
                </thead>
                <tbody>
                  <?php

                  foreach ($query as $result) { ?>

                    <tr>

                      <td><?php echo $result->invoice_id ?></td>
                      <td><?php echo $result->invoice_date ?></td>
                      <td><?php echo $result->customer_name ?></td>
                      <td><?php echo $result->invoice_amount ?></td>
                      <td><?php echo $result->invoice_vat ?></td>
                      <td><?php echo $result->invoice_total_amount ?></td>
                      <td>---</td>
                      <td>
                        <style="text-align:center"><a href="update-invoice.php?invoice_id=<?php echo $result->invoice_id; ?>"><button class="btn btn-primary btn-xl"> View&Update Invoice</button></a>
                      </td>
                      <td>
                        <style="text-align:center"><a href="../database/processing.php?invoice_id=<?php echo $result->invoice_id; ?>&deleteinvoice=ok"><button class="btn btn-danger btn-xl"> Delete Invoice</button></a>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>