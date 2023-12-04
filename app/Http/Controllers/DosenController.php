<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dosen() {
        //$dosens = DB::select('select * from dosens');
        $dosen = Dosen::orderBy('nip')
                                ->paginate(25);
        return view('dosen', ['dosen' => $dosen]);
    }

    public function addDosen() {
        $this->authorize('isAdmin');
        return view('addDosen');
    }

    public function saveDosen(Request $request) {
        $this->authorize('isAdmin');
        $validated = $request->validate([
            'photo' => 'image | mimes:jpeg,png,jpg,gif,svg | max:2048',
            'nip' => 'required | max: 255',
            'nama' => 'required | unique:dosens',
            'alamat' => 'required',
        ]);
        $data = Dosen::create($validated);
        if($request->hasFile('photo')) {
            $request->file('photo')->move('fotoDosen/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('dosen');
    }

    public function editDosen($id) {
        $this->authorize('isAdmin');
        $dosen = Dosen::whereId($id)->first();
        return view('editDosen')->with('dosen', $dosen);
    }

    public function updateDosen(Request $request, $id) {
        $this->authorize('isAdmin');
        $dosen = Dosen::find($id);
        $dosen->nama = $request->nama;
        $dosen->nip = $request->nip;
        $dosen->alamat = $request->alamat;
        
        if ($request->hasFile('photo')) {
            $validated = $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
    
            $photoPath = 'fotoDosen/';
            $photoName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move($photoPath, $photoName);
            
            // Hapus foto lama jika ada
            if ($dosen->photo) {
                $oldPhotoPath = $photoPath . $dosen->photo;
                if (file_exists($oldPhotoPath)) {
                    unlink($oldPhotoPath);
                }
            }
            
            $dosen->photo = $photoName;
        }
        
        $dosen->save();
        return redirect('dosen');
    }    

    public function deleteDosen($id) {
        $this->authorize('isAdmin');
        $dosen = Dosen::find($id);
        $dosen->delete();
        return redirect('dosen');
    }
}
