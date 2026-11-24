<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::query()
            ->orderBy('id')
            ->limit(100)
            ->get();
        $title = 'Daftar Mahasiswa';

        return view('student.index', compact('students', 'title'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nim' => 'required',
        ]);

        Student::create($request->all());

        return redirect('/student');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->update($request->all());

        return redirect()
            ->route('student.index')
            ->with('success', 'Data berhasil diubah.');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('student.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
