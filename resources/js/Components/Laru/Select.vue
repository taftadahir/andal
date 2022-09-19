<script setup>
    defineProps(['modelValue', 'id']);
    
    defineEmits(['update:modelValue']);
    </script>
    
    <template>
      <select
          :id="id"
          v-model="modelValue"
          class="w-full p-4 bg-primary-50 dark:bg-black-600 border border-transparent dark:border-transparent focus:border-primary-500 dark:focus:border-primary-500 text-black-500 dark:text-primary-50 placeholder-black-300 dark:placeholder-white-600 caret-current transition ease-in-out duration-150 focus:outline-none mt-2"
          @input="$emit('update:modelValue', $event.target.value)"
      >
        <option :value="null" selected>--- Select an option ---</option>
        <slot/>
      </select>
    </template>
    