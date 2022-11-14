<?php

/*
 * Contains few functions required to format date and time
 */

date_default_timezone_set("Asia/Colombo");

class DateTimeExtended
{
   public static function getCurrentTimeStamp()
   {
      return date('Y-m-d H:i:s', time());
   }

   public static function getCurrentDate()
   {
      return date('Y-m-d', time());
   }

   public static function getCurrentTime()
   {
      return date('H:i:s', time());
   }

   // public static function convertToFullFormatDate($datetime)
   // {
   //    $timestamp = strtotime($datetime);
   //    $date =  date('l, jS F o',  $timestamp);

   //    return $date;
   // }


   public static function dateToShortMonthFormat($datetime, $flag)
   {
      $timestamp = strtotime($datetime);
      switch ($flag)
      {
         case "D":
            return date('j',  $timestamp);
         case "M":
            return date('M',  $timestamp);
         case "Y":
            return date('o',  $timestamp);
         case "T":
            return date('h:i A',  $timestamp);     // Format : 11:30 AM
         case "F":
            return date('M j, o',  $timestamp);    // Format : Dec 31, 2021
         case "X":
            return date('l, jS F o',  $timestamp); // Format : Wednesday, 12th January 2022
      }
   }

   public static function getTimeDiff($fromTime, $toTime = NULL)
   {
      if (is_null($toTime))
         $toTime = self::getCurrentTimeStamp();

      $minsDiff = round((strtotime($toTime) - strtotime($fromTime)) / 60, 0);
      $secDiff = (strtotime($toTime) - strtotime($fromTime)) % 60;

      return [$minsDiff, $secDiff];
   }

   public static function getDateDiff($fromDate, $toDate = NULL)
   {
      if (is_null($toDate))
         $toDate = self::getCurrentDate();

      $toDate = date_create($toDate);

      $fromDate = date_create($fromDate);

      return date_diff($fromDate, $toDate)->days;
   }

   public static function minsToDuration($durationInMins)
   {
      $hours = (int)($durationInMins / 60);
      $mins = $durationInMins % 60;
      if ($hours == 0)
         return $mins . " mins";
      elseif ($mins == 0)
      {
         return $hours . " hours";
      }
      else
      {
         return $hours . " h " . $mins . " mins";
      }
   }

   public static function minsToTime($timeInMins)
   {
      $hours24 = intdiv($timeInMins, 60);
      $suffix = ($hours24 >= 12) ? " PM" : " AM";
      $hours12 = ($hours24 > 12) ? $hours24 - 12 : $hours24;
      $mins12 = $timeInMins % 60;
      $time = str_pad($hours12, 2, "0", STR_PAD_LEFT) . ':' . str_pad($mins12, 2, "0", STR_PAD_LEFT) . $suffix;
      return $time;
   }
}
