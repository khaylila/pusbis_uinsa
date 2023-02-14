<?php

namespace App\Controllers\Api;

use App\Models\LocationModel;
use App\Controllers\BaseController;
use App\Models\PostalCodeModel;
use CodeIgniter\API\ResponseTrait;

class LocationController extends BaseController
{
    use ResponseTrait;

    public function listAllProvinces()
    {
        $search = $this->request->getGet('search') ?? '';
        $data = model(LocationModel::class)->getProvinces($search);
        return $this->respond(['status' => 'success', 'data' => $data ?? []]);
    }

    public function listAllRegencies(int $provinceId = 0)
    {
        if ($provinceId == 0) {
            return $this->fail(['status' => 'failed', 'msg' => 'data not found', 'data' => $data ?? []]);
        }
        $search = $this->request->getGet('search') ?? '';
        $data = model(LocationModel::class)->getRegencies($provinceId, $search);
        return $this->respond(['status' => 'success', 'data' => $data ?? []]);
    }

    public function listAllDistricts(int $regencyId = 0)
    {
        if ($regencyId == 0) {
            return $this->fail(['status' => 'failed', 'msg' => 'data not found', 'data' => $data ?? []]);
        }
        $search = $this->request->getGet('search') ?? '';
        $data = model(LocationModel::class)->getDistricts($regencyId, $search);
        return $this->respond(['status' => 'success', 'data' => $data ?? []]);
    }

    public function listAllUrbans(int $districtId)
    {
        if ($districtId == 0) {
            return $this->fail(['status' => 'failed', 'msg' => 'data not found', 'data' => $data ?? []]);
        }
        $search = $this->request->getGet('search') ?? '';
        $data = model(PostalCodeModel::class)->getUrbans($districtId, $search);
        return $this->respond(['status' => 'success', 'data' => $data ?? []]);
    }
}
