<template>
    <div>
      <button
        ref="createNovaDraftButton"
        type="button"
        id="create-draft-button"
        style="background-color: indianred; color: black;"
        @click="createDraft"
        v-if="!field.isDraft"
      >
       createDraftButtonText
      </button>

      <input name="draft" v-model="draft" type="hidden" />

    </div>
  </template>

  <script>
  import { defineComponent, ref, computed, onMounted, nextTick } from 'vue';
  import { FormField, HandlesValidationErrors } from 'laravel-nova'

  export default defineComponent({
    props: {
      resource: {
        type: String,
        required: true,
      },
      resourceId: {
        type: [String, Number],
        required: true,
      },
      field: {
        type: Object,
        required: true,
      },
    },

    mixins: [FormField, HandlesValidationErrors],

    methods: {
        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            this.fillIfVisible(formData, this.fieldAttribute, this.value || '')
        },
    },

    setup(props) {
      const draft = ref(false);
      const postId = computed(() => props.resourceId);

      const createNovaDraftButton = ref(null);

      const actionButton = computed(() => {
        const contentEl = document.querySelector('[dusk=content]');
        const duskSelector = props.resourceId ? 'update-button' : 'create-button';
        return contentEl?.querySelector(`[dusk="${duskSelector}"]`);
      });

      const createDraft = () => {

        draft.value = true;

        nextTick(() => {
          if (actionButton.value) {
            actionButton.value.click();
          }
        });
      };

      const positionDraftButton = () => {
        if (!props.field.isDraft && actionButton.value && createNovaDraftButton.value) {
          const existingDraftButton = actionButton.value.parentNode.querySelector('#create-draft-button');

          if (existingDraftButton && existingDraftButton !== createNovaDraftButton.value) {
            existingDraftButton.remove();
          }

          actionButton.value.parentNode.appendChild(createNovaDraftButton.value);
        }
      };

      onMounted(() => {
        positionDraftButton();
      });

      return {
        draft,
        postId,
        createDraft,
        createNovaDraftButton,
        actionButton,
      };
    },
  });
  </script>
