<template>
    <div>
      <p style="background-color: chocolate; color: aliceblue;">{{ field.text }} !!!!!!!</p>
    </div>
  </template>

  <script>

import { FormField, HandlesValidationErrors } from 'laravel-nova'

  export default {
    props: ['field'], // Nova automatycznie przekazuje dane pola jako "field".
    mixins: [FormField, HandlesValidationErrors],
    setup(props) {
        const fill = (formData) => {};

        return {
          fill
        };
    },

  };
  </script>

  <style>
  /* Dodaj swoje style tutaj, jeśli potrzebujesz */
  </style>
