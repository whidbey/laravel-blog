<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>NJPHPER BLOG ADMIN</title>
    <link rel="stylesheet" href="{{ asset('/assets/layui/css/layui.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('/assets/font-awesome/css/font-awesome.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}" media="all">
</head>

<body>
    <div class="layui-layout layui-layout-admin kit-layout-admin">
        <div class="layui-header">
            <div class="layui-logo">NJPHPER BLOG</div>
            <ul class="layui-nav layui-layout-right kit-nav">
                <li class="layui-nav-item">
                        <img src="http://m.zhengjinfan.cn/images/0.jpg" class="layui-nav-img"> {{ Auth::user()->name }}
                    <!--<dl class="layui-nav-child">
                         <dd><a href="javascript:;">基本资料</a></dd>
                        < dd><a href="{{ url('/user')}}">安全设置</a></dd> 
                    </dl>-->
                </li>
                <li class="layui-nav-item"><a href="javascript:;" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a></li>
            </ul>
        </div>

        <div class="layui-side layui-bg-black kit-side">
            <div class="layui-side-scroll">
                <div class="kit-side-fold"><i class="fa fa-navicon" aria-hidden="true"></i></div>
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-plug" aria-hidden="true"></i><span> 基本信息</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" kit-target data-options="{url:'/main',icon:'&#xe6c6;',title:'日志更新',id:'1'}">
                                    <i class="layui-icon">&#xe6c6;</i><span> 日志更新</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" data-url="{{ url('user') }}" data-icon="fa-user" data-title="用户管理" kit-target data-id='2'><i class="fa fa-user" aria-hidden="true"></i><span> 用户管理</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" data-url="{{ url('links') }}" data-icon="&#xe628;" data-title="友情链接管理" kit-target data-id='3'><i class="layui-icon">&#xe628;</i><span> 友情链接管理</span></a>
                            </dd>
                        </dl>
                    </li>
                    <li class="layui-nav-item layui-nav-itemed">
                        <a href="javascript:;"><i class="fa fa-plug" aria-hidden="true"></i><span> BLOG管理</span></a>
                        <dl class="layui-nav-child">
                            <dd><a href="javascript:;" kit-target data-options="{url:'/fmenu',icon:'&#xe658;',title:'菜单管理',id:'6'}"><i class="layui-icon">&#xe658;</i><span> 菜单管理</span></a></dd>
                            <dd><a href="javascript:;" kit-target data-options="{url:'/user/index',icon:'&#xe658;',title:'用户管理',id:'7'}"><i class="layui-icon">&#xe658;</i><span> 用户管理</span></a></dd>
                            <dd><a href="javascript:;" kit-target data-options="{url:'/article/index',icon:'&#xe658;',title:'文章管理',id:'50'}"><i class="layui-icon">&#xe658;</i><span> 文章管理</span></a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </div>
        <div class="layui-body" id="container">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">主体内容加载中,请稍等...</div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            2017 &copy;
            <a href="https://www.njphper.com/">njphper.com@copyright_2017_09_02</a>

        </div>
    </div>
    <script src="{{ asset('/assets/layui/layui.js') }}"></script>
    <script>
        var message;
        layui.config({
            base: '../assets/js/'
        }).use(['app', 'message'], function() {
            var app = layui.app,
                $ = layui.jquery,
                layer = layui.layer;
            //将message设置为全局以便子页面调用
            message = layui.message;
            //主入口
            app.set({
                type: 'iframe'
            }).init();
            $('.logout').click(function(){
            	$.post('/logout',function(){})
            })
        });

    </script>
</body>

</html>