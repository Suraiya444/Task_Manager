<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Customer\AddNewRequest;
use App\Http\Requests\Customer\UpdateRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Customer::latest()->paginate(10);
        return view('backend.customer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddNewRequest $request)
    {
        $input=$request->all();

        if($request->hasFile('photo')){
            $imageName = rand(111,999).time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/customer'), $imageName);
            $input['photo']=$imageName;
        }

        if(Customer::create($input))
            return redirect()->route('customer.index');
        else
            return redirect()->back()->withInput()->with('error', 'Failed to create customer');
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $customer=Customer::find(encryptor('decrypt',$id));
        return view('backend.customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Customer $customer)
    {
        $input=$request->all();

        if($request->hasFile('photo')){
            $imageName = rand(111,999).time().'.'.$request->photo->extension();
            $request->photo->move(public_path('uploads/customer'), $imageName);
            $input['photo']=$imageName;
        }

        if($customer->update($input))
            return redirect()->route('customer.index');
        else
            return redirect()->back()->withInput()->with('error', 'Failed to create job level');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->back();
    }
}
