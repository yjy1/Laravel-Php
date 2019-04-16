<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Conf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;

class ConfController extends Controller
{
    //列表
    public function index()
    {

        $data = Conf::orderby('conf_order', 'asc')->paginate(3);
        foreach ($data as $k => $v) {
            switch ($v->field_type) {
                case 'input':
                    $data[$k]->_html = "<input class='input-text Wdate' type='input' value='$v->conf_content'>";
                    break;
                case 'radio':

                    $arr = explode(',', $v->field_value);
                    $str = '';
                    foreach ($arr as $m => $n) {
                        $r = explode('|', $n);
                        $c = '';

                        if ($v->conf_content == $r[0]) {
                            $c = ' checked ';
                        }
                        $str .= "<input type='radio' value='$r[0]' $c name='conf_content'>" . $r[1] . '&nbsp;&nbsp;&nbsp;&nbsp;';
                    };
                    $data[$k]->_html = $str;
                    break;
                case 'textarea':
                    $data[$k]->_html = "<textarea style=\"margin: 0px; width: 363px; height: 76px;\" class='input-text Wdate'>" . $v->conf_content . "</textarea>";
                    break;
            }
        }
        return view('admin.conf.index', compact('data'));
    }

    //创建
    public function create()
    {
        return view('admin/conf/create');
    }

    //处理创建请求
    public function store()
    {

        $input = Input::except('_token');

        $res = Conf::create($input);
        if ($res) {
            $this->putFile();
            echo '创建成功';
        } else {
            echo '创建失败';
        }
    }

    //编辑
    public function edit($id)
    {
        $data = Conf::find($id);
        $this->putFile();
        return view('admin/conf/edit', compact('data'));
    }

    //处理编辑请求
    public function update($id)
    {
        $input = Input::except('_method', '_token');
        $data = Conf::find($id);
        if ($data) {
            $res = Conf::where('conf_id', $id)->update($input);
            if ($res) {
                echo '编辑成功';
            } else {
                echo '编辑失败';
            }
        }
    }

    //删除
    public function destroy($id)
    {

        $data = Conf::find($id);

        if ($data) {
            $res = $data->delete();
            if ($res) {
                $this->putFile();
                return response()->json([
                    'status' => 1,
                    'msg' => '删除成功'
                ]);
            } else {
                return response()->json([
                    'status' => 0,
                    'msg' => '删除失败'
                ]);
            }
        }
    }


    //把配置项写入配置文件
    public function putFile()
    {
        $data = Conf::pluck('conf_content', 'conf_name')->all();
        $path = base_path() . '\config\web.php';
        $str= '<?php return '.var_export($data,true).';';
        file_put_contents($path,$str);
    }
}
