<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Item extends Model
{
    public static function search($search, $filters, $rows = 0, $limit_from = 0, $sort = 'items.name', $order = 'asc'){
        
    
        if($filters['search_custom'] == FALSE)
        {
           
            return Item::where('active', 1)
            ->orWhere('name', 'like', $search)
            ->orWhere('upc_ean_isbn', 'like', $search)
            ->orWhere('category', 'like', $search)
            ->get();
        }
        else
        {
            
        }
   

    }
}
