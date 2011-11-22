function swift_notice(seldata) {
    return '<p class="note"><span class="bg"> </span>'+ seldata + '</p>';
}
function swift_warning(seldata) {
    return '<p class="warning"><span class="bg"> </span>'+ seldata + '</p>';
}
function swift_question(seldata) {
    return '<p class="question"><span class="bg"> </span>'+ seldata + '</p>';
}
function swift_tip(seldata) {
    return '<p class="tip"><span class="bg"> </span>'+ seldata + '</p>';
}
function swift_button(seldata) {
    return '<div class="button">'+ seldata + '</div>';
}
function swift_download(seldata) {
    return '<div class="download"><span class="bg"> </span>'+ seldata + '</div>';
}

 
(function() {
    tinymce.create('tinymce.plugins.tinyplugin', {
 
        init : function(ed, url){
            ed.addButton('note', {
            title : 'Insert a note',
                onclick : function() {
            var sel = ed.selection.getContent();
                    ed.execCommand(
                    'mceInsertContent',
                    false,
                    swift_notice(sel)
                    );
                },
                image: url + "/note.png"
            });
			
			ed.addButton('tip', {
            title : 'Insert a Tip',
                onclick : function() {
            var sel = ed.selection.getContent();
                    ed.execCommand(
                    'mceInsertContent',
                    false,
                    swift_tip(sel)
                    );
                },
                image: url + "/tip.png"
            });
			
			ed.addButton('warning', {
            title : 'Insert a Warning',
                onclick : function() {
            var sel = ed.selection.getContent();
                    ed.execCommand(
                    'mceInsertContent',
                    false,
                    swift_warning(sel)
                    );
                },
                image: url + "/warning.png"
            });
			
			
			ed.addButton('question', {
            title : 'Insert a question',
                onclick : function() {
            var sel = ed.selection.getContent();
                    ed.execCommand(
                    'mceInsertContent',
                    false,
                    swift_question(sel)
                    );
                },
                image: url + "/question.png"
            });
			
			ed.addButton('button', {
            title : 'Insert a Button',
                onclick : function() {
            var sel = ed.selection.getContent();
                    ed.execCommand(
                    'mceInsertContent',
                    false,
                    swift_button(sel)
                    );
                },
                image: url + "/button.png"
            });
			
			ed.addButton('download', {
            title : 'Insert a Download Button',
                onclick : function() {
            var sel = ed.selection.getContent();
                    ed.execCommand(
                    'mceInsertContent',
                    false,
                    swift_download(sel)
                    );
                },
                image: url + "/download.png"
            });
			
			
			
        }
    });
 
    tinymce.PluginManager.add('tinyplugin', tinymce.plugins.tinyplugin);
 
})();

jQuery(function() {
jQuery( ".datepicker" ).datepicker({dateFormat: 'yy-mm-dd' });
});