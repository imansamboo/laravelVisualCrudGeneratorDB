<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Maradona;
use Illuminate\Http\Request;
use App\Crud;

class MaradonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = (new Maradona)->getFillable();
        $crud = Crud::where('name', '=', strtolower('Maradona') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $maradonas = Maradona::latest()->paginate($perPage);
        } else {
            $models = $maradonas = Maradona::latest()->paginate($perPage);
        }

        return view('index', compact('maradonas', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form = array();
        $fillables = (new Maradona)->getFillable();
        $crudName = strtolower('Maradona') . 's';
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
        
        Maradona::create($requestData);

        return redirect('maradonas')->with('flash_message', 'Maradona added!');
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
        $model = Maradona::findOrFail($id);

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
        $form = array();
        $fillables = (new Maradona)->getFillable();
        $crudName = strtolower('Maradona') . 's';
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
        $maradona = Maradona::findOrFail($id);
        $model = $maradona;
        return view('edit', array(
                                        'fillables' => $fillables,
                                        'crudName' => $crudName,
                                        'form' => $form,
                                        'model' => $model,
                                      )
                           );
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
        
        $maradona = Maradona::findOrFail($id);
        $maradona->update($requestData);

        return redirect('maradonas')->with('flash_message', 'Maradona updated!');
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
        Maradona::destroy($id);

        return redirect('maradonas')->with('flash_message', 'Maradona deleted!');
    }
}
