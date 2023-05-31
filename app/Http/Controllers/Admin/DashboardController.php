<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // dd(Auth::user());
        $this->data['currentAdminMenu'] = 'dashboard';
        return view('admin.dashboard.index', $this->data);
    }
}
