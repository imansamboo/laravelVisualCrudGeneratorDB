<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ddd;
use Illuminate\Http\Request;
use App\Crud;

class DddsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = Ddd::all()[0]->getFillable();
        $crud = Crud::where('name', '=', strtolower(Ddd) . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ddds = Ddd::latest()->paginate($perPage);
        } else {
            $ddds = Ddd::latest()->paginate($perPage);
        }

        return view('index', compact('ddds', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ddds.create');
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
        
        Ddd::create($requestData);

        return redirect('ddds')->with('flash_message', 'Ddd added!');
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
        $ddd = Ddd::findOrFail($id);

        return view('ddds.show', compact('ddd'));
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
        $ddd = Ddd::findOrFail($id);

        return view('ddds.edit', compact('ddd'));
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
        
        $ddd = Ddd::findOrFail($id);
        $ddd->update($requestData);

        return redirect('ddds')->with('flash_message', 'Ddd updated!');
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
        Ddd::destroy($id);

        return redirect('ddds')->with('flash_message', 'Ddd deleted!');
    }
}
