<?php
/*--------------------------------------------------------------------------------------------
|    @desc:         pagination 
|    @author:       Aravind Buddha
|    @url:          http://www.techumber.com
|    @date:         12 August 2012
|    @email         aravind@techumber.com
|    @license:      Free!, to Share,copy, distribute and transmit , 
|                   but i'll be glad if i my name listed in the credits'
---------------------------------------------------------------------------------------------*/
function paginate($reload, $page, $tpages) {
    $adjacents = 3;
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
    $out = "";
    // previous
    if ($page == 1) {
       // $out.= "<span>" . $prevlabel . "</span>\n";
    } elseif ($page == 2) {
      //  $out.= "<li><a  href=\"" . $reload . "\"><img src='img/work_open_prev.png'></a>\n</li>";
    } else {
        $out.= "<li><a  href=\"" . $reload . "&amp;page=" . ($page - 1) . "\"><img src='img/work_open_prev.png'></a>\n</li>";
    }
  
    $pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
    $pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out.= "<li style='font-weight:bold;'    class=\"active\"><a href='#work_open'>" . $i . "</a></li>\n";
        } else {
            $out.= "<li><a  href=\"" . $reload . "&amp;page=" . $i . "#work_open\">" . $i . "</a>\n</li>";
        }
    }
    
    if ($page < ($tpages - $adjacents)) {
       // $out.= "<a style='font-size:11px' href=\"" . $reload . "&amp;page=" . $tpages . "\"><img src='img/work_open_next.png'></a>\n";
    }
    // next
    if ($page < $tpages) {
        $out.= "<li><a  href=\"" . $reload . "&amp;page=" . ($page + 1) . "\"><img src='img/work_open_next.png'></a>\n</li>";
    } else {
       // $out.= "<span style='font-size:11px'>" . $nextlabel . "</span>\n";
    }
    $out.= "";
    return $out;
}
