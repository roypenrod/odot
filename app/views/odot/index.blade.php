@extends('layouts.main')

@section('content')
    <div id="main-content" class="container">
        <h1>Your Lists</h1>      
        @foreach ($lists as $list) 
        <div class="list-container">
            <h4 class="list-name">{{ link_to_route('list.show', $list->name, [$list->id] ) }}</h4>
            {{ link_to_route('list.edit', 'edit', [$list->id], ['class' => 'btn btn-primary edit-list'] ) }}          
            {{ Form::model( $list, array('route' => ['list.destroy', $list->id], 'method' => 'DELETE') ) }}
                {{ Form::button('delete', ['type' => 'submit', 'class' => 'btn btn-danger delete-list'] ) }}
            {{ Form::close() }}
        </div>
        @endforeach  
        {{ link_to_route('list.create', 'Create New List', null, ['class' => 'btn btn-success'] ) }}      
    </div>
@stop