<template>
    <swiper
      :effect="'coverflow'"
      :grabCursor="true"
      :slidesPerView="'auto'"
      :autoplay="{
        delay: 2500,
        disableOnInteraction: false,
    }"
      :coverflowEffect="{
        rotate: 90,
        stretch: 0,
        depth: 100,
        modifier: 1,
      }"
      :pagination="true"
      :modules="modules"
    >
      <swiper-slide v-for="client in clients">
        <img class="object-cover object-center rounded" height="200"
        width="300" 
          :src="client.imageFullPath"/></swiper-slide
>
    </swiper>
  </template>
  <script>
  // Import Swiper Vue.js components
  import {Swiper, SwiperSlide } from "swiper/vue";
  
  // Import Swiper styles
  import "swiper/css";
  
  import "swiper/css/effect-coverflow";
  import "swiper/css/pagination";
  
  
  // import required modules
  import {Autoplay, EffectCoverflow, Pagination } from "swiper";
  
  export default {
    components: {
      Swiper,
      SwiperSlide,
    },
    props:{
        clients: Array
    },
    setup() {
      return {
        modules: [Autoplay, EffectCoverflow, Pagination],
      };
    },
  };
  </script>
  <style scoped>
    #app { height: 100% }
html,
body {
  position: relative;
  height: 100%;
}

body {
  background: #eee;
  font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
  font-size: 14px;
  color: #000;
  margin: 0;
  padding: 0;
}

.swiper {
  width: 100%;
}

.swiper-slide {
  background-position: center;
  background-size: cover;
  width: 300px;
  height: 200px;
}

.swiper-slide img {
  display: block;
  width: 100%;
}

  </style>