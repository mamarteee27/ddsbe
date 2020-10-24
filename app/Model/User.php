<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
    {
        public $timestamps = false;
        protected $table = 'tbluser';
        // column sa table
        protected $fillable = ['username', 'password'];

        protected $primaryKey = 'id';
    }
    



?>