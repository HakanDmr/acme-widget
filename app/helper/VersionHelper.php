<?php

namespace acme\sale\helper;

/**
 * Version Helper
 *
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class VersionHelper
{
    /**
     * Check PHP Version
     *
     * Desc: We have to check the minimum PHP version before all other code
     * @return void
     */
    public static function checkPHPVersion(): void
    {
        if (floatval(PHP_VERSION) < 7.4) {
            print("Minimum PHP 7.4 version required!");
            exit;
        }
    }
}