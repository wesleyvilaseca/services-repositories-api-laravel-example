<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OptionValueDescription extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'option_id'];

    public function option_()
    {
        return $this->belongsTo(Option::class, 'option_id');
    }
}
