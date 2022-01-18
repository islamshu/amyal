<?php

namespace App\Controllers;

class Home extends App_Controller  {
    function download_pdf($invoice_id = 0, $mode = "download") {
        if ($invoice_id) {
            validate_numeric_value($invoice_id);

            $invoice_data = get_invoice_making_data($invoice_id);
            // $this->_check_invoice_access_permission($invoice_data);
      

            prepare_invoice_pdf($invoice_data, $mode);
        } else {
            show_404();
        }
    }
}