<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        TeamMember::create([
            'name' => 'AdminUser',
            'role' => 'Projektleitung',
            'discord' => 'admin#1234',
            'bio' => 'Gründer des Projekts und zuständig für die Entwicklung.',
            'rank_order' => 1,
        ]);

        TeamMember::create([
            'name' => 'ModUser',
            'role' => 'Moderator',
            'discord' => 'mod#5678',
            'bio' => 'Kümmert sich um den Support und Tickets.',
            'rank_order' => 10,
        ]);

        TeamMember::create([
            'name' => 'SupporterOne',
            'role' => 'Supporter',
            'discord' => 'sup#9999',
            'rank_order' => 20,
        ]);
    }
}
