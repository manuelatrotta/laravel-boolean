@extends('layouts.layout')

@section('main')
    <div class="students">
            <div class="student">

                <div class="info">
                    <img src="{{$student['img']}}" alt="{{$student['name']}}">
                    <div class="text">
                        <h2>
                            {{$student['name']}} ( {{$student['age']}} anni)
                        </h2>
                        <h3>Assunt{{ ($student['gender'] == 'm') ? 'o' : 'a' }}  da {{$student['company']}} come {{$student['role']}}</h3>
                    </div>
                </div>

                <p class="description">{{$student['description']}}</p>
            </div>
    </div>
@endsection
