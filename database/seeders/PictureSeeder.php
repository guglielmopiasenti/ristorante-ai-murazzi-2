<?php

namespace Database\Seeders;

use App\Models\Picture;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pictures = config('pictures');

        foreach ($pictures as $picture) {
            $image = new Picture();
            $image->filename = $picture['filename'];
            $image->save();
        }
    }
}
