<?php
/**
 * Calendarize plugin for Craft CMS 3.x
 *
 * Calendar element types
 *
 * @link      https://union.co
 * @copyright Copyright (c) 2018 Franco Valdes
 */

namespace unionco\calendarize\variables;

use DateTime;
use Craft;
use craft\i18n\Locale;
use unionco\calendarize\Calendarize;
use unionco\calendarize\models\Occurrence;

/**
 * @author    Franco Valdes
 * @package   Calendarize
 * @since     1.0.0
 */
class CalendarizeVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Returns all the localized day of the week names in value label array
     *
     * @param string|null $length The format length that should be returned. Values: Locale::LENGTH_ABBREVIATED, ::MEDIUM, ::FULL
     * @return array The localized day array
     */
    public function getWeekDayNames(string $length = null)
    {
        if (!$length) {
            $length = Locale::LENGTH_ABBREVIATED;
        }

        $days = [];
        $daysOfWeek = Craft::$app->getLocale()->getWeekDayNames($length);

        foreach ($daysOfWeek as $key => $day) {
            $days[] = ["value" => $key, "label" => $day];
        }

        return $days;
    }

    /**
     * Get week month text
     *
     * @param DateTime $date
     *
     * @return string
     */
    public function weekMonthText(DateTime $date): string
    {
        return Calendarize::$plugin->calendar->weekMonthText($date);
    }

    /**
     * Get upcoming entries
     *
     * @param array $criteria
     * @param string $order
     *
     * @return array Occurance[]
     */
    public function upcoming(array $criteria = [], string $order = "asc", $unique = false)
    {
        return Calendarize::$plugin->calendar->upcoming($criteria, $order, $unique);
    }

    /**
     * Get entries after date
     *
     * @param DateTime|null $date
     * @param array $criteria
     * @param string $order
     *
     * @return Occurrence[]
     */
    public function after(DateTime $date = null, array $criteria = [], string $order = "asc", $unique = false): array
    {
        return Calendarize::$plugin->calendar->after($date, $criteria, $order, $unique);
    }

    /**
     * Get entries between two dates
     *
     * @param DateTime|string $start
     * @param DateTime|string $end
     * @param array $criteria
     * @param string $order
     *
     * @return Occurrence[]
     */
    public function between(DateTime|string $start, DateTime|string $end, array $criteria = [], string $order = "asc", $unique = false): array
    {
        return Calendarize::$plugin->calendar->between($start, $end, $criteria, $order, $unique);
    }
}
