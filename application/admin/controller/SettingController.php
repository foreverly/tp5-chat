<?php
namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use lib\helpers\ArrayHelper;
use app\admin\model\Setting;

class SettingController extends Common
{

    protected $needLogin = true;

    public function _initialize()
    {
        parent::_initialize();
    }
    
    public function index()
    {
        $settingInfo = Db::table('website_setting')->select();

        return $this->fetch('index', [
            'settingInfo' => ArrayHelper::map($settingInfo, 'name', 'value')
        ]);
    }

    public function save()
    {
        $post_data = $this->request->post();
        foreach ($post_data as $key => $value) {
            $index = str_replace('_', '.', $key);
            $pdata[$index] = $value;
        }

        try {

            $setting_list = Db::table('website_setting')->select();
            $setting_opts = ArrayHelper::map($setting_list, 'id', 'value', 'name');

            foreach ($post_data as $key => $value) {
                $model = new Setting();
                // 已经有的设置更新
                $key = str_replace('_', '.', $key);
                if (in_array($key, array_keys($setting_opts))) {
                    $model->id = key($setting_opts[$key]);
                }
                
                $model->name  = $key;
                $model->value = $value;

                $isUpdate = false;
                if ($model->id) {
                    $isUpdate = true;
                }

                $model->isUpdate($isUpdate)->save();
            }

            ajaxSuccess();
        } catch (\Exception $e){
            ajaxError($model->error);
        }                    
    }
}