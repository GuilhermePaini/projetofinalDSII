<?php

namespace App\Models;

use CodeIgniter\Model;

class Plan extends Model
{
    protected $table = 'planos';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
}
