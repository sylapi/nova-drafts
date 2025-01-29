<template>
    <button
      v-if="field.isUnpublishable"
      ref="unpublishButton"
      type="button"
      @click="unpublish"
      style="background-color: red;"
    >
      Unpublish
    </button>
  </template>

  <script>
  import { ref, onMounted } from 'vue';
  import UnpublishesModels from '../../mixins/UnpublishesModels';
  import { FormField, HandlesValidationErrors } from 'laravel-nova'

  export default {
    props: ['resource', 'resourceId', 'field', 'resourceName'],
    mixins: [UnpublishesModels, FormField, HandlesValidationErrors],
    setup(props) {
      const unpublishButton = ref(null);

      const getDetailDeleteButton = () => {
        return document.querySelector('[dusk=content]').querySelector('.icon-action-toolbar-wrapper');
      };


      onMounted(() => {
        console.log('nova-unpublish-button: mounted');


        console.log('isUnpublishable', props.field.isUnpublishable);

        if (props.field.isUnpublishable) {
          const deleteButton = getDetailDeleteButton();

            console.log(unpublishButton.value);

          if (deleteButton && unpublishButton.value) {
            deleteButton.parentNode.insertBefore(unpublishButton.value, deleteButton); // Dodaj nowy przycisk
          }
        }
      });

      return {
        unpublishButton,
      };
    },
  };
  </script>
