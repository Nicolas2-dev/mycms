<?php

declare(strict_types=1);

namespace Npds\Feed;

use Npds\Config\Config;


/**
 * FeedDate is an internal class that stores a date for a feed or feed item.
 * Usually, you won't need to use this.
 */
class FeedDate
{

    var $unix;


    /**
     * Creates a new instance of FeedDate representing a given date.
     * Accepts RFC 822, ISO 8601 date formats as well as unix time stamps.
     * 
     * @param mixed $dateString optional the date this FeedDate will represent. If not specified, the current date and time is used.
     */
    public function __construct($dateString = '')
    {
        if ($dateString == "") {
            $dateString = date("r");
        }

        if (is_integer($dateString)) {
            $this->unix = $dateString;
            return;
        }

        if (preg_match("~(?:(?:Mon|Tue|Wed|Thu|Fri|Sat|Sun),\\s+)?(\\d{1,2})\\s+([a-zA-Z]{3})\\s+(\\d{4})\\s+(\\d{2}):(\\d{2}):(\\d{2})\\s+(.*)~", $dateString, $matches)) {

            $months = array("Jan" => 1, "Feb" => 2, "Mar" => 3, "Apr" => 4, "May" => 5, "Jun" => 6, "Jul" => 7, "Aug" => 8, "Sep" => 9, "Oct" => 10, "Nov" => 11, "Dec" => 12);
            $this->unix = mktime((int) $matches[4], (int) $matches[5], (int) $matches[6], $months[$matches[2]], (int) $matches[1], (int) $matches[3]);

            if (substr($matches[7], 0, 1) == '+' or substr($matches[7], 0, 1) == '-') {
                $tzOffset = (substr($matches[7], 0, 3) * 60 + substr($matches[7], -2)) * 60;
            } else {
                if (strlen($matches[7]) == 1) {
                    $oneHour = 3600;
                    $ord = ord($matches[7]);

                    if ($ord < ord("M")) {
                        $tzOffset = (ord("A") - $ord - 1) * $oneHour;
                    } elseif ($ord >= ord("M") and $matches[7] != "Z") {
                        $tzOffset = ($ord - ord("M")) * $oneHour;
                    } elseif ($matches[7] == "Z") {
                        $tzOffset = 0;
                    }
                }

                switch ($matches[7]) {
                    case "UT":
                    case "GMT":
                        $tzOffset = 0;
                }
            }
            $this->unix += $tzOffset;
            return;
        }

        if (preg_match("~(\\d{4})-(\\d{2})-(\\d{2})T(\\d{2}):(\\d{2}):(\\d{2})(.*)~", $dateString, $matches)) {
            $this->unix = mktime( (int) $matches[4],  (int) $matches[5],  (int) $matches[6], (int) $matches[2],  (int) $matches[3], (int)  $matches[1]);

            if (substr($matches[7], 0, 1) == '+' or substr($matches[7], 0, 1) == '-') {
                $tzOffset = (substr($matches[7], 0, 3) * 60 + substr($matches[7], -2)) * 60;
            } else {
                if ($matches[7] == "Z") {
                    $tzOffset = 0;
                }
            }

            $this->unix += $tzOffset;
            return;
        }

        $this->unix = 0;
    }

    /**
     * Gets the date stored in this FeedDate as an RFC 822 date.
     *
     * @return string
     */
    function rfc822()
    {
        //return gmdate("r",$this->unix);
        $date = gmdate("D, d M Y H:i:s", $this->unix + (3600 * (int) Config::get('npds.gmt')));

        $timezone = Config::get('npds.timezone');

        if ($timezone != "") {
            $date .= " " . str_replace(":", "", $timezone);
        }

        return $date;
    }

    /**
     * Gets the date stored in this FeedDate as an ISO 8601 date.
     *
     * @return string
     */
    function iso8601()
    {
        $date = gmdate("Y-m-d\TH:i:sO", $this->unix + (3600 * (int) Config::get('npds.gmt')));
        $date = substr($date, 0, 22) . ':' . substr($date, -2);

        $timezone = Config::get('npds.timezone');

        if ($timezone != "") {
            $date = str_replace("+00:00", $timezone, $date);
        }

        return $date;
    }

    /**
     * Gets the date stored in this FeedDate as unix time stamp.
     *
     * @return string
     */
    function unix()
    {
        return $this->unix + (3600 * (int) Config::get('npds.gmt'));
    }
}
