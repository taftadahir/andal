<script setup>
    import { onMounted, ref } from 'vue';
    
    defineProps({
      'modelValue': {},
    });
    
    const textarea = ref(null);
    
    onMounted(() => {
      if (textarea.value.hasAttribute('autofocus')) {
        textarea.value.focus();
      }
    });
    
    defineEmits(['update:modelValue']);
    </script>
    
    <template>
        <textarea
            ref="textarea"
            :value="modelValue"
            class="w-full min-h-fit px-4 bg-primary-50 dark:bg-black-600 border border-transparent dark:border-transparent focus:border-primary-500 dark:focus:border-primary-500 text-black-500 dark:text-primary-50 placeholder-black-300 dark:placeholder-white-600 focus:outline-none no-scrollbar transition duration-150 ease-in-out"
            cols="30"
            rows="4"
            @input="$emit('update:modelValue', $event.target.value)"
        ></textarea>
    </template>