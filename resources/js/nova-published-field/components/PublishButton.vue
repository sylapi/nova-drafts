<template>
    <button type="button" v-on:click="publish" style="background-color: yellowgreen; color: black;">
        Publish Draft
    </button>
  </template>
<script>


export default {
  props: ['draftId', 'resourceClass', 'resourceName'],

  methods: {
    async publish() {

        try {
            const response = await Nova.request().post(`/nova-vendor/nova-drafts/draft-publish/${this.draftId}`, {
                class: this.resourceClass,
            });

            if (this.draftId === response.data.id) {
                window.location.reload();
            } else {
                Nova.visit(`/resources/${resourceName}/${response.data.id}`);
            }
            Nova.$toasted.show('publishSuccessToast', { type: 'success' });
        } catch (e) {
            console.error(e);
            Nova.$toasted.show('publishFailedToast', { type: 'error' });
        }
    },
  },

}
</script>
