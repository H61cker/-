<div style="margin-top: 120px;"></div>
<div class="container">

    <div class="row">

        <div class="col-md-6">
            <div class="alert alert-danger text-center" role="alert"> 아직 아이디가 없으신가요? 회원가입 하세요! ( <a href="/roundtable/member/join">가입하러 가기</a> ) </div>
            <img src="/hComp/img/pika_login.jpg" alt="pika">
        </div>

        <div class="col-md-6">
            <div class="alert alert-info text-center" role="alert"> 로그인 </div>

            <div class="controls text-center">
                <div class="alert alert-warning help-block" role="alert"> <?php echo validation_errors(); ?> </div>
            </div>


            <form action="/roundtable/member/login" method="POST">

                <label for="id"> 이메일 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-console"> </span> </span>
                    <input type="text" class="form-control" id="id" name="email" placeholder="이메일 입력" value="<?php echo set_value('email'); ?>">
                </div>
                <br>
                <label for="pw"> 패스워드 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-adjust"> </span></span>
                    <input type="password" class="form-control" id="pw" name="password" placeholder="비밀번호 입력" value="<?php echo set_value('password') ?>">
                </div>
                <br>
                <div class="text-right">
                    <a href="#"> 계정 찾기 </a>
                </div>
                <br>
                <button type="submit" class="btn btn-danger btn-lg btn-block"> 로그인  </button>

            </form>

        </div>

    </div>

</div>