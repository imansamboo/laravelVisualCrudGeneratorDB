<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Bbb;
use Illuminate\Http\Request;
use App\Crud;

class BbbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $fillables = Bbb::all()[0]->getFillable();
        $crud = Crud::where('name', '=', strtolower('Bbb') . 's')->get()[0];
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $bbbs = Bbb::latest()->paginate($perPage);
        } else {
            $bbbs = Bbb::latest()->paginate($perPage);
        }

        return view('index', compact('bbbs', 'fillables', 'crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bbbs.create');
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
        
        Bbb::create($requestData);

        return redirect('bbbs')->with('flash_message', 'Bbb added!');
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
        $bbb = Bbb::findOrFail($id);

        return view('bbbs.show', compact('bbb'));
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
        $bbb = Bbb::findOrFail($id);

        return view('bbbs.edit', compact('bbb'));
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
        
        $bbb = Bbb::findOrFail($id);
        $bbb->update($requestData);

        return redirect('bbbs')->with('flash_message', 'Bbb updated!');
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
        Bbb::destroy($id);

        return redirect('bbbs')->with('flash_message', 'Bbb deleted!');
    }
}
