<?php

namespace App\Libraries;

class AdvtForm
{
    const ADVTNO = [
        'name' => 'advt_no',
        'label' => 'Advt. No. ',
        'rules' => 'required|regex_match[/^\d{2}\/\d{4}$/]'
    ];

    const PUB_DATE = [
        'name' => 'pub_date',
        'label' => 'Published Date ',
        'rules' => 'required|valid_date[d-m-Y]'
    ];

    const FILE_REF = [
        'name' => 'file_ref_no',
        'label' => 'File Reference No. ',
        'rules' => 'required'
    ];

    const DESC = [
        'name' => 'desc',
        'label' => 'Advt. Description',
        'rules' => 'alpha_numeric_punct|permit_empty'
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

    public static function getNameDesc()
    {
        return self::DESC['name'];
    }

    public static function getLabelAdvtNo()
    {
        return self::ADVTNO['label'];
    }

    public static function getLabelPubDate()
    {
        return self::PUB_DATE['label'];
    }

    public static function getLabelFileRef()
    {
        return self::FILE_REF['label'];
    }

    public static function getLabelDesc()
    {
        return self::DESC['label'];
    }

    public static function getRulesAdvtNo()
    {
        return self::ADVTNO['rules'];
    }

    public static function getRulesPubDate()
    {
        return self::PUB_DATE['rules'];
    }

    public static function getRulesFileRef()
    {
        return self::FILE_REF['rules'];
    }

    public static function getRulesDesc()
    {
        return self::DESC['rules'];
    }
}
