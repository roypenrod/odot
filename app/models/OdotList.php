<?php

class OdotList extends Eloquent {
        
    protected $table = 'lists';
    
    public function listItems() {          
        return $this->hasMany('OdotListItem');
    }
    
    // remove the list items for this list
    // before deleting the list itself
    public function delete() {
        OdotListItem::where('odot_list_id', $this->id)->delete();
        parent::delete();
    }
}
