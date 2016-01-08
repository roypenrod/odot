<?php

class OdotListController extends \BaseController {
    
    /** 
     *  filter the writable routes to make sure
     *  they are protected from CSRF
     */
    public function __construct() 
    {
        $this->beforeFilter('csrf', array('on' => ['post', 'put', 'delete', 'patch'] ) );
    }
    

	/**
	 * Display a listing of the all the lists.
	 *
	 * @return Response
	 */
	public function index()
	{
        $lists = OdotList::all();
        return View::make('odot.index')->with('lists', $lists);       
    }

	/**
	 * Show the form for creating a list.
	 *
	 * @return Response
	 */
	public function create()
	{        
		return View::make('odot.create');        
	}


	/**
	 * Store a newly created list in the database.
	 *
	 * @return Response
	 */
	public function store()
	{
        // define the validation rules
        $validationRules = array(
            'name' => array('required', 'unique:lists')
        );
        
        // validates the input
        $validator = Validator::make(Input::all(), $validationRules);
        
        // checks to see if the input fails validation
        if ( $validator->fails() ) {
            // if it's not valid, send them back
            // to the create list form           
            return Redirect::route('list.create')->withErrors($validator)->withInput();
        }
        
		$newListName = Input::get('name');
    
        $list = new OdotList();
        $list->name = $newListName;
        $list->save();
        return Redirect::route('list.index')->with('message', 'Your list was created.');
	}


	/**
	 * Display the list.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        
        $list = OdotList::findOrFail($id);
        $items = $list->listItems()->get();

        return View::make('odot.show')
            ->with('list', $list)
            ->with('items', $items);    
	}


	/**
	 * Show the form for editing the list.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $list = OdotList::findOrFail($id);        
		return View::make('odot.edit')->with('list', $list);
	}


	/**
	 * Update the list in the database.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        // define the validation rules
        $validationRules = array(
            'name' => array('required', 'unique:lists')
        );
        
        // validates the input
        $validator = Validator::make(Input::all(), $validationRules);
        
        // checks to see if the input fails validation
        if ( $validator->fails() ) {
            // if it's not valid, send them back
            // to the edit list form           
            return Redirect::route('list.edit', $id)->withErrors($validator)->withInput();
        }
        
        $updatedListName = Input::get('name');
    
        $list = OdotList::findOrFail($id);
        $list->name = $updatedListName;
        $list->update();
        return Redirect::route('list.index')->with('message', 'Your list was updated.');
        
	}


	/**
	 * Remove the list from the database.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{        
		$list = OdotList::findOrFail($id)->delete();
        return Redirect::route('list.index')->with('message', 'Your list was deleted.');
	}


}
