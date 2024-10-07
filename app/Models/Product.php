<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $withCount = ['categories'];
    protected $fillable = ['name', 'description'];
public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
    public function categories(): BelongsToMany{
        return $this->belongsToMany(Category::class);
    }
}
