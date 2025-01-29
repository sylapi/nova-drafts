<template>
  <publish-indicator :published="isPublished" :draft="isDraft" />
</template>

<script>
import PublishIndicator from './PublishIndicator';
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default {
  components: { PublishIndicator },
  props: ['resourceName', 'field'],
  mixins: [FormField, HandlesValidationErrors],
  computed: {

    isPublished() {
      return !!this.field.value || !!this.field.draftParent;
    },

    isDraft() {
      return !this.field.value || (this.field.value && (this.field.childDraft || this.field.draftParent));
    },
  }
}
</script>
