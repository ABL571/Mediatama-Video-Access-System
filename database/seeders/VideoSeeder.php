<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Video;

class VideoSeeder extends Seeder
{
    public function run()
    {
        Video::create([
            'title'=>'Sample Video 1',
            'description'=>'Demo video 1 - use YouTube embed URL (https://www.youtube.com/embed/VIDEO_ID)',
            'url'=>'https://www.youtube.com/embed/dQw4w9WgXcQ'
        ]);
        Video::create([
            'title'=>'Sample Video 2',
            'description'=>'Demo video 2',
            'url'=>'https://www.youtube.com/embed/9bZkp7q19f0'
        ]);
    }
}
