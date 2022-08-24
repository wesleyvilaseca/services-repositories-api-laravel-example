<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'type', 'order'];

    public function options_value()
    {
        return $this->hasMany(OptionValueDescription::class);
    }
}
