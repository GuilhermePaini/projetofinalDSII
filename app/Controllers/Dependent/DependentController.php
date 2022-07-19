<?php

namespace App\Controllers\Dependent;

use App\Models\Dependent as DependentModel;

use App\Controllers\BaseController;

class DependentController extends BaseController
{
    public function create() {

        $validate = $this->validate([
            'nome' => 'required|min_length[3]|max_length[50]',
            'titular' => 'required',
            'parentesco' => 'required',
        ]);

        if($this->request->getMethod() === 'post' && $validate) {
            $model = model(DependentModel::class);

            $model->save($this->request->getPost());

            session()->setFlashdata('success', 'Dependent ' . $this->request->getPost()['nome'] . ' added successfully.');
            return redirect()->back();
        }

        session()->setFlashdata('error', $this->validator->getErrors());
        return redirect()->back();
    }
    
    public function delete() {

        $validate = $this->validate([
            'dependent_id' => 'required',
        ]);

        if($validate) {
            $dependent_id = $this->request->getPost()['dependent_id'];
            model(DependentModel::class)->delete($dependent_id);

            session()->setFlashdata('success', 'Dependent deleted successfully!');
            return redirect()->back();
        }

        session()->setFlashdata('error', $this->validator->getErrors());
        return redirect()->back();
    }
}
