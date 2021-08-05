<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;
    
    public function userAdmins()
    {
    return $this->belongsTo('App\Mdels\User', 'admin_id');
    }
    
    public function userMembers()
    {
    return $this->belongsTo('App\Mdels\User', 'member_id');
    }
}
