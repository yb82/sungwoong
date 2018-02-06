<?php
include_once('./_common.php');

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MSHOP_PATH.'/index.php');
    return;
}

define("_INDEX_", TRUE);

include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>
<div id="gnb_bnner">
    <?php include_once(G5_SHOP_SKIN_PATH.'/boxcategory.skin.php'); // 상품분류 ?>
    <!-- 메인이미지 시작 { -->
    <?php echo display_banner('메인', 'mainbanner.10.skin.php'); ?>
    <!-- } 메인이미지 끝 -->
</div>
<?php include_once(G5_SHOP_SKIN_PATH.'/boxevent.skin.php'); // 이벤트 ?>

<?php
if($default['de_type4_list_use']) {
    $save_file = G5_DATA_PATH.'/cache/theme/redshop/mainbestcategory.php';
    if(is_file($save_file))
        include($save_file);

    $cnt = 0;
    $first_ca_id = '';

    if(!empty($mainbestcategory)) {
        foreach($mainbestcategory as $val) {
            $sql = " select ca_id, ca_name from {$g5['g5_shop_category_table']} where ca_id = '$val' and ca_use = '1' ";
            $row = sql_fetch($sql);

            if(!$row['ca_id'])
                continue;

            $tab_class = '';
            $tab_selected = '';

            if($cnt == 0) {
                echo '<section id="cate_best">'.PHP_EOL;
                echo '<header>'.PHP_EOL;
                echo '<h2>카테고리별 <span>인기상품</span></h2>'.PHP_EOL;
                echo '</header>'.PHP_EOL;
                echo '<div class="tab">'.PHP_EOL;
                echo '<ul>'.PHP_EOL;
                $tab_class = ' class="tab-1"';
                $tab_selected = ' tab_selected';
                $first_ca_id = $val;
            }
?>
            <li<?php echo $tab_class; ?>><button type="button" data-ca_id="<?php echo $val; ?>" class="category_best<?php echo $tab_selected; ?>"><?php echo get_text($row['ca_name']); ?></button></li>
<?php
            $cnt++;
        }

        if($cnt > 0) {
            echo '</ul>'.PHP_EOL;
            echo '</div>'.PHP_EOL;
            $_GET['ca_id'] = $first_ca_id;
            echo '<div id="cate_best_item">'.PHP_EOL;
            include_once(G5_THEME_SHOP_PATH.'/ajax.mainbestitem.php');
            echo '</div>'.PHP_EOL;
            echo '</section>'.PHP_EOL;
        }
    }
?>

<script>
$(function() {
    $(".category_best").on("click", function() {
        var $this = $(this);
        if($this.hasClass("tab_selected"))
            return false;

        var ca_id = $this.data("ca_id");

        $.ajax({
            type: "GET",
            url: g5_theme_shop_url+"/ajax.mainbestitem.php",
            data: { ca_id: ca_id },
            async: true,
            cache: false,
            success: function(data) {
                $("#cate_best_item").html(data);
                $(".category_best").removeClass("tab_selected");
                $this.addClass("tab_selected");
            }
        });
    });
});
</script>

<?php
}
?>

<?php if($default['de_type3_list_use']) { ?>
<!-- 최신상품 시작 { -->
<section class="sct_wrap">
    <header>
        <h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">최신상품</a></h2>
    </header>
    <?php
    $list = new item_list();
    $list->set_type(3);
    $list->set_view('it_id', false);
    $list->set_view('it_name', true);
    $list->set_view('it_basic', false);
    $list->set_view('it_cust_price', true);
    $list->set_view('it_price', true);
    $list->set_view('it_icon', true);
    $list->set_view('sns', true);
    echo $list->run();
    ?>
</section>
<!-- } 최신상품 끝 -->
<?php } ?>

<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>