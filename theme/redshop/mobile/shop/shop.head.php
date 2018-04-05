<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
?>

<header id="hd">
    <?php if ((!$bo_table || $w == 's' ) && defined('_INDEX_')) { ?><h1><?php echo $config['cf_title'] ?></h1><?php } ?>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if(defined('_INDEX_')) { // index에서만 실행
        include G5_MOBILE_PATH.'/newwin.inc.php'; // 팝업레이어
    } ?>

    
    <div id="logo"><a href="<?php echo G5_SHOP_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/mobile_logo_img" alt="<?php echo $config['cf_title']; ?> 메인"></a></div>

    <?php include_once(G5_THEME_MSHOP_PATH.'/category.php'); // 분류 ?>
    <div id="hd_cart">
        <a href="<?php echo G5_SHOP_URL; ?>/mypage.php"><i class="fa fa-user" aria-hidden="true"></i><span class="sound_only">마이페이지</span></a>
        <a href="<?php echo G5_SHOP_URL; ?>/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sound_only">장바구니</span></a>
    </div>
    <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);">
    <aside id="hd_sch">
        <div class="sch_inner">
            <h2>상품 검색</h2>
            <label for="sch_str" class="sound_only">상품명<strong class="sound_only"> 필수</strong></label>
            <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>" id="sch_str" required class="frm_input">
            <input type="submit" value="검색" class="btn_submit">
        </div>
    </aside>
    </form>
    <script>
        $(function (){
        var $hd_sch = $("#hd_sch");
        $("#hd_sch_open").click(function(){
            $hd_sch.css("display","block");
        });
        $("#hd_sch .pop_close").click(function(){
            $hd_sch.css("display","none");
        });
    });

    function search_submit(f) {
        if (f.q.value.length < 2) {
            alert("검색어는 두글자 이상 입력하십시오.");
            f.q.select();
            f.q.focus();
            return false;
        }

        return true;
    }

    </script>

    <ul id="hd_mb">
        
        <li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">최신</a></li>
        <li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">인기</a></li>
        <li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">히트</a></li>
        <li class="lt_sale"><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5">할인</a></li>
    </ul>
</header>

<div id="container">
    <?php if ((!$bo_table || $w == 's' ) && !defined('_INDEX_')) { ?><h1 id="container_title"><?php echo $g5['title'] ?></h1><?php } ?>
