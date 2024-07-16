<?php
namespace App\Http\Controllers;

use App\Models\level;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the classes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Level::all();
        return view('classes.index', compact('classes'));
    }
}
