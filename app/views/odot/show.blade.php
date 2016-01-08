@extends('layouts.main')

@section('content')
    <div id="main-content" class="container">
        <h1>{{{ $list->name }}}</h1>  
        @foreach($items as $item)
            <div class="list-item-container">
                <!-- if the item is completed, add a list-item-completed class to it -->
                @if ($item->completed_on)
                    <h4 class="list-item list-item-completed">{{{ $item->content }}}</h4>
                @else
                    <h4 class="list-item">{{{ $item->content }}}</h4>
                @endif
                
                {{ link_to_route('list.item.edit', 'edit', [$list->id, $item->id], ['class' => 'btn btn-primary edit-list-item'] ) }}
                
                @if ($item->completed_on === NULL)
                    {{ Form::model( $item, array('route' => ['list.item.complete', $list->id, $item->id], 'method' => 'PATCH') ) }}
                        {{ Form::button('complete', ['type' => 'submit', 'class' => 'btn btn-success complete-list'] ) }}
                    {{ Form::close() }}
                @endif
                
                {{ Form::model( $item, array('route' => ['list.item.destroy', $list->id, $item->id], 'method' => 'DELETE') ) }}
                    {{ Form::button('delete', ['type' => 'submit', 'class' => 'btn btn-danger delete-list'] ) }}
                {{ Form::close() }}
            </div>
        @endforeach
        {{ link_to_route('list.item.create', 'Create New List Item', [$list->id], ['class' => 'btn btn-success'] ) }}   
        {{ link_to_route('list.index', 'View All Lists', null, ['class' => 'btn btn-default'] ) }}    
    </div>
@stop