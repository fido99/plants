<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
	<link rel="stylesheet" href="/css/main.css">
 

   <link rel="stylesheet" type="text/css" href="js/slick/slick.css"/>
   <link rel="stylesheet" type="text/css" href="js/slick/slick-theme.css"/>

	 <meta name="viewport" content="width=device-width, initial-scale=1">

   <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
   <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/slick/slick.min.js"></script>

 

   <!--
   <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script> 
   <script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.9.0/slick/slick.min.js"></script>
   -->
    
   
</head>
<body>
 <div id="app">
  <div class="form_modeal_wrapper">
   <div class="modal_close">x</div>
     <form action="#" method="POST" class="form_modal">
      <div class="form_true">true</div>
      <h3 class="form_model_zag it">Заказать звонок</h3>
      @csrf
      <input type="tel" name="phone" class="form_modal_item it" placeholder="Телефон">
      <input type="submit" class="btn_modal_form it">
     </form>
  </div>
 
 
	@include("components.header")
	 @yield("contnet")
	@include("components.footer")
 </div>
 
 
 
<script src="js/app.js"></script>
 
</body>
</html>

 