<?php
$company_address = nl2br(get_setting("company_address"));
$company_phone = get_setting("company_phone");
$company_email = get_setting("company_email");
$company_website = get_setting("company_website");
$company_vat_number = get_setting("company_vat_number");
?>
<div><b><?php echo app_lang("from_to"); ?></b></div>
<div><b><?php echo get_setting("company_name"); ?></b></div>
<div style="line-height: 3px;"> </div>
<span class="invoice-meta text-default" style="font-size: 80%; color: #666; width: 100%; ">
  
              
        <br />2385 Makkah Al-Mukarramah Road - Al-Sulaymaniyah District - Riyadh
        <br>13524 
        <br />Saudi Arabia
        <br />VAT Number:310312014300003

        <br />
        <?php // if ($company_vat_number) { 
        ?>
        <br /><?php  // echo app_lang("vat_number") . ": " . $company_vat_number; 
                ?>
        <?php // } 
        ?>
</span>