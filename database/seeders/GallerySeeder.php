<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        GalleryImage::create([
            'image_url' => 'https://images.unsplash.com/photo-1563720223523-491ff0ea4251?q=80&w=1200&auto=format&fit=crop', // Police car
            'caption' => 'Das neue PD Department',
            'category' => 'police',
        ]);
        
        GalleryImage::create([
            'image_url' => 'https://images.unsplash.com/photo-1552176625-e47ff529b595?q=80&w=1200&auto=format&fit=crop', // Cars
            'caption' => 'JDM Treffen am Strand',
            'category' => 'events',
        ]);

        GalleryImage::create([
            'image_url' => 'https://images.unsplash.com/photo-1588746853747-3720cc9776f3?q=80&w=1200&auto=format&fit=crop', // Ambulance/Hospital vibe
            'caption' => 'Einsatz am Würfelpark',
            'category' => 'medic',
        ]);
    }
}
