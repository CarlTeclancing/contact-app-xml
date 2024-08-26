<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uploadedFile = $_FILES['file']['tmp_name'];
    $xml = simplexml_load_file($uploadedFile);
    $contactsXML = simplexml_load_file('xml/contacts.xml');

    foreach ($xml->contact as $contact) {
        $newContact = $contactsXML->addChild('contact');
        $newContact->addAttribute('id', uniqid());
        $newContact->addChild('name', $contact->name);
        $newContact->addChild('address', $contact->address);
        $newContact->addChild('phone', $contact->phone);
        $newContact->addChild('email', $contact->email);
    }

    $contactsXML->asXML('xml/contacts.xml');
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Import Contacts</h1>
        <form method="POST" action="import_contacts.php" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="file" class="form-label">XML File</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <button type="submit" class="btn btn-primary">Import Contacts</button>
        </form>
    </div>
</body>
</html>
