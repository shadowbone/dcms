<template>
  <div id="app">
    <transition name="slide-fade">
    <router-view></router-view>
    </transition>
  </div>
</template>

<script>
export default {
  name: 'app',
}
</script>

<style>
.slide-fade-enter-active {
  transition: all .0s ease;
}

</style>