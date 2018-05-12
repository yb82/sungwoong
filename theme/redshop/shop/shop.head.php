<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

set_cart_id(0);
$tmp_cart_id = get_session('ss_cart_id');

if(G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <?php if(defined('_INDEX_')) { // index에서만 실행
        include G5_BBS_PATH.'/newwin.inc.php'; // 팝업레이어
     } ?>

    <?php
    if (!$_COOKIE['ck_top_banner_close'])
        echo display_banner( '왼쪽');
    ?>

    <div id="tnb">

        <h3>회원메뉴</h3>
        <ul>
            <?php if ($is_member) { ?>
            <?php if ($is_admin) {  ?>
            <li><a href="<?php echo G5_ADMIN_URL; ?>/shop_admin/"><b>관리자</b></a></li>
            <li><a href="<?php echo G5_THEME_ADM_URL; ?>/"><b>테마관리</b></a></li>
            <?php }  ?>
            <li><a href="<?php echo G5_BBS_URL; ?>/member_confirm.php?url=register_form.php">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/logout.php?url=shop">로그아웃</a></li>
            <?php } else { ?>
            <li><a href="<?php echo G5_BBS_URL; ?>/register.php">회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/login.php?url=<?php echo $urlencode; ?>"><b>로그인</b></a></li>
            <?php } ?>
            <li><a href="<?php echo G5_SHOP_URL; ?>/mypage.php">마이페이지</a></li>
            <li><a href="<?php echo G5_SHOP_URL; ?>/cart.php">장바구니</a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/faq.php">FAQ</a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/qalist.php">1:1문의</a></li>
            <li><a href="<?php echo G5_SHOP_URL; ?>/personalpay.php">개인결제</a></li>
            <li><a href="<?php echo G5_SHOP_URL; ?>/itemuselist.php">사용후기</a></li>
            <li><a href="<?php echo G5_SHOP_URL; ?>/orderinquiry.php">주문/배송조회</a></li>
            <li class="tnb-sns">
                <a href="#" onclick="try{window.external.AddFavorite('<?php echo G5_SHOP_URL; ?>','<?php echo $default['de_admin_company_name']; ?>')}catch(e){alert('이 브라우저에서는 즐겨찾기 기능을 사용할 수 없습니다.\n크롬에서는 Ctrl 키와 D 키를 동시에 눌러서 즐겨찾기에 추가할 수 있습니다.')}; return false;"><i class="fa fa-star" aria-hidden="true"></i> 즐겨찾기</a> <span class="st_bg"></span>
                <?php
                $save_file = G5_DATA_PATH.'/cache/theme/redshop/snslink.php';
                if(is_file($save_file))
                    include($save_file);
                ?>
                <?php if(isset($snslink['facebook']) && $snslink['facebook']) { ?>
                <a href="<?php echo set_http($snslink['facebook']); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i><span class="sound_only">페이스북</span></a>
                <?php } ?>
                <?php if(isset($snslink['twitter']) && $snslink['twitter']) { ?>
                <a href="<?php echo set_http($snslink['twitter']); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i><span class="sound_only">트위터</span></a>
                <?php } ?>
                <?php if(isset($snslink['instagram']) && $snslink['instagram']) { ?>
                <a href="<?php echo set_http($snslink['instagram']); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i><span class="sound_only">인스타그램</span></a>
                <?php } ?>
            </li>
        </ul>
    </div>

    <div id="hd_wrapper">
        <div id="logo"><a href="<?php echo G5_URL; ?>/"><img src="<?php echo G5_DATA_URL; ?>/common/logo_img" alt="<?php echo $config['cf_title']; ?>"></a></div>

        <div id="hd_sch">
            <h3>쇼핑몰 검색</h3>
            <form name="frmsearch1" action="<?php echo G5_SHOP_URL; ?>/search.php" onsubmit="return search_submit(this);">

            <label for="sch_str" class="sound_only"><strong class="sound_only">검색어 필수</strong></label>
            <input type="text" name="q" value="<?php echo stripslashes(get_text(get_search_string($q))); ?>" id="sch_str" required>
            <button type="submit" id="sch_submit"><i class="fa fa-search" aria-hidden="true"></i><span class="sound_only">검색</span></button>

            </form>
            <script>
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
        </div>
        <?php
        $save_file = G5_DATA_PATH.'/cache/theme/redshop/keyword.php';
        if(is_file($save_file))
            include($save_file);

        if(!empty($keyword)) {
        ?>
        <div id="ppl_word">
            <h3>인기검색어</h3>
            <ol class="slides">
            <?php
            $seq = 1;
            foreach($keyword as $word) {
            ?>
                <li><span class="word-rank"><?php echo $seq; ?></span><a href="<?php echo G5_SHOP_URL; ?>/search.php?q=<?php echo urlencode($word); ?>"><?php echo get_text($word); ?></a></li>
            <?php
                $seq++;
            }
            ?>
            </ol>
            <?php if($seq > 2) { ?>
            <div class="custom1-navigation verical-btn">
                <a href="#" class="flex-prev">Prev</a>
                <a href="#" class="flex-next">Next</a>
            </div>
            <?php } ?>
        </div>
        <script>
        $(window).load(function() {
            $('#ppl_word').flexslider({
                animation: "slide",
                controlNav:false,
                slideshowSpeed:5000,
                animationSpeed:800,
                direction: "vertical",
                controlsContainer: $(".custom1-controls-container"),
                customDirectionNav: $(".custom1-navigation a")
            });
        });
        </script>
        <?php
        }
        ?><!-- <iframe src="https://spot.wooribank.com/pot/Dream?withyou=FXCNT0006&rc=0&divType=3&lang=KOR" frameBorder=0
width=170 scrolling=no height=184 topmargin="0" name=irate marginWidth=0 marginHeight=0 title="무료환율표A형" style="position:absolute;top: 1px;left: 800px"></iframe>         
            
       <div style="font-size:16px;font-family:sans-serif,Arial,Helvetica;width:248px; line-height:24px;border:1px solid #2D6AB4;background-color:#FFFFFF;"><div style="background-color:#2D6AB4;height:24px; font-weight:bold;text-align:left;padding-top:3px; width:100%;"><span style="background-image:url(http://ww.fxexchangerate.com/flag.png); background-position: 0 -2064px;float:left; margin:4px 0 0 20px; width:20px;height:15px; background-repeat:no-repeat;"></span><a rel="nofollow" style="color:#FFFFFF;padding-left:5px;text-decoration:none;" href="http://usd.fxexchangerate.com">United States Dollar</a></div><script type="text/javascript" src="http://w.fxexchangerate.com/converter.php?fm=KRW&ft=AUD,&lg=en&am=1000&ty=2"></script></div> --> <!-- <div id="hd_cart">
            <a href="<?php echo G5_SHOP_URL; ?>/mypage.php"><i class="fa fa-user" aria-hidden="true"></i><span class="sound_only">마이페이지</span></a>
            <a href="<?php echo G5_SHOP_URL; ?>/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="sound_only">장바구니</span><span class="cart-count"><?php echo get_cart_count($tmp_cart_id); ?></span></a>
        </div> -->
<!--copy begin here:-->
<style type="text/css">#fx_convert_1 br {display:none;}</style><div style="width:160px;text-align:center;" id="fx_convert_1"><div id="xcolorc1_1" style="border:1px solid #000;background-color:#94abf0;padding: 0px 0px;margin: 0px 0px;align:center;overflow:hidden; position:absolute;top: 1px;left: 800px"><div id="xcolorc1_2" style="font-size:12px;color:#183a00;line-height:16px;font-family: arial; font-weight:bold;background:#94abf0;padding: 3px 1px;text-align:center;"><a href="http://kr.rateq.com/AUD" alt="AUD 호주 달러 환율 계산기" title="AUD 호주 달러 환율 계산기" id="forex2_linkc1" style="color:#000000;font-size:14px;text-decoration:none;line-height:16px;font-family: arial;" ><img src="http://kr.rateq.com/images/AUD.gif" border="0" style="margin:0;padding:0;border:0;" />호주 달러 환율 계산기</a></div><script src="http://kr.rateq.com/z.php?z=kr_AUDc1&c=94abf0&tz=Asia/Seoul&tf=11"></script></div><div style="text-align:center;"><a href="http://kr.rateq.com/" style="font-size:12px;">환율 계산기</a></div></div>
<!--copy end here:-->

    </div>
    <div id="menu">
        <ul>
            <li class="menu_all">
                <?php include_once(G5_THEME_SHOP_PATH.'/category.php'); // 분류 ?>
            </li>
            
            <li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">최신상품</a></li>
            <li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">인기상품</a></li>
            <li><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=1">히트상품</a></li>
            <li class="lt_sale"><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=5">할인상품</a></li>
        </ul>
    </div>
</div>

<div id="wrapper">



<!-- } 상단 끝 -->

    <!-- 콘텐츠 시작 { -->
    <div id="container">
        <?php if ((!$bo_table || $w == 's' ) && !defined('_INDEX_')) { ?><div id="wrapper_title"><?php echo $g5['title'] ?></div><?php } ?>
        <?php include(G5_SHOP_SKIN_PATH.'/boxtodayview.skin.php'); // 오늘 본 상품 ?>
