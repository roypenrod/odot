<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


/*

/ = home
/lists = show all to-do lists
/list/id = show the to-do list with that id
/list/id/edit = edit and update the to-list with that id
/list/create = create a new to-do list
*/

// show all to-do lists
Route::get('/', 'OdotListController@index');


// create RESTful routes
Route::resource('list', 'OdotListController');
Route::resource('list.item', 'OdotItemController', array('except' => ['index', 'show']) );

// create a complete route using the patch method
Route::patch('/list/{listId}/item{itemId}/complete', 
             ['as' => 'list.item.complete', 'uses' => 'OdotItemController@complete']);
