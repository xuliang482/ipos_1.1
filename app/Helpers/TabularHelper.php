<?php 

namespace App\Helpers;

use Illuminate\Support\Facades\Lang;

class TabularHelper{
    
    /*
     Get the header for the items tabular view
     */
    static function get_items_manage_table_headers()
    { 
        $headers = array(
            array('id' => Lang::get('item.id')),
            array('avatar' => Lang::get('item.avatar')),
            array('upc_ean_isbn' => Lang::get('item.upc_ean_isbn')),
            array('name' => Lang::get('item.name')),
            array('category' => Lang::get('item.category')),
            array('cost_price' => Lang::get('item.cost_price')),
            array('selling_price' => Lang::get('item.selling_price')),
            array('quantity' => Lang::get('item.quantity')),
            array('description' => Lang::get('item.description'))

        );
        
        return TabularHelper::transform_headers($headers);
    }
    
    
    /*
     Basic tabular headers function
     */
    static function transform_headers($array, $readonly = FALSE, $editable = TRUE)
    {
        $result = array();
        
        if(!$readonly)
        {
            $array = array_merge(array(array('checkbox' => 'select', 'sortable' => FALSE)), $array);
        }
        
       
        if($editable)
        {
            $array[] = array('operate' => Lang::get('common.operate') , 'sortable' => FALSE,'formatter' => 'operateFormatter','events' => 'operateEvents');
        }
        
        foreach($array as $element)
        {
            reset($element);
            $result[] = array('field' => key($element),
                'title' => current($element),
                'switchable' => isset($element['switchable']) ? $element['switchable'] : !preg_match('(^$|&nbsp)', current($element)),
                'sortable' => isset($element['sortable']) ? $element['sortable'] : current($element) != '',
                'checkbox' => isset($element['checkbox']) ? $element['checkbox'] : FALSE,
                'class' => isset($element['checkbox']) || preg_match('(^$|&nbsp)', current($element)) ? 'print_hide' : '',
                'events' => isset($element['events']) ? $element['events'] : '',
                'formatter' => isset($element['formatter']) ? $element['formatter'] : '',
                'sorter' => isset($element['sorter']) ? $element ['sorter'] : '');
        }
        
        return json_encode($result);
    }
    
    
    /*
     Get the html data row for the item
     */
    static function get_item_data_row($item)
    {
 
        $image = NULL;
        if ($item->avatar != '')
        {
            $ext = pathinfo($item->avatar, PATHINFO_EXTENSION);
            if($ext == '')
            {
                // legacy
                $images = asset('/uploads/items/' . $item->avatar . '.*');
            }
            else
            {
                // preferred
                $images = asset('/uploads/items/' . $item->avatar);
            }
 
            $image .= '<a class="preview" href="'.$images .'"><img src="'.$images. '"></a>';
 
        }
        
        return array (
            'id' => $item->id,
            'avatar' => $image,
            'upc_ean_isbn' => $item->upc_ean_isbn,
            'name' => $item->name,
            'category' => $item->category,
            'cost_price' => $item->cost_price,
            'selling_price' => $item->unit_price,
            'quantity' => $item->quantity,
            'description' => $item->description);
    }
}