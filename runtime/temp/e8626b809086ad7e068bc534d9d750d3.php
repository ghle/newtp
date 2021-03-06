<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"D:\phpStudy\WWW\newtp5\public/../application/index\view\index\lists_art.html";i:1521118649;}*/ ?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/newtp5/public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/newtp5/public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/newtp5/public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/newtp5/public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/newtp5/public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<!--  -->
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" onclick="admin_add('添加文章','<?php echo url('add_art'); ?>','800','500')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr>
				<th scope="col" colspan="9">员工列表</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="150">标题</th>
				<th width="90">内容</th>
				<th width="150">作者</th>
				<th>描述</th>
				<th width="130">分类</th>
				<th width="100">是否已启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody id="li">
			
		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
 <script type="text/javascript" src="/newtp5/public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/newtp5/public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/newtp5/public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/newtp5/public/static/h-ui.admin/js/H-ui.admin.js"></script>  
<!--/_footer 作为公共模版分离出去

请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/newtp5/public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/newtp5/public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/newtp5/public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

$(function () {
	$.ajax({
		type:'GET',
		url:'http://localhost/newtp5/public/list',
		dataType:'json',
		success:function (res) {
			console.log(res);
		for (var i=0; i<res.data.length;i++) {
			var str='';
			str+='<tr class="text-c"><td><input type="checkbox" value="1" name=""></td>';

			str+='<td>'+res.data[i].id+'</td>';

			str+='<td>'+res.data[i].tittle+'</td><td>'+res.data[i].content.substr(0,10)+'</td><td>'+res.data[i].author+'</td><td>'+res.data[i].linfo+'</td><td>'+res.data[i].ltittle+'</td>';

			str+='<td class="td-status"><span class="label label-success radius">已启用</span></td>';

			str+='<td class="td-manage">';

			str+='<a style="text-decoration:none" onClick="admin_stop(this,'+'\'10001\' '+ ')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>';
			str+=' <a title="编辑" href="javascript:;" onclick="admin_edit('+'\'管理员编辑\''+','+'\'<?php echo url('update_art'); ?>\''+','+'\''+res.data[i].id+'\''+','+'\'500\''+','+'\'500\''+')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> ';
			str+='<a title="删除" href="javascript:;" onclick="admin_del(this,'+'\''+res.data[i].id+'\''+')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td></tr>';
							
			$('#li').append(str);

			}
		},
		error:function (res) {
			console.log(res);
			
		}

	});

	
});

/*管理员-增加*/
function admin_add(title,url,w,h){
	layer_show(title,url,w,h);
}


/**
 * 文章删除
 */

function admin_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'delete',
			url: 'http://localhost/newtp5/public/delete',
			data:{
					id:id,//左边的id是数据库中的字段  右边是传过来的 参数值
			},
			dataType: 'json',
			success: function(data){
				// console.log(data);
				// $(obj).parents("tr").remove();
				 window.location.reload()
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
					console.log(data);
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-编辑*/
function admin_edit(title,url,id,w,h){
	
	layer_show(title,url,w,h);
			// $.ajax({
			// 	type:'GET',
			// 	url:'http://localhost/newtp5/public/list',

			// 	dataType:'json',
			// 	success:function (res) {
			// 		for (var i = 0; i < res.data.length; i++) {
			// 			if (id==res.data[i].id) {
			// 				console.log(res.data[i].tittle);
			// 				console.log(res.data[i].linfo);
			// 				break;
			// 			}
			// 		}
			// 	},
			// 	error:function (res) {
			// 		console.log(res);
			// 	}
			// })
			
		
}
/*管理员-停用*/
function admin_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
		$(obj).remove();
		layer.msg('已停用!',{icon: 5,time:1000});
	});
}

/*管理员-启用*/
function admin_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		//此处请求后台程序，下方是成功后的前台处理……
		
		
		$(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
		$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
		$(obj).remove();
		layer.msg('已启用!', {icon: 6,time:1000});
	});
}


</script>
</body>
</html>