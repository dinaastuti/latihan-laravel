<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            width: 100%;
            font-family: Arial, sans-serif;
            color: #222;
        }

        .header-student {
            background: #0866f5;
            color: white;
            text-align: center;
            padding: 65px 20px;
            width: 100%;
        }

        .header-student h1 {
            font-size: 50px;
            margin: 0;
            font-weight: bold;
        }

        .content-student {
            margin: 40px 0;
            padding: 0 30px;
            width: 100%;
        }

        .alert-success {
            margin-bottom: 20px;
            padding: 14px;
            border: 1px solid #a3cfbb;
            border-radius: 8px;
            background: #d1e7dd;
            color: #0f5132;
        }

        .btn-create {
            display: inline-block;
            padding: 12px 17px;
            border-radius: 8px;
            background: #0866f5;
            color: white;
            text-decoration: none;
        }

        .table-student {
            border-collapse: collapse;
            width: 90%;
            max-width: 1100px;
            margin: 16px auto 0;
        }

        .table-student th,
        .table-student td {
            border: 1px solid #888;
            padding: 16px 12px;
            text-align: left;
            font-size: 20px;
        }

        .table-student th {
            font-weight: bold;
        }

        .btn-edit {
            background: #ffbb00;
            color: black;
            padding: 12px 17px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete {
            background: #dc3545;
            color: white;
            padding: 12px 17px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
            .content-student {
                padding: 0 10px;
                overflow-x: auto;
            }

            .header-student h1 {
                font-size: 36px;
            }

            .table-student th,
            .table-student td {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>

    <div class="header-student">
        <h1>Student</h1>
    </div>

    <div class="content-student">
        @if (session('success'))
            <div class="alert-success" role="status">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('student.create') }}" class="btn-create">
            Create Student
        </a>

        <table class="table table-student">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>NIM</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->nim }}</td>

                        <td>
                            <div style="display: flex; gap: 5px;">

                                <a href="{{ route('student.edit', $student) }}" class="btn btn-edit">
                                    Edit
                                </a>

                                <form action="{{ route('student.destroy', $student) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-delete">
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</x-app>
