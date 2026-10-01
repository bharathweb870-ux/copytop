<?php
return [
    'company' => ['name' => 'SHRI BHARATHI', 'whatsapp' => env('SB_WHATSAPP', '')],
    'locale' => 'fr',
    'currency' => 'EUR',
    'product_modes' => ['configurable', 'quote', 'showcase'],
    'uploads' => ['disk' => 'private', 'max_kb' => 51200, 'mimes' => ['jpg','jpeg','png','pdf','svg','ai','eps']],
    'print' => ['bleed_mm' => 3, 'safe_mm' => 3, 'min_dpi' => 150, 'export_dpi' => 300],
];
