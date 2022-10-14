<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorsFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {

        return view('admin.colors.index');
    }

    public function create()
    {

        return view('admin.colors.create');
    }

    public function store(ColorsFormRequest $request)
    {
        $validateData = $request->validated();

        Color::create($validateData);
        return redirect('/admin/colors')->with('message', 'Color Added Successfully');
    }
}
