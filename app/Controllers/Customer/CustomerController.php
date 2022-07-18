<?php

namespace App\Controllers\Customer;

use App\Models\Customer as CustomerModel;
use App\Models\Plan as PlanModel;
use App\Models\Dependent as DependentModel;
use App\Models\Familiar as FamiliarModel;

use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    public function index()
    {
        $customers = model(CustomerModel::class)->findAll();
        $plans = model(PlanModel::class)->findAll();

        return view('customers', [
            "customers" => $customers,
            "plans" => $plans
        ]);
    }

    public function details($id) {
        $customer_model = model(CustomerModel::class);
        
        $customer = $customer_model->find($id);
        $plan = $customer_model->getPlan($customer['tipo_plano']);

        return view('customer_details', ["customer" => $customer, "plan" => $plan]);
    }

    public function update() {

        $validate = $this->validate([
            'id' => 'required',
            'nome' => 'required|min_length[3]|max_length[50]',
            'email' => 'required|min_length[3]|max_length[50]',
            'data_nascimento' => 'required',
            'local_nascimento' => 'required',
            'endereco' => 'required|max_length[50]',
            'empresa' => 'required|max_length[50]',
            'sexo' => 'required',
            'tipo_plano' => 'required'
        ]);

        $request = $this->request->getPost();
        $id = $request['id'];
        unset($request['id']);

        if($this->request->getMethod() === 'post' && $validate) {
            $model = model(CustomerModel::class);
            $model->update($id, $request);

            session()->setFlashdata('success', 'Save Successfully!');
            return redirect()->back();
        }

        session()->setFlashdata('error', $this->validator->getErrors());
        
        return redirect()->back();
    }

    public function render_dependents($customer_id) {

        $familiar_types = model(FamiliarModel::class)->findAll(); 

        return view('customer_dependents', [
            "dependents" => model(DependentModel::class)->getDependents($customer_id),
            "parentescos" => $familiar_types,
            "customer_id" => $customer_id,
        ]);
    }
}
