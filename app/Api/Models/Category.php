<?php

namespace App\Api\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function expenses()
    {
        return $this->belongsTo(Expense::class);
    }

}
