<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> New Document </TITLE>
<META NAME="Generator" CONTENT="EditPlus">
<META NAME="Author" CONTENT="">
<META NAME="Keywords" CONTENT="">
<META NAME="Description" CONTENT="">
<script>
/**//***   
    path 要显示值的对象id   
****/   
function browseFolder(path) {   
    try {   
        var Message = "\u8bf7\u9009\u62e9\u6587\u4ef6\u5939";  //选择框提示信息   
        var Shell = new ActiveXObject("Shell.Application");   
        //var Folder = Shell.BrowseForFolder(0, Message, 64, 17);//起始目录为：我的电脑   
  var Folder = Shell.BrowseForFolder(0,Message,0); //起始目录为：桌面   
        if (Folder != null) {   
            Folder = Folder.items();  // 返回 FolderItems 对象   
            Folder = Folder.item();  // 返回 Folderitem 对象   
            Folder = Folder.Path;   // 返回路径   
            if (Folder.charAt(Folder.length - 1) != "\\") {   
                Folder = Folder + "\\";   
            }   
            document.getElementById(path).value = Folder;   
            return Folder;   
        }   
    }   
    catch (e) {   
        alert(e.message);   
    }   
} 
</script>
</HEAD>
<BODY>
<input type="text" name="path" style="width:480px;"/>
<input type="button" onclick="browseFolder('path')"  value="选择生成路径" />
<input type="button" onclick="alert(123123)" value='test'/>
</BODY>
</HTML>