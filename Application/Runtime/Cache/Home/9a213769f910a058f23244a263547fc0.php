<?php if (!defined('THINK_PATH')) exit();?><link type="text/css" rel="stylesheet" href="http://cdn.staticfile.org/twitter-bootstrap/3.1.1/css/bootstrap.min.css"/>
<script src="//apps.bdimg.com/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="/oop/Public/js/jqPaginator.js"></script>
<div class="row" style='width:100%'>
    <div class='col-lg-1'></div>
    <div class="col-lg-10" style='margin-top:30px;'>
        <div class="panel panel-default">
            <div class="panel-heading " style='color:white;background:#0278c1'>多条件搜索

            </div>
            <!-- /.panel-heading -->          
            <div class='showExpress'>
                <!-- <table class='table table-hover table-striped table-bordered'> 
					<tr>
						<td><b>ID</b></td>
						<td><b>内容</b></td>
						<td><b>姓名</b></td>
						<td><b>操作</b></td>
					</tr>
					<tbody id="log-table-tbody">
		                    
			                   
		            </tbody>
					</table> -->
            </div> 

            <ul id='page' class='pagination' style='float:right'>     
                <!-- 分页显示标签 -->   
            </ul>   

        </div>
        <!-- /.panel -->
    </div>
    
</div>
	<div style="margin-left:180px;">
	<input type='text' id='search'><span id='sou'>搜索</span>
	</div>

<script>
    $(function(){
	var total=<?php echo ($pages); ?>;
		$(document).on('click','#sou',function(){
		name=$('#search').val();
		var data={
		name:name,
		}
		$.ajax({
		 		type :"get",
		 		data:data,
		        url : "/index.php/home/express/showExpress",
		        async: true,
		        dataType : "json",
		        success : function(res){
					var data=res.total;
					console.log(res);
		        	creatpage(data);
		        	
		        },
		 	});
		
		
		});

        //分页效果
		function creatpage(tt){
        $('#page').jqPaginator({
			
            totalPages: tt,
            //visiblePages: 5,
            currentPage: 1,
            first: '<li class="first"><a href="javascript:void(0);">首页</a></li>',
            prev: '<li class="prev"><a href="javascript:void(0);">上一页</a></li>',
            page: '<li class="page"><a href="javascript:void(0);">{{page}}</a></li>',
            next: '<li class="next"><a href="javascript:void(0);">下一页</a></li>',
            last: '<li class="last"><a href="javascript:void(0);">尾页</a></li>',
            onPageChange: function (num) {
			var name=$('#search').val();
			
                $.get('/oop/index.php/Home/Express/showExpress', {'p': num,'name':name}, function (res) {
				
                    $('.showExpress').html(res);
                });
            }
        });
	}
creatpage(total);
    });
</script>