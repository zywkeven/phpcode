Ext.onReady(function() {        

    String.prototype.trim = function() {
        return this.replace(/^\s+|\s+$/g,"");
    }

    // Get SessionId from cookie
    var PHPSESSIDX = null;
    var cookies = document.cookie.split(";");
    Ext.each(cookies, function(cookie) {
        var nvp = cookie.split("=");
        if (nvp[0].trim() == 'PHPSESSID')
            PHPSESSIDX = nvp[1];
    });
    
    var uploader = new Ext.ux.SwfUploadPanel({
            title: '上传测试'
        , renderTo: 'grid'
        , width: 800
        , height: 300

        // Uploader Params                
        , upload_url: 'upload_example.php'
//                , upload_url: 'http://localhost/www.silverbiology.com/ext/plugins/SwfUploadPanel/upload_example.php'
        , post_params: { PHPSESSIDX: PHPSESSIDX }
<?php
if (isset($_REQUEST['debug'])) print ", debug: true";
?>                
        , flash_url: "./flash/swfupload.swf"
//                , single_select: true // Select only one file from the FileDialog

        // Custom Params
        , single_file_select: false // Set to true if you only want to select one file from the FileDialog.
        , confirm_delete: false // This will prompt for removing files from queue.
        , remove_completed: false // Remove file from grid after uploaded.
    });

    uploader.on('swfUploadLoaded', function() { 
        this.addPostParam( 'Post1', 'example1' );
    });
    
    uploader.on('fileUploadComplete', function(panel, file, response) {
    });
    
    uploader.on('queueUploadComplete', function() {
        if ( Ext.isGecko ) {
            console.log("Files Finished");
        } else {
            alert("Files Finished");
        }
    });
                
    /*
    var btn = new Ext.Button({
            text: 'Launch Sample Uploader'
        , renderTo: 'btn'
        , handler: function() {

                var dlg = new Ext.ux.SwfUploadPanel({
                        title: 'Dialog Sample'
                    , width: 500
                    , height: 300
                    , border: false
    
                    // Uploader Params                
                    , upload_url: 'upload_example.php'
//                            , upload_url: 'http://localhost/www.silverbiology.com/ext/plugins/SwfUploadPanel/upload_example.php'
                    , post_params: { id: 123}
                    , file_types: '*.jpg'
                    , file_types_description: 'Image Files'
    <?php
            if (isset($_REQUEST[debug])) print ", debug: true";
    ?>                
                    , flash_url: "./flash/swfupload.swf"
    //                , single_select: true // Select only one file from the FileDialog
    
                    // Custom Params
                    , single_file_select: false // Set to true if you only want to select one file from the FileDialog.
                    , confirm_delete: false // This will prompt for removing files from queue.
                    , remove_completed: true // Remove file from grid after uploaded.
                }); // End Dialog

                var win = new Ext.Window({
                        title: 'Window'
                    , width: 513
                    , height: 330
                    , resizable: false
                    , items: [ dlg ]
                }); // End Window
                        
                win.show();
            
            } // End Btn Handler
                        
        }); // end Btn
        */
});