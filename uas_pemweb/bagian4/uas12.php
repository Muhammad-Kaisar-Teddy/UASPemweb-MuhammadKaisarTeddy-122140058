<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Browser Storage</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .navigation a {
            text-decoration: none;
            padding: 10px 20px;
            background: #6f42c1;
            color: #fff;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .navigation a:hover {
            background: #5a33a7;
        }

        .description {
            text-align: center;
            font-size: 16px;
            color: #000;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-actions {
            text-align: center;
            margin-top: 15px;
        }

        .form-actions button {
            padding: 10px 20px;
            border: none;
            background: #6f42c1;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-actions button:hover {
            background: #5a33a7;
        }
    </style>
    <script>
        // Mengelola localStorage
        function saveToLocalStorage(key, value) {
            localStorage.setItem(key, value);
            document.getElementById('savedData').innerText = value;
            alert('Data berhasil disimpan ke Local Storage!');
        }
    </script>
</head>

<body>
    <div class="navigation">
        <a href="uas11.php">&larr; Sebelumnya</a>
    </div>

    <div class="description">4.2.2 : Pengelolaan State dengan Browser Storage</div>

    <div class="container">
        <h2>Pengelolaan Browser Storage</h2>
        <div class="form-group">
            <input type="text" id="localStorageValue" placeholder="Masukkan data">
        </div>
        <div class="form-actions">
            <button onclick="saveToLocalStorage('userData', document.getElementById('localStorageValue').value)">Save Data</button>
        </div>
        <p>Saved Data: <span id="savedData"></span></p>
    </div>
</body>

</html>
