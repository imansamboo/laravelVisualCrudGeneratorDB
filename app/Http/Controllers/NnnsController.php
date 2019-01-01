<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Nnn;
use Illuminate\Http\Request;
use App\Crud;

class NnnsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = (new Nnn)->getFillable();
        $crud = Crud::where('name', '=', strtolower('Nnn') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $nnns = Nnn::latest()->paginate($perPage);
        } else {
            $models = $nnns = Nnn::latest()->paginate($perPage);
        }

        return view('index', compact('nnns', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form = array();
        $fillables = (new Nnn)->getFillable();
        $crudName = strtolower('Nnn') . 's';
        $crud = Crud::where('name', '=', $crudName)->get()[0];
        $migrationFields = $crud->migrationFields;
        foreach($migrationFields as $migrationField){
            $form[] = array(
                'fieldName' => $migrationField->name,
                'formFieldType' => $migrationField->formField->form_field_type,
                'formFieldOptions' =>
                                    ($migrationField->formField->form_field_options == null) ?
                                                                                                null:
                                                                                                explode('#', $migrationField->formField->form_field_options)
            );
        }
        dd($fillables);
        return view('create', array(
                                'fillables' => '$fillables',
                                'crudName' => '$crudName',
                                'form' => '$form',
                              )
                   );
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
        
        Nnn::create($requestData);

        return redirect('nnns')->with('flash_message', 'Nnn added!');
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
        $model = Nnn::findOrFail($id);

        return view('show', compact('model'));
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
        $nnn = Nnn::findOrFail($id);

        return view('nnns.edit', compact('nnn'));
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
        
        $nnn = Nnn::findOrFail($id);
        $nnn->update($requestData);

        return redirect('nnns')->with('flash_message', 'Nnn updated!');
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
        Nnn::destroy($id);

        return redirect('nnns')->with('flash_message', 'Nnn deleted!');
    }
}
