<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'role',
        'year',
        'description',
        'image',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function getImagePathsAttribute(): array
    {
        $images = $this->images;

        if (is_string($images)) {
            $decoded = json_decode($images, true);
            $images = is_array($decoded) ? $decoded : [];
        }

        if (!empty($images) && is_array($images)) {
            return $images;
        }

        if (!empty($this->image)) {
            return [ $this->image ];
        }

        return [];
    }
}
