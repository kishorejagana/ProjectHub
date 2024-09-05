<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 600px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Success</h2>
        <p><?php echo htmlspecialchars($_GET['message']); ?></p>
        <a href="admin.html" class="btn btn-primary">Back to Admin Page</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
