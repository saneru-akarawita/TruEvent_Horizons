<?php

/*
 *
 * Contains functions related Toast notification
 * Use session variables to store notification data
 * 
 */

class Toast
{
    public static function setToast($state, $title, $subtitle)
    {
        Session::setBundle(
            'toast',
            [
                'toastState' => $state,
                'toastTitle' => $title,
                'toastSubtitle' => $subtitle
            ]
        );
    }
    public static function hasToastNotification()
    {
        if (isset($_SESSION['toast']))
            return true;
        else
            return false;
    }

    public static function clearToastNotification()
    {
        Session::clear('toast');
    }
}
