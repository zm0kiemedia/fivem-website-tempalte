<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        // General Rules
        $generalRules = [
            'Respektvoller Umgang mit allen Spielern und Teammitgliedern.',
            'Kein Rassismus, Sexismus oder Diskriminierung jeglicher Art.',
            'Bugusing und Cheating führen zu einem sofortigen permanenten Ausschluss.',
            'Werbung für andere Server oder Projekte ist untersagt.'
        ];

        foreach ($generalRules as $index => $content) {
            Rule::create([
                'section' => 'general',
                'content' => $content,
                'sort_order' => $index
            ]);
        }

        // Roleplay Rules
        $rpRules = [
            'Das Leben deines Charakters ist das höchste Gut (Value of Life).',
            'RDM (Random Deathmatch) und und VDM (Vehicle Deathmatch) sind verboten.',
            'Metagaming (Nutzung von OOC-Informationen im RP) ist strengstens untersagt.',
            'PowerRP (Aufzwingen von RP-Situationen ohne Ausweg) ist nicht gestattet.'
        ];

        foreach ($rpRules as $index => $content) {
            Rule::create([
                'section' => 'roleplay',
                'content' => $content,
                'sort_order' => $index
            ]);
        }

        // Zone Rules
        Rule::create([
            'section' => 'zones',
            'content' => 'Krankenhäuser, Polizeistationen und Würfelpark. Hier ist kein kriminelles Handeln gestattet.',
            'title' => 'Safezones',
            'icon' => 'shield',
            'color' => 'green',
            'sort_order' => 0
        ]);

        Rule::create([
            'section' => 'zones',
            'content' => 'Drogenrouten und Gang-Gebiete. Hier gilt "Schießen ohne Schusscall" (KOS).',
            'title' => 'Redzones',
            'icon' => 'dangerous',
            'color' => 'red',
            'sort_order' => 1
        ]);
    }
}
