@extends('layouts.main')

@section('content')
    <div id="main-content" class="container">
        <h1>Edit List Item: {{ $item->content }}</h1>          
        <div id="edit-list-item-form">              
        {{ Form::model($item, array('route' => ['list.item.update', $listId, $item->id], 'method' => 'PUT') ) }}
            <div class="form-group">
            {{ Form::label('content', 'What do you want to name this list item?') }}
            {{ Form::text('content', null, array( 'class' => 'form-control') ) }}
            {{ $errors->first('content', '<div class="alert alert-danger" role="alert">:message</div>') }}
            </div>
            {{ Form::submit('Save It', array( 'class' => 'btn btn-success' ) ) }}
            {{ link_to_route('list.show', 'View This List', [$listId], ['class' => 'btn btn-default'] ) }} 
            {{ link_to_route('list.index', 'View All Lists', null, ['class' => 'btn btn-default'] ) }} 
        {{ Form::close() }}
        </div>
    </div>
@stop