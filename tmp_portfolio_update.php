<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
use App\Models\Portfolio;

$p = Portfolio::find(3);
$p->images = ['x','y'];
$p->save();
echo json_encode($p->images) . PHP_EOL;
