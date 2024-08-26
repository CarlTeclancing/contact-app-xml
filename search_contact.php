<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Search Results</h1>
        <?php
        $query = strtolower($_GET['query']);
        $xml = simplexml_load_file('xml/contacts.xml');
        echo '<table class="table table-striped">';
        echo '<thead><tr><th>Name</th><th>Address</th><th>Phone</th><th>Email</th><th>Actions</th></tr></thead>';
        echo '<tbody>';
        foreach ($xml->contact as $contact) {
            if (strpos(strtolower($contact->name), $query) !== false) {
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
        }
        echo '</tbody>';
        echo '</table>';
        ?>
    </div>
</body>
</html>
