<?php

class OdotListItem extends Eloquent {
        
    protected $table = 'list_items';
    
    public function parentList() {
        return $this->belongsTo('OdotList');
    }
}
