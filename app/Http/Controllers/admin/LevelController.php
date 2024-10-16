<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public $levels = [
        'Users' => [
            'info' => ['text' => 'Add user', 'name' => 'add-user'],
            'warning' => ['text' => 'Edit user', 'name' => 'edit-user'],
            'danger' => ['text' => 'Delete user', 'name' => 'delete-user'],
            'primary' => ['text' => 'Show users', 'name' => 'show-users'],
        ],
        'Subscriptions' => [
            'info' => ['text' => 'Add Subscritpion', 'name' => 'add-subscription'],
            'warning' => ['text' => 'Edit Subscritpion', 'name' => 'edit-subscription'],
            'danger' => ['text' => 'Delete Subscritpion', 'name' => 'delete-subscription'],
            'primary' => ['text' => 'Show Subscritpions', 'name' => 'show-subscriptions'],
        ],

    ];

    public $columns = [
        'add-user','edit-user','delete-user','show-users',
        'add-subscription','edit-subscription','delete-subscription','show-subscriptions',
    ];
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $levels = $this->levels;
        return view('admin.levels.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:levels,name'
        ], [
            'name.required' => 'Please Enter level name',
            'name.unique' => 'This name is already exist',
        ]);
        $level = new Level();
        foreach ($request->request as $key => $value) {
            if ($key !== '_token' && $key !== '_method' && $key !== 'name') {
                $level->$key = $value;
            }
        }
        $level->name = $request->name;
        $level->save();
        return redirect()->route('levels.create')->with('success', 'The level has been added successfully');
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
        $level = Level::find($id);
        $levels = $this->levels;


        return view('admin.levels.edit', compact('level', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $level = Level::find($id);
        $request->validate([
            'name' => 'required|unique:levels,name, ' . $id
        ], [
            'name.required' => 'Please Enter level name',
            'name.unique' => 'This name is already exist',
        ]);
        // Level::update_level($id,$this->columns);
        // dd($request->request);
        $columns = $this->columns;
        foreach ($columns as $column) {
            $level[$column] = $request->$column ? $request->$column : "0";
        }

        $level->name = $request->name;
        $level->save();
        return redirect()->route('levels.edit', $id)->with('success', 'The level has been edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($id != 1 && $id != 2) {
            $level = Level::find($id);
            $level->delete();
            return redirect()->route('levels.index')->with('success', 'The level has been deleted');
        } else {
            return redirect()->route('levels.index')->with('danger', 'Sorry you can\'t delete this level');
        }
    }
}
