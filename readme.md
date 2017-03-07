# Shop

##### Lokale Installation

 - [Composer](https://getcomposer.org/) installieren
 - PHP installieren (Mindestens PHP 5.6.4)
 - Herunterladen des Projekts mit "git clone https://github.com/dannyhemmers/shop.git"
 - Installation der Abhängigkeiten mit "composer install"
 - Generierung eines neuen App-Keys mit "php artisan key:generate"
 - In der ".env"-Datei Datenbankdaten eintragen (Datenbank muss existieren)
 - Übertragung der Datenbankstruktur in die vorher gewählte Datenbank mit "php artisan migrate"
 - Übertragung der Beispieldaten in die Datenbank mit "php artisan db:seed"
 - Starten des lokalen Webservers mit "php artisan serve"
 - Der Webshop sollte jetzt im Browser unter "http://localhost:8000" erreichbar sein
