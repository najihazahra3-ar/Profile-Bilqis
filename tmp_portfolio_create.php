<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Portfolio;

try {
    $p = Portfolio::create([
        'title' => 'Temp Test',
        'role' => 'Temp Role',
        'year' => 2026,
        'description' => 'Testing JSON array save.',
        'images' => ['a', 'b'],
    ]);
    echo 'Created portfolio id: ' . $p->id . PHP_EOL;
    echo 'Images: ' . json_encode($p->images) . PHP_EOL;
} catch (Throwable $e) {
    echo 'ERROR: ' . get_class($e) . ' - ' . $e->getMessage() . PHP_EOL;
    echo $e->getTraceAsString();
}
