<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmergencyType extends Model
{
    /** @use HasFactory<\Database\Factories\EmergencyTypeFactory> */
    use HasFactory;

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    protected static function booted(): void
    {
        static::addGlobalScope('app', function (Builder $builder) {
            $builder->whereHas('location.app', function (Builder $query) {
                $query->where('user_id', auth()->id());
            });
        });
    }
}
