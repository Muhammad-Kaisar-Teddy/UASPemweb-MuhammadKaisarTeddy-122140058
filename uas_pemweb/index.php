<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f8ff;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        .logo {
            width: 150px;
            height: auto;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        .logo:hover {
            transform: scale(1.1);
        }
        .message {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="../Bagian1/Manipulasi DOM/uas1.php">
            <img src="awal.jpg" alt="Logo Daur Ulang" class="logo">
        </a>
        <p class="message">Klik gambar untuk melanjutkan</p>
    </div>
</body>
</html>
