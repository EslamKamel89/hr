<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscripeController extends Controller
{

    public function index()
    {
        $subscriptions = Subscription::all();
        return view('admin.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Level::has_permission('add-subscription')) {
            return view('admin.subscriptions.create');
        } else {
            return redirect()->route('admin');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Level::has_permission('add-subscription')) {
            $subscription = new Subscription();
            $request->validate([
                'name' => 'required|unique:subscriptions,name',
                'company_no' => 'required',
                'department_no' => 'required',
                'employees_no' => 'required',
                'period' => 'required',
                'value' => 'required',
            ], [
                'name.required' => 'Please Enter package name',
                'company_no.required' => 'Please Enter the subscription\'s companies number',
                'department_no.required' => 'Please Enter the subscription\'s departments number',
                'employees_no.required' => 'Please Enter the subscription\'s employees number',
                'period.required' => 'Please Enter the subscription\'s period ',
                'value.required' => 'Please Enter the subscription\'s price',
                'name.unique' => 'This name is already exist',
            ]);
            $subscription->name = $request->name;
            $subscription->company_no = $request->company_no;
            $subscription->department_no = $request->department_no;
            $subscription->employees_no = $request->employees_no;
            $subscription->period = $request->period;
            $subscription->value = $request->value;
            $subscription->save();

            return redirect()->route('subscriptions.create')->with('success', 'The subscription has been added successfully');
        } else {
            echo "<script>aler('Sorry don't has permisssion')</script>";
            return redirect()->route('admin');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Level::has_permission('edit-subscription')) {
            $subscription = Subscription::find($id);
            return view('admin.subscriptions.edit', compact('subscription'));
        } else {
            echo "<script>aler('Sorry don't has permisssion')</script>";
            return redirect()->route('admin');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Level::has_permission('edit-subscription')) {
            $subscription = Subscription::find($id);
            $request->validate([
                'name' => 'required|unique:subscriptions,name,'.$id,
                'company_no' => 'required',
                'department_no' => 'required',
                'employees_no' => 'required',
                'period' => 'required',
                'value' => 'required',
            ], [
                'name.required' => 'Please Enter package name',
                'company_no.required' => 'Please Enter the subscription\'s companies number',
                'department_no.required' => 'Please Enter the subscription\'s departments number',
                'employees_no.required' => 'Please Enter the subscription\'s employees number',
                'period.required' => 'Please Enter the subscription\'s period ',
                'value.required' => 'Please Enter the subscription\'s price',
                'name.unique' => 'This name is already exist',
            ]);
            $subscription->name = $request->name;
            $subscription->company_no = $request->company_no;
            $subscription->department_no = $request->department_no;
            $subscription->employees_no = $request->employees_no;
            $subscription->period = $request->period;
            $subscription->value = $request->value;
            $subscription->save();

            return redirect()->route('subscriptions.edit',$id)->with('success', 'The subscription has been edited successfully');
        } else {
            echo "<script>aler('Sorry don't has permisssion')</script>";
            return redirect()->route('admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Level::has_permission('delete-subscription')) {
            $subscription = Subscription::find($id);
            $subscription->delete();
            return redirect()->route('subscriptions.index')->with('success', 'The subscription has been deleted successfully');
        } else {
            echo "<script>aler('Sorry don't has permisssion')</script>";
            return redirect()->route('admin');
        }
    }
}
