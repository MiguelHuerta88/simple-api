<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notes extends Model
{
	/**
	 * Table to be used by this model
	 *
	 * @var string
	 */
    public $table = 'notes';

    protected $fillable = ['notes', 'user_id', 'created_at', 'updated_at'];
    
}
