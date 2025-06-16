<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'url',
        'is_primary',
        'caption',
    ];

    /**
     * Get the parent imageable model (Mobile, or User).
     */

    public function imageable()
    {
        return $this->morphTo();
    }
}
