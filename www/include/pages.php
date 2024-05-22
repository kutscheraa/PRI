<?php
// seznam stránek (href => title)
$pages = [
    '/' => 'Home',
    '/login.php' => 'Login',
    '/guides.php' => 'Guides',
    '/ranking.php' => 'Difficulty-rank',
];

// přihlášený uživatel smí nahrávat recepty
if (isUser())
    $pages['/upload.php'] = 'Upload guide';