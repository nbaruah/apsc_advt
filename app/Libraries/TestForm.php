<?php

namespace App\Libraries;

use DateTime;

class TestForm
{
    const POST_ID = [
        'name' => 'post_id',
        'validation' => [
            'label' => 'Post ID ',
            'rules' => 'required'
        ]
    ];
    const NOTIF_DATE = [
        'name' => 'test_notif_date',
        'validation' => [
            'label' => 'Notification Published Date ',
            'rules' => 'required|valid_date[d-m-Y]'
        ]
    ];
    const TEST_TYPE = [
        'name' => 'type',
        'validation' => [
            'label' => 'Test Type ',
            'rules' => 'required'
        ]
    ];
    const NOTES = [
        'name' => 'notes',
        'validation' => [
            'label' => 'Important Notes',
            'rules' => 'alpha_numeric_punct|permit_empty'
        ]
    ];
    const NOTIF_LINK = [
        'name' => 'test_notif_link',
        'validation' => [
            'label' => 'Notification Link ',
            'rules' => 'required|valid_url_strict'
        ]
    ];
    const NOTIF_NO = [
        'name' => 'test_notif_no',
        'validation' => [
            'label' => 'Notification No.',
            'rules' => 'required'
        ]
    ];
    const TEST_DATE = [
        'name' => 'test_date_',
        'validation' => [
            'label' => 'Test Date ',
            'rules' => 'required|valid_date[d-m-Y]'
        ]
    ];

    public static function notif_no_name()
    {
        return self::NOTIF_NO['name'];
    }

    public static function notif_link_name()
    {
        return self::NOTIF_LINK['name'];
    }

    public static function notif_date_name()
    {
        return self::NOTIF_DATE['name'];
    }

    public static function test_note_name()
    {
        return self::NOTES['name'];
    }

    public static function test_type_name()
    {
        return self::TEST_TYPE['name'];
    }

    public static function post_id_name()
    {
        return self::POST_ID['name'];
    }

    public static function test_date_name()
    {
        return self::TEST_DATE['name'];
    }

    public static function set_rules_for(&$validation)
    {
        $validation->setRules([
            self::notif_link_name() => self::NOTIF_LINK['validation'],
            self::notif_no_name() => self::NOTIF_NO['validation'],
            self::notif_date_name() => self::NOTIF_DATE['validation'],
            self::test_note_name() => self::NOTES['validation'],
            self::post_id_name() => self::POST_ID['validation']
        ]);
    }

    /**
     * Summary of getTestDates
     * @param mixed $post_arr
     * @return array
     */
    public static function getTestDates($post_arr): array
    {
        $dates = [];
        foreach ($post_arr as $key => $value) {
            if (preg_match('/^test_date_/', $key)) {
                $dates[$key] = $value;
            }
        }
        return $dates;
    }

    /**
     * Varifies if the provided test date(s) are in format DD-MM-YYYY or is not empty.
     * @param array $dates_arr
     * @return bool false if invalid or empty dates are provided
     */
    public static function validateTestDates($dates_arr): bool
    {
        foreach ($dates_arr as $key => $value) {
            if (empty($value) || !self::validDate($value)) {
                return false;
            }
        }
        return true;
    }

    public static function getDBFormatDate($date)
    {
        return date('Y-m-d', strtotime($date));
    }

    private static function validDate($date, $format = 'd-m-Y')
    {
        $d = DateTime::createFromFormat($format, $date);
        // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
        return $d && $d->format($format) === $date;
    }
}
