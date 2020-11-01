<!DOCTYPE html>
<html>
<head>
 <title>{{ $title }}</title>
 <link rel="stylesheet" href="/css/main.css">
 <link rel="stylesheet" href="/css/owl.carousel.css">
 <link rel="stylesheet" href="/css/owl.theme.default.min.css">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
 <div id="app">
  <div class="modal_block" v-show="isModal">
   <form action="" method="POST" class="send_tell_from">
   	<span class="hide" v-on:click="isModal = !isModal">x</span>
    <h3>Заказать звонок</h3>
    <input type="tel" name="phone" class="tel_area" placeholder="Телефон" v-model="tel">
    <input type="submit" class="send" v-on:click="send">
   </form>
  </div>
  @include("components.header")
   @yield("contnet")
  @include("components.footer")
 </div>
 <script src="js/app.js"></script>
</body>
</html>

 