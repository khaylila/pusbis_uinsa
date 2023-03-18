<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsAjax implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if ($request->getMethod() == 'get') {
            return;
        }
        if (!$request->isAJAX()) {
            return response()->setStatusCode(400)->setJSON([
                'status' => 400,
                'messages' => [
                    'error' => 'Permintaan tidak dapat diproses!'
                ],
                'error' => 400,
            ]);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
