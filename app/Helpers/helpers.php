<?php


namespace App\Helpers;
use App\Models\CentralCompanyModel;
use App\Models\CentralMenuModel;
use App\Models\CompanyModulesModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Request;
use Illuminate\Support\Str;
use App\Models\ActivityLog as ActivityLogModel;
use DateTime;

class Helpers
{

    public static function addToLog($logName,$logDetails)
    {
        $log = [];
        $log['log_name'] = $logName;
        $log['log_details'] = $logDetails;
        $log['url'] = Request::fullUrl();
        $log['íp'] = Request::ip();
        $log['agent'] = Request::header('user-agent');
        $log['created_by'] = Auth()->check() ? auth()->user()->userid : 1;

        ActivityLogModel::create($log);
    }

    public static function is_current_route($path,$route){
        $current_menu_level = explode('/',$path);
        return '/'.$current_menu_level[0] == $route ? 'class=active':'';
    }

    /*
    * $type: main_menu, sub_menu
    */
    public static function activateMenu($menu_type, $on_page_title, $server_title)
    {
        if($menu_type == 'main_menu'){
            if(strcasecmp($on_page_title, $server_title) == 0){
                $class = "opened has-sub active";
            }else{
                $class = "has-sub";
            }
        }elseif($menu_type == 'sub_menu'){
            if(strcasecmp($on_page_title, $server_title) == 0){
                $class = "active";
            }else{
                $class = "";
            }
        }else{
            $class = "";
        }
        return $class;
    }
}

