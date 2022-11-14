<?php

/*
 * Contains simple page redirect function for views
 */

function redirect($page)
{
   header('location: ' . URLROOT . '/' . $page);
}
