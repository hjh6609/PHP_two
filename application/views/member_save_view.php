<!Doctype html>
<html>
<head>
    <title>Member Save</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap -->
    <script src="../bootstrap/js/jquery-1.12.2.min.js"></script>
    <link href="../bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script>
        $(document).ready(function(){
            console.log("111");
        });

        function Enter1()
        {
            if( !$("#txtMail").val() ){
                alert("이메일주소를 입력하세요. \n 암거나 다 됨.");
                $("#txtMail").focus();
                return false;
            }else{
              //이메일 유효성 검사
               var regEmail = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

               if(!regEmail.test( $("#txtMail").val() )) {
                    alert('이메일 주소가 유효하지 않습니다');
                    $("#txtMail").focus();
                    return false;
                }else{
                    //connect db
                    console.log($("#txtMail").val());
                    $.ajax({
                        type: "POST",
                        url: "/study/index.php/Board_control/Intsert_mem", 
                        data:({"mail" : $("#txtMail").val() , "type" : "A" }),
                        cache: false,
                        dataType: "text",
                        success: function(data){
                            //alert(data);
                            //return;
                            if(data == "0")
                            {
                                $("#hdnmail").html("사용가능한 이메일입니다.");
                                $("#hdnNone").val("hdnYES");
                            }else{
                                $("#hdnmail").html("이미 사용중 입니다.");
                            }
                        }
                    });
                   ///
                }
            }
        }

        function Enter2(){
           
           var chked_val2 = "";
           var chked_val3 = "";
           var chked_val4 = "";
           
           var pw = $("#txtPw").val()
           var quest1 = $("#txtq1").val();
           var quest2 = $(':input:radio[name=chk2]:checked').val();

          //exam 2
          $(":input:radio[name=chk2]:checked").each(function(pi,po){
                chked_val2 += po.value
                console.log(chked_val2);
           });

          //exam 3
          $(":checkbox[name='chk3']:checked").each(function(pi,po){
                chked_val3 += po.value + ",";
                console.log(chked_val3);
           });

           //exam 4
          $(":checkbox[name='chk4']:checked").each(function(pi,po){
                chked_val4 += po.value + ",";
                console.log(chked_val4);
           });

           if(!pw){
               alert("비밀번호를 입력해 주세여.");
               $("#txtPw").focus();
               return false;
           }else if( !quest1 ){
                alert("답변해 주세여1");
                $("#txtq1").focus();
                return false;
           }else if (!$(':input:radio[name=chk2]:checked').val()){
               alert("삐약삐약");
               return false;
           }else if($(":checkbox[name='chk3']:checked").length==0 ){
               alert("좋아하는 작가를 선택해 주세여.");
               return false;
           }else if($(":checkbox[name='chk4']:checked").length==0){
               alert("좋아하는 브랜드를 선택해 주세여.");
               return false;
           }else if( $("#hdnNone").val() != "hdnYES" ){
               alert("이메일 체크를 해주세여.");
               return false;
           }else{
                //if not null, that go to the databases!
                $.ajax({
                    type: "POST",
                    url: "/study/index.php/Board_control/Intsert_mem", 
                    data:({"pw" : pw , "p1" : quest1 , "p2" : chked_val2 , "p3" : chked_val3 , "p4" : chked_val4 , "type" : "B" , "mail" : $("#txtMail").val() }),
                    cache: false,
                    dataType: "text",
                    success: function(data){
                        //alert(data);
                        //return;
                        if(data == "0")
                        {
                            alert("회원가입이 완료되었습니다.");
                            $('#txtMail').empty();
                            $('#txtPw').empty();
                            $(':input:radio[name=chk2]:checked').empty();
                            $(":checkbox[name='chk3']:checked").empty();
                            $(":checkbox[name='chk4']:checked").empty();
                            location.href="/study/index.php/Board_control/home";
                            //location.reload(); 
                        }else{
                           alert("Wow Fail.");
                           return false;
                        }
                    }
                });
               //////////////
           }
        }

    </script>
