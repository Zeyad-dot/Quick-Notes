<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoteLog;

class AdminController extends Controller
{
    public function logs()
    {
        $logs = NoteLog::with('user', 'note')->latest()->get();
        return view('admin.logs', ['logs' => $logs]);
    }
}
