<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListingImage extends Model
{
    use HasFactory;

    protected $fillable = ['filename'];

    // define relation img listing belongsTo
    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}