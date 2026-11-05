<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student.index', [
            'title' => 'Student',
            'students' => Student::latest()->get(),
        ]);
    }

    public function create()
    {
        return view('student.create', [
            'title' => 'Create Student'
        ]);
    }

     

public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required',
        'nim' => 'required|numeric',
    ],
    [
        'name.required' => 'Nama wajib di input',
        'nim.required' => 'NIM wajib di input',
        'nim.numeric' => 'NIM wajib berupa angka',
    ]);

    // Simpan data ke database
    Student::create($validated);

    return redirect('/student');
}

}

    




    // The blog post is valid...
 
    return redirect('/student');
{

}
  
