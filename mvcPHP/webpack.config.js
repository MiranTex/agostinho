const path = require('path');

let mode = 'development';

module.exports = {
    mode: mode,
    entry:"./assets/app.js",

    output:{
        path:path.resolve(__dirname,"static"),
        filename:"main.js"
    },

    resolve: {
        alias: {
            vue: 'vue/dist/vue.js'
        },
    },

    
    watch: mode == "development" ? true : false

}