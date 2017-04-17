<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionsController extends Controller
{
    public function index()
    {
        return view('admin.questions.index');
    }

    public function create()
    {
        return view("admin.questions.create");
    }
}
