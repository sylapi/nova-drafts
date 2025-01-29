<template>
    <div>
        <span v-if="published">Published</span>
        <span v-if="draft">Draft</span>
    </div>
</template>

<script>
export default {
    props: ['published', 'draft'],
}
</script>
