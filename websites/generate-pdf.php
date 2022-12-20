<?php

require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$name = $_POST["name"];
$url = $_POST["url"];
$entity = $_POST["entity"];
$country = $_POST["country"];
$state = $_POST["state"];

//$html = '<h1 style="color: green">Example</h1>';
//$html .= "Hello <em>$name</em>";
//$html .= '<img src="example.png">';
//$html .= "Quantity: $quantity";

/**
 * Set the Dompdf options
 */
$options = new Options;
$options->setChroot(__DIR__); //to have permisiion to external files
$options->setIsRemoteEnabled(true); //to have permisiion to external links and cdn

$dompdf = new Dompdf($options);

/**
 * Set the paper size and orientation
 */
$dompdf->setPaper("A4", "portrait");

/**
 * Load the HTML and replace placeholders with values from the form
 */
$html = file_get_contents("tempelate.html");

$html = str_replace(["{{ name }}", "{{ url }}", "{{ entity }}", "{{ country }}", "{{ state }}"], [$name, $url, $entity, $country, $state], $html);

$dompdf->loadHtml($html);
//$dompdf->loadHtmlFile("template.html");

/**
 * Create the PDF and set attributes
 */
$dompdf->render();

$dompdf->addInfo("Title", "A Terms and Conditions PDF"); // "add_info" in earlier versions of Dompdf

/**
 * Send the PDF to the browser
 */
$dompdf->stream("terms.pdf", ["Attachment" => 0]);// Attachment =0 makes it suggest that the browser display and not download

/**
 * Save the PDF file locally
 */
$output = $dompdf->output();
file_put_contents("terms.pdf", $output);




?>