<template>
  <publish-indicator :published="isPublished" :draft="isDraft" />
  <publish-button
    ref="publishButton"
    :draftId="field.id"
    :resourceClass="field.class"
    :resourceName="resourceName"
    v-if="!field.value"
  />
</template>

<script>
import { defineComponent, ref, computed, onMounted } from 'vue';
import PublishIndicator from './PublishIndicator';
import PublishButton from './PublishButton';
import { FormField, HandlesValidationErrors } from 'laravel-nova'

export default defineComponent({
  components: { PublishIndicator, PublishButton },
  props: {
    resourceName: {
      type: String,
      required: true,
    },
    field: {
      type: Object,
      required: true,
    },
  },

  mixins: [FormField, HandlesValidationErrors],

  setup(props) {
    const publishButtonEl = ref(null); // Referencja do przycisku publish

    const isDraft = computed(() => {
      return (
        !props.field.value ||
        (props.field.value && (props.field.childDraft || props.field.draftParent))
      );
    });

    const getDetailDeleteButton = () => {
        return document.querySelector('[dusk=content]').querySelector('.icon-action-toolbar-wrapper'); // Zmodyfikowane pod Nova 4
      };


    onMounted(() => {
      if (!props.field.value) {
        const deleteButton = getDetailDeleteButton();


        //TODO: Fix this

        // const publishButtonDom = publishButtonEl.value?.$el;

        // if (deleteButton && publishButtonDom.value) {
        //      deleteButton.parentNode.insertBefore(publishButtonDom.value, deleteButton); // Dodaj nowy przycisk
        // }
      }
    });

    return {
      isDraft,
      publishButtonEl,
    };
  },
});
</script>
