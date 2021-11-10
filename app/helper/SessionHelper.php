<?php

namespace acme\sale\helper;

/**
 * Session Helper
 *
 * Desc: I added Session for distributed test scenario. We can change Session Handler file to redis (or other) and can execute parallel.
 * @version   0.1
 * @copyright Acme Widget Co.
 */
class SessionHelper
{
    /**
     * Add new record
     *
     * @param string $key
     * @param        $value
     *
     * @return bool
     */
    public static function addNewRecord(string $key, $value): bool
    {
        if (isset($_SESSION[$key])) {
            return false;
        }

        $_SESSION[$key] = $value;

        return true;
    }

    /**
     * Get record by key
     *
     * @param string $key
     *
     * @return mixed|null
     */
    public static function getRecord(string $key)
    {
        if (isset($_SESSION[$key]) && !empty($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return null;
    }

    /**
     * Check session record is exists or not
     *
     * @param string $key
     *
     * @return bool
     */
    public static function isRecordExists(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Update record by key for new value
     *
     * @param string $key
     * @param        $newValue
     *
     * @return bool
     */
    public static function updateRecord(string $key, $newValue): bool
    {
        if (isset($_SESSION[$key])) {
            $_SESSION[$key] = $newValue;

            return true;
        }

        return false;
    }

    /**
     * Delete record by key
     *
     * @param string $key
     *
     * @return bool
     */
    public static function deleteRecord(string $key): bool
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);

            return true;
        }

        return false;
    }

    /**
     * Destroy Session
     * 
     * @return bool
     */
    public static function destroySession(): bool
    {
        return session_destroy();
    }
}