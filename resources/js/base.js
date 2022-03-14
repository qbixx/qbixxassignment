module.exports = {
    methods: {
        __(key, replace = {}, lang = null) {
            var translation = this.$page.props.language[key]
                ? this.$page.props.language[key]
                : key

            if(lang) {
                translation = this.$page.props.languages[lang][key]
            }
            Object.keys(replace).forEach(function (key) {
                translation = translation.replace(':' + key, replace[key])
            });
            return translation
        },
    },
}