<?php

namespace App\Libraries;

use DateTime;

class PostFormNames
{
    const ADVTNO = [
        'name' => 'advt_no',
        'validation' => [
            'label' => 'Advt. No. ',
            'rules' => 'required|regex_match[/^\d{2}\/\d{4}$/]'
        ]
    ];
    const PUB_DATE = [
        'name' => 'pub_date',
        'validation' => [
            'label' => 'Published Date ',
            'rules' => 'required|valid_date[d-m-Y]'
        ]
    ];
    const FILE_REF = [
        'name' => 'file_ref_no',
        'validation' => [
            'label' => 'File Reference No. ',
            'rules' => 'required'
        ]
    ];
    const POST_NAME = [
        'name' => 'post_name',
        'validation' => [
            'label' => 'Post Name',
            'rules' => 'required'
        ]
    ];
    const DEPTT_NAME = [
        'name' => 'deptt_name',
        'validation' => [
            'label' => 'Department Name',
            'rules' => 'required'
        ]
    ];
    const GRAND_TOTAL = [
        'name' => 'grand_total',
        'validation' => [
            'label' => 'Grand Total Post',
            'rules' => 'required|is_natural_no_zero'
        ]
    ];
    const GRAND_TOTAL_RFW = [
        'name' => 'grand_total_rfw',
        'validation' => [
            'label' => 'Grand Total Women Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const OPEN_CAT = [
        'name' => 'open_cat',
        'validation' => [
            'label' => 'Open Category Post',
            'rules' => 'is_natural'
        ]
    ];
    const OPEN_CAT_RFW = [
        'name' => 'open_cat_rfw',
        'validation' => [
            'label' => 'Open Category Women Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const OBC_MOBC_RESV = [
        'name' => 'obc_mobc_resv',
        'validation' => [
            'label' => 'OBC/MOBC Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const OBC_MOBC_RFW = [
        'name' => 'obc_mobc_rfw',
        'validation' => [
            'label' => 'OBC/MOBC Women Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const SC_RESV = [
        'name' => 'sc_resv',
        'validation' => [
            'label' => 'SC Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const SC_RFW = [
        'name' => 'sc_rfw',
        'validation' => [

            'label' => 'SC Women Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const STH_RESV = [
        'name' => 'sth_resv',
        'validation' => [
            'label' => 'STH Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const STH_RFW = [
        'name' => 'sth_rfw',
        'validation' => [
            'label' => 'STH Women Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const STP_RESV = [
        'name' => 'stp_resv',
        'validation' => [
            'label' => 'STP Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const STP_RFW = [
        'name' => 'stp_rfw',
        'validation' => [
            'label' => 'STP Women Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const PWBD_RESV = [
        'name' => 'pwbd_resv',
        'validation' => [
            'label' => 'PwBD Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const BLIND_LV_RESV = [
        'name' => 'blind_lv_resv',
        'validation' => [
            'label' => 'Blind/Low Vision Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const DEAF_HH_RESV = [
        'name' => 'deaf_hh_resv',
        'validation' => [
            'label' => 'Deaf/Hard of Hearing Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const LOCOMOTOR_RESV = [
        'name' => 'locomotor_resv',
        'validation' => [
            'label' => 'Locomotor Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const AUTISM_RESV = [
        'name' => 'autism_resv',
        'validation' => [
            'label' => 'Autism Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const EX_SERV_RESV = [
        'name' => 'ex_serv_resv',
        'validation' => [
            'label' => 'Ex-Servicemen Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const EWS_RESV = [
        'name' => 'ews_resv',
        'validation' => [
            'label' => 'EWS Reservation',
            'rules' => 'is_natural'
        ]
    ];
    const APPLN_START_DATE = [
        'name' => 'appln_start_date',
        'validation' => [
            'label' => 'Application Start Date',
            'rules' => 'required|valid_date[d-m-Y]'
        ]
    ];
    const APPLN_CLOSE_DATE = [
        'name' => 'appln_close_date',
        'validation' => [
            'label' => 'Application Closing Date',
            'rules' => 'required|valid_date[d-m-Y]'
        ]
    ];
    const FEE_PAY_LAST_DATE = [
        'name' => 'fee_pay_last_date',
        'validation' => [
            'label' => 'Fee Payment Last Date',
            'rules' => 'required|valid_date[d-m-Y]'
        ]
    ];
    const TOTAL_APPLICANT = [
        'name' => 'total_applicant',
        'validation' => [
            'label' => 'Total Applicant',
            'rules' => 'is_natural'
        ]
    ];
    const STATUS = [
        'name' => 'status',
        'validation' => [
            'label' => 'Current Status',
            'rules' => 'alpha|alpha_numeric_space'
        ]
    ];
    const RECCOM_LIST = [
        'name' => 'reccom_list',
        'validation' => [
            'label' => 'Reccomendation List link',
            'rules' => 'valid_url_strict'
        ]
    ];
    const RECCOMND_DATE = [
        'name' => 'reccomnd_date',
        'validation' => [
            'label' => 'Reccomendation Date',
            'rules' => 'valid_date[d-m-Y]'
        ]
    ];
    const NO_OF_RECCOMND = [
        'name' => 'no_of_reccomnd',
        'validation' => [
            'label' => 'Total No. of Reccomendation',
            'rules' => 'is_natural'
        ]
    ];
    const DEALING_ASTT = [
        'name' => 'dealing_astt',
        'validation' => [
            'label' => 'Dealing Assistant',
            'rules' => 'required|alpha_numeric_space'
        ]
    ];
    const NOTES = [
        'name' => 'notes',
        'validation' => [
            'label' => 'Important Notes',
            'rules' => 'alpha_numeric_punct|permit_empty'
        ]
    ];

    const ADVT_ID = [
        'name' => 'advt_id',
        'validation' => [
            'label' => 'Advt. No.',
            'rules' => 'required|regex_match[/^\d{2}\/\d{4}$/]'
        ]
    ];

    public static function getNameAdvtNo()
    {
        return self::ADVTNO['name'];
    }
    public static function getNamePubDate()
    {
        return self::PUB_DATE['name'];
    }
    public static function getNameFileRef()
    {
        return self::FILE_REF['name'];
    }
    public static function postName()
    {
        return self::POST_NAME['name'];
    }
    public static function depttName()
    {
        return self::DEPTT_NAME['name'];
    }
    public static function grandTotalName()
    {
        return self::GRAND_TOTAL['name'];
    }
    public static function grandTotRFWName()
    {
        return self::GRAND_TOTAL_RFW['name'];
    }
    public static function ocName()
    {
        return self::OPEN_CAT['name'];
    }
    public static function ocRFWName()
    {
        return self::OPEN_CAT_RFW['name'];
    }
    public static function obcMobcName()
    {
        return self::OBC_MOBC_RESV['name'];
    }
    public static function obcMobcRFWName()
    {
        return self::OBC_MOBC_RFW['name'];
    }
    public static function scName()
    {
        return self::SC_RESV['name'];
    }
    public static function scRFWName()
    {
        return self::SC_RFW['name'];
    }
    public static function sthName()
    {
        return self::STH_RESV['name'];
    }
    public static function sthRFWName()
    {
        return self::STH_RFW['name'];
    }
    public static function stpName()
    {
        return self::STP_RESV['name'];
    }
    public static function stpRFWName()
    {
        return self::STP_RFW['name'];
    }
    public static function pwbdName()
    {
        return self::PWBD_RESV['name'];
    }
    public static function lowVisionName()
    {
        return self::BLIND_LV_RESV['name'];
    }
    public static function deafName()
    {
        return self::DEAF_HH_RESV['name'];
    }
    public static function locomotorName()
    {
        return self::LOCOMOTOR_RESV['name'];
    }
    public static function autismName()
    {
        return self::AUTISM_RESV['name'];
    }
    public static function exServiceName()
    {
        return self::EX_SERV_RESV['name'];
    }
    public static function ewsName()
    {
        return self::EWS_RESV['name'];
    }
    public static function startDateName()
    {
        return self::APPLN_START_DATE['name'];
    }
    public static function closingDateName()
    {
        return self::APPLN_CLOSE_DATE['name'];
    }
    public static function feeDateName()
    {
        return self::FEE_PAY_LAST_DATE['name'];
    }
    public static function totalApplnName()
    {
        return self::TOTAL_APPLICANT['name'];
    }
    public static function statusName()
    {
        return self::STATUS['name'];
    }
    public static function reccomListName()
    {
        return self::RECCOM_LIST['name'];
    }
    public static function reccomDateName()
    {
        return self::RECCOMND_DATE['name'];
    }
    public static function reccomNoName()
    {
        return self::NO_OF_RECCOMND['name'];
    }
    public static function dealingAsttName()
    {
        return self::DEALING_ASTT['name'];
    }
    public static function NoteName()
    {
        return self::NOTES['name'];
    }
    public static function AdvtIDName()
    {
        return self::ADVT_ID['name'];
    }
    public static function PostIDName()
    {
        return 'post_id';
    }

    public static function checkTotals($postdata)
    {
        $grand_tot_resv = $postdata[self::ocName()] + $postdata[self::obcMobcName()] + $postdata[self::scName()] + $postdata[self::sthName()] + $postdata[self::stpName()];
        $grand_tot_rfw = $postdata[self::ocRFWName()] + $postdata[self::obcMobcRFWName()] + $postdata[self::scRFWName()] + $postdata[self::sthRFWName()] + $postdata[self::stpRFWName()];
        $pwbd_tot_resv = $postdata[self::lowVisionName()] + $postdata[self::deafName()] + $postdata[self::locomotorName()] + $postdata[self::autismName()];

        $data = [
            'success' => true,
            'message' => ''
        ];

        if ($grand_tot_resv != $postdata[self::grandTotalName()]) {
            $data['success'] = false;
            $data['message'] = [self::grandTotalName() => 'Grand Total Reservation is not matching with the provided Category wise total.'];
            return $data;
        } elseif ($grand_tot_rfw != $postdata[self::grandTotRFWName()]) {
            $data['success'] = false;
            $data['message'] = [self::grandTotRFWName() => 'Grand Total RFW is not matching with the provided Category wise total.'];
            return $data;
        } elseif ($pwbd_tot_resv != $postdata[self::pwbdName()]) {
            $data['success'] = false;
            $data['message'] = [self::pwbdName() => 'Grand Total PwBD Reservation is not matching with the provided Category wise total.'];
            return $data;
        } else {
            return $data;
        }
    }

    public static function checkApplnDates($postdata)
    {
        $start_date = new DateTime($postdata[self::startDateName()]);
        $end_date = new DateTime($postdata[self::closingDateName()]);
        $fee_pay_date = new DateTime($postdata[self::feeDateName()]);
        $data = [
            'success' => true,
            'message' => ''
        ];

        if ($start_date >= $end_date || $start_date >= $fee_pay_date) {
            $data['success'] = false;
            $data['message'] = [self::startDateName() => 'Application Start Date cannot be later than Application closing date or Fee Payment last date.'];
            return $data;
        } elseif ($end_date >= $fee_pay_date) {
            $data['success'] = false;
            $data['message'] = [self::closingDateName() =>  'Application Closing Date cannot be later than Fee Payment last date'];
            return $data;
        } else {
            return $data;
        }
    }

    public static function getInsertArray($postdata): array
    {
        $postdata[self::startDateName()] = date('Y-m-d', strtotime($postdata[self::startDateName()]));
        $postdata[self::closingDateName()] = date('Y-m-d', strtotime($postdata[self::closingDateName()]));
        $postdata[self::feeDateName()] = date('Y-m-d', strtotime($postdata[self::feeDateName()]));
        return $postdata;
    }
}
