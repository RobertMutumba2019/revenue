@extends('layouts.dashboard')
@section('content')
<div class="container">
    <h2>Families in Segment: {{ $segment->name }}</h2>
    <ul class="list-group">
        @foreach($families as $family)
            <li class="list-group-item">
                <a href="{{ route('goods.classes', [$segment, $family]) }}">
                    {{ $family->code }} - {{ $family->name }}
                </a>
            </li>
        @endforeach
    </ul>
    <a href="{{ route('goods.index') }}" class="btn btn-secondary mt-3">← Back to Segments</a>
</div>
@endsection
