 
<div class="menu_media_wrapper">
 
 <nav class="menu_media">
  <a href="#">home</a>
  <a href="#">about us</a>
  <a href="#">pricing</a>
  <a href="#">contact us</a>
  <a href="#" class="btn_start">get started</a> 
  <div class="close">x</div>
 </nav>

</div>
 
<section class="section_header">
<div class="shodow"></div>
<header class="header_block">
  <div class="wrapper">
   <div class="menu_block">
    <div class="header_left_panel">
     <div class="logo">
      <img src="storage/folder/<?php echo $logo ?>" alt="error logo">
     </div>
     <div class="header_left_panel_line"></div>
     <div class="header_right_panel_email">
       <a href="#" class="mail">152433256zx@gmail.com</a>
     </div>
    </div>

    <nav class="menu">
	    <a href="#">home</a>
	    <a href="#">about us</a>
	    <a href="#">pricing</a>
	    <a href="#">contact us</a>
	    <a href="#" class="btn_start">get started</a> 
	  </nav>
   </div>
  </div>
</header>
 
<div class="header_media">
 <div class="panel_header_media_top">
  <div class="logo_media_block">
   <img src="images/logo.png" alt="error logo">
  </div>

  <div class="btn_show_media_menu">&#8801;</div>
 </div>
</div>
 
 

<div class="slider_wrapper">
 @foreach ($slider as $item)
  <div class="slide_item" style="background: url(storage/folder/<?php echo $item->image ?>); background-size: cover; z-index:1" >
    <div class="slide_text_content">
     <h2>{{ $item->zag }}</h2>
     <p><?php echo  html_entity_decode($item->title) ?></p>
     <a href="<?php echo $item->link ?>">Learn More</a>
    </div>
  </div>
 @endforeach
 </div>
 
 

 
 
<!-- <slider-component slide-date="{{ $slider }}"></slider-component> -->

</section>