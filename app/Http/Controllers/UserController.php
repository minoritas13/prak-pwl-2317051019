<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\UserModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }


    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required|string|max:100',
        'npm' => 'required|string|max:20',
        'kelas_id' => 'required|exists:kelas,id',
    ]);

    UserModel::create([
        'id'         => (string) Str::uuid(),
        'nama'       => $request->input('nama'),
        'npm'        => $request->input('npm'),
        'kelas_id'   => $request->input('kelas_id'),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ]);

    return redirect()->to('/user');
}

    public function index()
    {
        $users = UserModel::with('kelas')->get();
        $title = 'test';
        foreach ($users as $user) {
            if ($user->kelas && !empty($user->kelas->nama_kelas)) {
                try {
                    $user->kelas->nama_kelas = Crypt::decryptString($user->kelas->nama_kelas);
                } catch (DecryptException $e) {
                    Log::error('Gagal dekripsi nama_kelas (ID: ' . $user->kelas->id . ') untuk user: ' . $user->id, [
                        'error' => $e->getMessage(),
                    ]);
                    $user->kelas->nama_kelas = '[Data Kelas Rusak]';
                }
            }
        }
        $data = [
            'users' => $users,
            'title' => $title,
        ];
        return view('list_user', $data);
    }

    public function create()
    {
        $kelas = Kelas::all();
        $title = 'tes';

        foreach ($kelas as $kelasItem) {
            if ($kelasItem && !empty($kelasItem->nama_kelas)) {

                try {
                    $decryptedName = Crypt::decryptString($kelasItem->nama_kelas);
                    $kelasItem->nama_kelas = $decryptedName;
                } catch (DecryptException $e) {

                    Log::error('Gagal dekripsi nama_kelas (ID: '.$kelasItem->id.')
                    saat memuat form create user',
                    ['error' => $e->getMessage()]);

                    $kelasItem->nama_kelas = '[Data Kelas Rusak]';
                }
            }
        }
        return view('create_user', ['kelas' => $kelas, 'title' => $title]);
    }

    public function edit($id)
    {
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel->getKelas();

        $data = [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ];

        return view('edit_user', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'npm' => 'required|string|max:20',
            'kelas_id' => 'required|exists:kelas,id',
        ]);

        $user = $this->userModel->findOrFail($id);

        $user->update([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user');
    }

    public function destroy($id)
    {
        $user = $this->userModel->findOrFail($id);
        $user->delete();

        return redirect()->to('/user');
    }
}
