<template>
    <div>
    <button
      v-if="field.isUnpublishable"
      ref="unpublishButton"
      type="button"
      @click="unpublish"
      style="background-color: yellow;"
    >
      >> |{{ field.name }}| <<
    </button>
</div>
  </template>

  <script>
  import { defineComponent, ref, onMounted } from 'vue';
  import UnpublishesModels from '../../mixins/UnpublishesModels';
  import { FormField, HandlesValidationErrors } from 'laravel-nova'

  export default defineComponent({
    props: {
      resource: {
        type: Object,
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
      resourceName: {
        type: String,
        required: true,
      },
    },

    mixins: [UnpublishesModels, FormField, HandlesValidationErrors],

    setup(props) {
        const unpublishButton = ref(null);

      onMounted(() => {
        const formHeading = document.querySelector('[dusk=content]').querySelector('[dusk=undefined-heading]')

        if (formHeading && unpublishButton.value) {
          formHeading.style.display = 'flex';
          formHeading.style['align-items'] = 'center';
          formHeading.append(unpublishButton.value);
        }
      });

      const fill = (formData) => {};

      return {
        unpublishButton,
        fill
      };
    },
  });
  </script>

  <style>
  form h1 > *:first-child {
    margin-left: auto;
  }

  form h1 > *:last-child {
    margin-right: 0;
    margin-left: 0;
  }
  </style>
