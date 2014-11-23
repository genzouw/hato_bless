<?php
class PagingHelper extends Helper {

/**
 * Automatically resizes an image and returns formatted IMG tag
 *
 * @param array   $pg_list
 * @param integer $prev
 * @param integer $next
 * @param integer $current_pg
 * @param string  $url
 * @param integer $count
 * @access public
 */
    function admin_navi($pg_list, $prev, $next, $current_pg, $url, $count = 10) {

        $url = HOME_URL.$url;
        $html = null;
        $html .= "<ul> ";
        if ($prev == 0){
            $html .= "<li class=\"prev\"></li>  ";
        }else{
            $html .= "<li class=\"prev\"><a href=\"".$url.$prev."\">&laquo; PREV</a></li> ";
        }

        if($count > count($pg_list)) $count = count($pg_list);
        $interval = round($count/2);
        $max = $current_pg + $interval + 1;
        $min = $current_pg - $interval + 1;
        if($max > (count($pg_list) + 1)){
            $max = (count($pg_list) + 1);
            $min = $max - $count;
        }
        if($min < 1){
            $min = 1;
            $max = $count + 1;
        }
        for($i = $min;$i < $max;++$i){
            if($current_pg == $i){
                $html .= "<li><em>".$i."</em></li>  ";
            }else{
                $html .= "<li><a href=\"".$url.$i."\">".$i."</a></li>  ";
            }
        }

        if ($next == 0){
            $html .= "<li class=\"next\"></li>  ";
        }else{
            $html .= "<li class=\"next\"><a href=\"".$url.$next."\">NEXT &raquo;</a></li>  ";
        }
        $html .= "</ul>  ";

        return $html;
    }

    function list_navi($data, $url, $count = 8) {

        $pg_list = $data["pg_list"];
        $prev = $data["prev"];
        $next = $data["next"];
        $current_pg = $data["current_pg"];
//        $total = $data["total"];

        $first = $data["first"];
        $last = $data["last"];
        $url = $url."?pg=";

        $html = '<ul>';
        $html .= '<li class="first"><a href="'.$url.$first.'">最初</a></li>';

        if ($prev == 0){
            $html .= '<li class="prev">前へ</li>  ';
        }else{
            $html .= '<li class="prev"><a href="'.$url.$prev.'">前へ</a></li> ' ;
        }

        if($count > count($pg_list)) $count = count($pg_list);
        $interval = round($count/2);
        $max = $current_pg + $interval + 1;
        $min = $current_pg - $interval + 1;
        if($max > (count($pg_list) + 1)){
            $max = (count($pg_list) + 1);
            $min = $max - $count;
        }
        if($min < 1){
            $min = 1;
            $max = $count + 1;
        }
        for($i = $min;$i < $max;++$i){
            if($current_pg == $i){
                $html .= '<li><span class="thisPage">'.$i.'</span></li>';
            }else{
                $html .= '<li><a href="'.$url.$i.'">'.$i.'</a></li>';
            }
        }

        if ($next == 0){
            $html .= '<li class="next">次へ</li>';
        }else{
            $html .= '<li class="next"><a href="'.$url.$next.'">次へ</a></li>';
        }

        $html .= '<li class="last"><a href="'.$url.$last.'">最後</a></li>';
        $html .= '</ul>';

        return $html;
    }

}
?>
