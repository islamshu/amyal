<table class="header-style" style="direction: rtl !important">
    <tr class="invoice-preview-header-row">
    <td class="invoice-info-container invoice-header-style-one" style="width: 35%; vertical-align: top; text-align: left"><?php
            $data = array(
                "client_info" => $client_info,
                "color" => $color,
                "invoice_info" => $invoice_info
            );
            echo view('invoices/invoice_parts/invoice_info_ar', $data);
            ?>
        </td>
        
        <td class="hidden-invoice-preview-row" style="width: 20%;"></td>
        <td style="width: 30%; vertical-align: top;">
            <?php echo view('invoices/invoice_parts/company_logo'); ?>
        </td>
  
    </tr>
    <tr>
        <td style="padding: 5px;"></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
       
       
    <td style="text-align: right;"><?php
            echo view('invoices/invoice_parts/bill_to_ar', $data);
            ?>
        </td>
        <td></td>
        <td style="text-align: right;"><?php
            echo view('invoices/invoice_parts/bill_from_ar', $data);
            ?>
        </td>
    </tr>
</table>