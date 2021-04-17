<?php

namespace App\Main\Plugin\chat\Model;


use Fix\Packages\Database\Database;

class chat {



    public static function userList($siteCode){

        return Database::start()->select("authorities")->where(["siteCode"],[$siteCode])->run(Database::Multiple);

    }

    public static function addMessage($siteCode,$receiver,$sender,$message){

        return Database::start()->insert("plugin_chat")->set(["uuid","siteCode","v_sender","v_receiver","v_message","v_status","ip","time"],[self::createUuid(),$siteCode,$sender,$receiver,$message,"new",$_SERVER["REMOTE_ADDR"],time()])->run(Database::Progress);

    }


    public static function getHistoryUnSeen($siteCode,$sender,$receiver){


        return Database::start()->manuel("select * from plugin_chat where (((siteCode='".$siteCode."' and v_sender='".$sender."' and v_receiver='".$receiver."') or (siteCode='".$siteCode."' and v_sender='".$receiver."' and v_receiver='".$sender."')) and v_status='new') order by id ASC LIMIT 0,100")->run(Database::Multiple);


    }


    public static function getHistorySeen($siteCode,$sender,$receiver){


        return Database::start()->manuel("select * from plugin_chat where (((siteCode='".$siteCode."' and v_sender='".$sender."' and v_receiver='".$receiver."') or (siteCode='".$siteCode."' and v_sender='".$receiver."' and v_receiver='".$sender."')) and v_status='seen') order by id ASC LIMIT 0,100")->run(Database::Multiple);


    }

    public static function checkUnSeen($siteCode,$receiver){

        return Database::start()->select("plugin_chat")->where(["siteCode","v_receiver","v_status"],[$siteCode,$receiver,"new"])->run(Database::Multiple);

    }

    public static function checkUnSeenUsers($siteCode,$sender,$receiver){

        return Database::start()->select("plugin_chat")->where(["siteCode","v_sender","v_receiver","v_status"],[$siteCode,$sender,$receiver,"new"])->run(Database::Multiple);

    }


    public static function updateSeen($siteCode,$sender,$receiver){


        return Database::start()->manuel("update plugin_chat set v_status='seen'  where (( (siteCode='".$siteCode."' and v_sender='".$receiver."' and v_receiver='".$sender."')) and v_status='new') ")->run(Database::Progress);


    }



    public static function getHistory($siteCode,$sender,$receiver){


        return Database::start()->manuel("select * from plugin_chat where ((siteCode='".$siteCode."' and v_sender='".$sender."' and v_receiver='".$receiver."') or (siteCode='".$siteCode."' and v_sender='".$receiver."' and v_receiver='".$sender."')) order by id ASC LIMIT 0,100")->run(Database::Multiple);


    }


    public static function getHistoryLastMessage($siteCode,$sender,$receiver){


        return Database::start()->manuel("select * from plugin_chat where ((siteCode='".$siteCode."' and v_sender='".$sender."' and v_receiver='".$receiver."') or (siteCode='".$siteCode."' and v_sender='".$receiver."' and v_receiver='".$sender."')) order by id DESC  ")->run(Database::Single);


    }

    public static function getHistoryAfterMessage($id = 0, $siteCode,$sender,$receiver){


        return Database::start()->manuel("select * from plugin_chat where ( id > $id and ((siteCode='".$siteCode."' and v_sender='".$sender."' and v_receiver='".$receiver."') or (siteCode='".$siteCode."' and v_sender='".$receiver."' and v_receiver='".$sender."'))) order by id DESC limit 0,100 ")->run(Database::Multiple);


    }

    public static function chatHistoryClear($siteCode){

        return Database::start()->delete("plugin_chat")->where(["siteCode"],[$siteCode])->run(Database::Progress);

    }


    /**
     * @return string
     */
    public static function createUuid(){

        return rand(1111,9999)."-".rand(1134,9874)."-".rand(1234,9876)."-".rand(1135,8762);
    }


}