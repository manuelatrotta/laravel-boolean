<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $students;

    public function __construct()
    {
        $this->students = [
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
              'description' => 'Ha scoperto la passione per l\'informatica creando un blog di psicologia, ambito in cui si era specializzata durante gli studi. Il suo cuore però non vuol sentir ragione e Loana cambia carriera e diventa una ricercatissima sviluppatrice web.',
              'role' => 'Web Developer',
              'gender' => 'f',
              'slug' => 'luana'
            ],
            [
                'img' => 'https://wips.plug.it/cips/supereva/cms/2019/07/104750479_l.jpg?w=850&a=r',
                'name' => 'Minnie',
                'age' => 50,
                'company' => 'Disney',
                'description' => 'lorem ipsum',
                'role' => 'Frontend Developer',
                'gender' => 'f',
                'slug' => 'minnie'
            ]
        ];
    }

    public function all()
    {
        $students = $this->students;
        return response()->json($students);

    }

    public function getAge()
    {
        $students = $this->students;

        $studentsAge = [];

        foreach ($students as $student) {
            $thisName = $student['name'];

            $studentsAge[$thisName] = $student['age'];
        }

        // restituisco in dati json
        return response()->json($studentsAge);

    }

    public function getForAge($age)
    {
        $students = $this->students;

        $studentsFiltered = [];

        foreach ($students as $student) {
            if($student['age'] == $age) {
                $studentsFiltered[] = $student;
            }
        }

        // restituisco
        return response()->json($studentsFiltered);

    }

    /*public function filter(Request $request)
    {
        // $students = config('students.students');
        $students = $this->students;
        $data = $request->all();
        if(!empty($data['age'])) {
            $age = $data['age'];
        }
        if(!empty($data['name'])) {
            $name = $data['name'];
        }

        $studentsFiltered = [];
        //filtriamo su age
        if(!empty($age)) {
            foreach ($students as $student) {
                if ($student['age'] == $age) {
                    $studentsFiltered[] = $student;
                }
            }
        }

        // filtriamo su name
        if(count($studentsFiltered) > 0 && !empty($name)) {
            $studentsFilteredName = [];
            foreach ($studentsFiltered  as $student) {
                if ($student['name'] == $name) {
                    $studentsFilteredName[] = $student;
                }
            }
            $studentsFiltered = $studentsFilteredName;
        } elseif(count($studentsFiltered) == 0 && !empty($name)) {

            $studentsFilteredName = [];
            foreach ($students as $student) {
                if ($student['name'] == $name) {
                    $studentsFilteredName[] = $student;
                }
            }
            $studentsFiltered = $studentsFilteredName;
        }


        return response()->json($studentsFiltered);
    }*/

    public function filter(Request $request) {
        $students = $this->students;

        // data ammnessi per filtrare
        $typeRequest = [
            'age',
            'name',
            'gender'
        ];
        $data = $request->all();

        foreach ($data as $key => $value) {
            if(!in_array($key, $typeRequest)) {
                unset($data[$key]);
            }
        }

        //i data sono filtrati e quindi sono data ammessi

        foreach ($data as $key => $value) {
            //se siamo al primo giro uso students
            if(array_key_first($data) == $key) {
                $studentsFiltered = $this->filterFor($key, $value, $students);
            }
            //in tutti gli altri casi uso studentsFiltered
            else {
                $studentsFiltered = $this->filterFor($key, $value, $studentsFiltered);
            }
        }


        return response()->json($studentsFiltered);
    }

    private function filterFor($type, $value, $array)
    {

        $filtered = [];
        foreach ($array as $element) {
            if ($element[$type] == $value) {
                $filtered[] = $element;
            }
        }
        return $filtered;
    }

}
