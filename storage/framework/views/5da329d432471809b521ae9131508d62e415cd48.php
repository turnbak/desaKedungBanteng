<?php $__env->startPush('scripts'); ?>
    <script type="text/javascript" src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            var default_font = "<?php echo e(setting('font_surat')); ?>"
            tinymce.init({
                selector: '.editor',
                style_formats: [{
                    title: 'Menjorok',
                    selector: 'p',
                    styles: {
                        'text-indent': '30px'
                    }
                }],
                style_formats_merge: true,
                table_sizing_mode: 'relative',
                height: "<?php echo e($height ?? 700); ?>",
                theme: 'silver',
                plugins: [
                    "advlist autolink lists charmap hr pagebreak",
                    "searchreplace wordcount visualblocks visualchars insertdatetime nonbreaking",
                    "table contextmenu directionality emoticons paste textcolor code responsivefilemanager salintemplate kodeisian",
                ],
                content_style: `body { font-family: ${default_font}; }`,
                toolbar1: "removeformat | bold italic underline subscript superscript | bullist numlist outdent indent lineheight | alignleft aligncenter alignright alignjustify | styleselect | fontselect fontsizeselect",
                toolbar2: "responsivefilemanager | salintemplate | kodeisian",
                image_advtab: true ,
                external_filemanager_path:"<?php echo e(base_url('assets/filemanager/')); ?>",
                filemanager_title:"Responsive Filemanager" ,
                filemanager_access_key:"<?php echo e($session->fm_key); ?>",
                external_plugins:
                {
                    "filemanager" : "<?php echo e(base_url('assets/filemanager/plugin.min.js')); ?>"
                },
                content_css: [
                    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                    '//www.tinymce.com/css/codepen.min.css'
                ],
                relative_urls: false,
                remove_script_host: false,
                entity_encoding: 'raw',
                forced_root_block: false,
                font_formats: "Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black; Bookman Old Style=bookman old style; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Tahoma=tahoma,arial,helvetica,sans-serif; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva;",
                setup: function(ed) {
                    ed.on('init', function(e) {
                        ed.execCommand("fontName", false, "${default_font}");
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\test1\resources\views/admin/pengaturan_surat/asset_tinymce.blade.php ENDPATH**/ ?>