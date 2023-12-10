<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RestFul\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\MainModel;
use App\Models\EncoderModel;
use App\Models\StaffModel;
use App\Models\AdminModel;
use App\Models\RecycleModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use CodeIgniter\HTTP\ResponseInterface;


class MainController extends ResourceController
{
    public function __construct()
    {
        // Load the database connection through dependency injection
        // $session = \Config\Services::session();
        // // $session = session();
        // $session->start();
    }
    public function index()
    {
    }
    public function getData()
    {
        $main = new MainModel();
        $data = $main->findAll();
        return $this->respond($data, 200);
    }

    public function getList()
{
    $main = new MainModel();
    $data = $main->limit(50)->find();
    return $this->respond($data, 200);
}


    public function getBeneficiary()
    {
        $mainModel = new MainModel();
        $totalEntries = $mainModel->builder()->countAllResults(); // Use builder() here
    
        return $this->respond(['total_beneficiary' => $totalEntries], 200);
    }
    public function getValidated()
    {
        $encoderModel = new EncoderModel();
        $totalEntries = $encoderModel->builder()->countAllResults(); // Use builder() here
    
        return $this->respond(['total_validated' => $totalEntries], 200);
    }
    
    public function getPending()
    {
        $main = new StaffModel();
        $data = $main->where(['is_approved' => 0])->findAll();
        return $this->respond($data, 200);
    }
    public function getApproved()
    {
        $main = new StaffModel();
        $data = $main->where(['is_approved' => 1])->findAll();
        return $this->respond($data, 200);
    }
    public function approveStaff($id)
    {
        // Approve staff by updating the status to 1
        $staffModel = new StaffModel();
        $staffModel->update($id, ['is_approved' => 1]);

        return $this->response->setJSON(['status' => 'success']);
    }

    public function rejectStaff($id)
    {
        // Delete the staff by ID
        $staffModel = new StaffModel();
        $staffModel->delete($id);

        return $this->response->setJSON(['status' => 'success']);
    }
    public function deleteBeneficiary($id)
{
    $mainModel = new MainModel();

    // Get the beneficiary data before deleting
    $beneficiaryData = $mainModel->find($id);

    // Move the beneficiary to the recycle bin
    $recycleBinModel = new RecycleModel();
    $recycleBinModel->insert($beneficiaryData);

    // Delete the beneficiary from the main table
    $mainModel->delete($id);

    return $this->response->setJSON(['status' => 'success'], 200);
}

public function restoreBeneficiary($id)
{
    $mainModel = new MainModel();
    $recycleBinModel = new RecycleModel();

    // Get the beneficiary data from the recycle bin
    $beneficiaryData = $recycleBinModel->find($id);

    if ($beneficiaryData) {
        // Move the beneficiary back to the main table
        $mainModel->insert($beneficiaryData);

        // Delete the beneficiary from the recycle bin
        $recycleBinModel->delete($id);

        return $this->response->setJSON(['status' => 'success'], 200);
    } else {
        return $this->fail('Beneficiary not found in the recycle bin', 404);
    }
}


public function getRecycleBin()
{
    $recycleBinModel = new RecycleModel();
    $recycleBinData = $recycleBinModel->findAll();

    return $this->response->setJSON($recycleBinData, 200);
}


    


