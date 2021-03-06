<?php

namespace App\Http\Controllers;

use App\FormField;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Mersad;
use App\Crud;
use Illuminate\Http\Request;

class MersadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $mersads = Mersad::latest()->paginate($perPage);
        } else {
            $mersads = Mersad::latest()->paginate($perPage);
        }

        return view('mersads.index', compact('mersads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form = array();
        $fillables = (new Mersad)->getFillable();
        $crudName = strtolower('Mersad') . 's';
        $crud = Crud::where('name', '=', $crudName)->get()[0];
        $migrationFields = $crud->migrationFields;
        foreach($migrationFields as $migrationField){
            $form[] = array(
                'fieldName' => $migrationField->name,
                'formFieldType' => $migrationField->formField->form_field_type,
                'formFieldOptions' =>
                    ($migrationField->formField->form_field_options == null) ?
                        null:explode('#', $migrationField->formField->form_field_options)
            );
        }
        return view('mersads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Mersad::create($requestData);

        return redirect('mersads')->with('flash_message', 'Mersad added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $mersad = Mersad::findOrFail($id);

        return view('mersads.show', compact('mersad'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $mersad = Mersad::findOrFail($id);

        return view('mersads.edit', compact('mersad'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $mersad = Mersad::findOrFail($id);
        $mersad->update($requestData);

        return redirect('mersads')->with('flash_message', 'Mersad updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Mersad::destroy($id);

        return redirect('mersads')->with('flash_message', 'Mersad deleted!');
    }
}
