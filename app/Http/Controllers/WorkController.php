<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WorkFromUser;

class WorkController extends Controller
{
    public function index()
    {
        $works = WorkFromUser::all();

        return view('welcome', compact('works'));
    }

    public function show($id){
        $works = WorkFromUser::find($id);
        return view('works_detail.show', compact('works'));
    }
}
