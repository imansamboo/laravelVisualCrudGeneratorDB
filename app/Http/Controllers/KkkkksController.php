<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Kkkkk;
use Illuminate\Http\Request;
use App\Crud;

class KkkkksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = (new Kkkkk)->getFillable();
        $crud = Crud::where('name', '=', strtolower('Kkkkk') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $kkkkks = Kkkkk::latest()->paginate($perPage);
        } else {
            $models = $kkkkks = Kkkkk::latest()->paginate($perPage);
        }

        return view('index', compact('kkkkks', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $form = array();
        $fillables = (new Kkkkk)->getFillable();
        $crudName = strtolower('Kkkkk') . 's';
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
        
        Kkkkk::create($requestData);

        return redirect('kkkkks')->with('flash_message', 'Kkkkk added!');
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
        $model = Kkkkk::findOrFail($id);

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
        $kkkkk = Kkkkk::findOrFail($id);

        return view('kkkkks.edit', compact('kkkkk'));
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
        
        $kkkkk = Kkkkk::findOrFail($id);
        $kkkkk->update($requestData);

        return redirect('kkkkks')->with('flash_message', 'Kkkkk updated!');
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
        Kkkkk::destroy($id);

        return redirect('kkkkks')->with('flash_message', 'Kkkkk deleted!');
    }
}
