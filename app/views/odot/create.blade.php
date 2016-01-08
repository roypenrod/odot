@extends('layouts.main')

@section('content')
    <div id="main-content" class="container">
        <h1>Create New List</h1>          
        <div id="create-list-form">           
            {{ Form::open( array('route' => 'list.store') ) }}
                <div class="form-group">
                {{ Form::label('name', 'What would you like to name your to-do list?') }}
                {{ Form::text('name', null, array( 'class' => 'form-control') ) }}
                {{ $errors->first('name', '<div class="alert alert-danger" role="alert">:message</div>') }}
                </div>
                {{ Form::submit('Save Your List', array( 'class' => 'btn btn-success' ) ) }}
                {{ link_to_route('list.index', 'View All Lists', null, ['class' => 'btn btn-default'] ) }} 
            {{ Form::close() }}
        </div>
    </div>
@stop