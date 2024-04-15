<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse; 

class ChirpController extends Controller

{

    /**

     * Display a listing of the resource.

     */

    public function index(): View 

    {

        return view('chirps.index');

    }

}