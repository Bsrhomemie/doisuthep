<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('work.create');
    }

    public function store(Request $request)
    {
        return redirect('/admin')
                         ->with('success', 'Created successfully');
    }
    public function __invoke(Request $request)
    {
        //
    }
}
