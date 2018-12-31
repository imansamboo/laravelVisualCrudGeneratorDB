<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Crud;

use App\{{mod
elNamespace}}Ccc;
use Illuminate\Http\Request;

class CccsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = Ccc::all()[0]->getFillable();
        $crud = Crud::where('name', '=', strtolower('Ccc') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cccs = Ccc::latest()->paginate($perPage);
        } else {
            $cccs = Ccc::latest()->paginate($perPage);
        }

        return view('index', compact('cccs', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cccs.create');
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
        
        Ccc::create($requestData);

        return redirect('cccs')->with('flash_message', 'Ccc added!');
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
        $ccc = Ccc::findOrFail($id);

        return view('cccs.show', compact('ccc'));
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
        $ccc = Ccc::findOrFail($id);

        return view('cccs.edit', compact('ccc'));
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
        
        $ccc = Ccc::findOrFail($id);
        $ccc->update($requestData);

        return redirect('cccs')->with('flash_message', 'Ccc updated!');
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
        Ccc::destroy($id);

        return redirect('cccs')->with('flash_message', 'Ccc deleted!');
    }
}
