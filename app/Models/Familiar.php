<?php

namespace App\Models;

use CodeIgniter\Model;

class Familiar extends Model
{
    protected $table = 'parentescos';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
}
