<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, HasUUids, SoftDeletes;

    protected $fillable = ['name', 'description'];

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
