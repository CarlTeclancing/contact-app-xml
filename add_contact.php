<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $xml = simplexml_load_file('xml/contacts.xml');
    $contact = $xml->addChild('contact');
    $contact->addAttribute('id', uniqid());
    $contact->addChild('name', $_POST['name']);
    $contact->addChild('address', $_POST['address']);
    $contact->addChild('phone', $_POST['phone']);
    $contact->addChild('email', $_POST['email']);
    $xml->asXML('xml/contacts.xml');
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Add New Contact</h1>
        <form method="POST" action="add_contact.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Contact</button>
        </form>
    </div>
</body>
</html>
