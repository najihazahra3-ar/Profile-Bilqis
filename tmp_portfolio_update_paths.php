<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
use App\Models\Portfolio;

$p = Portfolio::find(3);
$p->images = ['portfolios/4znhyXJzZXKpM30x7kGy2XjNhH0FoKyCOGvbVsOX.jpg', 'portfolios/LL32xDl9bi6tNwjEcDI9FIGNGe7wxL84FPxSd5Ot.jpg', 'portfolios/t9Mvi2uhFkQWbBoD4D0mrBG66vQNwhykyqqvjCyW.jpg'];
$p->save();
echo json_encode($p->images) . PHP_EOL;
