<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$save_file = G5_DATA_PATH.'/cache/theme/redshop/footerinfo.php';
if(is_file($save_file))
    include($save_file);

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
    return;
}

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>

    </div>
    <!-- } 콘텐츠 끝 -->

<!-- 하단 시작 { -->
</div>

<div id="ft">
    <ul>
        <li class="ft_li1"><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a></li>
        <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">서비스이용약관</a></li>
        <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=privacy">개인정보 취급방침</a></li>
    </ul>

    <div class="ft-cs">
        <h2>고객센터</h2><span class="st_bg_2"></span>
        <strong><?php echo get_text($footerinfo['tel']); ?></strong>
        <p><?php echo get_text($footerinfo['etc'], 1); ?></p>
    </div>

    <div class="ft-bank">
        <h2>무통장입금안내</h2><span class="st_bg_2"></span>
        <p>
            <?php echo get_text($footerinfo['account'], 1); ?><br>
            <strong>예금주 / <?php echo get_text($footerinfo['depositor']); ?></strong>
        </p>
    </div>

    <div class="ft-info">
        <h2><?php echo $default['de_admin_company_name']; ?></h2><span class="st_bg_2"></span>
        <p>
        회사명. <span><?php echo $default['de_admin_company_name']; ?></span>
        주소. <span><?php echo $default['de_admin_company_addr']; ?></span><br>
        사업자 등록번호. <span><?php echo $default['de_admin_company_saupja_no']; ?></span>
        대표. <span><?php echo $default['de_admin_company_owner']; ?></span>
        전화. <span><?php echo $default['de_admin_company_tel']; ?></span>
        팩스. <span><?php echo $default['de_admin_company_fax']; ?></span><br>
        통신판매업신고번호. <span><?php echo $default['de_admin_tongsin_no']; ?></span>
        개인정보관리책임자. <span><?php echo $default['de_admin_info_name']; ?></span><br>

        <?php if ($default['de_admin_buga_no']) echo '부가통신사업신고번호. <span>'.$default['de_admin_buga_no'].'</span>'; ?><br><br>
        Copyright &copy; 2016 <?php echo $default['de_admin_company_name']; ?>. All Rights Reserved.
        </p>
    </div>
</div>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<!-- } 하단 끝 -->

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
