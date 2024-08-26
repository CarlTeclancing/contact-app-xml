<?php
$xml = simplexml_load_file('xml/contacts.xml');
header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="contacts.xml"');
echo $xml->asXML();
?>
