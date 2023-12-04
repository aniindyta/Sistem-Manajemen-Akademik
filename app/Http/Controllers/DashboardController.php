<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke() {
        $data = Mahasiswa::count();
        $dosen = Dosen::count();
        return view('welcome', compact('data', 'dosen'));
    }
}
