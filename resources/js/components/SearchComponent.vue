<template>
 <div class="wrapper">
  <h3 class="search_zag">Поиск:</h3>
  <form action="" method="POST" class="form_search_block">
   <input type="text" name="search" class="text_input" placeholder="search">
  </form>
  <ul class="search_result">
   <li v-for="plant in plants" v-text="plant.name"></li>
  </ul>
 </div>
</template>

<script>
 export default {
   mounted() {
    console.log('slider created');
   },

   data() {
   	return {
   	 plants: [{name: 'palnts'}]
   	}
   }
  }

</script>