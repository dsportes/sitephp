S'assurer que `C:\php-8.3.1` est dans le PATH.

Installation par _composer_
- installer composer : télécharger l'installer et STOPPER l'antivirus.

    composer require phpmailer/phpmailer
    composer install

Crée le `composer.json` et `composer.lock`.

Lancement du test: décommenter la ligne `$arg=array(...)`

    php.exe alertes.php

La page `index.html` permet de tester `alertes.php` sur un site Web:
- lancer nginx
- dans un browser: https://test.sportes.fr/index.html
- vérification de php: https://test.sportes.fr/bonjour.php

S'assurer que `php.ini` a bien une ligne `extension=php_openssl.dll` et que ce fichier est bien dans PHPHOME/ext
