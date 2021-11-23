
<?php
header("Content-type:application/json");
if(isset($_POST,$_POST['p']) && $_SERVER['REQUEST_METHOD']=='POST'){
include("pages.php");
include("db.php");
$max_records=2;
$page = "Select * from   articles where  status=1  order by id asc";
$sql = "Select * from   articles where  status=1 ";
$rstotal=mysql_query($sql) ;
$total_records=mysql_num_rows($rstotal);
$current_page=(isset($_POST["p"]) && intval($_POST["p"])<>0)?intval($_POST["p"])-1:0;
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
$html='';
$pages='';
if($total_records>0){
$page_rs=mysql_query($page);
$page_count=mysql_num_rows($page_rs);
while($page_row=mysql_fetch_assoc($page_rs)){
$html.='<link rel="stylesheet" href="css/demo2.css" type="text/css" />
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
        $(".accordion").accordion({
            defaultOpen: "section1",
            speed: "slow",
            animateOpen: function (elem, opts) { //replace the standard slideUp with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            },
            animateClose: function (elem, opts) { //replace the standard slideDown with custom function
                elem.next().stop(true, true).slideFadeToggle(opts.speed);
            }
        });

    });
</script>
<div class="accordion">Overview<span></span></div>
<div class="container">
    <div class="content">
        <p>
            This plugin enables an accordion that can use cookies to persist between pages or visits.
            This plugin was made with the jQuery 1.10.1.
        </p>
       
    </div>
</div>
<li>
<h3>'. $page_row['title'].'</h3>
<div class="desc">
'. $page_row['description'].'
</div>
</li>';   
}
if($total_records>0){
$pages.=paginate($current_page,$total_pages);
}
echo json_encode(array('status'=>true,'html'=>"$html",'pages'=>"$pages"));exit;
}else
{
$html.='
<div align="center">
'. 'no data to show
</div>';
echo json_encode(array('status'=>true,'html'=>"$html"));exit;
}
}else{
echo json_encode(array('status'=>false,'msg'=>"Sorry some unexpected error occur. please try again."));exit;
}
?>

