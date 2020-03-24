( function( $ ) {

    jQuery(document).ready(function($){
        $(window).load(function() {

        $('.my-color-field').wpColorPicker();




        $(document).on('drag', '.iris-square-value', function() {
            if($('[data="checked" ]').attr( 'id' ) == 'radio-0' ){
                $("#_cb_info_bc").change();
                $("#_cb_info_fc").change();
                $("#_cb_info_lc").change();
                $("#_cb_info_lhc").change();
            }
        });






    $(document).on('change', '#_cb_info_bc', function() {
        v = $(this).val()
        $('.edit-post-visual-editor.editor-styles-wrapper').css({
            'background-color': v
        }) ;
    });
    $(document).on('change', '#_cb_info_fc', function() {
        v = $(this).val()
        $('.edit-post-visual-editor.editor-styles-wrapper').css({
            'color': v
        }) ;
    });
    $(document).on('change', '#_cb_info_lc', function() {
        v = $(this).val()
        $('.edit-post-visual-editor.editor-styles-wrapper a').css({
            'color': v
        }) ;
    });
    $(document).on('change', '#_cb_info_lhc', function() {
        v = $(this).val()
        $('.edit-post-visual-editor.editor-styles-wrapper a:hover').css({
            'color': v
        }) ;
    });
    $(document).on('click', '[name="_meta_info"]', function() {
        $('[name="_meta_info"]').attr('data','')
        $(this).attr('data','checked');

        $d = JSON.parse($(this).attr('data2'));

        $('.edit-post-visual-editor.editor-styles-wrapper a').css({
            'color': $d['lc']
        }) ;
        $('.edit-post-visual-editor.editor-styles-wrapper').css({
            'color': $d['fc']
        }) ;
        $('.edit-post-visual-editor.editor-styles-wrapper').css({
            'background-color': $d['bc']
        }) ;
        $('.edit-post-visual-editor.editor-styles-wrapper a:hover').css({
            'background-color': $d['lhc']
        }) ;

    });




            $d = JSON.parse($('[data="checked" ]').attr('data2'));

            $('.edit-post-visual-editor.editor-styles-wrapper a').css({
                'color': $d['lc']
            }) ;
            $('.edit-post-visual-editor.editor-styles-wrapper').css({
                'color': $d['fc']
            }) ;
            $('.edit-post-visual-editor.editor-styles-wrapper').css({
                'background-color': $d['bc']
            }) ;
            $('.edit-post-visual-editor.editor-styles-wrapper a:hover').css({
                'background-color': $d['lhc']
            }) ;


        });
    });
} )( jQuery );