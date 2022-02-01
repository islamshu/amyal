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
<span class="invoice-meta text-default" style="font-size: 70%; color: #666; width: 100%; "><?php
    if ($company_address) {
        echo $company_address;
    }
    ?>
   <? //php if ($company_phone) { ?>
        <br /><? //php echo app_lang("phone") . ": " . $company_phone; ?>
    <?php // } ?>
    <?php // if ($company_email) { ?>
        <br  /><? //php echo app_lang("email") . ": " . $company_email; ?>
    <?php // } ?>
    <br />   Address: Al Olaya -  Riyadh

<br/>  Commercial Register : 310312014300003
    <?php // if ($company_vat_number) { ?>
        <br  /><?php  // echo app_lang("vat_number") . ": " . $company_vat_number; ?>
    <?php // } ?>
</span>