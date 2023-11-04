
<div class="footer mt-5">

</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="{{ mix('/admin-assets/js/app.js') }}"></script>

<script src="{{ asset('/admin-assets/plugins/tinymce/js/tinymce/tinymce.min.js') }}"></script>



<script>
    var editor_config = {
        path_absolute : "{{ URL::to('/') }}/",
        selector: "textarea.my-editor",
        height : "500",
        language: 'ru',
        themes: 'advanced',
        skin: 'light',

        fontsize_formats: '8px 9px 10px 11px 12px 14px 16px 18px 20px 22px 24px 26px 28px 36px 48px 72px',
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect| fontsizeselect | bold italic | forecolor | backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('textarea')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('textarea')[0].clientHeight;
            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }
            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };
    tinymce.init(editor_config);
</script>

{{--<script>--}}
{{--    $(function () {--}}
{{--        $('[data-toggle="tooltip"]').tooltip()--}}
{{--    })--}}
{{--</script>--}}
{{--<script>--}}
{{--    $(function () {--}}
{{--        $('[data-toggle="popover"]').popover({--}}
{{--            html: true--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}


{{--<script>--}}
{{--    $('.datepicker').datepicker({--}}
{{--        format: 'dd/mm/yyyy',--}}
{{--        language: 'ru'--}}
{{--    });--}}
{{--</script>--}}


{{--<script>--}}
{{--    $('ul.nav li.dropdown').hover(function() {--}}
{{--    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);--}}
{{--    }, function() {--}}
{{--    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);--}}
{{--    });--}}
{{--</script>--}}

{{--<script> $('div.flash-message').delay(3000).slideUp(500);</script>--}}

</body>
</html>
