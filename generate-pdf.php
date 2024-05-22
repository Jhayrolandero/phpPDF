<?php
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->setChroot(__DIR__);

$dompdf = new Dompdf($options);

$dompdf->setPaper("a4", "portrait");

// $dompdf->loadHtmlFile("index.html");
// $dompdf->file("index.html");

$html = file_get_contents("index.html");
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->addInfo("Title", "CV");

$dompdf->stream("Cv.pdf", ["Attachment" => 0]);
