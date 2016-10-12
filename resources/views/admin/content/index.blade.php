@extends('layouts.app')

@section('title', 'Administrar contenido')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h2>Contenido</h2>

                <p class="text-right">
                    <a href="{{ url('/admin/content/create') }}"
                       class="btn btn-primary"
                       title="Agregar nuevo contenido">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                        Agregar nuevo contenido
                    </a>
                </p>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Creado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($content as $item)
                            <tr>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->created_at->diffForHumans() }}</td>
                                <td class="text-right">
                                    <a href="{{ url('/content/' . $item->id) }}" class="btn btn-success btn-xs" title="Ver">
                                        <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                        Ver
                                    </a>
                                    <a href="{{ url('/admin/content/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Editar">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        Editar
                                    </a>
                                    {!! Form::open([
                                        'method' => 'DELETE',
                                        'url' => ['/admin/content', $item->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Eliminar"></span>Eliminar', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'title' => 'Borrar',
                                                'onclick'=>'return confirm("Está seguro que quiere borrar este contenido?")'
                                        )) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <div class="pagination-wrapper text-center">
                        {!! $content->render() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection