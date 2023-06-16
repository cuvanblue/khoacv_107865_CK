<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class theloaiseeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limit = 10;
        for ($i = 0; $i < $limit; $i++){
        DB::table('theloais')->insert([
            'matheloai' => Str::random(3),
            'tentheloai' => Str::random(4),
            'mota' => Str::random(10),
        ]);}
    }
}
