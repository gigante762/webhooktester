<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class App extends Model
{
    /** @use HasFactory<\Database\Factories\AppFactory> */
    use HasFactory;

    // / add globalscope

    protected static function booted(): void
    {

        if (auth()->check()) {
            static::addGlobalScope('app', function (Builder $builder) {
                $builder->where('user_id', auth()->id());
            });
        }

        static::creating(function (App $app) {
            $app->user_id = auth()?->id() ?? $app->user_id;
            $app->api_key = $app->api_key ?? \Illuminate\Support\Str::uuid();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function locations(): HasMany
    {
        return $this->hasMany(Location::class);
    }
}
