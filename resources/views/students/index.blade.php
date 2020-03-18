@extends('layouts.layout')


<div class="students">
  //ciclo students per stampare 
    @foreach ($students as $student)
        <div class="student">
            <div class="info">
            <img src="{{$student['img']}}" alt="{{$student['name']}}">
                <div class="text">
                <a href="{{route('student.show', ['slug' => $student['slug']])}}"><h2>{{$student['name']}} ({{$student['age']}} anni)</h2></a>
                    {{-- se gener è == f a altrimenti o --}}
                    <h3>Assunt{{($student['gender'] == 'f') ? 'a' : 'o'}} da {{$student['company']}} come {{$student['role']}}</h3>
                    {{-- <h3>@if($student['gender'] == 'f')Assunta @else Assunto @endif
                    </h3> --}}
                </div>
            </div>
            <p class="description">
                {{$student['description']}}
            </p>
        </div>
    @endforeach
    </div>
@endsection
