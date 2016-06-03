<!Doctype html>
<html>
<head>
    <title>Board_list</title>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap -->
    <script src="../../bootstrap/js/jquery-1.12.2.min.js"></script>
    <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../bootstrap/css/sticky-footer-navbar.css" rel="stylesheet">
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>

</head>
<body>

   <!-- Fixed navbar -->
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
            <li><a href="../board_control/home">Home</a></li>
            <li><a href="../board_control/about">About me</a></li>
            <li  class="active"><a href="../board_control/board_index">Board</a></li>
            <li><a href="../board_control">Sign up</a></li>
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

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>Notice</h1>
      </div>
      <table border="1" style="width:500px; height:70px;">
        <tr>
            <td>번호</td>
            <td>제목</td>
            <td>작성자</td>
            <td>작성일</td>
            <td>조회</td>
        </tr>
        <?php
             foreach($List as $entry){
         ?>
        <tr>
            <td><?=$entry->seq?></td>
            <td><a href="#"><?=$entry->title?></a></td>
            <td><?=$entry->name?></td>
            <td><?=$entry->sdate?></td>
            <td><?=$entry->cnt?></td>
        </tr>
        <?
            }
        ?>
      </table>
       

    

    </div>

    
