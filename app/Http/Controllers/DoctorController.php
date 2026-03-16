<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $show = $request->show ?? 5;
        $search = $request->search;

        $query = User::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('username', 'like', "%{$search}%");
            });
        }

        $doctors = $query->paginate($show);

        $doctors->appends([
            'search' => $search,
            'show' => $show
        ]);

        return view('dokter')->with([
            'doctors' => $doctors,
            'show' => $show,
            'search' => $search,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:6',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dokter.index')
            ->with('success', 'Dokter berhasil ditambahkan');
    }

    public function update(Request $request, User $dokter)
    {
        $request->validate([
            'username' => 'required|unique:users,username,' . $dokter->id,
            'email' => 'required|email|unique:users,email,' . $dokter->id,
            'name' => 'required'
        ]);

        $data = [
            'username' => $request->username,
            'email' => $request->email,
            'name' => $request->name
        ];

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }

        $dokter->update($data);

        return redirect()->route('dokter.index')
            ->with('success', 'Dokter berhasil diupdate');
    }
    public function destroy($id)
    {
        $doctor = User::findOrFail($id);
        $doctor->delete();

        return redirect()->back()->with('success', 'Dokter berhasil dihapus');
    }
}
