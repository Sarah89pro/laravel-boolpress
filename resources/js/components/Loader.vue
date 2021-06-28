<template>
<div class="expand">
    LOADING
</div>
  
</template>

<script>
export default {
    name: 'Loader'

}
</script>

<style>


.expand {
	        animation: expand 0.7s cubic-bezier(0.215, 0.610, 0.355, 1.000) infinite both;
}


@keyframes expand {
  0% {
    letter-spacing: -0.5em;
    opacity: 0;
  }
  40% {
    opacity: 0.6;
  }
  100% {
    opacity: 1;
  }
}

</style>