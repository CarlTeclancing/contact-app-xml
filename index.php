<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Contact Management Application</h1>
        <a href="add_contact.php" class="btn btn-primary">Add New Contact</a>
        <form action="search_contact.php" method="GET" class="d-flex my-3">
            <input class="form-control me-2" type="search" placeholder="Search by name" name="query">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <?php
        $xml = simplexml_load_file('xml/contacts.xml');
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Actions</th></tr></thead>';
        echo '<tbody>';
        foreach ($xml->contact as $contact) {
            echo '<tr>';
            echo '<td>'.$contact->name.'</td>';
            echo '<td>'.$contact->address.'</td>';
            echo '<td>'.$contact->phone.'</td>';
            echo '<td>'.$contact->email.'</td>';
            echo '<td>
                <a href="edit_contact.php?id='.$contact['id'].'" class="btn btn-warning btn-sm">Edit</a>
                <a href="delete_contact.php?id='.$contact['id'].'" class="btn btn-danger btn-sm">Delete</a>
                </td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        ?>
        <a href="import_contacts.php" class="btn btn-secondary">Import Contacts</a>
        <a href="export_contacts.php" class="btn btn-info">Export Contacts</a>
    </div>
</body>
</html>
