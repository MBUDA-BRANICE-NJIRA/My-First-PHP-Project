// view_contacts.php
session_start();
include '../db/Conection.php'; // Database connection

if (!isset($_SESSION['username'])) {
    header("Location: ../Auth/login.php");
    exit;
}

$stmt = $conn->query("SELECT * FROM contacts ORDER BY created_at DESC");
$contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Customer Mails</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Customer Emails</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contacts as $contact): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contact['name']); ?></td>
                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                    <td><?php echo htmlspecialchars($contact['company']); ?></td>
                    <td><?php echo htmlspecialchars($contact['message']); ?></td>
                    <td><?php echo htmlspecialchars($contact['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>