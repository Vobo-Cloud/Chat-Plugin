<?php


namespace App\Main\Plugin\chat;

use App\Main\Model\plugin;
use App\Main\Plugin\chat\Model\chat;
use App\Main\Plugin\chat\Controller\helper;

plugin::info([
    "title" => "Live chat",
    "slug" => plugin::get_name(__DIR__)
]);

plugin::checkingSetup("plugin_chat",file_get_contents(__DIR__."/chat.sql"));


// Yönetici Oturum Kontrolü
if(isset($_SESSION["cms_auth_site"])){

    Plugin::add_menu([
        [
            "permission"    => "chat",
            "title"         => "Live chat",
            "url"           => "chat@screen",
            "icon"          => "message-square"
        ]
    ]);

    plugin::add_js([
        "/App/Main/Plugin/chat/Assets/app.js"
    ]);

    plugin::add_user_permission([
        [
            "label" => "Live chat",
            "value" => "chat"
        ],
        [
            "label" => "Live chat admin",
            "value" => "chat_admin"
        ]
    ]);

    plugin::admin_view_render(
        "Live chat",
        [
            "Live chat"
        ],
        __DIR__,
        "screen",
        "chat",
        [
            "chatModel" => chat::class
        ]
    );

    plugin::action("admin@settings",function (){

        plugin::view_render(
            __DIR__,
            "settings",
            []
        );

    });

    plugin::add_router_post("router@admin","/ajax/plugin/chat/send",[helper::class,"send"]);
    plugin::add_router_post("router@admin","/ajax/plugin/chat/history",[helper::class,"history"]);
    plugin::add_router_post("router@admin","/ajax/plugin/chat/history/id",[helper::class,"historyId"]);
    plugin::add_router_post("router@admin","/ajax/plugin/chat/history/seen",[helper::class,"historySeen"]);
    plugin::add_router_post("router@admin","/ajax/plugin/chat/check",[helper::class,"friendListAndCheck"]);
    plugin::add_router_post("router@admin","/ajax/plugin/chat/history/clear",[helper::class,"chatHistoryClear"]);




}