    public function getDataEncoded()
    {
        $main = new EncoderModel();
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
    public function searchEncoded()
    {
        $household_id = $this->request->getVar('householdId');
        $model = new EncoderModel();
        if ($household_id !== null) {
            $results = $model->where('HH_ID', $household_id)->findAll();
            return $this->response->setJSON($results);
        } else {
            return $this->response->setJSON(['error' => 'No entry_id received.']);
        }
    }
    public function getDetails($entryId)
    {
        $model = new MainModel();
        // Check if $entryId has a value
        if (!empty($entryId)) {

            $details = $this->getDetailsById($entryId);

            // Check if details are found
            if ($details !== null) {
                // Return the details as JSON
                return $this->response->setJSON($details);
            } else {
                // EntryId provided, but details not found
                return $this->response->setJSON(['error' => 'Details not found for the given entryId.']);
            }
        } else {
            // EntryId is empty or not provided
            return $this->response->setJSON(['error' => 'EntryId is empty or not provided.']);
        }
    }

    public function getEncoderDetails($entryId)
    {
        $model = new EncoderModel();

        // Check if $entryId has a value
        if (!empty($entryId)) {

            $details = $this->getEncoderDetailsById($entryId);

            // Check if details are found
            if ($details !== null) {
                // Return the details as JSON
                return $this->response->setJSON($details);
            } else {
                // EntryId provided, but details not found
                return $this->response->setJSON(['error' => 'Details not found for the given entryId.']);
            }
        } else {
            // EntryId is empty or not provided
            return $this->response->setJSON(['error' => 'EntryId is empty or not provided.']);
        }
    }

    public function getEncoderDetailsById($entryId)
    {
        $db = \Config\Database::connect();
        $table = 'encoder';

        // Using a prepared statement to avoid SQL injection
        $query = $db->query("SELECT * FROM $table WHERE ENTRY_ID = ?", [$entryId]);


        if ($query) {
            $result = $query->getResultArray();


            if (!empty($result)) {
                return $result;
            } else {
                return null;
            }
        } else {

            return null;
        }
    }

    public function getDetailsById($entryId)
    {
        $db = \Config\Database::connect();
        $table = 'minsu_victoria_roster_list_as_of_october_2023';

        // Using a prepared statement to avoid SQL injection
        $query = $db->query("SELECT * FROM $table WHERE ENTRY_ID = ?", [$entryId]);


        if ($query) {
            $result = $query->getResultArray();


            if (!empty($result)) {
                return $result;
            } else {
                return null;
            }
        } else {

            return null;
        }
    }
    public function update($id = null)
    {
        $main = new EncoderModel();
        $json = $this->request;
    
        // Update existing record
        $updateData = [
            'REMARKS' => $json->getVar('remarks'),
            'ENCODER' => $json->getVar('nameOfEncoder'),
            'DATE_ENCODED' => $json->getVar('dateEncoded')
        ];
        $isUpdateSuccessful = $main->update($id, $updateData);
        return $this->respond($isUpdateSuccessful, 200);
        // Check if the update was successful before attempting to insert
      
    }

    public function updateBeneficiary($id = null)
    {
        $main = new MainModel();
        $json = $this->request;
       
        // Update existing record
        $updateData = [
            'REGION' => $json->getVar('region'),
            'PROVINCE' => $json->getVar('province'),
            'MUNICIPALITY' => $json->getVar('municipality'),
            'FIRST_NAME' => $json->getVar('fName'),
            'MIDDLE_NAME' => $json->getVar('mName'),
            'LAST_NAME' => $json->getVar('lName'),
            'BIRTHDAY' => $json->getVar('bday'),
            'AGE' => $json->getVar('age'),
            'SEX' => $json->getVar('sex'),
           
        ];

        $isUpdateSuccessful = $main->update($id, $updateData);

        return $this->respond($isUpdateSuccessful, 200);
    }

   
   public function generateHhId()
    {
        // Generate first part - timestamp
        $date = date('Ymd');
        $time = date('His');
        $firstPart = $date . $time;
    
        // Generate second part - random number with leading zeros
        $secondPart = str_pad(mt_rand(1, 9999), 4, '0', STR_PAD_LEFT);
    
        // Generate third part - sequential number with leading zeros
        static $counter = 1;
        $thirdPart = str_pad($counter++, 5, '0', STR_PAD_LEFT);
    
        // Combine parts and format
        return $firstPart . '-' . $secondPart . '-' . $thirdPart;
    }

   
    function generateEntryId() {
        return str_pad(rand(0, 99999999), 8, '0', STR_PAD_LEFT);
    }


public function addBeneficiary()
{
    $json = $this->request->getJSON(); // Use getJSON to get data from the Vue.js frontend
    $mainModel = new MainModel();
    $data = [
        'REGION' =>  $json->REGION,
        'PROVINCE' => $json->PROVINCE,
        'MUNICIPALITY' => $json->MUNICIPALITY,
        'BRGY' => $json->BRGY,
        'HH_ID' => $this->generateHhId(),
        'ENTRY_ID' => $this->generateEntryId(),  // Make sure this matches the property name in Vue.js
        'FIRST_NAME' => $json->FNAME,
        'MIDDLE_NAME' => $json->MNAME,
        'LAST_NAME' => $json->LNAME,
        'BIRTHDAY' => $json->BDAY,
        'AGE' => $json->AGE,
        'SEX' => $json->SEX,
        'CLIENT_STATUS' => $json->CLIENT,
        'MEMBER_STATUS' => $json->MEMBER,
        'GRANTEE' => $json->GRANTEE,
        'RELATION_TO_HH_HEAD' => $json->RELATION,
        'REGISTRATION_STATUS' => $json->REGISTRATION,
        'SCHOOL_NAME' => $json->SCHOOL,
        'GRADE_LEVEL' => $json->GRADE,
        // ... add other fields as needed ...
    ];

    // Add any additional validation as needed
    if (!empty($data)) {
        $insertedId = $mainModel->insert($data);
        $responseMessage = [
            'status'  => ResponseInterface::HTTP_OK,
            'message' => 'Beneficiary added successfully.',
            'insertedId' => $insertedId, // Include the inserted ID if needed
        ];

        return $this->response->setStatusCode(ResponseInterface::HTTP_OK)->setJSON($responseMessage);
    } else {
        $responseMessage = [
            'status'  => ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
            'error'   => 'Failed to add beneficiary.',
        ];

        return $this->response->setStatusCode(ResponseInterface::HTTP_INTERNAL_SERVER_ERROR)->setJSON($responseMessage);
    }
}

    public function insert()
    {
        $main = new EncoderModel();
        $json = $this->request;
        log_message('debug', 'Received JSON data: ' . json_encode($json));
        $name = $json->getVar('full_name');
        $typeOfUpdate = implode(', ', $json->getVar('typeOfUpdate'));
        $check = $main->where('GRANTEE_NAME', $name)->first();
        if ($check) {
            // Record with the specified 'GRANTEE_NAME' already exists
            return $this->respond(['error' => 'Grantee Name already exists.'], 400);
        }else{
        $data = [
            'ENTRY_ID' => $json->getVar('ENTRY_ID'),
            'GRANTEE_NAME' => $name,
            'MUNICIPALITY' => $json->getVar('MUNICIPALITY'),
            'HH_ID' => $json->getVar('HH_ID'),
            'BRGY' => $json->getVar('BRGY'),
            'HH_STATUS' => $json->getVar('MEMBER_STATUS'),
            'VALIDATED' => $json->getVar('validated'),
            'WITH_VALIDATION_TOOL' => $json->getVar('accomplished'),
            'WITH_UPDATE_REQUEST' => $json->getVar('updateRequest'),
            'DATE_VALIDATED' => $json->getVar('dateValidated'),
            'NAME_OF_VALIDATOR' => $json->getVar('Validator'),
            'SUBMITTED' => $json->getVar('submitted'),
            'DATE_SUBMITTED' => $json->getVar('dateSubmitted'),
            'ENCODED_IN_PPIS_MCCTIS' => $json->getVar('encoded'),
            'TYPES_OF_UPDATES_FIELD' => $typeOfUpdate,
            'ENCODER' => 'for encoder job',
            'REMARKS' => 'for encoder job',
        ];
        if (!empty($data)) {
           
            $r = $main->insert($data);

            return $this->respond($r, 200);
        } else {
            return $this->respond(['error' => 'Data is empty.'], 400);
        }
    }
    }

    // for register
    public function adminRegister(){
        $json = $this->request;
        $token = $this->verification(50);
        $staffModel = new AdminModel();
       $password = $json->getVar('password');

            $data = [
                'name' => $json->getVar('name'),
                'email' => $json->getVar('email'),
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'token' => $token,
            ];

            $u = $staffModel->save($data);

            if ($u) {
                return $this->respond(['msg' => 'Registered Successfully']);
            } else {
                return $this->fail(['msg' => 'Error occurred']);
            }
        }

        public function sendResetEmail()
        {
            try {
                $json = $this->request->getJSON();
                $email = $json->email;
        
                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return $this->fail('Invalid email format');
                }
        
                // Check if the email exists in the database
                $staffModel = new StaffModel();
                $data = $staffModel->where('email', $email)->first();
        
                if (!$data) {
                    return $this->fail('User not found for the given email', 404);
                }
        
                // Configure and send the email
                $phpMailer = new PHPMailer(true);
                $phpMailer->isSMTP();
                $phpMailer->Host = 'smtp.gmail.com';
                $phpMailer->SMTPAuth = true;
                $phpMailer->Username = 'ricofontecilla30@gmail.com';
                $phpMailer->Password = 'bbwm taur mtef uwdg';
                $phpMailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // or 'ssl'
                $phpMailer->Port = 587;
        
                $phpMailer->setFrom('ricofontecilla30@gmail.com', 'DSWD');
                $phpMailer->addAddress($email);
                $phpMailer->Subject = 'Password Reset';
                $phpMailer->Body = 'Click the link to reset your password: http://example.com/reset-password';
                $phpMailer->send();
        
                return $this->respond(['id' => (int) $data['id']]);

            } catch (\Exception $e) {
                return $this->fail('Error sending email: ' . $e->getMessage());
            }
        }
        

