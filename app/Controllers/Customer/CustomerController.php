<?php

namespace App\Controllers\Customer;

use App\Models\Customer as CustomerModel;
use App\Models\Plan as PlanModel;
use App\Models\Dependent as DependentModel;
use App\Models\Familiar as FamiliarModel;

use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    public function index() {
        $customers = model(CustomerModel::class)->orderBy('nome', 'asc')->findAll();
        $plans = model(PlanModel::class)->findAll();

        return view('customer/list', [
            "customers" => $customers,
            "plans" => $plans
        ]);
    }

    public function details($id) {
        $customer_model = model(CustomerModel::class);
        
        $customer = $customer_model->find($id);
        $plan = $customer_model->getPlan($customer['tipo_plano']);

        return view('/customer/details', ["customer" => $customer, "plan" => $plan]);
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

        if($validate) {
            $model = model(CustomerModel::class);
            $model->update($id, $request);

            session()->setFlashdata('success', 'Save Successfully!');
            return redirect()->back();
        }

        session()->setFlashdata('error', $this->validator->getErrors());
        return redirect()->back();
    }

    public function render_dependents($customer_id = null) {

        $familiar_types = model(FamiliarModel::class)->findAll();
        $dependents = [];
        
        if($customer_id != null) {
            $dependents = model(DependentModel::class)->getDependents($customer_id);
        }

        return view('/customer/dependents', [
            "dependents" => $dependents,
            "parentescos" => $familiar_types,
            "customer_id" => $customer_id,
        ]);
    }

    public function create() {
        return view('/customer/create');
    }

    public function save() {
        $validate = $this->validate([
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

        if($validate) {
            $customer = new CustomerModel();
            $customer->insert($request);

            session()->setFlashdata('success', 'Customer created successfully!');
            return redirect()->to('/customer/details/' . $customer->getInsertID());
        }

        session()->setFlashdata('error', $this->validator->getErrors());
        return redirect()->back();
    }

    public function delete() {
        $validate = $this->validate([
            'customer_id' => 'required',
        ]);

        if($validate) {

            $customer_id = $this->request->getPost()['customer_id'];

            model(CustomerModel::class)->delete($customer_id);
            model(DependentModel::class)->where('titular', $customer_id)->delete();

            session()->setFlashdata('success', 'Customer deleted successfully!');
            return redirect()->to('/home');
        }

        session()->setFlashdata('error', $this->validator->getErrors());
        return redirect()->back();
    }
}
