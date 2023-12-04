<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class MahasiswaController extends Controller
{
    public function mahasiswa() {
        //$mahasiswas = DB::select('select * from mahasiswas');
        $mahasiswas = Mahasiswa::orderBy('kelas')
                                ->orderBy('nim')
                                ->paginate(25);
        return view('mahasiswa', ['mahasiswa' => $mahasiswas]);
    }

    public function addMahasiswa() {
        $this->authorize('isAdmin');
        return view('addMahasiswa');
    }

    public function saveMahasiswa(Request $request) {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'nama' => 'required | max: 255',
            'nim' => 'required | unique:mahasiswas',
            'kelas' => 'required',
            'alamat' => 'required',
        ]);
        Mahasiswa::create($validated);
        return redirect()->route('mahasiswa');
    }

    public function editMahasiswa($id) {
        $this->authorize('isAdmin');
        $mahasiswa = Mahasiswa::whereId($id)->first();
        return view('editMahasiswa')->with('mahasiswa', $mahasiswa);
    }

    public function updateMahasiswa(Request $request, $id) {
        $this->authorize('isAdmin');
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nama = $request->nama;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->kelas = $request->kelas;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->save();
        return redirect('mahasiswa');
    }

    public function deleteMahasiswa($id) {
        $this->authorize('isAdmin');
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect('mahasiswa');
    }
}
