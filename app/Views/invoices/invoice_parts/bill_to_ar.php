<div><b>العميل</b></div>
<div class="b-b" style="line-height: 2px; border-bottom: 1px solid #f2f4f6;"> </div>
<div style="line-height: 3px;"> </div>
<strong><?php echo $client_info->company_name; ?> </strong>
<div style="line-height: 3px;"> </div>
<span class="invoice-meta text-default" style="font-size: 80%; color: #666;">
    <?php if ($client_info->address || $client_info->vat_number || (isset($client_info->custom_fields) && $client_info->custom_fields)) { ?>
        <div>  <br /><?php echo nl2br($client_info->address); ?>
            <?php if ($client_info->city_ar) { ?>
                <br /><?php echo $client_info->city_ar; ?>
            <?php } ?>
            <?php if ($client_info->state) { ?>
                <br /><?php echo $client_info->state; ?>
            <?php } ?>
            <?php if ($client_info->zip) { ?>
                <br /><?php echo $client_info->zip; ?>
            <?php } ?>
            <?php if ($client_info->country_ar) { ?>
                <br /><?php echo $client_info->country_ar; ?>
            <?php } ?>
            <?php if ($client_info->vat_number) { ?>
                <br /><?php echo "الرقم الضريبي" . ": " . $client_info->vat_number; ?>
            <?php } ?>
            <?php
            if (isset($client_info->custom_fields) && $client_info->custom_fields) {
                foreach ($client_info->custom_fields as $field) {
                    if ($field->value) {
                        echo "<br />" . $field->custom_field_title . ": " . view("custom_fields/output_" . $field->custom_field_type, array("value" => $field->value));
                    }
                }
            }
            ?>


        </div>
    <?php } ?>
</span>