<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once('asset/dompdf_ex1/autoload.inc.php');

use Dompdf\Dompdf;
use Dompdf\Options;

class Mypdf
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function generate($view, $data = array(), $filename = 'laporan', $paper = 'A4', $orientation = 'portrait')
    {

        $dompdf = new Dompdf();

        $html = $this->ci->load->view($view, $data, true);

        $dompdf->loadHtml($html);


        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper($paper, $orientation);
        // Render the HTML as PDF
        $dompdf->render();
        $dompdf->stream($filename . ".pdf", array("Attachment" => FALSE));
    }
}
