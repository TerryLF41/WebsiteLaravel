<?php

namespace Database\Seeders;

use App\Models\Program_studi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = [
            "informatika",
            "olb"
        ];
        foreach ($prodis as $key => $prodi) {
            Program_studi::create([
                "nama" => $prodi
            ]);
        }
    }
}