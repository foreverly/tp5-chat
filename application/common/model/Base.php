<?php
// +----------------------------------------------------------------------
// | [模型层基类]
// +----------------------------------------------------------------------
// | Data 2018/9/11 14:48
// +----------------------------------------------------------------------
// | Author: bruce
// +----------------------------------------------------------------------

namespace app\common\model;

use think\Model;

class Base extends Model
{
    protected $autoWriteTimestamp = true;
    //定义自动完成的时间戳的实际字段
    protected $createTime = 'addtime';
    protected $updateTime = 'endtime';

    /**
     * 获取单条数据
     * @param string $field 查询的字段
     * @param string $where 查询条件
     * @param string $order 排序
     * @param bool $lock 是否加锁
     * @return array|\PDOStatement|string|Model|null
     * @throws \think\exception\DbException
     */
    public static function getOne($field = '*', $where = '', $order = '', $lock = false)
    {
        $return = self::field($field)
            ->where($where)
            ->order($order)
            ->lock($lock)
            ->find();

        return $return;
    }

    /**
     * 获取单条值数据
     * @param string $field 查询的字段
     * @param string $where 查询条件
     * @return mixed
     */
    public static function getValue($field = '*', $where = '')
    {
        return self::where($where)->value($field, 0);
    }

    /**
     * 分页-获取多条数据
     * @param string $field 查询的字段
     * @param string $where 查询条件
     * @param string $order 排序
     * @param int $limit 行数
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public static function getPageList($field = '*', $where = '', $order = 'id desc', $limit = 10)
    {
        $return = self::field($field)
            ->where($where)
            ->order($order)
            ->paginate($limit);
        return $return;
    }

    /**
     * 获取所有数据列表
     * @param string $field 查询的字段
     * @param string $where 查询条件
     * @param string $order 排序
     * @param string $group 分组
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\exception\DbException
     */
    public static function getAll($field = '*', $where = '', $order = 'id desc', $group = '')
    {
        $return = self::field($field)
            ->where($where)
            ->order($order)
            ->group($group)
            ->select();

        return $return;
    }

    /**
     * 获取指定行数数据列表
     * @param string $field 查询的字段
     * @param string $where 查询条件
     * @param string $order 排序
     * @param string $group 分组
     * @param int $limit 行数
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\exception\DbException
     */
    public static function getLimitAll($field = '*', $where = '', $order = 'id desc', $group = '', $limit = 10)
    {
        $return = self::field($field)
            ->where($where)
            ->order($order)
            ->group($group)
            ->limit($limit)
            ->select();

        return $return;
    }

    /**
     * 数据新增
     * @param $data
     * @param bool $field
     * @return Base
     */
    public static function add($data, $field = true)
    {
        return self::create($data, $field);
    }

    /**
     * 根据主键id删除数据
     * @param $id
     * @return bool
     */
    public static function delKey($id)
    {
        return self::destroy($id);
    }

    /**
     * @param $where
     * @return float|string
     * @desc  获取记录条数
     */
    public static function getCount($where)
    {
        return self::where($where)->count();
    }

    /**
     * @param $add
     * @return int|string
     * @desc: 增加多条记录
     */
    public static function addAll($add)
    {
        return self::insertAll($add);
    }

    /**
     * @param $where
     * @return bool
     * @throws \Exception
     * @desc: 按条件删除
     */
    public static function del($where)
    {
        return self::where($where)->delete();
    }

    /**
     * 带join的分页
     * @param $field
     * @param array $where
     * @param string $order
     * @param $join
     * @param int $limit
     * @param string $group
     * @return \think\Paginator
     * @throws \think\exception\DbException
     * @author  damon
     */
    public static function getListByJoin($field, $where = [], $order = '', $join, $limit = 10, $group = '')
    {
        return self::alias('t1')
            ->field($field)
            ->join($join)
            ->where($where)
            ->group($group)
            ->order($order)
            ->paginate($limit);
    }

    /**
     * 带join的单挑记录查询
     * @param string $field
     * @param string $where
     * @param array $join
     * @param string $order
     * @return array|\PDOStatement|string|Model|null
     * @throws \think\exception\DbException
     * @author  damon
     */
    public static function getInfoByJoin($field = '*', $where = '', $join = [], $order = '')
    {
        return self::alias('t1')
            ->field($field)
            ->join($join)
            ->where($where)
            ->order($order)
            ->find();
    }

    /**
     * 带join的所有记录查询
     * @param $field
     * @param array $where
     * @param string $order
     * @param $join
     * @param string $group
     * @return array|\PDOStatement|string|\think\Collection
     * @throws \think\exception\DbException
     * @author  damon
     */
    public static function getAllByJoin($field, $where = [], $join, $order = 'id desc', $group = '')
    {
        return self::alias('t1')
            ->field($field)
            ->join($join)
            ->where($where)
            ->group($group)
            ->order($order)
            ->select();
    }
    
    /**
     * 算总
     * @param string $field 查询的字段
     * @param string $where 查询条件
     * @return float
     */
    public static function getSumValue($field, $where)
    {
        $return = self::where($where)->sum($field);
        return $return;
    }
}