<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    use HasFactory;

    public const COMMON_GUARDED_FIELDS = ['id', 'created_at', 'updated_at'];
}
