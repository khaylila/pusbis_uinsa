<?php

declare(strict_types=1);

namespace App\Filters;

use CodeIgniter\Shield\Filters\GroupFilter as ShieldGroupFilter;
use CodeIgniter\HTTP\RequestInterface;

/**
 * Group Authorization Filter.
 */
class GroupFilter extends ShieldGroupFilter
{
    /**
     * Ensures the user is logged in and a member of one or
     * more groups as specified in the filter.
     *
     * @param array|null $arguments
     *
     * @return RedirectResponse|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (empty($arguments)) {
            return;
        }

        if (!auth()->loggedIn()) {
            return redirect()->route('login');
        }

        if ($this->isAuthorized($arguments)) {
            return;
        }

        // Otherwise, we'll just send them to the home page.
        return redirect()->to('/errors/403');
    }
}
