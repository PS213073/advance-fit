<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Checkin;
use Illuminate\Http\Request;

class ClientCheckinController extends Controller
{
    function construct()
    {
        $this->middleware('role_or_permission:View checkin', ['only' => ['index', 'show']]);
    }

    public function index()
    {
        $checkins = Checkin::with(['frontuser', 'location'])->get();
        return view('settings.checkins.index', compact('checkins'));
    }
}
