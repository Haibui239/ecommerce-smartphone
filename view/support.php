<style>
    <?php echo time();?>
    .banner-sub {
        width: 100%;
        height: 60vh;
        background: url("images/img1 3.jpeg");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .contact {
        padding: 10px 0;
    }
    .contact h1 {
        font-size: 1.5rem;
        font-weight: 300;
        text-align: center;
        padding: 10vh 0;
    }
    .contact h5 {
        text-align: center;
        font-size: 1rem;
        padding: 10px 0;
    }
    .contact-issue-box {
        width: 100%;
    }
    .contact-issue-box select {
        width: 100%;
    }
    .contact-us-form input,.contact-us-form select {
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 1px solid #000;
        background-color: transparent;
        padding: 15px;
        font-size: 0.7rem;
    }
    .contact-us-form p {
        font-size: 0.7rem;
    }
    .left,.right {
        display: none;
    }
    .content-home {
        width: 100%!important;
    }
    .banner-main {
        width: 100%;
    }
</style>
<!-- banner -->
    <div data-aos="fade-down" style="width: 100%;
        height: 60vh;
        background: url('images/img1 3.jpeg');
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;" class="banner-support"></div>
    <!-- contact -->
    <div class="contact" data-aos="fade-up">
        <h1>Liên hệ hỗ trợ</h1>
        <h5>Nhập những thông tin bạn cần hỗ trợ</h5>
        <div class="contact-us-form">
            <form action="https://formsubmit.co/el/sujado" method="post" autocomplete="off">
                <div class="contact-name-box">
                    <p data-aos="fade-right"> Họ và đệm</p>
                    <input type="text" placeholder="Nhập họ đệm" class="contact-name" data-aos="fade-right">
                </div>
                <div class="contact-email-box">
                    <p data-aos="fade-left"> Tên</p>
                    <input type="text" placeholder="Nhập tên" name="name" id="name" class="contact-email" data-aos="fade-left">
                </div>
                <div class="contact-phone-box">
                    <p data-aos="fade-right">Email</p>
                    <input type="email" placeholder="Nhập Email" name="email" id="email" class="contact-tel" data-aos="fade-right">
                </div>
                <div class="contact-add-box">
                    <p data-aos="fade-left">Địa chỉ</p>
                    <input type="text" placeholder="Nhập địa chỉ" name="address" id="address" class="contact-add" data-aos="fade-left">
                </div>
                <div class="contact-issue-box">
                    <p data-aos="fade-up">Vấn đề</p>
                    <select name="prob" id="prob" data-aos="fade-up">
                        <option value="" selected disabled hidden>Chọn 1 vấn đề</option>
                        <option value="">Vấn đề về đăng nhập</option>
                        <option value="">Vấn đề về thanh toán</option>
                        <option value="">Vấn đề về nội dung mặt hàng</option>
                        <option value="">Vấn đề về giá cả</option>
                        <option value="">Vấn đề khác </option>
                    </select>
                </div>
                <p style="padding: 7px 0;" data-aos="fade-up">Phản hồi</p>
                <Textarea name="mess" id="mess"rows="4" placeholder="Type Nhập lời nhắn của bạn" class="contact-mess" data-aos="fade-up"></Textarea>
                <input type="submit" placeholder="Gửi" class="contact-submit" data-aos="fade-up" id="btn-support">
            </form>
        </div>
    </div>
    <script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>
    var btn = document.getElementById('btn-support');
    btn.addEventListener('click',function(e) {
        e.preventDefault()
        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var address = document.getElementById('address').value;
        var issue = document.getElementById('issue').value;
        var mess = document.getElementById('mess').value;
        var body = 'name' + name + '<br> email :' + email + '<br> subject: ' + issue + '<br> message :' + mess
        Email.send({
        Host : "smtp.gmail.com",
        Username : "buiviethai2309@gmail.com",
        Password : "wduzbpdirlrxnzia",
        To : 'buiviethai2309@gmail.com',
        From : email,
        Subject : issue,
        Body : body
        }).then(
        message => alert(message)
        );
    })
</script>