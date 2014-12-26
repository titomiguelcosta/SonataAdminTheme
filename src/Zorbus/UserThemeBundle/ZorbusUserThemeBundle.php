<?php

namespace Zorbus\UserThemeBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ZorbusUserThemeBundle extends Bundle
{
    public function getParent()
    {
        return 'SonataUserBundle';
    }
}
