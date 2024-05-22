<?php
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options;
$options->setChroot(__DIR__);

$dompdf = new Dompdf($options);

$dompdf->setPaper("a4", "portrait");


$template = "
<div>
<p>Title</p>
<p>School</p>
<p>Year</p>
</div>
";

$indTemplate = "
<h4>Exp Title</h4>
<p>Place</p>
<p>Date</p>
<ul>
<li>Details</li>
</ul>
";

$courseTemplate = "
<ul>
<li><a>Sched</a></li>
</ul>
";

$projectTemplate = "
<h4></h4>
<p>Date</p>
<ul>
    <li>Details</li>
</ul>
";

$expTemplate = "
<i class='fa-solid fa-diamond'></i>
<p>
    Name
</p>
";

$certTemplate = "
<h4> Name </h4>
<p>Corporation</p>
";
$temp = $template;
for ($i = 0; $i <= 1; $i++) {
    $template .= $temp;
}

$html = file_get_contents("index.html");

// Bind into records
$html = str_replace("{{ educRecord }}", $template, $html);
$html = str_replace("{{ industryRecord }}", $indTemplate, $html);
$html = str_replace("{{ schedRecord }}", $courseTemplate, $html);
$html = str_replace("{{ projRecord }}", $projectTemplate, $html);
$html = str_replace("{{ expRecord }}", $expTemplate, $html);
$html = str_replace("{{ certRecord }}", $certTemplate, $html);



$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->addInfo("Title", "CV");

$dompdf->stream("Cv.pdf", ["Attachment" => 0]);



function educRender()
{


    return;
}
