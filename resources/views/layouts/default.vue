<script setup lang="ts">
// This is a persistent layout
// Include me with <template layout="default" />
import NavBar from '../components/navbar.vue'

import { defineProps } from 'vue'
defineProps({
    'auth': Object
})
</script>

<template>
	<NavBar v-if="auth.user" :user="auth.user"></NavBar>

	<!-- <div class="wrapper py-8"> -->
        <slot />
    <!-- </div> -->
</template>
