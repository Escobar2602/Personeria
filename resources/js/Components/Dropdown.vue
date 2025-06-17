<template>
  <div class="relative" ref="dropdownRef">
    <!-- Trigger -->
    <div @click="open = !open">
      <slot name="trigger" />
    </div>

    <!-- Fondo oscuro overlay -->
    <div
      v-if="open"
      class="fixed inset-0 z-40 bg-black bg-opacity-30"
      @click="open = false"
    />

    <!-- Dropdown panel con animación -->
    <transition
      enter-active-class="transition ease-out duration-200"
      enter-from-class="transform opacity-0 scale-95"
      enter-to-class="transform opacity-100 scale-100"
      leave-active-class="transition ease-in duration-75"
      leave-from-class="transform opacity-100 scale-100"
      leave-to-class="transform opacity-0 scale-95"
    >
      <div
        v-if="open"
        class="absolute z-50 mt-2 rounded-md shadow-lg"
        :class="[widthClass, alignmentClasses]"
      >
        <div
          class="rounded-md ring-1 ring-black ring-opacity-5 bg-white"
          :class="contentClasses"
        >
          <slot name="content" />
        </div>
      </div>
    </transition>
  </div>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue'

const open = ref(false)
const dropdownRef = ref(null)

const props = defineProps({
  widthClass: {
    type: String,
    default: 'w-48'
  },
  alignmentClasses: {
    type: String,
    default: 'right-0'
  },
  contentClasses: {
    type: String,
    default: ''
  }
})

// Cierre al hacer clic fuera del dropdown
function handleClickOutside(event) {
  if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
    open.value = false
  }
}

onMounted(() => {
  document.addEventListener('click', handleClickOutside)
})

onBeforeUnmount(() => {
  document.removeEventListener('click', handleClickOutside)
})
</script>
