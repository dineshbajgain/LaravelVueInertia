<template>
    <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Projects</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base">We are one of the rapidly growing tech company in kathmandu. We make use of some of the latest techonologies and development approaches. </p>
    </div>
    <div class="flex flex-wrap -m-4">
      <div data-aos="zoom-out" class="lg:w-1/4 sm:w-1/2 p-4" v-for="project in projects">
        <div class="flex relative">
          <img alt="gallery" class="absolute inset-0 w-full h-full object-cover object-center" :src="project.imageFullPath">
          <div class="px-8 py-10 relative z-10 w-full border-4 border-gray-200 bg-white opacity-0 hover:opacity-100">
            <h1 class="tracking-widest text-lg title-font font-medium text-indigo-500 mb-1">{{project.title}}</h1>
            <p class="leading-relaxed line-clip" v-html="project.body"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</template>
<script >
    import Layout from '../Components/Shared/Layout.vue';
    export default{
        layout: Layout,
        props:{
        projects: Array
    }}
    </script>