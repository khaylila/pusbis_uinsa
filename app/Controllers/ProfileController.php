<?php

namespace App\Controllers;

use CodeIgniter\Validation\FormatRules;

class ProfileController extends BaseController
{
    // public function getProfilePicture()
    // {
    //     $formatRules = new FormatRules();
    //     $profilePicture = auth()->user()->avatar;
    //     $profilePicture ??= "upload-thumb.png";
    //     if ($formatRules->valid_url($profilePicture)) {
    //         return base_url() . 'img/' . $profilePicture;
    //     }
    //     return $profilePicture;
    // }
}
