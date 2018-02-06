<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

$save_file = G5_DATA_PATH.'/cache/theme/redshop/footerinfo.php';
if(is_file($save_file))
    include($save_file);

$admin = get_admin("super");

// 사용자 화면 우측과 하단을 담당하는 페이지입니다.
// 우측, 하단 화면을 꾸미려면 이 파일을 수정합니다.
?>

</div><!-- container End -->

<div id="ft">
    <h2><?php echo $config['cf_title']; ?> 정보</h2>
    <ul>
        <li class="ft_li1">
            <?php if ($is_member) { ?>
            <a href="<?php echo G5_BBS_URL; ?>/logout.php?url=shop">로그아웃</a>
            <?php } else { ?>
            <a href="<?php echo G5_BBS_URL; ?>/login.php?url=<?php echo $urlencode; ?>">로그인</a>
            <?php } ?>
        </li>
        <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=company">회사소개</a></li>
        <li><a href="<?php echo G5_BBS_URL; ?>/content.php?co_id=provision">이용약관</a></li>
        <li><a href="#">맨위로</a></li>
    </ul>
    <div class="ft-cs">
        <h3>고객센터</h3><span class="st_bg_2"></span>
        <strong><?php echo get_text($footerinfo['tel']); ?></strong>
        <p><?php echo get_text($footerinfo['etc'], 1); ?></p>
    </div>

    <div class="ft-bank">
        <h3>무통장입금안내</h3><span class="st_bg_2"></span>
        <p>
            <?php echo get_text($footerinfo['account'], 1); ?><br>
            <strong>예금주 / <?php echo get_text($footerinfo['depositor']); ?></strong>
        </p>
    </div>

    <p>
        <span><b>회사명</b> <?php echo $default['de_admin_company_name']; ?></span>
        <span><b>주소</b> <?php echo $default['de_admin_company_addr']; ?></span><br>
        <span><b>사업자 등록번호</b> <?php echo $default['de_admin_company_saupja_no']; ?></span><br>
        <span><b>대표</b> <?php echo $default['de_admin_company_owner']; ?></span>
        <span><b>전화</b> <?php echo $default['de_admin_company_tel']; ?></span>
        <span><b>팩스</b> <?php echo $default['de_admin_company_fax']; ?></span><br>
        <!-- <span><b>운영자</b> <?php echo $admin['mb_name']; ?></span><br> -->
        <span><b>통신판매업신고번호</b> <?php echo $default['de_admin_tongsin_no']; ?></span><br>
        <span><b>개인정보관리책임자</b> <?php echo $default['de_admin_info_name']; ?></span>

        <?php if ($default['de_admin_buga_no']) echo '<span><b>부가통신사업신고번호</b> '.$default['de_admin_buga_no'].'</span>'; ?><br>
        Copyright &copy; 2001-2013 <?php echo $default['de_admin_company_name']; ?>. All Rights Reserved.
    </p>
</div>

<?php
$sec = get_microtime() - $begin_time;
$file = $_SERVER['SCRIPT_NAME'];

if ($config['cf_analytics']) {
    echo $config['cf_analytics'];
}
?>

<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>

<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
