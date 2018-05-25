<?php

namespace App\Http\Controllers\Backend;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomersController extends Controller
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
    public function index(Request $request)
    {

        $customers = Customer::all();
        return view('customers.index')->with('customer', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        // store
        $customers = new Customer;
        $customers->name = Input::get('name');
        $customers->gender = Input::get('gender');
        $customers->email = Input::get('email');
        $customers->phone_number = Input::get('phone_number');
        $customers->address = Input::get('address');
        $customers->province = Input::get('province');
        $customers->city = Input::get('city');
        $customers->district = Input::get('district');
        $customers->zip = Input::get('zip');
        $customers->company_name = Input::get('company_name');
        $customers->comment = Input::get('comment');
        $customers->account = Input::get('account');
        $customers->save();
        // process avatar
        $image = $request->file('avatar');
        if(!empty($image)) {
            $avatarName = 'cus' . $customers->id . '.' .
                $request->file('avatar')->getClientOriginalExtension();
                
                $request->file('avatar')->move(
                    base_path() . '/public/images/customers/', $avatarName
                    );
                $img = Image::make(base_path() . '/public/images/customers/' . $avatarName);
                $img->resize(100, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                    $img->save();
                    $customerAvatar = Customer::find($customers->id);
                    $customerAvatar->avatar = $avatarName;
                    $customerAvatar->save();
        }
        //Session::flash('message',  Lang::get('customer.message_successful_create'));
        
        $toastr = array(
            'type' => 'success',
            'message' => Lang::get('customer.message_successful_create'),
            'options' => array(
                    'positionClass'=> 'toast-top-right',
                    'progressBar'=> true,
                )
        );
        
        Session::flash('toastr',  $toastr); 
        
        
        //app_toastr($toastr);
        
        return Redirect::to('customers');
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
        $customers = Customer::find($id);
        return view('customers.edit')
            ->with('customer', $customers);
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
        $customers = Customer::find($id);
        $customers->name = Input::get('name');
        $customers->email = Input::get('email');
        $customers->phone_number = Input::get('phone_number');
        $customers->address = Input::get('address');
        $customers->province = Input::get('province');
        $customers->city = Input::get('city');
        $customers->district = Input::get('district');
        $customers->zip = Input::get('zip');
        $customers->company_name = Input::get('company_name');
        $customers->comment = Input::get('comment');
        $customers->account = Input::get('account');
        $customers->save();
        // process avatar
        $image = $request->file('avatar');
        if(!empty($image)) {
            $avatarName = 'cus' . $id . '.' .
                $request->file('avatar')->getClientOriginalExtension();

            $request->file('avatar')->move(
                base_path() . '/public/images/customers/', $avatarName
            );
            $img = Image::make(base_path() . '/public/images/customers/' . $avatarName);
            $img->resize(100, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
            $customerAvatar = Customer::find($id);
            $customerAvatar->avatar = $avatarName;
            $customerAvatar->save();
        }
        // redirect
        Session::flash('message', Lang::get('customer.message_successful_update'));
        return Redirect::to('customers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  array|int  $ids
     * @return \Illuminate\Http\Response
     */
    public function destroy($ids)
    {
        //$ids = $request->ids;
        Customer::destroy($ids);
        // redirect
        Session::flash('message', Lang::get('customer.message_successful_delete'));
        return Redirect::to('customers');
    }

    
}
