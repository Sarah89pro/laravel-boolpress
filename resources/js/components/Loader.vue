<template>
  
</template>

<script>
export default {
    name: 'Loader'

}
</script>

<style>


.scale-up-center {
	        animation: scale-up-center 1s cubic-bezier(0.390, 0.575, 0.565, 1.000) infinite both;
}

@keyframes scale-up-center {

    0% {
        transform: scale(0.5);
        }

    100% {
        transform: scale(1);
        }
}
</style>