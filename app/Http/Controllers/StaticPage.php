<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticPage extends Controller
{
    public function index()
    {
      return view('staticpages.index')
    }

    public function privacy()
    {

    }

    public function faq()
    {

    }
}
