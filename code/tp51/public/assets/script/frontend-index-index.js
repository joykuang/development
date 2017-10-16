(function(win, $, Vue, UIkit) {

    var debug = Vue.config.devtools;
    var app = { version: '0.7.9.27 beta' }, vueData = {}, vueComponents = {};

    function db(key, value) {
        if (typeof localStorage === 'undefined') {
            throw 'Command Not Found: LocalStorage was not supported.'
            return false;
        }
        if (typeof value === 'undefined') return localStorage.getItem('YRS_' + key);
        return localStorage.setItem('YRS_' + key, value);
    }

    function setVue() {
        return new Vue({
            el: '#app',
            data: vueData,
            methods: {},
            mounted: mounted
        });
    }

    function mounted() {

    }

    function setVueData(name, value) {
        if (value == undefined) return (typeof vueData[name] === 'undefined') ? undefined : vueData[name];
        vueData[name] = value;
    }

    function setVueComponent(component, define) {
        if (define == undefined) return (typeof vueComponents[component] === 'undefined') ? undefined : vueComponents[component];
        vueComponents[component] = define;
    }

    app.set = setVueData;

    app.vue = setVueComponent;

    app.run = function() {

        $(function() {

            var component = $('[data-vue]');

            component.each(function(id) {
                var el = this;
                var name = $(el).data('vue'),
                prop = $(el).data('prop'),
                props = [];

                if (prop != undefined && typeof prop === 'string') {
                    prop = prop.replace(/\s/g, '');
                    props = prop.split(',');
                }

                var define = {
                    template: $.trim($(el).html())
                };

                if (props.length) define.props = props;

                if (typeof vueComponents[name] === 'object') {
                    define = $.extend(define, vueComponents[name]);
                }

                Vue.component(name, define);

                debug && console.log('%c[Load] Vue Component <%s>', 'background-color: #000; color: #ffeb3b', name);
            });

            this.app = setVue();
        });

    };

win.db = db;
win.App = app;

})(window, jQuery, Vue, UIkit)
