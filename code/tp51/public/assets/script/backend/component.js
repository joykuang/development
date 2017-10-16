App.vue('tinymce', {
    mounted: function() {
        tinymce.init({
            selector: '.' + this.target,
            //skin: 'lightgray',
            language_url: '/assets/script/tinymce.zh_CN.js',

            plugins: [
                'advlist autolink autosave link image lists charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern'
            ],

            toolbar1: 'bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect',
            toolbar2: 'searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor',
            toolbar3: 'table | hr removeformat | subscript superscript | charmap emoticons | ltr rtl | visualchars visualblocks nonbreaking template pagebreak restoredraft | fullscreen',
            content_css: [
                'https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                'https://www.tinymce.com/css/codepen.min.css'
            ],

            menubar: false,
            toolbar_items_size: 'small',

            style_formats: [{
                title: 'Bold text',
                inline: 'b'
            }, {
                title: 'Red text',
                inline: 'span',
                styles: {
                    color: '#ff0000'
                }
            }, {
                title: 'Red header',
                block: 'h1',
                styles: {
                    color: '#ff0000'
                }
            }, {
                title: 'Example 1',
                inline: 'span',
                classes: 'example1'
            }, {
                title: 'Example 2',
                inline: 'span',
                classes: 'example2'
            }, {
                title: 'Table styles'
            }, {
                title: 'Table row 1',
                selector: 'tr',
                classes: 'tablerow1'
            }],

            templates: [{
                title: 'Test template 1',
                content: 'Test 1'
            }, {
                title: 'Test template 2',
                content: 'Test 2'
            }],

            automatic_uploads: true,
            images_reuse_filename: true,
            images_upload_base_path: '',
            images_upload_url: '/api/test_upload',
            //image_advtab: true,
            image_title: true,
            image_dimensions: false,

            min_height: 540,
            relative_urls: false,
            //document_base_url: ''
            images_dataimg_filter: function(image) {
                console.log(image);
                return image.hasAttribute('internal-blob');
            }//,

            //file_browser_callback: function(field, url, type, win) {
            //    console.log(field, url, type, win);
            //}
        });
    }
});
