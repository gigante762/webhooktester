<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    public function app(): BelongsTo
    {
        return $this->belongsTo(App::class);
    }

    public function emergencyTypes(): HasMany
    {
        return $this->hasMany(EmergencyType::class);
    }
}
