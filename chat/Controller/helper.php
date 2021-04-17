<?php
/**
 * Created by PhpStorm.
 * User: cengizakcan
 * Date: 4.05.2020
 * Time: 02:17
 */

namespace App\Main\Plugin\chat\Controller;

use App\Main\Model\authModel;
use App\Main\Model\plugin;
use App\Main\Plugin\chat\Model\chat;
use Fix\Support\Header;


class helper {

    public function __construct(){

        // return $this->__construct();


    }

    public static function install($username = null, $password = null, $title = null){}


    public static function send(){


        try{

            Header::checkParameter($_POST,["receiver","message"]);
            Header::checkValue($_POST,["receiver","message"]);

            if(!authModel::getUser(Header::post("receiver"),$_SESSION["cms_auth_site"])){
                throw new \Exception("No recipient found");
            }

            if(!chat::addMessage(
                $_SESSION["cms_auth_site"],
                Header::post("receiver"),
                $_SESSION["cms_auth_uuid"],
                strip_tags(Header::post("message"))
            )){
                throw new \Exception("Message sending error");
            }

            $lastChat = chat::getHistoryLastMessage($_SESSION["cms_auth_site"],$_SESSION["cms_auth_uuid"],Header::post("receiver"));
            $getAllMessage = chat::getHistory($_SESSION["cms_auth_site"],$_SESSION["cms_auth_uuid"],Header::post("receiver"));


            Header::jsonResult("success","Success", "Message sent",[
                "lastId" => count($getAllMessage) === 1 ? "first" : $lastChat["id"]
            ]);

        }catch (\Exception $exception){

            Header::jsonResult("error","ERROR",$exception->getMessage());
        }

    }


    public static function history(){


        try{

            Header::checkParameter($_POST,["receiver"]);
            Header::checkValue($_POST,["receiver"]);

            if(!authModel::getUser(Header::post("receiver"),$_SESSION["cms_auth_site"])){
                throw new \Exception("Recipient not found");
            }

            $selfChat = chat::getHistory($_SESSION["cms_auth_site"],$_SESSION["cms_auth_uuid"],Header::post("receiver"));

            $lastChat = chat::getHistoryLastMessage($_SESSION["cms_auth_site"],$_SESSION["cms_auth_uuid"],Header::post("receiver"));


            $data = [];

            $data["lastMessageId"] = $lastChat["id"];

            foreach ($selfChat as $item) {

                $data["result"][] = [
                    "type"          => $item["v_sender"] === $_SESSION["cms_auth_uuid"] ? "sender" : "receiver",
                    "v_sender"      => $item["v_sender"],
                    "v_receiver"    => $item["v_receiver"],
                    "v_message"     => strip_tags($item["v_message"]),
                    "v_status"      => $item["v_status"],
                    "v_time"        => date("Y/m/d H:i:s",$item["time"])
                ];

            }

            Header::jsonResult("success","Success", "Conversation history received",$data);

        }catch (\Exception $exception){

            Header::jsonResult("error","ERROR",$exception->getMessage());
        }

    }

    public static function historyId(){


        try{

            Header::checkParameter($_POST,["receiver","lastId"]);
            Header::checkValue($_POST,["receiver","lastId"]);

            if(!authModel::getUser(Header::post("receiver"),$_SESSION["cms_auth_site"])){
                throw new \Exception("Recipient not found");
            }

            $selfChat = chat::getHistoryAfterMessage(Header::post("lastId"),$_SESSION["cms_auth_site"],$_SESSION["cms_auth_uuid"],Header::post("receiver"));

            $lastChat = chat::getHistoryLastMessage($_SESSION["cms_auth_site"],$_SESSION["cms_auth_uuid"],Header::post("receiver"));


            $data = [];

            $data["lastMessageId"] = $lastChat["id"];

            foreach ($selfChat as $item) {

                $data["result"][] = [
                    "type"          => $item["v_sender"] === $_SESSION["cms_auth_uuid"] ? "sender" : "receiver",
                    "v_sender"      => $item["v_sender"],
                    "v_receiver"    => $item["v_receiver"],
                    "v_message"     => $item["v_message"],
                    "v_status"      => $item["v_status"],
                    "v_time"        => date("Y/m/d H:i:s",$item["time"])
                ];

            }

            Header::jsonResult("success","Success", "Conversation history received",$data);

        }catch (\Exception $exception){

            Header::jsonResult("error","ERROR",$exception->getMessage());
        }

    }

    public static function historySeen(){


        try{

            Header::checkParameter($_POST,["receiver"]);
            Header::checkValue($_POST,["receiver"]);

            if(!authModel::getUser(Header::post("receiver"),$_SESSION["cms_auth_site"])){
                throw new \Exception("Recipient not found");
            }

            $lastChat = chat::updateSeen($_SESSION["cms_auth_site"],$_SESSION["cms_auth_uuid"],Header::post("receiver"));

            if(!$lastChat)
                throw new \Exception("Control error");

            Header::jsonResult("success","Success", "Conversation Confirmed");

        }catch (\Exception $exception){

            Header::jsonResult("error","ERROR",$exception->getMessage());
        }

    }

    public static function friendListAndCheck(){


        try{

            $lastChat       = chat::userList($_SESSION["cms_auth_site"]);

            $lastChatUnSeen = chat::checkUnSeen($_SESSION["cms_auth_site"],$_SESSION["cms_auth_uuid"]);

            $data = [];

            $data["newMessage"] = count($lastChatUnSeen);

            foreach ($lastChat as $item) {

                if($item["uuid"] !== $_SESSION["cms_auth_uuid"])
                    $data["result"][] = [
                        "v_uuid"        => $item["uuid"],
                        "fullName"      => $item["name"]." ".$item["surname"],
                        "v_notify"      => chat::checkUnSeenUsers($_SESSION["cms_auth_site"],$item["uuid"],$_SESSION["cms_auth_uuid"]) ? "active" : "passive",
                        "v_online"      => $item["lastLogin"]+3 > time() ? "active" : "passive"
                    ];

            }


            Header::jsonResult("success","WARNING", null,$data);

        }catch (\Exception $exception){

            Header::jsonResult("error","ERROR",$exception->getMessage());
        }

    }

    public static function chatHistoryClear(){

        try{

            if(
                (!plugin::check_type($_SESSION["cms_auth_uuid"],"root") and
                    !plugin::check_type($_SESSION["cms_auth_uuid"],"admin") ) and
                (!plugin::check_permission($_SESSION["cms_auth_uuid"],"system_settings")) and
                (!plugin::check_permission($_SESSION["cms_auth_uuid"],"chat_admin"))
            ){
                throw new \Exception("Unauthorized transaction");
            }


            if(!chat::chatHistoryClear($_SESSION["cms_auth_site"]))
                throw new \Exception("Operation failed");

            Header::jsonResult("success","SUCCESS", "Live chat history cleared");

        }catch (\Exception $exception){

            Header::jsonResult("error","ERROR",$exception->getMessage());
        }


    }

}