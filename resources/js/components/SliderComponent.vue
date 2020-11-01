<template>

 <div class="owl-carousel slider">
  <div class="item" v-for="slide in slider" v-bind:style="{ 'background-size': 'cover', 'backgroundImage': 'url(/storage/' + slide.image +')' }">
    <div class="item_slide_text">
     <h1 v-text="slide.text" style="color: #fff"></h1>

    </div>
  </div>
 </div>

</template>

<script>
 // import carousel from 'vue-owl-carousel';
 export default {
  // components: { carousel },
 
  props: ['urldata'],
  mounted() {
   console.log(this.urldata);
   this.slider = this.urldata;
  },
  data() {
   return {
   	slider: []
   }
  },

  methods: {
   showSlide() {
    console.log(this.urldata);
   }
  }
 }

 
 

</script>