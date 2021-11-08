<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    function create()
    {
        return view('create');
    }

    function store(Request $request)
    {
        $rules = [
            'project_on' => 'required',
            'tools' => 'required',
            'url' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'thumbnail' => 'required',
        ];

        $validator = validator($request->all(), $rules);

        if($validator->fails()){
            return redirect()->to('/portfolio/create');
        }

        $data = [
            'project_on' => $request->project_on,
            'tools' => $request->tools,
            'url' => $request->url,
            'status' => $request->status,
            'featured' => $request->featured,
            'thumbnail' => $request->file('thumbnail')->store('thumbnail'),
        ];
        // $request->file('thumbnail')->store('thumbnail')
        // $request->file('thumbnail')->store('thumbnail');
        Portfolio::create($data);
        return redirect()->to('/portfolio/create');
    }
}
