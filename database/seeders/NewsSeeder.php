<?php

namespace Database\Seeders;

use App\Models\NewsPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        NewsPost::create([
            'title' => 'Willkommen auf unserem neuen Server!',
            'slug' => Str::slug('Willkommen auf unserem neuen Server!'),
            'content' => "Wir freuen uns, euch endlich auf unserem neuen FiveM Server begrüßen zu dürfen! \n\nNach monatelanger Arbeit haben wir ein einzigartiges System geschaffen, das Performance, Realismus und Spielspaß vereint. \n\n**Was euch erwartet:**\n- Einzigartige Jobs\n- Realistische Wirtschaft\n- Custom Cars und Kleidung\n\nKommt vorbei und überzeugt euch selbst!",
            'published_at' => now(),
        ]);

        NewsPost::create([
            'title' => 'Update 1.1 - Neue Fraktionsfahrzeuge',
            'slug' => Str::slug('Update 1.1 - Neue Fraktionsfahrzeuge'),
            'content' => "Mit dem heutigen Update haben wir den Fuhrpark der Polizei und des EMS erweitert. \n\nDie neuen Fahrzeuge bieten:\n- Besseres Handling\n- Funktionierende Blaulichter (ELS)\n- Neue Lackierungen\n\nViel Spaß beim Streife fahren!",
            'published_at' => now()->subDays(2),
        ]);

        NewsPost::create([
            'title' => 'Community Event am Samstag',
            'slug' => Str::slug('Community Event am Samstag'),
            'content' => "Am kommenden Samstag findet unser großes Eröffnungsevent am Würfelpark statt. \n\nEs gibt Preise im Gesamtwert von über 1.000.000$ Ingamewährung zu gewinnen! \n\nStart ist um 20:00 Uhr. Wir sehen uns!",
            'published_at' => now()->subDays(5),
            'image' => 'https://via.placeholder.com/800x400.png?text=Event',
        ]);
    }
}
