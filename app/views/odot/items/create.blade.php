@extends('layouts.main')

@section('content')
    <div id="main-content" class="container">
        <h1>Create New List Item</h1>          
        <div id="create-list-item-form">           
            {{ Form::open( array('route' => ['list.item.store', $list->id] ) ) }}
                <div class="form-group">
                {{ Form::label('content', 'What item do you want to add to your list?') }}
                {{ Form::text('content', null, array( 'class' => 'form-control') ) }}
                {{ $errors->first('content', '<div class="alert alert-danger" role="alert">:message</div>') }}
                </div>
                {{ Form::submit('Save It', array( 'class' => 'btn btn-success' ) ) }}
                {{ link_to_route('list.show', 'View This List', [$list->id], ['class' => 'btn btn-default'] ) }} 
            {{ Form::close() }}            
        </div>
    </div>
@stop