<x-app>
    <x-slot:title>Create Student</x-slot:title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header-student {
            background: #0866f5;
            color: white;
            text-align: center;
            padding: 65px 20px;
        }

        .header-student h1 {
            font-size: 50px;
            font-weight: bold;
            margin: 0;
        }

        .form-student {
            margin: 70px 5%;
        }

        .form-student label {
            display: block;
            font-size: 20px;
            margin-bottom: 10px;
        }

        .form-student input {
            width: 100%;
            padding: 14px;
            font-size: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 25px;
            box-sizing: border-box;
        }

        .btn-back {
            background: #ffbb00;
            color: black;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-size: 20px;
        }

        .btn-submit {
            background: #0866f5;
            color: white;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            font-size: 20px;
            cursor: pointer;
        }
    </style>

    <div class="header-student">
        <h1>Create Student</h1>
    </div>

    <div class="form-student">

        <form action="{{ route('student.store') }}" method="POST">
            @csrf

            <label>Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama" required>

            <label>NIM</label>
            <input type="text" name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM" required>

            <a href="{{ route('student.index') }}" class="btn-back">Back</a>

            <button type="submit" class="btn-submit">
                Submit
            </button>
        </form>

    </div>
</x-app>