</head>
<body>
  <div class="container">
   <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">WINDY</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="board_control/home">Home</a></li>
            <li><a href="board_control/about">About me</a></li>
            <li><a href="board_control/board_index">Board</a></li>
            <li class="active"><a href="board_control">Sign up</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">한: 한국에 살고 있는</a></li>
                <li><a href="#">지: 지현이는</a></li>
                <li><a href="#">현: 현재 몇명?</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Hello World</li>
                <li><a href="#">L : 에레이 </a></li>
                <li><a href="#">A : 에 가면 로건레먼 볼수 있나?</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="page-header">
        <span>mail : </span><input type="txt" id="txtMail" name="txtMail"> <button id="btnEnter" onclick="javascript:Enter1();">Check</button> &nbsp;<span id="hdnmail" name="hdnmail"></span> </br>
        </br>
        <span>P w : </span><input type="password" id="txtPw" name="txtPw"> 
        <p><input type="hidden" id="hdnNone" name="hdnNone" value="hdnNone"></p>
    </div>
    
    <!-- nonsense -->
    <p>잠깐!</p>
    <p><b>Question 1 : 인도는 지금 몇시일까요?</b></p>
    <div>
        <input type="txt" id="txtq1" name="txtq1">
    </div>
    
     <p><b>Question 2 : 병아리가 제일 잘 먹는 약은?<b/></p>
    <div>
        <input type="radio" id="chk2" name="chk2" value="A">에이약
        <input type="radio" id="chk2" name="chk2" value="B">비약
        <input type="radio" id="chk2" name="chk2" value="C">시약
        <input type="radio" id="chk2" name="chk2" value="D">디약
        <input type="radio" id="chk2" name="chk2" value="Bb">삐약
    </div>

    <p><b>Question 3 : 당신이 좋아하는 작가를 모두 선택하세요.</b></p>
     <div>
        <input type="checkbox" id="chk3" name="chk3" value="book1">박완서
        <input type="checkbox" id="chk3" name="chk3" value="book2">알랭드보통
        <input type="checkbox" id="chk3" name="chk3" value="book3">레프 톨스토이
        <input type="checkbox" id="chk3" name="chk3" value="book4">베르나르 베르베르
        <input type="checkbox" id="chk3" name="chk3" value="book5">김훈
        <input type="checkbox" id="chk3" name="chk3" value="book6">미겔데세르반테스
        <input type="checkbox" id="chk3" name="chk3" value="book7">하퍼 리
        <input type="checkbox" id="chk3" name="chk3" value="book8">도스토프예프스키
    </div>

    <p><b>Question 4 : 당신이 좋아하는 브랜드를 모두 선택하세요. </b></p>
    <div>
        <input type="checkbox" id="chk4" name="chk4" value="fav1">애플
        <input type="checkbox" id="chk4" name="chk4" value="fav2">구글
        <input type="checkbox" id="chk4" name="chk4" value="fav3">카카오
        <input type="checkbox" id="chk4" name="chk4" value="fav4">네이버
        <input type="checkbox" id="chk4" name="chk4" value="fav5">아디다스
        <input type="checkbox" id="chk4" name="chk4" value="fav6">샤넬
        <input type="checkbox" id="chk4" name="chk4" value="fav7">마이크로소프트
        <input type="checkbox" id="chk4" name="chk4" value="fav8">지마켓
    </div>
    <!-- nonsense -->
    <div style="padding-top: 20px;";>
        <button id="btnEnter" onclick="javascript:Enter2();">Create an account</button>
    </div>
</div>

<footer class="footer">
  <div class="container">
    <p class="text-muted">What up? my name is Windy. I like you. Do you like me? Have a nice DayXD Bye!</p>
  </div>
</footer>
<script src="../bootstrap/js/bootstrap.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
    
