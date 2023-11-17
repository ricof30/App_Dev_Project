<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RestFul\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MainModel;

class MainController extends ResourceController
{
    public function index()
    {   }
    public function getData(){
        $main = new MainModel();
        $data = $main->findAll();
        return $this->respond($data, 200);
    }
public function search()
{   
    $household_id = $this->request->getVar('householdId');
    $model = new MainModel();
    if ($household_id !== null) {
        $results = $model->where('HH_ID', $household_id)->findAll();
        return $this->response->setJSON($results);
    } else {
        return $this->response->setJSON(['error' => 'No household_id received.']);
    }
}
    
}
