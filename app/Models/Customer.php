<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\Plan as PlanModel;

class Customer extends Model
{
    protected $table = 'cliente';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['nome', 'email', 'sexo', 'telefone', 'data_nascimento', 'local_nascimento', 'endereco', 'empresa', 'tipo_plano'];
    
    public function getPlan($plan) {
        return model(PlanModel::class)->find($plan);
    }
}
