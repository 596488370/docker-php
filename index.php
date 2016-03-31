<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>个人网址收藏夹管理系统</title>
<link href="css/flick/jquery-ui-1.10.4.custom.css" rel="stylesheet">
	<script src="js/jquery-1.10.2.js"></script>
	<script src="js/jquery-ui-1.10.4.custom.js"></script>
	<style>  
        body { font-size: 10px; }  
        label, input { display:block; }  
        input.text { margin-bottom:12px; width:95%; padding: .4em; }  
        div#users-contain table { margin: 1em 0; border-collapse: collapse; width: 100%; }  
        div#users-contain table td, div#users-contain table th { border: 1px solid #eee; padding: .6em 4px; text-align: center; }  
		.custom-combobox {
		position: relative;
		display: inline-block;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 0.3em;
    </style>  
	
  <script>
  $(function() {
    $( "button:first" ).button({
      icons: {
        primary: "ui-icon-plusthick"
      },
    }).next().button({
      icons: {
        primary: "ui-icon-pencil"
      }
    }).next().button({
      icons: {
        primary: "ui-icon-minusthick",
      },
    });
  });
  </script>

  <script>
  $(function() {
  var add = $( "#add" ),
  additem = $( "#additem" ),
  addip = $( "#addip" ),
  traitem = $( "#traitem" ),
  traip = $( "#traip" ),
  name = $( "#name" ),
  itemname = $( "#itemname" ),
rowindex = $( "#rowindex" ),
allFields = $( [] ).add( add ).add( rowindex );  

var round="";


$( "#confirm" ).dialog({
	  autoOpen: false,  
      resizable: false,
      height:150,
      modal: false,
      buttons: {
        "确定": function() {
		var a = name.val();
          $.post("del.php",{delclass:a},function(a){
  alert(a);
    });
        },
        Cancel: function() {  
		name.val("");
                    $( this ).dialog( "close" );  
                }  
      },
	  close: function() {
				name.val("");
			}
    });

$( "#dialog-confirm" ).dialog({
	  autoOpen: false,  
      resizable: false,
      height:140,
      modal: true,
      buttons: {
        "添加类别": function() {
          $( "#dialog-form" ).dialog( "open" );  
        },
        "添加条目": function() {
         $( "#dialog-choice" ).dialog( "open" );  
		 round=2;
		 $.post("select1.php",{selname:round},function(a){
		 var obj = eval(a);
		// alert(obj);
		//alert(obj[0]);
		for(var i=0; i<obj.length; i++)  
  {  
      $("#name").append("<option value='"+obj[i]+"'>"+obj[i]+"</option>"); //为Select追加一个Option(下拉项)
	// alert(obj[i]);
  }  


		 
    });
        }
      },
	 close: function() {
	 $("#users tr").remove();　
				interface();
			}
    });
  
$( "#dialog-confirm1" ).dialog({
	  autoOpen: false,  
      resizable: false,
      height:140,
      modal: true,
      buttons: {
        "修改类别": function() {
        $( "#dialog-choice" ).dialog( "open" ); 
		round=1;
		$.post("select1.php",{selname:round},function(a){
		 var obj = eval(a);
		// alert(obj);
		//alert(obj[0]);
		for(var i=0; i<obj.length; i++)  
  {  
      $("#name").append("<option value='"+obj[i]+"'>"+obj[i]+"</option>"); //为Select追加一个Option(下拉项)
	// alert(obj[i]);
  }  


		 
    });
 
        },
        "修改条目": function() {
        $( "#dialog-choice" ).dialog( "open" );
		round=3;
		$.post("select1.php",{selname:round},function(a){
		 var obj = eval(a);
		// alert(obj);
		//alert(obj[0]);
		for(var i=0; i<obj.length; i++)  
  {  
      $("#name").append("<option value='"+obj[i]+"'>"+obj[i]+"</option>"); //为Select追加一个Option(下拉项)
	// alert(obj[i]);
  }  	 
    });
	  
        }
      },
	  close: function() {
	 $("#users tr").remove();　
				interface();
			}
    });
	//
$( "#dialog-confirm2" ).dialog({
	  autoOpen: false,  
      resizable: false,
      height:140,
      modal: true,
      buttons: {
        "删除类别": function() {
          $( "#dialog-choice" ).dialog( "open" ); 
	  round=4;	
	  $.post("select1.php",{selname:round},function(a){
		 var obj = eval(a);
		// alert(obj);
		//alert(obj[0]);
		for(var i=0; i<obj.length; i++)  
  {  
      $("#name").append("<option value='"+obj[i]+"'>"+obj[i]+"</option>"); //为Select追加一个Option(下拉项)
	// alert(obj[i]);
  }  	 
    });
		 
        },
        "删除条目": function() {
         $( "#dialog-choice" ).dialog( "open" );  
		 round=5;
		 $.post("select1.php",{selname:round},function(a){
		 var obj = eval(a);
		// alert(obj);
		//alert(obj[0]);
		for(var i=0; i<obj.length; i++)  
  {  
      $("#name").append("<option value='"+obj[i]+"'>"+obj[i]+"</option>"); //为Select追加一个Option(下拉项)
	// alert(obj[i]);
  }  	 
    });
        }
      },
	  close: function() {
	 $("#users tr").remove();　
				interface();
			}
    });
  //添加一个数据到头数据表
$( "#dialog-form" ).dialog({  
            autoOpen: false,  
            height: 180,  
            //width: 350,  
            modal: false,  
            buttons: {  
                "确定": function() { 
                  if (add.val()=="")
				  alert("输入一个值");
				  
				  else{
				  var a=add.val();
				 var b=name.val();
				 if(round==""){
				 //添加
				   //define ('XAJAX_DEFAULT_CHAR_ENCODING', 'GB2312' ); //支持中文
$.post("add1.php",{add:a,name:b},function(a){
  alert(a);
    });
  // alert(b);
  }else if(round==1){
  //修改
  $.post("tra.php",{tra:round,data:a,traname:b},function(a){
  alert(a);
    });
	}
  
		
                    }  
                  //  $( this ).dialog( "close" );  
                },  
                Cancel: function() {  
				add.val("");
			//	round="";
                    $( this ).dialog( "close" );  
                }  
            },
				close: function() {
				add.val("");
			}
        }); 
		  //添加一个数据到子数据表
$( "#dialog-form1" ).dialog({  
            autoOpen: false,  
            height: 230,  
            modal: false,  
            buttons: {  
                "确定": function() {  
                    if (additem.val()==""||addip.val()==""){//新增  
                      alert("输入一个值");
                    }  else{
					 var b=name.val();
					 var a1=additem.val();
					 var a2=addip.val();
					 $.post("add2.php",{name:b,data1:a1,data2:a2},function(a){
  alert(a);
    });
	// alert(b);
					additem.val("");
					addip.val("");
					
					
					
					
					}
                   
                },  
                Cancel: function() {  
				//round="";
				//name.val("");
				additem.val("");
				addip.val("");
                    $( this ).dialog( "close" );  
                }  
            },
				close: function() {
				additem.val("");
				addip.val("");
			}
          
        }); 
		
		//选择一个类别，进入特定表
$( "#dialog-choice" ).dialog({  
            autoOpen: false,  
            height: 120,
            modal: false,  
            buttons: {  
                "确定": function() {  
                    if (round==""){//新增  
						$( "#dialog-form" ).dialog( "open" );  
					// alert(name.val());
                    }
				else if(round==1){
				a=name.val();
				add.val(a);
				$( "#dialog-form" ).dialog( "open" );  
		}	else if(round==2){
			var a=name.val();
		//		add.val(a);
			if(a==""){
			alert("请选择一个类别");
			}else{
				$( "#dialog-form1" ).dialog( "open" );
			}				
				// alert(a);
		}		else if(round==3){
			var a=name.val();
			var b="";
		//		add.val(a);
			if(a==""){
			alert("请选择一个类别");
			}else{
				$( "#dialog-change" ).dialog( "open" );
				//traitem.val("修改了名称将无法修改ip，需两步完成！");
				$.post("select1.php",{selname:b,table:a},function(a){
		 var obj = eval(a);
		// alert(obj);
		//alert(obj[0]);
		for(var i=0; i<obj.length; i++)  
  {  
      $("#itemname").append("<option value='"+obj[i]+"'>"+obj[i]+"</option>"); //为Select追加一个Option(下拉项)
	// alert(obj[i]);
  }  	 
    });
			}				
				
		}		else if(round==4){
			var a=name.val();
		//		add.val(a);
			if(a==""){
			alert("请选择一个类别");
			}else{
				$( "#confirm" ).dialog( "open" );  
			}
				
		}			else if(round==5){
			traitem.val("选择要删除的一项");
			traip.val("选择要删除的一项");
			var a=name.val();
			var b="";
			if(a==""){
			alert("请选择一个类别");
			}else{
				$( "#dialog-change" ).dialog( "open" );   
				$.post("select1.php",{selname:b,table:a},function(a){
		 var obj = eval(a);
		// alert(obj);
		//alert(obj[0]);
		for(var i=0; i<obj.length; i++)  
  {  
      $("#itemname").append("<option value='"+obj[i]+"'>"+obj[i]+"</option>"); //为Select追加一个Option(下拉项)
	// alert(obj[i]);
  }  	 
    });
			}
		}															
                  
                },  
                Cancel: function() {  
                    $( this ).dialog( "close" ); 
					round="";
					name.val("");
					$("#name").empty();
					$("#name").append("<option value=''>请选择...</option>");
				//	alert("取消选择");  					
                }  
            },  
			close: function() {
				round="";
					name.val("");
					$("#name").empty();
					$("#name").append("<option value=''>请选择...</option>");
			}
        }); 
		//修改一个数据到数据表
$( "#dialog-change" ).dialog({  
            autoOpen: false,  
            height: 250,  
           // width: 350,  
            modal: false,  
            buttons: {  
                "确定": function() {  
				if(round==5){
				var a=name.val();
				var b=itemname.val();
				if(b=="")
				{alert("选择一个条目");}
				else{
				$.post("del.php",{deltable:a,delitem:b},function(a){
  alert(a);
    });}
				}else{	
                    if (traitem.val()!=""&&traip.val()!=""&&itemname.val()!=""){//修改 
					var k=name.val();
                    var b=itemname.val();
					var a1=traitem.val();
					var a2=traip.val();
					 $.post("tra.php",{tra:k,traname:b,dataone:a1,datatwo:a2},function(a){
 alert(a);
    });
// alert(b);
                    } else{
				alert("输入一个值");
					} 
					}
                  
                },  
                Cancel: function() {  
				//round="";
				traitem.val("");
				traip.val("");
				itemname.val("");
				$("#itemname").empty();
				$("#itemname").append("<option value=''>请选择...</option>");
                    $( this ).dialog( "close" );  
                }  
            },
				close: function() {
				traitem.val("");
				traip.val("");
				itemname.val("");
				$("#itemname").empty();
				$("#itemname").append("<option value=''>请选择...</option>");
			}
        }); 
		
		
$( "#add-choice" )  
            .button()  
            .click(function() {  
                //清空表单域  
                allFields.each(function(idx){  
                    this.value="";  
                });  
                $( "#dialog-confirm" ).dialog( "open" );  
            });  
			
$( "#tra-choice" )  
            .button()  
            .click(function() {  
                //清空表单域  
                allFields.each(function(idx){  
                    this.value="";  
                });  
                $( "#dialog-confirm1" ).dialog( "open" );  
            });  
			
$( "#del-choice" )  
            .button()  
            .click(function() {  
                //清空表单域  
                allFields.each(function(idx){  
                    this.value="";  
                });  
                $( "#dialog-confirm2" ).dialog( "open" );  
            });
			
	



	
function interface(){  
        var b="test";
			var c="";
			var obj;
			var index=0;
$( "#users thead" ).append( "<tr class='ui-widget-header'> " + 
						"</tr>" );
		 $.ajaxSetup({
    async : false
});	      						
											
$.post("select1.php",{selname:b},function(a){
		obj = eval(a);
		for(var i=0; i<obj.length; i++)  
  {  
 
    var a1 = obj[i];
	$.post("select1.php",{selname:c,table:a1},function(a){
	var obj1 = eval(a);
	for(var k=0;k<obj1.length;k++){        //一维长度为i,i为变量，可以根据实际情况改变
	if(k>=index)
	{
	index=k+1;
	//alert(index);
	}

	}
	 });
}

for(var i=0; i<obj.length; i++)  
  {  
 // $( "#users tbody" ).append( "<tr>" + "<td class='ui-widget-header'>" + obj[i] + "</td>" +
	//					"</tr>" );
     $( "#users thead tr" ).append( 
							"<td>" + obj[i] + "</td>" 
							 );	

    var a1 = obj[i];
	//$("#listTable tr:eq(0)").
   $.post("select1.php",{selname:c,table:a1},function(a){
	$.post("select2.php",{selname:c,table:a1},function(b){
	var obj1 = eval(a);
	var obj2 = eval(b);
	//alert(i);
	//alert(a);
	for(var k=0;k<index;k++){        //一维长度为i,i为变量，可以根据实际情况改变
	$( "#users tbody" ).append( "<tr>" + "</tr>" );
	//tArray[a][k]=obj1[k]; 
	//alert(tArray[a]);
	//$( "#users tbody tr:eq(0)" ).append( "<td>" + obj1[k] + "</td>" );
	//$( "#users tbody tr" ).append( "<td>" + obj1[k] + "</td>" );
	}
	for(var k=0;k<index;k++){        //一维长度为i,i为变量，可以根据实际情况改变
	//$( "#users tbody" ).append( "<tr>" + "</tr>" );
	//tArray[a][k]=obj1[k]; 
	//alert(tArray[a]);
	//$( "#users tbody tr:eq(0)" ).append( "<td>" + obj1[k] + "</td>" );
	//$( "#users tbody tr:eq("+k+")" ).append( "<td>" + "<a href='"+obj2[k]+"' target='_blank'>"+obj1[k]+"</a>" + "</td>" );
	if(typeof(obj1[k]) == "undefined"){
	$( "#users tbody tr:eq("+k+")" ).append( "<td>" + " " + "</td>" );
	}else{
	$( "#users tbody tr:eq("+k+")" ).append( "<td>" + "<a href='"+obj2[k]+"' target='_blank'>"+obj1[k]+"</a>" + "</td>" );
	}
	
	}
	 });
   });		
}






});    
     };  
          
    interface();  
			
    
  
  

  
});
</script>


 
  
  
  
  </head>
<body>
<button id="add-choice">添加</button>
<button id="tra-choice">修改</button>
<button id="del-choice">删除</button>
<div class="demo">  


<div  id="dialog-confirm" title="选择添加类别or条目">
 <p><span class="ui-icon ui-icon-help" style="float:left; margin:0 7px 20px 0;"></span>选择添加一个类别还是选择在一个类别里添加条目</p>
</div>

<div  id="dialog-confirm1" title="选择修改类别or条目">
 <p><span class="ui-icon ui-icon-help" style="float:left; margin:0 7px 20px 0;"></span>选择修改一个类别还是选择修改一个类别里的条目</p>
</div>

<div  id="dialog-confirm2" title="选择删除类别or条目">
 <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>选择删除一个类别还是选择删除一个类别里的条目</p>
</div>

<div  id="confirm" title="确定删除">
 <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>选择删除将不可还原！</p>
</div>
  
<div id="dialog-form" title="添加、修改类别">  
    <form>  
    <fieldset>  
        <label for="name">输入名称</label>  
        <input type="text" name="name" id="add" class="text" />  
        <input type="hidden" name="rowindex" id="rowindex" value=""/>  
    </fieldset>  
    </form>  
</div>  

<div id="dialog-form1" title="添加条目">  
    <form>  
    <fieldset>  
        <label for="name">网址名称</label>  
        <input type="text" name="name" id="additem" class="text" />  
		<label for="name">IP地址</label>  
        <input type="text" name="name" id="addip" class="text" />  
        <input type="hidden" name="rowindex" id="rowindex" value=""/>  
    </fieldset>  
    </form>  
</div>  

<div id="dialog-choice" title="选择">  
  
 
         <select id="name" value="" style="width:250px">
    <option value="">请选择...</option>
  </select>
</div>  

<div id="dialog-change" title="修改\删除" value="">  
         <select id="itemname" value="" style="width:250px">
    <option value="">请选择...</option>
  </select>
  <label for="name">修改条目</label>  
        <label for="name">网址名称</label>  
        <input type="text" name="name" id="traitem" class="text" />  
		<label for="name">IP地址</label>  
        <input type="text" name="name" id="traip" class="text" />  
</div>  
  
  
<div id="users-contain">  
    <h1>hello world!</h1>  
    <table id="users">  
        <thead>  
        </thead>  
        <tbody>  
        </tbody>  
    </table>  
</div>  
</div><!-- End demo -->  


<div id="debug">  
</div>  
</body>
</html>