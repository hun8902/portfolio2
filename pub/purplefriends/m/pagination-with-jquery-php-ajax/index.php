<?php
include("db.php");
include("pages.php");
$max_records=2;
$page = "Select * from   articles where  status=1  order by id asc";
$sql = "Select * from   articles where  status=1 ";
$rstotal=mysql_query($sql) ;
$total_records=mysql_num_rows($rstotal);
$current_page=(isset($_GET["p"]) && intval($_GET["p"])<>0)?intval($_GET["p"])-1:0;
$start=($current_page*$max_records);
if($start=='')
$start=0;
$end=0;
if($total_records >= 1)
{
$total_pages=ceil($total_records/$max_records);
if($start < $total_records)
{
if($start + $max_records < $total_records)
$end = $start + $max_records;
else
$end = $total_records;
}
$page = "$page LIMIT $start,$max_records";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagination System using Ajax, Jquery,Json and PHP</title>
<link rel="stylesheet" href="css/demo2.css" type="text/css" />
<script src="http://code.jquery.com/jquery-1.8.1.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/highlight.pack.js"></script>
<script type="text/javascript" src="js/jquery.accordion.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        //syntax highlighter
        hljs.tabReplace = '    ';
        hljs.initHighlightingOnLoad();

        $.fn.slideFadeToggle = function(speed, easing, callback) {
            return this.animate({opacity: 'toggle', height: 'toggle'}, speed, easing, callback);
        };

        //accordion
        $('.accordion').accordion({
            defaultOpen: 'section1',
            speed: 'slow',
            animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            },
            animateClose: function (elem, opts) { //replace the standard slideDown with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            }
        });

    });
</script>
<script type="text/javascript">
$(document).ready(function(){
$("a.pages").live('click',function(){
var p=$(this).attr("rel");
$(".data").html('<img border="0" alt="Loading..." src="loader.gif">');
$.ajax({
type: "POST",
url:"load_data.php",
data: { 
'p': p
},
dataType: "json",
cache: false,
success: function(result){
if(result.status==true){
$(".data").html(result.html);
$("ul.pagination").html(result.pages);
}else if(result.status==false){
$(".data").html('');
alert(result.msg);
}
}
});
});
});
</script>
<style>

.container{
margin:0px auto;
width:600px;
background:#ccc;
}
/* Pagination
=========================================================*/
.pagination {
    margin:25px 0 5px 0;
    overflow:hidden;
    margin:0;
    list-style:none;
}

.pagination li {
    margin:5px 5px 15px 0;
    float:left;
}

.pagination li a{ padding:6px 12px; color:#595959; display:block;background-color: #CEDDE0; text-decoration:none; cursor:pointer;}
.pagination .current{
    color:#228f9c;
}
.pagination li a.prev, .pagination li a.next{
    color:#fff;
    background:#41b1c5;
	cursor:pointer;
}
.pagination li a.prev:hover,
.pagination li a.next:hover{
    background:#228f9c !important;
    text-decoration:none;
	cursor:pointer;
}
</style>
</head>
<body>

 <div class="container">
 <ul class="data">
<?php
if($total_records>0){
$page_rs=mysql_query($page);
$page_count=mysql_num_rows($page_rs);

while($page_row=mysql_fetch_assoc($page_rs)){?>

<!-- panel -->
<div class="accordion">Overview<span></span></div>
<div class="container">
    <div class="content">
        <p>
            This plugin enables an accordion that can use cookies to persist between pages or visits.
            This plugin was made with the jQuery 1.10.1.
        </p>
       
    </div>
</div>
<!-- end panel -->
<li>
<h3><?php echo $page_row['title'];?></h3>
<div class="desc">
<?php echo $page_row['description'];?>
</div>
</li>
<?php 
   
     }
}else
{?>
<div align="center">
<?php
echo 'no data to show';?>
</div>

<?php
}
?>
</ul>




<?php
if($total_records>$max_records){
?>
<ul class="pagination">
<?php echo paginate($current_page,$total_pages); ?>   
</ul>
<?php }?> </div>
</div>

</body></html>



