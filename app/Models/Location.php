<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Location extends Model
{
    /** @use HasFactory<\Database\Factories\LocationFactory> */
    use HasFactory;

    protected static function booted(): void
    {
        if (auth()->check()) {
            static::addGlobalScope('app', function (Builder $builder) {
                $builder->whereRelation('app', 'user_id', auth()->id());
            });
        }
    }

    public function app(): BelongsTo
    {
        return $this->belongsTo(App::class);
    }

    public function emergencyTypes(): HasMany
    {
        return $this->hasMany(EmergencyType::class);
    }

    public function emergencyType(): BelongsTo
    {
        return $this->belongsTo(EmergencyType::class);
    }
}
