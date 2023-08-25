<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Session extends BaseConfig
{
    // Session driver, cookie settings, etc.
    public $driver         = 'CodeIgniter\Session\Handlers\FileHandler';
    public $cookieName     = 'ci_session';
    public $expire         = 7200;
    public $cookieDomain   = '';
    public $cookiePath     = '/';
    public $cookieSecure   = FALSE;
    public $cookieHTTPOnly = FALSE;
    public $proxyIPs       = '';
    public $sameSite       = 'Lax';
}
