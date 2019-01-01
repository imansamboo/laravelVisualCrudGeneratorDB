<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Par;
use Illuminate\Http\Request;
use App\Crud;

class ParsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = Par::all()[0]->getFillable();
        $crud = Crud::where('name', '=', strtolower('Par') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $models = $pars = Par::latest()->paginate($perPage);
        } else {
            $models = $pars = Par::latest()->paginate($perPage);
        }

        return view('index', compact('pars', 'models', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pars.create');
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
        
        Par::create($requestData);

        return redirect('pars')->with('flash_message', 'Par added!');
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
        $par = Par::findOrFail($id);

        return view('pars.show', compact('par'));
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
        $par = Par::findOrFail($id);

        return view('pars.edit', compact('par'));
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
        
        $par = Par::findOrFail($id);
        $par->update($requestData);

        return redirect('pars')->with('flash_message', 'Par updated!');
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
        Par::destroy($id);

        return redirect('pars')->with('flash_message', 'Par deleted!');
    }
}
