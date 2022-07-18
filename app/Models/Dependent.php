<?php

namespace App\Models;

use CodeIgniter\Model;

use App\Models\Familiar as FamiliarModel;

class Dependent extends Model
{
    protected $table = 'dependentes';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $allowedFields = ['nome', 'titular', 'parentesco'];

    public function getDependents($customer_id) {
        
        $dependents = model(Dependent::class)->where('titular', $customer_id)->findAll();
        $return = array();

        foreach ($dependents as $dependent) {
            $familiar_type = model(FamiliarModel::class)->find($dependent['parentesco']);
            array_push($return, [
                "id" => $dependent['id'],
                "descricao" => $familiar_type["descricao"], 
                "nome" => $dependent['nome']
            ]);
        }
        
        return $return;
    }
}
