<?php

namespace Rafiur\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoldeUser extends Model
{
    use HasFactory;
    public function roles()
    {
        return belogsTo('App\Role');
    }
}
