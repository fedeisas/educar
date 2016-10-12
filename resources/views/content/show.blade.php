@extends('layouts.app')

@section('title', $content->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{ $content->title }}</h1>

                @if ($content->image)
                    <img src="{{ asset('uploads/' . $content->image) }}" alt="{{ $content->title }}" class="img-responsive"/>
                @endif

                <div class="description">
                    <p class="lead">{{ $content->description }}</p>
                </div>

                <div class="body">
                    {{ $content->body }}
                </div>
            </div>
        </div>
    </div>
@endsection