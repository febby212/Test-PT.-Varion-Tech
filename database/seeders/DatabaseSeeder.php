<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Gender;
use App\Models\Profesi;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Nonstandard\Uuid;
use Ramsey\Uuid\Uuid as UuidUuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Gender::create([
            'id' => Uuid::uuid4(),
            'kode_JK' => 1,
            'nama' => 'Laki-Laki'
        ]);

        Gender::create([
            'id' => Uuid::uuid4(),
            'kode_JK' => 2,
            'nama' => 'Perempuan'
        ]);

        $profesi = ['Petani', 'Teknisi', 'Guru', 'Nelayan', 'Seniman'];
        $kode = ['A', 'B', 'C', 'D', 'E'];

        foreach ($profesi as $key => $nama) {
            Profesi::create([
                'id' => Uuid::uuid4(),
                'kode_profesi' => $kode[$key],
                'nama' => $nama
            ]);
        }

        // Profesi::create([
        //     'id' => UuidUuid::uuid4(),
        //     'kode_profesi' => $kode,
        //     'nama' => $profesi
        // ]);
    }
}
