<?php

namespace App\Controllers\Canteen;

use App\Controllers\BaseController;
use App\Models\CanteenFoodCategoryModel;
use App\Models\CanteenFoodTypeModel;
use App\Models\CanteenMenuModel;
use App\Models\CanteenModel;
use App\Models\OwnUserModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Shield\Entities\User;
use CodeIgniter\Validation\Rules;
use Exception;

class SellerCanteenController extends BaseController
{
    use ResponseTrait;

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $query = model(CanteenMenuModel::class)->where('canteen_id', get_canteen_id());
        $pager = $query->countAllResults(false);
        $canteenMenu = $query->findAll();

        return view('canteen/seller/menu/view', [
            'title' => 'Daftar Menu',
            'breadcrumbs' => [
                ['title' => 'Kantin', 'link' => '/canteen'],
                ['title' => 'Menu', 'active' => true],
            ],
            'sidebar' => ['canteen', 'list'],
            'canteenMenu' => $canteenMenu,
            'pager' => $pager,
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
        return view('canteen/seller/add', [
            'title' => 'Buat Menu Baru',
            'breadcrumbs' => [
                ['title' => 'Kantin', 'link' => '/canteen'],
                ['title' => 'Menu', 'link' => '/canteen/menu'],
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
            'menuCategories' => [
                'rules' => 'required|alpha_numeric_punct|min_length[4]|max_length[256]'
            ],
            'menuDesc' => [
                'rules' => 'required|min_length[8]|max_length[512]',
            ],
            'menuName' => [
                'rules' => 'required|alpha_numeric_space|min_length[4]|max_length[128]',
            ],
            'menuQty' => [
                'rules' => 'required|is_natural|min_length[1]|max_length[11]',
            ],
            'menuType' => [
                'rules' => 'required|alpha_numeric_space|min_length[4]|max_length[128]',
            ],
            'menuPrice' => [
                'rules' => 'required|min_length[3]|max_length[11]|is_natural',
            ],
            'menuPoster1' => [
                'rules' => [
                    'uploaded[menuPoster1]',
                    'max_size[menuPoster1,1024]',
                    'max_dims[menuPoster1,2000,2000]',
                    'mime_in[menuPoster1,image/png,image/jpeg,image/jpg]',
                    'ext_in[menuPoster1,png,jpg,jpeg]',
                    'is_image[menuPoster1]',
                ],
            ],
        ];
        if ($this->request->getFile('menuPoster2')) {
            $rules['menuPoster2'] = [
                'rules' => [
                    'max_size[menuPoster2,1024]',
                    'max_dims[menuPoster2,2000,2000]',
                    'mime_in[menuPoster2,image/png,image/jpeg,image/jpg]',
                    'ext_in[menuPoster2,png,jpg,jpeg]',
                    'is_image[menuPoster2]',
                ],
            ];
        }

        if ($this->request->getFile('menuPoster3')) {
            $rules['menuPoster3'] = [
                'rules' => [
                    'max_size[menuPoster3,1024]',
                    'max_dims[menuPoster3,2000,2000]',
                    'mime_in[menuPoster3,image/png,image/jpeg,image/jpg]',
                    'ext_in[menuPoster3,png,jpg,jpeg]',
                    'is_image[menuPoster3]',
                ],
            ];
        }

        if ($this->request->getFile('menuPoster4')) {
            $rules['menuPoster4'] = [
                'rules' => [
                    'max_size[menuPoster4,1024]',
                    'max_dims[menuPoster4,2000,2000]',
                    'mime_in[menuPoster4,image/png,image/jpeg,image/jpg]',
                    'ext_in[menuPoster4,png,jpg,jpeg]',
                    'is_image[menuPoster4]',
                ],
            ];
        }

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        $menuPoster1 = $this->request->getFile('menuPoster1');
        if ($menuPoster1 != null) {
            if ($menuPoster1->isValid() && !$menuPoster1->hasMoved()) {
                $menuPoster1Name = $menuPoster1->getRandomName();
                try {
                    $menuPoster1->move("img", $menuPoster1Name);
                } catch (Exception $e) {
                    return $this->failServerError();
                }
            }
        }

        $menuPoster2 = $this->request->getFile('menuPoster2');
        if ($menuPoster2 != null) {
            if ($menuPoster2->isValid() && !$menuPoster2->hasMoved()) {
                $menuPoster2Name = $menuPoster2->getRandomName();
                try {
                    $menuPoster2->move("img", $menuPoster2Name);
                } catch (Exception $e) {
                    return $this->failServerError();
                }
            }
        }

        $menuPoster3 = $this->request->getFile('menuPoster3');
        if ($menuPoster3 != null) {
            if ($menuPoster3->isValid() && !$menuPoster3->hasMoved()) {
                $menuPoster3Name = $menuPoster3->getRandomName();
                try {
                    $menuPoster3->move("img", $menuPoster3Name);
                } catch (Exception $e) {
                    return $this->failServerError();
                }
            }
        }

        $menuPoster4 = $this->request->getFile('menuPoster4');
        if ($menuPoster4 != null) {
            if ($menuPoster4->isValid() && !$menuPoster4->hasMoved()) {
                $menuPoster4Name = $menuPoster4->getRandomName();
                try {
                    $menuPoster4->move("img", $menuPoster4Name);
                } catch (Exception $e) {
                    return $this->failServerError();
                }
            }
        }

        $picture = [$menuPoster1Name, $menuPoster2Name ?? null, $menuPoster3Name ?? null, $menuPoster4Name ?? null];

        $typeFood = model(CanteenFoodTypeModel::class);
        $typeFoodPost = strtolower(trim($this->request->getPost('menuType')));
        try {
            $typeFoodData = $typeFood->where('name', $typeFoodPost)->first();
            if ($typeFoodData !== null) {
                $typeFoodID = $typeFoodData['id'];
            } else {
                $typeFoodID = $typeFood->insert(['name' => $typeFoodPost]);
            }
        } catch (DatabaseException $e) {
            log_message('error', json_encode($typeFood->errors()));
            return $this->failServerError();
        }

        $categoriesModel = model(CanteenFoodCategoryModel::class);
        $categoriesPost = explode(',', $this->request->getPost('menuCategories'));
        try {
            $categories = [];
            foreach ($categoriesPost as $category) {
                $category = strtolower(trim($category));
                $categoryData = $categoriesModel->where('name', $category)->first();
                if ($categoryData !== null) {
                    $categoryID = $categoryData['id'];
                } else {
                    $categoryID = $categoriesModel->insert(['name' => $category]);
                }
                $categories[] = $categoryID;
            }
        } catch (DatabaseException $e) {
            log_message('error', json_encode($categoriesModel->errors()));
            return $this->failServerError();
        }

        $data = [
            'name' => $this->request->getPost('menuName'),
            'qty' => $this->request->getPost('menuQty'),
            'price' => $this->request->getPost('menuPrice'),
            'description' => $this->request->getPost('menuDesc'),
            'picture' => serialize($picture),
            'typefood' => $typeFoodID,
            'category' => serialize($categories),
            'canteen_id' => model(CanteenModel::class)->getCanteenID(user_id()),
        ];

        try {
            $canteenMenuModel = model(CanteenMenuModel::class);
            $canteenMenuModel->save($data);
        } catch (DatabaseException $e) {
            log_message('error', json_encode($canteenMenuModel->errors()));
            return $this->failServerError();
        }

        return $this->respond([
            'status' => 308,
            'messages' => [
                'success' => 'Menu berhasil disimpan!',
                'showMessage' => true
            ],
            'url' => base_url('canteen/menu/create')
        ], 308);
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
        //
    }

    public function wizzard()
    {
        $canteenData = model(CanteenModel::class)->where('user_id', user_id())->first();

        if ($canteenData['setup_wizzard'] == 3) {
            return redirect()->to('/dashboard');
        }

        $page = $canteenData['setup_wizzard'] + 1;
        return view('canteen/seller/wizzard/page' . $page, [
            'canteenData' => $canteenData,
            'title' => 'Setup Wizzard',
            'sidebar' => ['wizzard'],
            'breadcrumbs' => [
                ['link' => '/dashboard', 'title' => 'Dashboard'],
                ['active' => true, 'title' => 'Setup Wizzard'],
            ]
        ]);
    }

    public function wizzardAct()
    {
        $rules = new Rules();
        if (!$rules->in_list($this->request->getPost('type'), 'dataSeller,dataCanteen,paymentMethod')) {
            log_message('info', json_encode($this->request->getPost()));
            return $this->failNotFound();
        }

        $canteens = model(CanteenModel::class);

        $updateType = $this->request->getPost('type');
        if ($updateType == 'dataSeller') {
            $updateType = 1;
            $rules = [
                'first_name' => [
                    'rules' => 'required|alpha_space|min_length[3]|max_length[128]',
                ],
                'last_name' => [
                    'rules' => 'required|alpha_space|min_length[3]|max_length[128]',
                ],
                'phone_number' => [
                    'rules' => 'required|numeric|min_length[7]|max_length[20]|is_unique[users.phone_number]',
                ],
                'profile_picture' => [
                    'rules' => [
                        'uploaded[profile_picture]',
                        'max_size[profile_picture,1024]',
                        'max_dims[profile_picture,1280,1280]',
                        'mime_in[profile_picture,image/png,image/jpeg,image/jpg]',
                        'ext_in[profile_picture,png,jpg,jpeg]',
                        'is_image[profile_picture]',
                    ],
                ]
            ];
        } elseif ($updateType == 'dataCanteen') {
            $updateType = 2;
            $rules = [
                'name_canteen' => [
                    'rules' => 'required|max_length[128]|alpha_numeric_space|min_length[8]|is_unique[canteens.name,id,' . $canteens->getCanteenID(user_id()) . ']',
                ],
                'logo_kantin' => [
                    'rules' => [
                        'uploaded[logo_kantin]',
                        'max_size[logo_kantin,1024]',
                        'max_dims[logo_kantin,1280,1280]',
                        'mime_in[logo_kantin,image/png,image/jpeg,image/jpg]',
                        'ext_in[logo_kantin,png,jpg,jpeg]',
                        'is_image[logo_kantin]',
                    ],
                ]
            ];
        } else {
            $updateType = 3;
            $rules = [
                'cashOnDelivery' => [
                    'rules' => 'permit_empty|in_list[cashOnDelivery]',
                ]
            ];
        }

        if (!$this->validate($rules)) {
            return $this->fail($this->validator->getErrors());
        }

        if ($updateType == 1) {
            // saveImage
            $profilePicture = $this->request->getFile('profile_picture');
            if ($profilePicture->isValid() && !$profilePicture->hasMoved()) {
                $newName = $profilePicture->getRandomName();
                try {
                    $profilePicture->move("img", $newName);
                } catch (Exception $e) {
                    return $this->failServerError();
                }
            }

            $user = new User();
            $field = [
                'first_name' => $this->request->getPost('first_name'),
                'last_name' => $this->request->getPost('last_name'),
                'phone_number' => $this->request->getPost('phone_number'),
                'avatar' => $newName,
            ];
            $user->fill($field);

            $users = model(OwnUserModel::class);
            try {
                $users->save($user);
            } catch (DatabaseException $e) {
                log_message('error', json_encode($users->errors()));
                return $this->failServerError();
            }
        } elseif ($updateType == 2) {
            $logoKantin = $this->request->getFile('logo_kantin');
            if ($logoKantin->isValid() && !$logoKantin->hasMoved()) {
                $newName = $logoKantin->getRandomName();
                try {
                    $logoKantin->move("img", $newName);
                    $canteenLogo = $canteens->select('logo_kantin')->where('user_id', user_id())->first()['logo_kantin'];
                    if ($canteenLogo != null) {
                        unlink('img/' . $canteenLogo);
                    }
                } catch (Exception $e) {
                    return $this->failServerError();
                }
            }
            $data = [
                'name' => $this->request->getPost('name_canteen'),
                'logo_kantin' => $newName,
            ];

            // saveLogo
            try {
                $canteenId = $canteens->select('id')->where('user_id', user_id())->first();
                $canteens->update($canteenId, $data);
            } catch (DatabaseException $e) {
                log_message('error', json_encode($canteens->errors()));
                return $this->failServerError();
            }
        } else {
            $data = [
                'cod' => $this->request->getPost('cashOnDelivery') ? '1' : '0',
            ];
            try {
                $canteenId = $canteens->select('id')->where('user_id', user_id())->first();
                $canteens->update($canteenId, $data);
            } catch (DatabaseException $e) {
                log_message('error', json_encode($canteens->errors()));
                return $this->failServerError();
            }
        }

        try {
            $canteenId = $canteens->select('id')->where('user_id', user_id())->first();
            $canteens->update($canteenId, ['setup_wizzard' => $updateType]);
        } catch (DatabaseException $e) {
            log_message('error', json_encode($canteens->errors()));
            return $this->failServerError();
        }

        return $this->respond(['status' => 308, 'messages' => ['success' => 'Data berhasil disimpan!', 'showMessage' => $updateType == 3 ? true : false], 'url' => base_url('dashboard')], 308);
    }

    public function menuType()
    {
        $search = $this->request->getGet('search') ?? '';
        return $this->respond(['status' => 200, 'menuType' => model(CanteenFoodTypeModel::class)->searchByName($search)->findAll()]);
    }

    public function menuCategories()
    {
        $search = $this->request->getGet('search') ?? '';
        return $this->respond(['status' => 200, 'menuCategories' => model(CanteenFoodCategoryModel::class)->searchByName($search)->findAll()]);
    }
}
