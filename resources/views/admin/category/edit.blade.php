@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; <a href="#">文章管理</a> &raquo; 添加文章
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
             @if(session('errors'))
             
                    <script type="text/javascript">
                   layer.msg('{{session('errors')}}', {icon: 5});
                   </script>
               
               
             @endif

          
    <div class="result_wrap">
        <form action="{{url('admin/category/'.$cat_edit->cate_id.'')}}" method="post">

        <input type="hidden" name="_method" value="put">
        {{csrf_field()}}
            <table class="add_tab">
                <tbody>
            <tr>
                <th width="120"><i class="require">*</i>分类：</th>
                <td>
                    <select name="cate_pid">
                        <option value="0">==请选择==</option>
                        @foreach($data as $v)
                            @if($v->cate_id==$cat_edit->cate_pid)
                        <option selected="selected" value="{{$v->cate_id}}">{{$v->cate_name}}</option>
                            @else
                        <option value="{{$v->cate_id}}">{{$v->cate_name}}</option>

                            @endif
                        @endforeach
                    </select>
                </td>
            </tr>
                    <tr>
                        <th><i class="require">*</i>分类名称：</th>
                        <td>
                        <input type="text" value="{{$cat_edit->cate_name}}" name="cate_name">
                          
                          
                        </td>
                    </tr>
                    <tr>
                        <th>分类标题：</th>
                        <td> 
                         <input value="{{$cat_edit->cate_title}}" type="text" class="lg" name="cate_title">                            
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是默认长度</span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>关键字：</th>
                        <td>
                            <input value="{{$cat_edit->cate_key}}" type="text" class="sm" name="cate_key">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是短文本长度</span>
                        </td>
                    </tr>
                       <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input value="{{$cat_edit->cate_order}}" type="text" class="sm" name="cate_order">
                            <span><i class="fa fa-exclamation-circle yellow"></i>这里是短文本长度</span>
                        </td>
                    </tr>
           
           
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea  class="lg" name="cate_description">{{$cat_edit->cate_description}}</textarea>
                        </td>
                    </tr>
                  
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

@endsection