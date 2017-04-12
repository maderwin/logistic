<?php

namespace Maderwin\Utils;

use Maderwin\Traits\Cached;

class User {

    use Cached;

    public static function GetGroupByCode($code) {
        if(static::isCached()) return static::getCache();
        $rsGroups = (new \CGroup)->GetList($by = "c_sort", $order = "asc", Array("STRING_ID" => $code));
        return static::setCache($rsGroups->Fetch());
    }


    public static function InGroup($groupCode = false, $userId = false) {
        if(!$groupCode){
            return true;
        }
        $groupId = static::GetGroupByCode($groupCode)['ID'];

        $user = new \CUser();

        if(!$userId){
            return $user->IsAuthorized() && in_array($groupId, $user->GetUserGroupArray());
        }
        else{
            return in_array($groupId, $user->GetUserGroup($userId));
        }
    }

    public static function IsAdmin($id = false) {
        return static::InGroup('ADMIN', $id);
    }

    public static function Exist($arFilter) {
        if(static::isCached()) return static::getCache();
        \Bitrix\Main\Loader::includeModule('iblock');

        $rsUsers = (new \CUser)->GetList(
            ($by = "id"),
            ($order = "desc"),
            $arFilter,
            [
                "FIELDS " => [
                    "ID",
                ],
            ]
        );

        if ($rsUsers->Fetch()) {
            return static::setCache(true);
        }

        return static::setCache(false);
    }

    public static function IsAuthorized(){
        return (new \CUser())->IsAuthorized();
    }

    public static function GetCurrent() {
        return static::Get();
    }

    public static function Get($userId = false) {
        if(static::isCached()) return static::getCache();
        if(!$userId){
            $userId = (new \CUser())->GetID();
        }
        $arUser = (new \CUser())->GetByID($userId)->Fetch();
        return static::setCache($arUser);
    }

    public static function AuthRedirect($url, $message = null){
        if($message){
            Flash::Success($message);
        }
        LocalRedirect('/auth/?back=' . urlencode($url));
        die;
    }
}