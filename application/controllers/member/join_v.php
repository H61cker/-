<div class="container join">

    <div class="row">

        <div class="col-md-6">
            <div class="alert alert-info text-center" role="alert"> 로그인 하시면 더 좋은 서비스를 이용할 수 있습니다. ( <a href="/roundtable/member/login">로그인 하러가기</a> ) </div>
            <img src="/hComp/img/pika.jpg" alt="pika">
        </div>

        <div class="col-md-6">
            <div class="controls text-center">
                <div class="alert alert-warning help-block" role="alert"> <?php echo validation_errors(); ?> </div>
            </div>

            <form action="/roundtable/member/join" method="POST">

                <label for="id"> 이메일 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-console"> </span> </span>
                    <input type="text" class="form-control" id="id" name="email" placeholder="이메일 입력" value="<?php echo set_value('email'); ?>">
                </div>
                <br>
                <label for="pw"> 패스워드 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-adjust"> </span></span>
                    <input type="password" class="form-control" id="pw" name="pw" placeholder="비밀번호 입력" value="<?php echo set_value('password') ?>">
                </div>
                <br>
                <label for="name"> 이름 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span> </span>
                    <input type="text" class="form-control" id="name" name="name" placeholder=" 이름입력 " value="<?php echo set_value('name') ?>">
                </div>
                <br>

                <label for="authorityCheck"> 직급 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-adjust"> </span></span>
                    <select name="authority" class="form-control">
                        <option value="teacher"> 선생님 </option>
                        <option value="student"> 학생 </option>
                    </select>
                </div>

                <br>
                <label for="age"> 나이 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span> </span>
                    <input type="text" class="form-control" id="age" name="age" placeholder=" 나이입력 " value="<?php echo set_value('age') ?>">
                </div>

                <label for="age"> 번호 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span> </span>
                    <input type="text" class="form-control" id="grade" name="grade" placeholder=" 번호입력 " value="<?php echo set_value('grade') ?>"><br>
                </div>

                <label for="age"> 반 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span> </span>
                    <input type="text" class="form-control" id="class" name="class" placeholder=" 반 입력 " value="<?php echo set_value('grade') ?>"><br>
                </div>

                <label for="age"> 학교 </label>
                <div class="input-group">
                    <span class="input-group-addon"> <span class="glyphicon glyphicon-user"></span> </span>
                    <input type="text" class="form-control" id="school" name="school" placeholder=" 학교 입력 " value="<?php echo set_value('grade') ?>"><br>
                </div>
                <br><br><br>

                <button type="submit" class="btn btn-danger btn-lg btn-block"> 회원 가입 </button>

            </form>
        </div>
    </div>

</div>