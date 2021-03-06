$(document).ready(function() {
    $('.richtext-field').each(function() {
        var textarea = $(this);
        var height = "";
        if(textarea.attr("data-height"))
            height = 'data-height="' + textarea.attr("data-height") + '"';
        textarea.after(
            "<div id='" + textarea.attr("name") + "' class='tinymce-content richtext " +
            textarea.attr("class") + "' " + height + ">" + textarea.val() + "</div>");
        textarea.remove();
    });

    if($('.richtext-field').size() > 0)
        initTinymce();
});
function initTinymce() {
    tinymce.remove('div.tinymce-content');
    var firstEditorId = $('div.tinymce-content').attr('id');
    var settings = {
        selector: "div.tinymce-content",
        auto_focus: firstEditorId,
        body_class: "richtext",
        content_css: "/css/richtext.css",
        plugins: [
            "advlist autolink lists vidum_link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime table contextmenu paste",
            "save columns moxiemanager"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify columns | bullist numlist outdent indent | link image",
        menubar: "edit insert view format table tools",
        extended_valid_elements: "+div[class]",
        save_enablewhendirty: false,
        setup: function(editor) {
            editor.on('SaveContent', function(e) {
                var content = e.content;
                cleaned_content = content.replace(/<p>&nbsp;/g, '<p>');
                e.content = cleaned_content;
            });
        }

    };
    var height = $('div.tinymce-content').attr('data-height');
    if(height)
        settings.height = height;
    tinymce.init(settings);
}





