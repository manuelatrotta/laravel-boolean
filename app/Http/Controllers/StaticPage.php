<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
   private $students;

    public function __construct()
    {
      $this->getAllStudents();
    }
    //
    public function index()
    {
      // $students = $this->students;
      // return view('students.index', compact('students'));
      return view('students.index');
    }

    public function show($id)
    {

    }

    private function getAllStudents()  {
      //array students inserito in config students.php nome filephp,nome chiave
      $this->students = config('students.students');
      // dd($this->students);
    }
}
