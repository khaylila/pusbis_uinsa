<?php

declare(strict_types=1);

namespace Config;

use Midtrans\Config as MidtransConfig;

class Midtrans extends MidtransConfig
{
    public function __construct()
    {
        $this::$serverKey = "SB-Mid-server-MY3d5uK2ffI1m_6ASZMZF6L_";
        $this::$isProduction    = false;
        $this::$isSanitized     = true;
        $this::$is3ds           = false;
    }
}
