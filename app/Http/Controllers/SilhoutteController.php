<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SilhoutteController extends Controller
{
    //
    public function index() {
        return view('silhoutte.index');
    }

    public function initCases(Request $request) {
        $cases = $request->totalCases;

        return view('silhoutte.cases', compact('cases'));
    }
}
