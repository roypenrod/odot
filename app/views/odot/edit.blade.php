@extends('layouts.main')

@section('content')
    <div id="main-content" class="container">
        <h1>Edit List: {{ $list->name }}</h1>          
        <div id="edit-list-form">              
            {{ Form::model( $list, array( 'route' => ['list.update', $list->id], 'method' => 'PUT' ) )  }}
            <div class="form-group">
            {{ Form::label('name', 'What would you like to name your list?') }}
            {{ Form::text('name', null, array( 'class' => 'form-control') ) }}
            {{ $errors->first('name', '<div class="alert alert-danger" role="alert">:message</div>') }}
            </div>
            {{ Form::submit('Save Your Changes', array( 'class' => 'btn btn-success' ) ) }}
            {{ link_to_route('list.show', 'View This List', [$list->id], ['class' => 'btn btn-default'] ) }} 
            {{ link_to_route('list.index', 'View All Lists', null, ['class' => 'btn btn-default'] ) }} 
            {{ Form::close() }}
        </div>
    </div>
@stop