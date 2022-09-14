<div class="header">
            <div class="header-main main">
                <div class="header-logo">
                    <h4>HSQUARE</h4>
                </div>
                <div class="header-menu">
                <li class="header-icon-ipad"><i class="fas fa-bars"></i></li>
                    <ul class="header-menu-ipad">
                        <li><a href="?request=home">Trang chủ</a></li>
                        <li><a href="?request=shop">Cửa hàng</a></li>
                        <li><a href="?request=police">Chính sách cửa hàng</a></li>
                        <li><a href="?request=faq">FAQ</a></li>
                        <li><a href="?request=support">Hỗ trợ</a></li>
                        <li><a href="?request=about">Giới thiệu</a></li>
                        <li><a href="?request=kiemtra">Kiểm tra</a></li>
                        <li><a href="?request=home#contact">Liên hệ</a></li>
                        <?php
                            if(!isset($_SESSION['username'])):
                        ?>
                        <li><a href="?request=login">Đăng nhập</a></li>
                        <li><a href="?request=register">Đăng ký</a></li>
                        <?php
                            else:
                        ?>
                        <li><?=$_SESSION['username']?></li>
                        <li><a href="?request=logout">Đăng xuất</a></li>
                        <?php endif; ?>
                        <!-- <li><a href="#">
                            New collection
                        </a></li> -->
                        <li><a href="?request=cart"><i class="fas fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>