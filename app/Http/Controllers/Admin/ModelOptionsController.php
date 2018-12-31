<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ModelOption;
use Illuminate\Http\Request;

class ModelOptionsController extends Controller
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
            $modeloptions = ModelOption::where('title', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $modeloptions = ModelOption::latest()->paginate($perPage);
        }

        return view('admin.model-options.index', compact('modeloptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.model-options.create');
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
        
        ModelOption::create($requestData);

        return redirect('admin/model-options')->with('flash_message', 'ModelOption added!');
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
        $modeloption = ModelOption::findOrFail($id);

        return view('admin.model-options.show', compact('modeloption'));
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
        $modeloption = ModelOption::findOrFail($id);

        return view('admin.model-options.edit', compact('modeloption'));
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
        
        $modeloption = ModelOption::findOrFail($id);
        $modeloption->update($requestData);

        return redirect('admin/model-options')->with('flash_message', 'ModelOption updated!');
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
        ModelOption::destroy($id);

        return redirect('admin/model-options')->with('flash_message', 'ModelOption deleted!');
    }
}
