<?php

declare(strict_types=1);

return [
    'default_items' => [
        'storage' => env('DEFAULT_ITEMS_STORAGE', 'local'),
        'path' => env('DEFAULT_ITEMS_PATH', 'default-client-items.json'),
    ],
];
