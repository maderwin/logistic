<?php

namespace Maderwin\Utils;

class User {

    public static function GetGroupByCode($code) {
        $rsGroups = (new \CGroup)->GetList($by = "c_sort", $order = "asc", Array("STRING_ID" => $code));
        return $rsGroups->Fetch();
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
            return true;
        } else
            return false;
    }

    public static function IsAuthorized(){
        return (new \CUser())->IsAuthorized();
    }

    public static function GetCurrent() {
        $user = new \CUser();
        return $user->GetByID($user->GetID())->Fetch();
    }

    public static function Get($userId = false) {
        if(!$userId){
            return static::GetCurrent();
        }
        return (new \CUser())->GetByID($userId)->Fetch();
    }

    public static function AuthRedirect($url, $message = null){
        if($message){
            Flash::Success($message);
        }
        LocalRedirect('/auth/?back=' . urlencode($url));
        die;
    }
}