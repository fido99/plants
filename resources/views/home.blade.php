@extends("layouts.main")

 @section("contnet")
 
 <div class="wrapper">
  <main class="contnet">
    <div class="contnet_header">
     <h3>Best of our features</h3>
     <div class="contnet_header_line"></div>
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
       Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
   </div>

   <div class="items_block">
    <div class="item">
      <div class="img_icon_block">
       <img src="images/item1.png" alt="">
      </div>
      <div class="items_block_zag">Ionicons</div>
      <p class="items_block_text">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean eu leo quam. Pellentesque ornare sem.</p>

    </div>

    <div class="item">
      <div class="img_icon_block">
       <img src="images/item2.png" alt="">
      </div>
      <div class="items_block_zag">Creative Design</div>
      <p class="items_block_text">Maecenas faucibus mollis interdum. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>

    </div>

    <div class="item">
      <div class="img_icon_block">
       <img src="images/item3.png" alt="">
      </div>
      <div class="items_block_zag">Photoshop and Sketch</div>
      <p class="items_block_text">Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>

    </div>
   </div>


  </main>
</div>
 @endsection