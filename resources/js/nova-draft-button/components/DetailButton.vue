<template>
    <button
      type="button"
      v-if="isDraft"
      ref="deleteNovaDraftButton"
      @click="discard"
      style="background-color: pink; color: #000;"
    >
        Discard Draft
    </button>
  </template>

  <script>
  import { ref, computed, onMounted, nextTick } from 'vue';
  import { FormField, HandlesValidationErrors } from 'laravel-nova'

  export default {
    props: ['resource', 'resourceId', 'field', 'resourceName'],
    mixins: [FormField, HandlesValidationErrors],
    setup(props) {
      const deleteNovaDraftButton = ref(null);

      const getDetailDeleteButton = () => {
        return document.querySelector('[dusk=content]').querySelector('.icon-action-toolbar-wrapper'); // Zmodyfikowane pod Nova 4
      };

      const isDraft = computed(() => props.field.isDraft);

      const discard = () => {
        // Nova.request()
        //   .delete(`/nova-api/${props.resourceName}/${props.resourceId}`)
        //   .then(() => {
        //     Nova.success('Draft discarded successfully.');
        //     Nova.visit(`/resources/${props.resourceName}`);
        //   })
        //   .catch((error) => {
        //     console.error('Error discarding draft:', error);
        //     Nova.error('Failed to discard draft.');
        //   });
        alert('Discard draft');
      };

      onMounted(() => {
        if (isDraft.value) {
          const deleteButton = getDetailDeleteButton();
          console.log(deleteButton);
          if (deleteButton) {
            deleteButton.style.display = 'none'; // Ukryj przycisk usuwania
            deleteButton.parentNode.insertBefore(deleteNovaDraftButton.value, deleteButton); // Dodaj nowy przycisk
          }
        }
      });

      nextTick(() => {
        if (props.field.childDraft && props.field.childDraft.id) {
          Nova.visit(`/resources/${props.resourceName}/${props.field.childDraft.id}`);
        }
      });

      return {
        discard,
        isDraft,
        deleteNovaDraftButton,
      };
    },
  };
  </script>
