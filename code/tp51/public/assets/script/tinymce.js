(function(tinyMCE, Joomla, window, document) {
    "use strict";
    window.getSize = window.getSize || function() {
        return {
            x: window.innerWidth,
            y: window.innerHeight
        }
    };
    window.jInsertEditorText = function(text, editor) {
        Joomla.editors.instances[editor].replaceSelection(text)
    };
    var JoomlaTinyMCE = {
        setupEditors: function(target) {
            target = target || document;
            var pluginOptions = Joomla.getOptions ? Joomla.getOptions("plg_editor_tinymce", {}) : Joomla.optionsStorage.plg_editor_tinymce || {},
                editors = target.querySelectorAll(".js-editor-tinymce");
            for (var i = 0, l = editors.length; i < l; i++) {
                var editor = editors[i].querySelector("textarea");
                this.setupEditor(editor, pluginOptions)
            }
        },
        setupEditor: function(element, pluginOptions) {
            var name = element ? element.getAttribute("name").replace(/\[\]|\]/g, "").split("[").pop() : "default",
                tinyMCEOptions = pluginOptions ? pluginOptions.tinyMCE || {} : {},
                defaultOptions = tinyMCEOptions["default"] || {},
                options = tinyMCEOptions[name] ? tinyMCEOptions[name] : defaultOptions;
            if (options.joomlaMergeDefaults) {
                options = Joomla.extend(Joomla.extend({}, defaultOptions), options)
            } else {
                options = Joomla.extend({}, options)
            }
            if (element) {
                options.selector = null;
                options.target = element
            }
            if (options.joomlaExtButtons && options.joomlaExtButtons.names && options.joomlaExtButtons.names.length) {
                options.toolbar1 += " | " + options.joomlaExtButtons.names.join(" ");
                var callbackString = options.joomlaExtButtons.script.join(";");
                options.setupCallbackString = options.setupCallbackString || "";
                options.setupCallbackString = options.setupCallbackString + ";" + callbackString;
                options.joomlaExtButtons = null
            }
            if (options.setupCallbackString && !options.setup) {
                options.setup = new Function("editor", options.setupCallbackString)
            }
            var ed = new tinyMCE.Editor(element.id, options, tinymce.EditorManager);
            ed.render();
            Joomla.editors.instances[element.id] = {
                getValue: function() {
                    return this.instance.getContent()
                },
                setValue: function(text) {
                    return this.instance.setContent(text)
                },
                replaceSelection: function(text) {
                    return this.instance.execCommand("mceInsertContent", false, text)
                },
                id: element.id,
                instance: ed,
                onSave: function() {
                    if (this.instance.isHidden()) {
                        this.instance.show()
                    }
                    return ""
                }
            };
            document.getElementById(ed.id).form.addEventListener("submit", function() {
                Joomla.editors.instances[ed.targetElm.id].onSave()
            })
        }
    };
    Joomla.JoomlaTinyMCE = JoomlaTinyMCE;
    document.addEventListener("DOMContentLoaded", function() {
        Joomla.JoomlaTinyMCE.setupEditors();
        if (window.jQuery) {
            jQuery(document).on("subform-row-add", function(event, row) {
                Joomla.JoomlaTinyMCE.setupEditors(row)
            })
        }
    })
})(tinyMCE, Joomla, window, document);
