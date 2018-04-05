<?php
include_once('./_common.php');

define("_INDEX_", TRUE);

include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
?>

<script src="<?php echo G5_JS_URL; ?>/swipe.js"></script>
<script src="<?php echo G5_JS_URL; ?>/shop.mobile.main.js"></script>
    
    <!-- 메인 배너 -->
    <?php echo display_banner('메인', 'mainbanner.10.skin.php'); ?>

    <!-- 베스트 상품  -->
    <div class="idx_best_box col-lg-12">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=4">BEST ITEM</a></h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(4);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_cust_price', false);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', false);
        $list->set_view('sns', false);
        echo $list->run();
        ?>
    </div> 
    
    <!-- 커뮤니티 바로가기 아이콘  -->
    <div class="idx_stbd text-center">
        <h2></h2>
        <ul>
            <li class="first_stbd_icon"><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=free"><img src="<?php echo G5_THEME_URL; ?>/mobile/shop/img/store_b01.png" alt="게시판1"><span>물물교환</span></a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=new"><img src="<?php echo G5_THEME_URL; ?>/mobile/shop/img/store_b02.png" alt="게시판2"><span>mom's cafe</span></a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=test"><img src="<?php echo G5_THEME_URL; ?>/mobile/shop/img/store_b03.png" alt="게시판3"><span>육아정보공유</span></a></li>
        </ul>  
    </div>
    
    <!-- 최신 상품 -->
    <div class="idx_new_box col-lg-12">
        <h2><a href="<?php echo G5_SHOP_URL; ?>/listtype.php?type=3">NEW ITEM</a></h2>
        <?php
        $list = new item_list();
        $list->set_mobile(true);
        $list->set_type(3);
        $list->set_view('it_id', false);
        $list->set_view('it_name', true);
        $list->set_view('it_cust_price', false);
        $list->set_view('it_price', true);
        $list->set_view('it_icon', false);
        $list->set_view('sns', false);
        echo $list->run();
        ?>
    </div>

    <!-- 이벤트  -->
    <?php include_once(G5_MSHOP_SKIN_PATH.'/main.event.skin.php'); // 이벤트 ?> 
    
    <!-- 이슈 -->
    <div id="kids_news" class="col-lg-6 col-md-6">
        <h2>ISSUE</h2>
        <ul>
            <li>
                <button type="button" class="accordion-toggle bubn_btn">게시판 1 최신글<span>게시판1</span></button>
                <div class="accordion-content bd_list">
                    <?php
                    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                    echo latest('theme/new_latest', 'free', 5, 40);
                    ?>
                </div>
            </li>
            <li>
                <button type="button" class="accordion-toggle bubn_btn">게시판 2 최신글<span>게시판2</span></button>
                <div class="accordion-content bd_list">
                    <?php
                    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                    echo latest('theme/new_latest', 'new', 5, 40);
                    ?>
                </div>
            </li>
            <li>
                <button type="button" class="accordion-toggle bubn_btn">게시판 3 최신글<span>게시판3</span></button>
                <div class="accordion-content default bd_list">
                    <?php
                    // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
                    // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
                    // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
                    echo latest('theme/new_latest', 'test', 5, 40);
                    ?>
                </div>
            </li>
        </ul>
    </div>   
    <script type="text/javascript">
      $(document).ready(function($) {
        $("#kids_news").find(".accordion-toggle").click(function(){
            $(this).next().slideToggle('fast');
            $(".accordion-content").not($(this).next()).slideUp('fast');
        });
      });
    </script>  
    
    <!-- 메인리뷰-->
    <?php
    // 상품리뷰
    $sql = " select a.is_id, a.is_subject, a.is_content, a.it_id, b.it_name
                from `{$g5['g5_shop_item_use_table']}` a join `{$g5['g5_shop_item_table']}` b on (a.it_id=b.it_id)
                where a.is_confirm = '1'
                order by a.is_id desc
                limit 0, 3 ";
    $result = sql_query($sql);
    
    for($i=0; $row=sql_fetch_array($result); $i++) {
        if($i == 0) {
            echo '<div class="idx_item idx_review col-lg-6 col-md-6 col-sm-12 col-xs-12">'.PHP_EOL;
            echo '<h2><a href="'.G5_SHOP_URL.'/itemuselist.php">REVIEW</a></h2>'.PHP_EOL;
            echo '<ul>'.PHP_EOL;
        }
    
        $review_href = G5_SHOP_URL.'/item.php?it_id='.$row['it_id'];
    ?>
        <li>
            <div class="rv_wr">
                <a href="<?php echo $review_href; ?>" class="rv_img"><?php echo get_itemuselist_thumbnail($row['it_id'], $row['is_content'], 230, 230); ?></a>
                <div class="rv_txt">
                    <a href="<?php echo $review_href; ?>" class="rv_prd"><?php echo get_text(cut_str($row['it_name'], 20)); ?></a>
                    <span class="rv_tit"><?php echo get_text(cut_str($row['is_subject'], 20)); ?></span>  
                </div>
                <!-- <p><?php echo get_text(cut_str(strip_tags($row['is_content']), 90), 1); ?></p> -->
            </div>
        </li>
    <?php
    }
    
    if($i > 0) {
        echo '</ul>'.PHP_EOL;
        echo '</div>'.PHP_EOL;
    }
    ?>
    <!-- 메인리뷰-->

    <!-- 고객센터 -->
    <div class="idx_cs col-lg-4 col-md-6 col-sm-6 col-xs-6">
        <h2>고객센터</h2>
        <p class="idx_cs_img"><img src="<?php echo G5_THEME_URL; ?>/mobile/shop/img/idx_cs.png" alt="계시판1"></p>
        <p>
            <a href="tel:1234-5678" class="tel">1234-5678</a><br/>
            <span>평일 9:00 - 17:00</span><br/>
            <span>점심 12:00 - 13:00</span><br/>
            <span>주말 및 공휴일 휴무</span>
        </p>
    </div>
    
    <!-- 공지사항 --> 
    <div class="idx_nt col-lg-4 col-md-6 col-sm-6 col-xs-6">
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        // 테마의 스킨을 사용하려면 theme/basic 과 같이 지정
        echo latest('theme/basic', 'notice', 5, 40);
        ?>
    </div>
     
    <!-- 문의 및 조회 -->
    <div class="idx_ct col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <h2>문의 및 조회</h2>
        <ul>
            <li class="no_mg"><a href="<?php echo G5_SHOP_URL; ?>/orderinquiry.php"><img src="<?php echo G5_THEME_URL; ?>/mobile/shop/img/idx_ct_icon1.png" alt="주문배송조회"><span>주문배송조회</span></a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/qalist.php"><img src="<?php echo G5_THEME_URL; ?>/mobile/shop/img/idx_ct_icon2.png" alt="1:1문의"><span>1:1문의</span></a></li>
            <li><a href="<?php echo G5_BBS_URL; ?>/faq.php"><img src="<?php echo G5_THEME_URL; ?>/mobile/shop/img/idx_ct_icon3.png" alt="FAQ"><span>FAQ</span></a></li>
        </ul>  
    </div>

<?php
include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
?>