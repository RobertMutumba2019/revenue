@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h2>Segments</h2>
    <ul class="list-group">
        @foreach($segments as $segment)
            <li class="list-group-item">
                <a href="{{ route('goods.families', $segment) }}">
                    {{ $segment->code }} - {{ $segment->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
