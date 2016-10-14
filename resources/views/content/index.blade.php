@extends('layouts.app')

@section('title', 'Contenido')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Contenido</h1>
                <ul class="media-list">
                    @foreach($content as $item)
                        <li class="media">
                            @if ($item->image)
                                <div class="media-left">
                                    <a href="{{ url('/content', [$item->id]) }}" title="{{ $item->title }}">
                                        <img class="media-object"
                                             src="{{ asset('uploads/' . $item->image) }}"
                                             alt="{{ $item->title }}"
                                             width="60" />
                                    </a>
                                </div>
                            @endif
                            <div class="media-body">
                                <h4 class="media-heading">
                                    <a href="{{ url('/content', [$item->id]) }}" title="{{ $item->title }}">
                                        {{ $item->title }}
                                    </a>
                                </h4>
                                <p class="text-justify">
                                    {{ $item->description }}
                                </p>
                                <p class="text-right">
                                    <a href="{{ url('/content', [$item->id]) }}" title="{{ $item->title }}">
                                        Leer más &raquo;
                                    </a>
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="pagination-wrapper text-center"> {!! $content->render() !!} </div>
            </div>
        </div>
    </div>
@endsection