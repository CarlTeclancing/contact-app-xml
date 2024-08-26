<?php
$id = $_GET['id'];
$xml = simplexml_load_file('xml/contacts.xml');
$index = 0;
$i = 0;

foreach ($xml->contact as $contact) {
    if ($contact['id'] == $id) {
        $index = $i;
        break;
    }
    $i++;
}

unset($xml->contact[$index]);
$xml->asXML('xml/contacts.xml');
header("Location: index.php");
?>
