<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;

    public function __construct()
    {
        /*    $this->students = [
            [
                'img' => 'https://www.boolean.careers/images/students/biagini.png',
                'name' => 'Alessandro Biagini',
                'age' => 25,
                'company' => 'DISC SPA ',
                'description' => 'Da giocatore professionista di basket a sviluppatore web. 6 mesi di impegno da MVP e un memorabile tap-in targato Boolean hanno garantito ad Alessandro un solido futuro come web developer.',
                'role' => 'Web Developer',
                'gender' => 'm',
                'slug' => 'Alessandro'
            ],
            [
                'img' => 'https://www.boolean.careers/images/students/poggini.png',
                'name' => 'Paola Poggini',
                'age' => 24,
                'company' => 'Prima Assicurazioni',
                'description' => 'A 24 anni, dopo aver conseguito il diploma linguistico ha deciso di intraprendere fin da subito un percorso nel mondo Tech. Ad oggi ricopre il ruolo di Junior Software Engineer.',
                'role' => 'Junior Software Engineer',
                'gender' => 'f',
                'slug' => 'paola'
            ],
            [
                'img' => 'https://www.boolean.careers/images/students/masetti.png',
                'name' => 'Loana Masetti',
                'age' => 36,
                'company' => 'The Zen Agency',
                'description' => 'Ha scoperto la passione per l'informatica creando un blog di psicologia, ambito in cui si era specializzata durante gli studi. Il suo cuore però non vuol sentir ragione e Loana cambia carriera e diventa una ricercatissima sviluppatrice web.',
                'role' => 'Web Developer',
                'gender' => 'f',
                'slug' => 'luana'
            ]
        ];*/
        //select * from students
        $this->students = Student::all();
        dd($this->students);
    }

    public function index()
    {
        //$students = $this->students;
        $data = [
            'students' => $this->students,
            'genders' => ['m', 'f'],
            'title' => 'Carriere'
        ];

        return view('students.index', $data);

    }

    public function getStudents() {
        return $this->students;
    }
}
