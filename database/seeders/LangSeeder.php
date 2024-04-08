<?php

namespace Database\Seeders;

use App\Models\Lang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use PgSql\Lob;

class LangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lang::create([
            'name' => 'English',
            'code' => 'en',
        ]);
        Lang::create([
            'name' => 'Spanish',
            'code' => 'es',
        ]);
        Lang::create([
            'name' => 'French',
            'code' => 'fr',
        ]);
    }
}
