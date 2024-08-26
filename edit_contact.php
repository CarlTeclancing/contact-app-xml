<?php
$id = $_GET['id'];
$xml = simplexml_load_file('xml/contacts.xml');
$contact = $xml->xpath("//contact[@id='$id']")[0];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contact->name = $_POST['name'];
    $contact->address = $_POST['address'];
    $contact->phone = $_POST['phone'];
    $contact->email = $_POST['email'];
    $xml->asXML('xml/contacts.xml');
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Contact</h1>
        <form method="POST" action="edit_contact.php?id=<?php echo $id; ?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $contact->name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo $contact->address; ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $contact->phone; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $contact->email; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Contact</button>
        </form>
    </div>
</body>
</html>
