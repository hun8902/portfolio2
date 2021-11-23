<?php
function paginate($current = 1, $total)
{
global $max_records;

$current++;
$perpage=3;// per page link
if(!empty($max_records)) $limit=$max_records;
if(!$current) $current = 1;
$last = ceil($total);
$previous=$current - 1;
$next=$current + 1;
$pagination='';
if($total > 1)
{
if( $current >1)
{
$pagination.="<li ><a  rel='1' class='prev pages' >First</a></li>";
$pagination .= "<li ><a  rel=".$previous." class='prev pages'>Previous</a></li>";
}
else
{

}
if ($current >= $perpage) {
    $pages = $current - floor($perpage/2);
   
    if ($last > $current + floor($perpage/2))
    if($perpage%2==0)
    $loop = $current + floor($perpage/2)-1;
    else
    $loop = $current + floor($perpage/2);
    else if ($current <= $last && $current > $last - ($perpage-1)) {
         $pages = $last - ($perpage-1);
        $loop = $last;
    } else {
     $loop = $last;
    }
} else {
    $pages = 1;
    if ($last > $perpage)
        $loop = $perpage;
    else
        $loop = $last;
}

for($i = $pages; $i <= $loop; $i++)
{

$class=($current==$i)?'current':'';
$pagination.="<li  ><a class='".$class." pages' rel='".$i."'>".$i."</a></li>";


}
if( $total != $current )
{
$pagination .= "<li ><a  rel=".$next." class='prev pages'>Next</a></li>";
$pagination.="<li ><a rel='".$total."' class='prev pages' >Last</a></li>";

}
else
{

}

}
return $pagination;
}
?>