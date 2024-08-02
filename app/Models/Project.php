<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'projects';

    protected $fillable = [
        'type_id',
        'title',
        'image',
        'content',
        'author',
        'date',
    ];
    public function type(){
        return $this->belongsTo(types::class);
    }
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
