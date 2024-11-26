@extends('layouts.main')

@section('content')
    <h1>Contact 2</h1>
    <p>{{$data['name']}}</p>
    @if($data['name'] === "Jane Doe")
        <p>Hi Jane!</p>
    @else
        <p>Hi Stranger!</p>
    @endif

    <hr/>
    <ul style="display: flex; gap:30px;">
        @foreach($data['arr'] as $item)
            <li><span>{{$item}}</span></li>
        @endforeach
    </ul>
@endsection
