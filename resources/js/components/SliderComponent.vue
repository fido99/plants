<template>
 <div>
  <slot></slot>
 </div>
 <!--
 <div class="owl-carousel slider">
  <div class="item" v-for="slide in slider">

  </div>
 </div>
-->
</template>

<script>
 export default {
  created() {
   let url = '/api/slider/get';
   axios.get(url)
    .then((data) => {
     console.log(data.data);
     this.slider = data.data;
    });
  },
  data() {
   return {
   	slider: []
   }
  }
 }

 
 

</script>