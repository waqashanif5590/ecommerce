<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAddressTypeDescriptionAttribute()
    {
        if ($this->is_default == true) {
            return 'Primary delivery address';
        } elseif ($this->type === 'home' && $this->is_default == false) {
            return 'Alternative home address';
        } elseif ($this->type === 'office' && $this->is_default == false) {
            return 'Alternative Workplace address';
        } else {
            return 'Other address';
        }
    }
}
