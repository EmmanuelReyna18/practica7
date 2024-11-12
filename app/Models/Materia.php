<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Materia extends Model
{
    /** @use HasFactory<\Database\Factories\MateriaFactory> */
    use HasFactory;
    protected $fillable = [
        'idMateria',
        'nombreMateria',  
        'nivel',  
        'nombreMediano',     
        'nombreCorto',
        'modalidad',
        'semestre',
        'idReticula',   
    ];
    protected $casts = ['idMateria'=>'string'];
    public $incrementing = false;
    protected $primaryKey = 'idMateria';
    public function reticula():BelongsTo{
        return $this->belongsTo(Reticula::class,'idReticula');
    }
    
}  