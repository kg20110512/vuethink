<?php
/**
 * Created by PhpStorm.
 * Topic: jhy
 * Date: 2018/4/19
 * Time: 16:53
 */

namespace app\admin\controller;


class Topics extends ApiCommon
{

    public function index()
    {
        $topicModel = model('Topic');
        $param = $this->param;
//        $keywords = !empty($param['keywords']) ? $param['keywords']: '';
        $page = !empty($param['page']) ? $param['page']: '';
        $limit = !empty($param['limit']) ? $param['limit']: '';
        $tab = !empty($param['tab']) ? $param['tab']:'';
        $data = $topicModel->getDataList($page, $limit, $tab);
        return resultArray(['data' => $data]);
    }

    public function read()
    {
        $topicModel = model('Topic');
        $param = $this->param;
        $data = $topicModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $topicModel->getError()]);
        }
        return resultArray(['data' => $data]);
    }



}