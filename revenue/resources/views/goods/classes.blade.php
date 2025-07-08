@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h2>Classes in Family: {{ $family->name }}</h2>
    <ul class="list-group">
        @foreach($classes as $class)
            <li class="list-group-item">
                <a href="{{ route('goods.commodities', [$segment, $family, $class]) }}">
                    {{ $class->code }} - {{ $class->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('goods.families', $segment) }}" class="btn btn-secondary mt-3">← Back to Families</a>
</div>
@endsection
