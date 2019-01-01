<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Crud;
use App\FormField;

class MigrationField extends Model
{
    protected $fillable = ['crud_id', 'type', 'options', 'name', 'nullable'];
    protected $table = 'migration_fields';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function migration()
    {
        return $this->belongsTo(Crud::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function formField()
    {
        return $this->hasOne(FormField::class);
    }


}