<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Recommendation extends Model
{
    use HasFactory;
    protected $table = 'recommendations';
    protected $fillable = ['entry','uuid','targets','stop_loss','is_online','user_id'];

            // generate a uuid for newly created records
            protected static function boot()
            {
                parent::boot();
        
                static::creating(function ($model) {
                    if (empty($model->uuid)) {
                        $model->uuid = (string) Uuid::uuid4();
                    }
                });
            } 


      public function user(){
        return $this->belongsTo(User::class);
      }      
}
