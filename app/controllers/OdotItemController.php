<?php

class OdotItemController extends \BaseController {
    
    /** 
     *  filter the writable routes to make sure
     *  they are protected from CSRF
     */
    public function __construct() 
    {
        $this->beforeFilter('csrf', array('on' => ['post', 'put', 'delete', 'patch'] ) );
    }
    

	/**
	 * Show the form for creating a new list item.
	 *
     * @param  int  $listId
     *
	 * @return Response
	 */
	public function create($listId)
	{
		$list = OdotList::findOrFail($listId);
        return View::make('odot.items.create')->with('list', $list);        
	}


	/**
	 * Store a newly created list item in the database.
	 *
	 * @param  int  $listId
     *
	 * @return Response
	 */
	public function store($listId)
	{
        $list = OdotList::findOrFail($listId);
        
        // define the validation rules
        $validationRules = array(
            'content' => array('required')
        );
        
        // validates the input
        $validator = Validator::make(Input::all(), $validationRules);
        
        // checks to see if the input fails validation
        if ( $validator->fails() ) {
            // if it's not valid, send them back
            // to the create list item form           
            return Redirect::route('list.item.create', $listId)->withErrors($validator)->withInput();
        }
        
		$item = new OdotListItem();
        $item->content = Input::get('content');
        
        // save it 
        $list->listItems()->save($item);
        
        
        return Redirect::route('list.show', $list->id)->with('message', 'Your item was added.');
	}


	/**
	 * Show the form for editing the list item.
	 *
	 * @param  int  $listId
     * @param int $itemId
	 * @return Response
	 */
	public function edit($listId, $itemId)
	{
		$item = OdotListItem::findOrFail($itemId);    

        return View::make('odot.items.edit')
            ->with('listId', $listId)
            ->with('item', $item);      
	}


	/**
	 * Update the list item in the database.
	 *
	 * @param  int  $listId
     * @param int $itemId
	 * @return Response
	 */
	public function update($listId, $itemId)
	{
        // define the validation rules
        $validationRules = array(
            'content' => array('required')
        );
        
        // validates the input
        $validator = Validator::make(Input::all(), $validationRules);
        
        // checks to see if the input fails validation
        if ( $validator->fails() ) {
            // if it's not valid, send them back
            // to the edit list item form           
            return Redirect::route('list.item.edit', [$listId, $itemId])
                ->withErrors($validator)
                ->withInput();
        }
        
        $item = OdotListItem::findOrFail($itemId); 
        $item->content = Input::get('content');
        $item->update();
        
        return Redirect::route('list.show', $listId)
            ->with('message', 'Your item was updated.');
        
	}


	/**
	 * Remove the list item from the database.
	 *
	 * @param  int  $listId
     * @param int $itemId
	 * @return Response
	 */
	public function destroy($listId, $itemId)
	{
        $item = OdotListItem::findOrFail($itemId)->delete(); 
        
        return Redirect::route('list.show', $listId)
            ->with('message', 'Your item was deleted.');
	}

    
	/**
	 * Complete the list item by adding a completed date to the database.
	 *
	 * @param  int  $listId
     * @param int $itemId
	 * @return Response
	 */
	public function complete($listId, $itemId)
	{
        $item = OdotListItem::findOrFail($itemId); 
        $item->completed_on = date('Y-m-d H:i:s');
        $item->update();
        
        return Redirect::route('list.show', $listId)
            ->with('message', 'Your item was completed.');
	}    

}
