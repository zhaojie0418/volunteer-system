<?php
global $link;
function dbInit()
{
    global $link;
    //连接并选择数据库
    $link = @mysqli_connect('localhost', 'root', '123456', 'volunteer_system') or die('数据库连接失败！');
    mysqli_query($link, 'set names utf8');
    return $link;
}
function query($sql)
{
    global $link;
    if ($result = mysqli_query($link, $sql)) {
        return $result;
    } else {
        echo 'sql语句执行失败<br>';
        echo '错误的sql语句' . $sql;
        printf("Error: %s\n", mysqli_error($link));
        die;
    }
}
function fetchAll($sql)
{
    $res = query($sql);
    $rows = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $rows[] = $row;
    }
    mysqli_free_result($res);
    return $rows;
}
function fetchRow($sql)
{
    $res = query($sql);
    $row = mysqli_fetch_assoc($res);
    return $row;
}
function safeHandle($data)
{
    global $link;
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($link, $data);
    return $data;
}
//生成表单控件
/**
 * 生成表单的下拉列表控件
 * 参数 $name 控件名称
 * 参数 $values 选项数组
 * 参数 $selected 默认选项
 * 返回值 下拉列表控件的html代码
 */
function make_select($name, $values, $selected)
{
    $html = "<select name='$name'>";
    // $html .= ' <option value="" selected disabled hidden>请选择活动类型</option>';
    foreach ($values as $v) {
        if ($v == $selected) {
            $html .= "<option value='$v' selected>$v</option>";
        } else {
            $html .= "<option value='$v'>$v</option>";
        }
    }
    $html .= '</select>';
    return $html;
}
/**
 * 生成表单的复选框控件
 * 参数 $name 控件名称
 * 参数 $values 选项数组
 * 参数 $selected 被选中项数组
 * 返回值 下拉列表控件的html代码
 */
function make_checkBox($name, $values, $selected)
{
    $html = '';
    foreach ($values as $v) {
        $html .= '<label class="checkbox">';
        if (in_array($v, $selected)) {
            $html .= "<input type='checkbox' name='$name\[\]' value='$v' checked />" . $v;
        } else {
            $html .= "<input type='checkbox' name='$name\[\]' value='$v'/>" . $v;
        }
        $html .= '</label> ';
    }
    return $html;
}
