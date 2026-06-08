<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function location()
    {
        return $this->hasMany(Location::class);
    }
    public function salary()
    {
        return $this->hasMany(Salary::class);
    }
}
