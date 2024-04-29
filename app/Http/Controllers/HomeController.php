<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\RandomUser;
use App\Repo\UserRepo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Nonstandard\Uuid;

class HomeController extends Controller
{
    private UserRepo $user;
    protected $data = array();

    public function __construct(UserRepo $user,)
    {
        $this->data['dir_view'] = 'auth.';
        $this->user = $user;
    }

    public function login()
    {
        $randomUser = new RandomUser();
        $res = $randomUser->fetch();
        $array = $res['results'][0];

        $profesi = ['A', 'B', 'C', 'D', 'E'];

        $data = [
            'id' => Uuid::uuid4(),
            'nama' => $array['name']['title'] . '.' . $array['name']['first'] . ' ' . $array['name']['last'],
            'jenis_kelamin' => $array['gender'] == 'Male' ? '1' : '2',
            'email' => $array['email'],
            'password' => bcrypt($array['login']['password']),
            'nama_jalan' => 'Jl. ' . $array['location']['street']['number'] . ' ' . $array['location']['street']['name'],
            'angka_kurang' => "angka",
            'angka_lebih' => 'angka',
            'profesi' => $profesi[array_rand($profesi)],
            // 'plain_json' => $res,
        ];

        try {
            $user = $this->user->store($data);

            Auth::login($user);
            
            return redirect()->route('dashboard')->with('success', 'Selamat Datang' . $user->nama);
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat login");
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/')->with('success', 'Berhasil logout');
        } catch (\Throwable $th) {
            if (env('APP_DEBUG') == true) {
                return $th->getMessage();
            }
            return back()->with('error', "Oops..!! Terjadi keesalahan saat logout");
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
