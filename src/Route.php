<?php

/*
 * This file is part of the tp5er/tp5-databackup.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * (L) Licensed <https://opensource.org/license/MIT>
 *
 * (A) zhiqiang <https://www.zhiqiang.wang>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace tp5er\Backup;

use think\facade\Route as tpRoute;

class Route
{
    const api = "/api";
    const prefix = "/tp5er";
    const apiPrefix = Route::prefix . Route::api;

    public static function route()
    {
        Route::view();
        Route::api();
    }

    public static function view()
    {
        //http://127.0.0.1:8000/tp5er/backup
        //http://127.0.0.1:8000/tp5er/import
        //备份路由定义
        tpRoute::get(Route::prefix . "/backup", "\\tp5er\Backup\controller\RouteController@backup");
        tpRoute::get(Route::prefix . "/import", "\\tp5er\Backup\controller\RouteController@import");
    }

    public static function api()
    {
        //接口路由组
        tpRoute::group(Route::apiPrefix, function () {
            tpRoute::get("/tables", "\\tp5er\Backup\controller\RouteController@tables");
            tpRoute::get("/files", "\\tp5er\Backup\controller\RouteController@files");
            tpRoute::get("/doImport", "\\tp5er\Backup\controller\RouteController@doImport");
            tpRoute::post("/backupStep1", "\\tp5er\Backup\controller\RouteController@backupStep1");
            tpRoute::post("/tableCounts", "\\tp5er\Backup\controller\RouteController@tableCounts");
            tpRoute::get("/backupStep2", "\\tp5er\Backup\controller\RouteController@backupStep2");
            tpRoute::get("/cleanup", "\\tp5er\Backup\controller\RouteController@cleanup");
            tpRoute::post("/repair", "\\tp5er\Backup\controller\RouteController@repair");
            tpRoute::post("/optimize", "\\tp5er\Backup\controller\RouteController@optimize");
            tpRoute::get("/download", "\\tp5er\Backup\controller\RouteController@download");
            tpRoute::get("/delete", "\\tp5er\Backup\controller\RouteController@delete");
        });
    }
}
