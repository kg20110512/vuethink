<?php
/**
 * Created by PhpStorm.
 * User: jhy
 * Date: 2018/4/19
 * Time: 16:33
 */

namespace app\admin\model;


class Topic extends Common
{
    /**
     * 为了数据库的整洁，同时又不影响Model和Controller的名称
     * 我们约定每个模块的数据表都加上相同的前缀，比如微信模块用weixin作为数据表前缀
     */

    /**
     * [getDataList 获取列表]
     * @linchuangbin
     * @DateTime  2017-02-10T21:07:18+0800
     * @return    [array]
     */
    public function getDataList($page='1', $limit='10', $tab='')
    {
        $map = [];
        if (!empty($tab)) {
            $map['tab'] = ['tab', $tab];
        }

        $list = $this
            ->alias('topic')
            ->where($map);
        // 若有分页
        if ($page && $limit) {
            $list = $list->page($page, $limit);
        }

        $list = $list
            ->field('topic.*')
            ->select();

//        $data['data'] = $list->where($map)->select();
        return $list;

    }




}