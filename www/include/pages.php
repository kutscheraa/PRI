<?php
// seznam stránek (href => title)
$pages = [
    '/' => 'Home',
    '/login.php' => 'Login',
    '/guides.php' => 'Guides',
    '/search.php' => 'Search guides',
];

// přihlášený uživatel smí nahrávat recepty
if (isUser())
    $pages['/upload.php'] = 'Create guide';