<div style=" margin: auto;">
    <?php
    $color = get_setting("invoice_color");
    if (!$color) {
        $color = "#2AA384";
    }
    $invoice_style = get_setting("invoice_style");
    $data = array(
        "client_info" => $client_info,
        "color" => $color,
        "invoice_info" => $invoice_info
    );

    if ($invoice_style === "style_2") {
        echo view('invoices/invoice_parts/header_style_1_arabic.php', $data);
    } else {
        echo view('invoices/invoice_parts/header_style_1_arabic.php', $data);
    }

    $discount_row = '<tr>
                        <td colspan="3" style="text-align: left;">' . app_lang("discount") . '</td>
                        <td style="text-align: left; width: 20%; border: 1px solid #fff; background-color: #f4f4f4;">' . to_currency($invoice_total_summary->discount_total, $invoice_total_summary->currency_symbol) . '</td>
                    </tr>';
    ?>
</div>

<br />


<table class="table-responsive" style="width: 100%; color: #444; direction: rtl !important; text-align: center;" >            
    <tr style="font-weight: bold; background-color: <?php echo $color; ?>; color: #fff;  ">
    <th style="text-align: center;  width: 20%; "> الإجمالي</th>
    <th style="text-align: center;  width: 20%; border-left: 1px solid #eee;"> <?php echo app_lang("rate"); ?></th>
    <th style="text-align: center;  width: 15%; border-left: 1px solid #eee;"> الكمية</th>

        <th style="width: 45%; border-left: 1px solid #eee;">العنصر </th>
    </tr>
    <?php
    foreach ($invoice_items as $item) {
        ?>
        <tr style="background-color: #f4f4f4; ">
        <td style="text-align: center; width: 20%; border: 1px solid #fff;"> <?php echo to_currency($item->total, $item->currency_symbol); ?></td>
        <td style="text-align: center; width: 20%; border: 1px solid #fff;"> <?php echo to_currency($item->rate, $item->currency_symbol); ?></td>
        <td style="text-align: center; width: 15%; border: 1px solid #fff;"> <?php echo $item->quantity . " " . $item->unit_type; ?></td>

            <td style="width: 45%; border: 1px solid #fff; padding: 10px;"><?php echo $item->title; ?>
                <br />
                <span style="color: #888; font-size: 90%;"><?php echo nl2br($item->description); ?></span>
            </td>
        </tr>
        <?php } ?>
    <tr>
        <td style="text-align: left; width: 20%; border: 1px solid #fff; background-color: #f4f4f4;">
            <?php echo to_currency($invoice_total_summary->invoice_subtotal, $invoice_total_summary->currency_symbol); ?>
        </td>
        <td colspan="3" style="text-align: left;">الإجمالي</td>

    </tr>
    <?php
    if ($invoice_total_summary->discount_total && $invoice_total_summary->discount_type == "before_tax") {
        echo $discount_row;
    }
    ?>    
    <?php if ($invoice_total_summary->tax) { ?>
        <tr>
        <td style="text-align: left; width: 20%; border: 1px solid #fff; background-color: #f4f4f4;">
                <?php echo to_currency($invoice_total_summary->tax, $invoice_total_summary->currency_symbol); ?>
            </td>
          
            <td colspan="3" style="text-align: left;">ضريبة (<?php echo $invoice_total_summary->tax_percentage ?> %)</td>
            
        </tr>
    <?php } ?>
    <?php if ($invoice_total_summary->tax2) { ?>
        <tr>
        <td style="text-align: left; width: 20%; border: 1px solid #fff; background-color: #f4f4f4;">
                <?php echo to_currency($invoice_total_summary->tax2, $invoice_total_summary->currency_symbol); ?>
            </td>
            <td colspan="3" style="text-align: left;"><?php echo $invoice_total_summary->tax_name2; ?></td>
            
        </tr>
    <?php } ?>
    <?php if ($invoice_total_summary->tax3) { ?>
        <tr>
        <td style="text-align: left; width: 20%; border: 1px solid #fff; background-color: #f4f4f4;">
                <?php echo to_currency($invoice_total_summary->tax3, $invoice_total_summary->currency_symbol); ?>
            </td>
            <td colspan="3" style="text-align: left;"><?php echo $invoice_total_summary->tax_name3; ?></td>
           
        </tr>
    <?php } ?>
    <?php
    if ($invoice_total_summary->discount_total && $invoice_total_summary->discount_type == "after_tax") {
        echo $discount_row;
    }
    ?> 
    <?php if ($invoice_total_summary->total_paid) { ?>     
        <tr>
        <td style="text-align: left; width: 20%; border: 1px solid #fff; background-color: #f4f4f4;">
                <?php echo to_currency($invoice_total_summary->total_paid, $invoice_total_summary->currency_symbol); ?>
            </td>
            <td colspan="3" style="text-align: left;">المدفوع</td>
            
        </tr>
    <?php } ?>
    <tr>
    <td style="text-align: left; width: 20%; background-color: <?php echo $color; ?>; color: #fff;">
            <?php echo to_currency($invoice_total_summary->balance_due, $invoice_total_summary->currency_symbol); ?>
        </td>
        <td colspan="3" style="text-align: left;">الرصيد المستحق</td>
        
    </tr>
</table>
<div>
    <table style="direction: rtl;float: right;">
<div style="border-top: 2px solid #f2f2f2; color:#444; padding:0 0 20px 0;right:0" class="right"><br /><?php echo($qr_code) ?></div>
</table>
</div>
<?php if ($invoice_info->note) { ?>
    <br />
    <br />
    <div style="border-top: 2px solid #f2f2f2; color:#444; padding:0 0 20px 0;"><br /><?php echo nl2br($invoice_info->note); ?></div>
<?php } else { ?> <!-- use table to avoid extra spaces -->
    <br /><br /><table class="invoice-pdf-hidden-table" style="border-top: 2px solid #f2f2f2; margin: 0; padding: 0; display: block; width: 100%; height: 10px;"></table>
<?php } ?>
<span style="color:#444; line-height: 14px;margin-bottom: 40%;" >
    <?php echo get_setting("invoice_footer"); ?>
</span>
<span style="color:#444; line-height: 14px;margin-bottom: 40%;text-align: right" class="right" >
   <h3>الحساب البنكي :</h3>
</span>
<table style="width:70%;right:10;text-align: right" class="left">

  <tr style="  border: 1px solid black;text-align: right">


    <td style="  width: 30%;text-align: right;"> </td>
    <td style=" width: 30%;text-align: right;"> </td>
    <td style="  border: 1px solid black;width: 60%;text-align: right;">مصرف الإنماء</td>
    <td style="  border: 1px solid black;width: 30%;text-align: right;">اسم البنك</td>


  </tr>
  <tr>
 

  
  <td style="  width: 30%;text-align: right;"> </td>
  <td style=" width: 30%;text-align: right;"> </td>
  <td style="  border: 1px solid black;width: 60%;text-align: right;">شركة أميال الذكية</td>
  <td style="border: 1px solid black;width: 30%;text-align: right;"> اسم الحساب</td>
  </tr>
  <tr>
 

 
  <td style="  width: 30%;text-align: right;"> </td>
  <td style=" width: 30%;text-align: right;"> </td>
  <td style="  border: 1px solid black;width: 60%;text-align: right;">SA 3105000068203365594000</td>
  <td style="  border: 1px solid black;width: 30%;text-align: right;"> رقم الأيبان</td>

  </tr>
</table>