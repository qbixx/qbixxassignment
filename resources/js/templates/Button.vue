<template>
  <button :type="type" :class="classes" :disabled="disabled"
          class="inline-flex items-center whitespace-nowrap justify-center px-4 py-2 border border-transparent font-semibold text-base text-white tracking-tight focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition">
    <slot></slot>
  </button>
</template>

<script>
export default {
  props: {
    type: {
      type: String,
      default: 'submit'
    },
    size: {
      type: String,
      default: ''
    },
    buttonStyle: {
      type: String,
      default: 'primary'
    },
    shape: {
      type: String,
      default: 'rounded'
    },
    disabled: {
      type: Boolean,
      default: false
    }
  },
  computed: {
    btnStyle () {
      let style = 'bg-blue-500 hover:bg-blue-700 active:bg-blue-900 focus:ring-blue-300'
      switch (this.buttonStyle) {
        case 'primary':
          style = 'bg-blue-500 hover:bg-blue-700 active:bg-blue-900 focus:ring-blue-300'
          break
        case 'success':
          style = 'bg-green-500 hover:bg-green-700 active:bg-green-900 focus:ring-green-300'
          break
        case 'danger':
          style = 'bg-red-500 hover:bg-red-700 active:bg-red-900 focus:ring-red-300'
          break
        case 'warning':
          style = 'bg-yellow-500 hover:bg-yellow-700 active:bg-yellow-900 focus:ring-yellow-300'
          break
        case 'default':
          style = 'bg-gray-500 hover:bg-gray-700 active:bg-gray-900 focus:ring-gray-300'
          break
      }
      return style
    },
    classes () {
      return this.size + ' ' + this.btnStyle + ' ' + this.shape
    }
  }
}
</script>