        public function sendResetEmailAdmin()
        {
            try {
                $json = $this->request->getJSON();
                $email = $json->email;
        
                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    return $this->fail('Invalid email format');
                }
        
                // Check if the email exists in the database
                $adminModel = new AdminModel();
                $data = $adminModel->where('email', $email)->first();
        
                if (!$data) {
                    return $this->fail('User not found for the given email', 404);
                }
        
                // Configure and send the email
                $phpMailer = new PHPMailer(true);
                $phpMailer->isSMTP();
                $phpMailer->Host = 'smtp.gmail.com';
                $phpMailer->SMTPAuth = true;
                $phpMailer->Username = 'ricofontecilla30@gmail.com';
                $phpMailer->Password = 'bbwm taur mtef uwdg';
                $phpMailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // or 'ssl'
                $phpMailer->Port = 587;
        
                $phpMailer->setFrom('ricofontecilla30@gmail.com', 'DSWD');
                $phpMailer->addAddress($email);
                $phpMailer->Subject = 'Password Reset';
                $phpMailer->Body = 'Click the link to reset your password: http://example.com/reset-password';
                $phpMailer->send();
        
                return $this->respond(['id' => (int) $data['id']]);

            } catch (\Exception $e) {
                return $this->fail('Error sending email: ' . $e->getMessage());
            }
        }

        public function updatePasswordAdmin($id)
        {
            $json = $this->request->getJSON();
            $password = $json->newPassword;
           
            $adminModel = new AdminModel();
            // $data = $staffModel->where('id', $id)->first();
            $updateData = [
                'password' => password_hash($password, PASSWORD_BCRYPT),
                
            ];
    
            $isUpdateSuccessful = $adminModel->update($id, $updateData);
    
            return $this->respond($isUpdateSuccessful, 200);
        }
        
        public function updatePassword($id)
        {
            $json = $this->request->getJSON();
            $password = $json->newPassword;
           
            $staffModel = new StaffModel();
            // $data = $staffModel->where('id', $id)->first();
            $updateData = [
                'password' => password_hash($password, PASSWORD_BCRYPT),
                
            ];
    
            $isUpdateSuccessful = $staffModel->update($id, $updateData);
    
            return $this->respond($isUpdateSuccessful, 200);
        }
    

    public function register()
    {
        $json = $this->request;
        $is_approved = 0;
        $email = $json->getVar('email');

        $staffModel = new StaffModel();
        $token = $this->verification(50);
        $exUser = $staffModel->where('email', $email)->first();

        if ($exUser) {
            return $this->fail(["error" => "Email already exists"], 400);
        } else {
            $password = $json->getVar('password');

            if (!preg_match('/[A-Za-z]/', $password) || !preg_match('/[0-9]/', $password)) {
                return $this->fail(["error" => "Password must contain at least one letter, one number, and one character"], 400);
            }

            $data = [
                'name' => $json->getVar('name'),
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'token' => $token,
                'roles' => $json->getVar('role'),
                'is_approved' => $is_approved,
                'status' => 'ACTIVE',
            ];

            $u = $staffModel->save($data);

            if ($u) {
                return $this->respond(['msg' => 'Registered Successfully', 'token' => $token]);
            } else {
                return $this->fail(['msg' => 'Error occurred']);
            }
        }
    }
    public function updateStatus()
    {
        $json = $this->request->getJSON();

        // Get the user ID and status from the JSON data
        $userId = $json->userId;
        $status = $json->status;

        // Update the user status in the database
        $userModel = new StaffModel();
        $user = $userModel->find($userId);

        if (!$user) {
            return $this->fail('User not found', 404);
        }

        $userModel->update($userId, ['status' => $status]);

        return $this->respond(['updatedStatus' => $status]);
    }

    // Your verification method
    public function verification($length)
    {
        return bin2hex(random_bytes($length));
    }

    public function adminLogin(){
            
        $json = $this->request->getJSON();

        if (isset($json->name) && isset($json->password)) {
            $name = $json->name;
            $password = $json->password;

            $adminModel = new AdminModel();
            $data = $adminModel->where('name', $name)->first();
            if ($data) {
                $pass = $data['password'];
                $auth = password_verify($password, $pass);
                if ($auth) {
                    return $this->respond(['message' => 'Login successful', 'name' => $data['name']], 200);
                } else {
                    return $this->respond('Incorrect password', 401);
                }
            } else {
                return $this->respond('Username does not exist.', 404);
            }
        } else {
            return $this->respond('Invalid JSON data', 400);
        }
    }

    public function login()
    {
        $json = $this->request->getJSON();

        if (isset($json->email) && isset($json->password)) {
            $email = $json->email;
            $password = $json->password;

            $userModel = new StaffModel();
            $data = $userModel->where('email', $email)->first();
            if ($data) {
                $pass = $data['password'];
                $auth = password_verify($password, $pass);
                if ($auth) {
                    if ($data['is_approved'] == 1) {
                        if($data['status'] == 'ACTIVE'){
                            return $this->respond(['message' => 'Login successful', 'name' => $data['name'], 'token' => $data['token'], 'id' => $data['id']], 200);
                        }else{
                            return $this->respond('Your account is been Deactivated by the Admin.', 401);
                        }
                    } else {
                        return $this->respond('Your account is not approved by the Admin.', 401);
                    }
                } else {
                    return $this->respond('Incorrect password', 401);
                }
            } else {
                return $this->respond('Email not registered. Please sign up.', 404);
            }
        } else {
            return $this->respond('Invalid JSON data', 400);
        }
    }


    public function logout()
    {
        // Destroy the session
        $session = session();
        $session->destroy();

        return $this->respond(['message' => 'Logout successful'], 200);
    }

    public function uploadExcel()
    {
        try {
            $file = $this->request->getFile('excelFile');

            if ($file->isValid()) {
                // Get the file name and extension
                $fileName = $file->getClientName();
                $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                // Generate a unique file name
                $newFileName = uniqid() . '.' . $fileExtension;

                // Upload the file to the 'uploads' directory
                $file->move(WRITEPATH . 'uploads/', $newFileName);

                // Read the content of the uploaded file
                $filePath = WRITEPATH . 'uploads/' . $newFileName;
                $excelContent = $this->readExcelFile($filePath);

                // Return the content to the client
                return $this->respond(['data' => $excelContent], 200);
            } else {
                // Return an error message
                return $this->respond(['error' => 'File upload failed.'], 400);
            }
        } catch (\Exception $e) {
            // Return an error message
            return $this->respond(['error' => 'Internal Server Error'], 500);
        }
    }




    public function readExcelFile($filePath)
    {
        // Use a library to read the Excel file, e.g., PhpSpreadsheet
        // Install it using Composer: composer require phpoffice/phpspreadsheet
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($filePath);

        // Get the active sheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Convert the worksheet to an array
        $excelData = [];
        foreach ($worksheet->getRowIterator() as $row) {
            $rowData = [];
            foreach ($row->getCellIterator() as $cell) {
                $rowData[] = $cell->getValue();
            }
            $excelData[] = $rowData;
        }

        return $excelData;
    }

    //generate filtered data
    public function get()
    {
        $model = new EncoderModel();

        // Fetch data based on filter criteria
        $data = $this->getDataByDateRange($this->request->getGet());

        // Convert data to a downloadable format (e.g., CSV)
        $csvData = $this->convertDataToCSV($data);

        return $this->response
            ->setStatusCode(ResponseInterface::HTTP_OK)
            ->setContentType('text/csv')
            ->setHeader('Content-Disposition', 'attachment; filename="exported_data.csv"')
            ->setBody($csvData);
    }

    private function convertDataToCSV($data)
    {
        // Your logic to convert data to CSV format
        // This can be done using PHP functions or libraries

        // Example: Convert data to CSV using fputcsv
        $output = fopen('php://temp', 'w+');
        fputcsv($output, array_keys($data[0])); // Assuming data is an array of objects

        foreach ($data as $row) {
            // Format dates using the 'Y-m-d' format for Excel compatibility
            $formattedRow = array_map(function ($value) {
                return ($value instanceof \DateTime) ? $value->format('Y-m-d') : $value;
            }, $row);

            fputcsv($output, $formattedRow);
        }

        rewind($output);
        $csvData = stream_get_contents($output);
        fclose($output);

        return $csvData;
    }

    public function getDataByDateRange($criteria)
    {
        $db = \Config\Database::connect();
        $table = 'encoder';
        // $model = new EncoderModel();
        $builder = $db->table($table);

        // Add your filtering conditions based on the date range
        if (isset($criteria['startDate'])) {
            $builder->where('DATE_VALIDATED >=', $criteria['startDate']);
        }

        if (isset($criteria['endDate'])) {
            $builder->where('DATE_VALIDATED <=', $criteria['endDate']);
        }

        return $builder->get()->getResultArray();
    }

    public function fetchData()
    {
        // Get the date range from query parameters
        $startDate = $this->request->getGet('startDate');
        $endDate = $this->request->getGet('endDate');

        // Validate or sanitize the dates if needed

        // Fetch data based on the date range
        // Replace with your actual model
        $data = $this->getByDateRange($startDate, $endDate);

        // Return the fetched data as JSON
        return $this->response->setJSON(['data' => $data]);
    }

    public function getByDateRange($startDate, $endDate)
    {
        $db = \Config\Database::connect();
        $table = 'encoder';
        // Add your filtering conditions based on the date range
        $builder = $db->table($table);
        $builder->where('DATE_VALIDATED >=', $startDate);
        $builder->where('DATE_VALIDATED <=', $endDate);

        // Get and return the result
        return $builder->get()->getResultArray();
    }
    public function getChartData()
    {
        $encoderModel = new EncoderModel(); // Replace with your actual model
        $data = $encoderModel->groupBy('name_of_validator')
            ->select('name_of_validator, COUNT(grantee_name) as grantee_count')
            ->findAll();

        $labels = [];
        $values = [];

        foreach ($data as $row) {
            $labels[] = $row['name_of_validator'];
            $values[] = $row['grantee_count'];
        }

        $chartData = [
            'labels' => $labels,
            'values' => $values,
        ];

        return $this->respond($chartData);
    }

}
