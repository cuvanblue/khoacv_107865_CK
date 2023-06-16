<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class tintucseeding extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $limit = 10;
        for ($i = 0; $i < $limit; $i++){
        DB::table('tintucs')->insert([
            'matintuc' => Str::random(3),
            'tieude' => Str::random(10),
            'noidung' => Str::random(20),
            'matheloai' => 'dzP'
        ]);}
        for ($i = 0; $i < $limit; $i++){
            DB::table('tintucs')->insert([
                'matintuc' => Str::random(3),
                'tieude' => Str::random(10),
                'noidung' => Str::random(20),
                'matheloai' => '5HM'
            ]);}
            for ($i = 0; $i < $limit; $i++){
                DB::table('tintucs')->insert([
                    'matintuc' => Str::random(3),
                    'tieude' => Str::random(10),
                    'noidung' => Str::random(20),
                    'matheloai' => '71T'
                ]);}    
    }
}
