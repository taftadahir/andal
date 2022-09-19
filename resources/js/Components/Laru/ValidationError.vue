<script setup>
    import { computed } from 'vue';
    import { usePage } from '@inertiajs/inertia-vue3';
    
    const props = defineProps({
      input: {
        type:String,
        required: true,
      }
    });
    
    const errors = computed(() => usePage().props.value.errors);
    
    const hasError = computed(() => Object.keys(errors.value).includes(props.input));
    </script>
    
    <template>
      <span v-if="hasError" class="block text-error-500 text-base"> {{ errors[props.input] }} </span>
    </template>