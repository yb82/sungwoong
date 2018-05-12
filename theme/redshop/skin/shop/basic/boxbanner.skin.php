<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
add_stylesheet('<link rel="stylesheet" href="'.G5_SHOP_SKIN_URL.'/style.css">', 0);
?>
<?php
$cnt = 0;

for ($i=0; $row=sql_fetch_array($result); $i++)
{
    $bn_border  = ($row['bn_border']) ? ' class="sbn_border"' : '';;
    // 새창 띄우기인지
    $bn_new_win = ($row['bn_new_win']) ? ' target="_blank"' : '';

    $bimg = G5_DATA_PATH.'/banner/'.$row['bn_id'];
    if (is_file($bimg))
    {
        if ($cnt == 0) echo '<aside id="sbn_side"><h2>쇼핑몰 배너</h2><ul class="slides">'.PHP_EOL;

        $banner = '';
        $size = getimagesize($bimg);
        echo '<li>'.PHP_EOL;
        if ($row['bn_url'][0] == '#')
            $banner .= '<a href="'.$row['bn_url'].'">';
        else if ($row['bn_url'] && $row['bn_url'] != 'http://') {
            $banner .= '<a href="'.G5_SHOP_URL.'/bannerhit.php?bn_id='.$row['bn_id'].'&amp;url='.urlencode($row['bn_url']).'"'.$bn_new_win.'>';
        }
        echo $banner.'<span class="banner_img" style="background-repeat: repeat-y;  display:block; background-image:url('.G5_DATA_URL.'/banner/'.$row['bn_id'].'); height:'.$size[1].'px;" '.$bn_border.'></span>';
        if($banner)
            echo '</a>'.PHP_EOL;
        echo '</li>'.PHP_EOL;

        $cnt++;
    }
}

if ($cnt > 1)
    echo '</ul><div class="custom-navigation flex-nv"><a href="#" class="flex-prev">이전</a><a href="#" class="flex-next">다음</a></div>'.PHP_EOL;

if($cnt > 0)
   // echo '</ul><button type="button" id="sbn_side_close" class="close-btn">닫기</button></aside>';
?>

<script>
<?php if($cnt > 1) { ?>
$(window).load(function() {
    $('#sbn_side').flexslider({
        animation: "slide",
        controlNav:false,
        slideshowSpeed:5000,
        animation:"fade",
        customDirectionNav: $(".custom-navigation a")
    });
});
<?php } ?>

$(function(){
    $("#sbn_side_close").on("click", function() {
        set_cookie("ck_top_banner_close", 1, 24, g5_cookie_domain);
        $("#sbn_side").hide();
    });
});
 </script>