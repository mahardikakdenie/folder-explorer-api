<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    public function scopeEntities($query, $entities = '')
    {
        return Helper::entities($query, $entities);
    }

    // Menentukan relasi ke folder anak (self-referencing)
    public function children()
    {
        return $this->hasMany(Folder::class, 'parent_id');
    }

    // Menentukan relasi ke folder induk (self-referencing)
    public function parent()
    {
        return $this->belongsTo(Folder::class, 'parent_id');
    }
}
