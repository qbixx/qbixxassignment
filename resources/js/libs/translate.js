import store from '../store'
export const translate = (data, key, isLocal = false) => {
  const lang = store.state.selectedLanguage
  if (isLocal) {
    return resolve(key, data[lang.key])
  } else {
    if (Object.keys(data).length > 0) {
      key = `${key}_${lang.key}`
      if (typeof data[key] !== 'undefined') {
        return data[key]
      }
    }
  }
  return ''
}

function resolve (path, obj) {
  return path.toLowerCase().split('.').reduce(function (prev, curr) {
    return prev ? prev[curr] : null
  }, obj || self)
}