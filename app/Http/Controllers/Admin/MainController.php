<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Log;

class MainController extends Controller
{
    public function index()
    {
        $newsCount = News::count();
        $logsCount = Log::count();
        return view('admin.main.index', compact('newsCount', 'logsCount'));
    }
}
