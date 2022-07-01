<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['id', 'name', 'parent_id'];

    /**
     * @return BelongsTo
     * @author Nagwa Ali
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * @return HasMany
     * @author Nagwa Ali
     */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
