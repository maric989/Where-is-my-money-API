<?php

namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug'];

    public function expenses()
    {
        return $this->belongsTo(Expense::class);
    }

}
