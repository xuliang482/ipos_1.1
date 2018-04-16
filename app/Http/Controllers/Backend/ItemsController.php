<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Item;

class ItemsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::paginate(15);
        return view('items.index')->with('item', $items);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('items.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $items = new Item;
        $items->upc_ean_isbn = Input::get('upc_ean_isbn');
        $items->name = Input::get('name');
        $items->category = Input::get('category');
        $items->cost_price = Input::get('cost_price');
        $items->selling_price = Input::get('selling_price');
        $items->quantity = Input::get('quantity');
        $items->description = Input::get('description');
        $items->save();
        // process inventory
        /*
         if(!empty(Input::get('quantity')))
         {
         $inventories = new Inventory;
         $inventories->item_id = $items->id;
         $inventories->user_id = Auth::user()->id;
         $inventories->in_out_qty = Input::get('quantity');
         $inventories->remarks = 'Manual Edit of Quantity';
         $inventories->save();
         }*/
        // process avatar
        $image = $request->file('avatar');
        if(!empty($image))
        {
            $avatarName = 'item' . $items->id . '.' .
                $request->file('avatar')->getClientOriginalExtension();
                
                $request->file('avatar')->move(
                    base_path() . '/public/images/items/', $avatarName
                    );
                $img = Image::make(base_path() . '/public/images/items/' . $avatarName);
                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                    $img->save();
                    $itemAvatar = Item::find($items->id);
                    $itemAvatar->avatar = $avatarName;
                    $itemAvatar->save();
        }
        Session::flash('message', Lang::get('item.message_successful_create'));
        return Redirect::to('items/create');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::find($id);
        return view('items.edit')
        ->with('item', $items);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
