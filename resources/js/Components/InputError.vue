<<<<<<< HEAD
<script setup>
defineProps({
    message: {
        type: String,
    },
});
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>
||||||| parent of 4c2ead8 (add Pages)
=======
<script setup>
defineProps(['message']);
</script>

<template>
    <div v-show="message">
        <p class="text-sm text-red-600">
            {{ message }}
        </p>
    </div>
</template>
>>>>>>> 4c2ead8 (add Pages)
