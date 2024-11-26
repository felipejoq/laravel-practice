@extends('layouts.main')

@section('content')
    <h1>Contact 2</h1>
    <p>{{$name}}</p>
    @if($name === "Jane Doe")
        <p>Hi Jane!</p>
    @else
        <p>Hi Stranger!</p>
    @endif

    <hr/>
    <ul style="display: flex; gap:30px;">
        @foreach([1, 2, 3, 4, 5, "hola"] as $item)
            <li><span>{{$item}}</span></li>
        @endforeach
    </ul>
@endsection
