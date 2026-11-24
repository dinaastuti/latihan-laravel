<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <style>
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            color: #222;
            font-family: Arial, sans-serif;
        }

        input {
            display: block;
            box-sizing: border-box;
            width: 100%;
            max-width: 360px;
            margin: 6px 0 14px;
            padding: 8px;
        }

        table {
            width: 100%;
            margin-top: 16px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ccc;
            text-align: left;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <main>
        {{ $slot }}
    </main>
</body>

</html>
