<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;

    public function __construct()
    {
        $this->getStudents();
    }
    public function index()
    {
        $students = $this->students;
        // $students = config('students.students');
        // dd(config('students.students'));
        return view('student.index',compact('students'));
    }

    public function show($id)
    {//se non esiste la key allora la pagina si blocca con abort
        if (!array_key_exists($id, $this->students)) {
            abort('404');
        };
        $student = $this->students[$id];
        return view('student.show',compact('student'));
    }

    //funzione che richiama la $private students
    public function getStudents()
    {
        $this->students = config('students.students');
        // dd(config('students.students'));
    }
}
