<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Vvv;
use Illuminate\Http\Request;
use App\Crud;

class VvvsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = (new Vvv)->getFillable();
        $crud = Crud::where('name', '=', strtolower('Vvv') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $vvvs = Vvv::latest()->paginate($perPage);
        } else {
            $models = $vvvs = Vvv::latest()->paginate($perPage);
        }

        return view('index', compact('vvvs', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form = array();
        $fillables = (new Vvv)->getFillable();
        $crudName = strtolower('Vvv') . 's';
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
        return view('create', array(
                                'fillables' => $fillables,
                                'crudName' => $crudName,
                                'form' => $form,
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
        
        Vvv::create($requestData);

        return redirect('vvvs')->with('flash_message', 'Vvv added!');
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
        $model = Vvv::findOrFail($id);

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
        $vvv = Vvv::findOrFail($id);

        return view('vvvs.edit', compact('vvv'));
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
        
        $vvv = Vvv::findOrFail($id);
        $vvv->update($requestData);

        return redirect('vvvs')->with('flash_message', 'Vvv updated!');
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
        Vvv::destroy($id);

        return redirect('vvvs')->with('flash_message', 'Vvv deleted!');
    }
}
