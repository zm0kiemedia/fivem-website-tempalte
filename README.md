# FireM - Kostenloses FiveM Website Template

Ein modernes, voll ausgestattetes Website-Template für FiveM Roleplay Server. Entwickelt mit Laravel 11, TailwindCSS und Alpine.js. 
Dieses Template ist **kostenlos** und kann frei verwendet werden, um deinem Server einen professionellen Webauftritt zu verleihen.

[![Preview](public/img/hero-bg.jpg)](https://demo-fivem.zm0kie.de)

> **Live Demo:** [https://demo-fivem.zm0kie.de](https://demo-fivem.zm0kie.de)

## 🚀 Features

*   **Modernes Design**: Dark Mode, Glassmorphism-Effekte und responsive Layouts.
*   **Custom Admin Panel**: Volle Verwaltung der Inhalte ohne Filament-Abhängigkeit für Content.
    *   **News System**: Verfasse Updates mit Bildern und Slugs.
    *   **Team Seite**: Verwalte Teammitglieder mit Rängen (Admin, Mod, etc.).
    *   **Galerie**: Lade Server-Bilder hoch (inkl. Lightbox).
    *   **Regelwerk**: Bearbeitbare Regeln mit Kategorien.
    *   **Benutzerverwaltung**: Erstelle und verwalte Admin-Accounts.
    *   **Server Status**: Live-Anzeige der Spielerzahlen (konfigurierbar).
*   **Bewerbungssystem**: Integriertes Formular für Whitelist/Fraktionen.
*   **Ticket System**: Support-Tickets direkt über die Webseite.
*   **SEO Optimiert**: Saubere URLs und Meta-Tags.

## 📋 Anforderungen

*   PHP >= 8.2
*   Composer
*   Node.js & NPM
*   MySQL / MariaDB
*   Webserver (Nginx oder Apache)

## 🛠️ Installation

### 1. Repository klonen
```bash
git clone https://github.com/zm0kiemedia/fivem-website-tempalte.git
cd fivem-website-tempalte
```

### 2. Abhängigkeiten installieren
```bash
# PHP Abhängigkeiten
composer install

# JavaScript Abhängigkeiten
npm install
```

### 3. Umgebungsvariablen
Kopiere die `.env.example` zu `.env` und passe die Datenbank-Verbindung an:
```bash
cp .env.example .env
nano .env
```

Wichtige Einstellungen:
```ini
APP_URL=https://deine-domain.de
DB_DATABASE=fivem_website
DB_USERNAME=dein_user
DB_PASSWORD=dein_passwort
```

### 4. Key generieren & Datenbank migrieren
```bash
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```
*Der Seeder erstellt Beispiel-Daten für Regeln und erste Inhalte.*

### 5. Assets bauen
```bash
npm run build
```

### 6. Ersten Admin Account erstellen
Du kannst den ersten Admin-User direkt über die Datenbank oder Tinker erstellen:
```bash
php artisan tinker
```
```php
User::create(['name' => 'Admin', 'email' => 'admin@dein-server.de', 'password' => Hash::make('DeinSicheresPasswort')]);
exit
```

### 7. Webserver Konfiguration (Nginx Beispiel)
```nginx
server {
    listen 80;
    server_name deine-domain.de;
    root /var/www/fivem-website-tempalte/public;
 
    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";
 
    index index.php;
 
    charset utf-8;
 
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
 
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

## 🤝 Mitwirken
Pull Requests sind willkommen. Für größere Änderungen erstelle bitte erst ein Issue, um zu diskutieren, was du ändern möchtest.

## 📄 Lizenz
Dieses Projekt ist Open Source und steht unter der [MIT Lizenz](LICENSE).

---
*Created with ❤️ by zm0kie media*
