<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class Tag extends Model
{

    protected $fillable = ['name'];
    /**
     * The posts that belong to the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}