<?php

namespace App\Controllers\Canteen;

use App\Models\CanteenModel;
use App\Models\OwnUserModel;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Shield\Entities\User;

class AdminCanteenController extends ResourceController
{
    use ResponseTrait;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $canteens = model(CanteenModel::class);
        $totalData = $canteens->selectCanteen(($this->request->getGet('search') ?? ''))->countAllResults(false);
        $paginate = $canteens->paginate(10);

        return view('canteen/admin/index', [
            'title' => 'Daftar Kantin',
            'breadcrumbs' => [
                ['title' => 'Kantin', 'link' => '/canteen'],
                ['title' => 'Daftar', 'active' => true]
            ],
            'sidebar' => ['canteen', 'list'],
            'pager' => service('pager'),
            'canteenData' => $paginate,
            'totalData' => $totalData,
        ]);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        return view('canteen/admin/add', [
            'title' => 'Kantin Baru',
            'breadcrumbs' => [
                ['title' => 'Kantin', 'link' => '/canteen'],
                ['title' => 'Buat Baru', 'active' => true]
            ],
            'sidebar' => ['canteen', 'create'],
        ]);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $rules = [
            'canteen_name' => [
                'rules' => 'required|max_length[128]|alpha_numeric_space|min_length[8]|is_unique[canteens.name]',
            ],
            'first_name' => [
                'rules' => 'required|max_length[128]|alpha_space|min_length[3]',
            ],
            'last_name' => [
                'rules' => 'required|max_length[128]|alpha_space|min_length[3]',
            ],
            'email' => [
                'rules' => 'required|max_length[128]|valid_email|min_length[8]|is_unique[auth_identities.secret]',
            ],
            'phone_number' => [
                'rules' => 'required|numeric|max_length[20]|min_length[8]|is_unique[users.phone_number]',
            ],
            'location' => [
                'rules' => 'required|is_natural_no_zero|in_list[1,2]',
            ],
        ];

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        helper('text');
        $password = random_string('alnum', 16);

        $user = new User();
        $field = [
            'email' => $this->request->getPost('email'),
            'password' => $password,
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'phone_number' => $this->request->getPost('phone_number'),
            'active' => 1,
        ];
        $user->fill($field);
        $user->username = null;

        $users = model(OwnUserModel::class);
        try {
            $users->save($user);
        } catch (DatabaseException $e) {
            log_message('error', json_encode($users->errors()));
            return $this->failServerError();
        }

        // To get the complete user object with ID, we need to get from the database
        $userID = $users->getInsertID();
        $user = $users->findById($userID);

        // Add to default group
        $user->addGroup('canteenseller');

        $canteens = model(CanteenModel::class);
        try {
            $canteens->save([
                'name' => $this->request->getPost('canteen_name'),
                'location' => $this->request->getPost('location'),
                'user_id' => $userID,
            ]);
        } catch (DatabaseException $e) {
            $users->delete($userID, true);
            log_message('error', json_encode($canteens->errors()));
            return $this->failServerError();
        }

        // Send the user an email with the code
        $email = emailer()->setFrom(setting('Email.fromEmail'), setting('Email.fromName') ?? '');
        $email->setTo($user->email);
        $email->setSubject("Pusbis Client New User Canteen");
        $email->setMessage(view('auth/emailNewPass', [
            'email' => $user->email,
            'password' => $password
        ]));

        if ($email->send(false) === false) {
            log_message('error', $email->printDebugger(['headers']));
            try {
                $users->delete($userID, true);
            } catch (DatabaseException $e) {
                log_message('error', json_encode($users->errors()));
            }
            return $this->respond(['status' => 'server_error', 'messages' => 'Unable to send email!'], 500);
        }

        // Success!
        return $this->respond(['status' => 'Success create account', 'messages' => "Check user email inbox for the password", 'url' => '/admin/canteen', 'httpCode' => 308], 308);
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        if ($id === null) {
            return $this->failNotFound();
        }

        try {
            model(CanteenModel::class)->delete($id);
        } catch (DatabaseException $e) {
            log_message('error', json_encode(model(CanteenModel::class)->errors()));
            return $this->failServerError();
        }
        return $this->respond([
            'status' => '200',
            'messages' => [
                'success' => 'Kantin berhasil dihapus!'
            ],
            'url' => base_url('/admin/canteen'),
        ], 200);
    }
}
