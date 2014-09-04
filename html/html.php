  <ADDRESS>This text will be italic.此文本将以斜体显示。</ADDRESS> 
  <P>He said,<BLOCKQUOTE>"Hi there!"</BLOCKQUOTE></P>
  <TABLE>

<CAPTION VALIGN=BOTTOM>

This caption will appear below the table.

</CAPTION>

<TBODY>

<TR>

<TD>

This text is inside the table.

</TD>

</TR>

</TBODY>

</TABLE>

<CODE>Here is some text in a small, fixed-width font.</CODE>

<BODY>

<TABLE BORDER="2" RULES="groups">

<!-- RULES is set to "groups", which has no effect in this sample. For this 

attribute to work, you must use COLSPAN to define the groups of columns.-->

<COL SPAN="2" STYLE="color:red">

<COL STYLE="color:blue">

<TR>

<TD>This column is in the first group.</TD>

<TD>This column is in the first group.</TD>

<TD>This column is in the second group.</TD>

</TR>

<TR>

<TD>This column is in the first group.</TD>

<TD>This column is in the first group.</TD>

<TD>This column is in the second group.</TD>

</TR>

</TABLE>

</BODY>

<BODY>

<TABLE BORDER="2" RULES="groups">

<!-- RULES is set to "groups", which places internal dividing lines around 

table columns defined by COLGROUP. -->

<COLGROUP SPAN="2" STYLE="color:red">

</COLGROUP>

<COLGROUP STYLE="color:blue">

</COLGROUP>

<TR>

<TD>This column is in the first group.</TD>

<TD>This column is in the first group.</TD>

<TD>This column is in the second group.</TD>

</TR>

<TR>

<TD>This column is in the first group.</TD>

<TD>This column is in the first group.</TD>

<TD>This column is in the second group.</TD>

</TR>

</TABLE>

</BODY>
           <dl>

<dt>野生动物</dt>

<dd>所有非经人工饲养而生活于自然环境下的各种动物。</dd>

<dt>宠物</dt>

<dd>指猫、狗以及其它供玩赏、陪伴、领养、饲养的动物，又称作同伴动物。</dd>

</dl>
<DEL>此文本已被删除。</DEL>

<DFN>HTML stands for hypertext markup language.</DFN>
<DIR>

<LI>Art艺术

<LI>History历史

<LI>Literature文学

<LI>Sports体育

<LI>Entertainment娱乐

<LI>Science科学

</DIR>
<ISINDEX PROMPT="Enter a keyword to search for in the index">

<KBD>This text renders in a fixed-width font.</KBD>

<LABEL FOR="oCtrlID" ACCESSKEY="1">

#<SPAN style="text-decoration:underline;">1</SPAN>: Press Alt+1 to set focus to textbox

</LABEL>

<INPUT TYPE="text" NAME="TXT1" VALUE="binding sample 1" 

SIZE="20" TABINDEX="1" ID="oCtrlID">
<MENU>

<LI>这是菜单中的第一个项目。

<LI>这是菜单中的第二个项目。

</MENU>

<FRAMESET>

<NOFRAMES>你需要 IE 3.0 或更高版本才能浏览框架!</NOFRAMES>

</FRAMESET>


<OBJECT CLASSID="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95">

<SPAN STYLE="color:red">ActiveX 控件装入失败!

-- 请检查浏览器的安全设置。</SPAN>

</OBJECT>

<SELECT>

<OPTGROUP LABEL="碱性金属">

<OPTION>锂 (Li)</OPTION>

<OPTION>纳 (Na)</OPTION>

<OPTION>钾 (K)</OPTION>

</OPTGROUP>

<OPTGROUP LABEL="卤素">

<OPTION>氟 (F)</OPTION>

<OPTION>氯 (Cl)</OPTION>

<OPTION>溴 (Br)</OPTION>

</OPTGROUP>

</SELECT>
<OBJECT 

ID=tdcContents

CLASSID="clsid:333C7BC4-460F-11D0-BC04-0080C7055A83">

<PARAM NAME="DataURL" VALUE="DataBinding.csv"> 

</OBJECT>

<BUTTON onclick="oTxt.value=tdcContents.outerHTML">

Show Object outerHTML</BUTTON><BR/>

<TEXTAREA ID="oTxt" STYLE="height:400; width:450;padding:3; overflow=auto;"> </TEXTAREA>

 

//When the button is pressed the complete list of the object's

// PARAM elements display unformatted in the TEXTAREA as follows:

<OBJECT id=tdcContents classid=clsid:333C7BC4-460F-11D0-BC04-0080C7055A83>

<PARAM NAME="RowDelim" VALUE="&#10;"><PARAM NAME="FieldDelim" VALUE=",">

<PARAM NAME="TextQualifier" VALUE='"'><PARAM NAME="EscapeChar" VALUE="">

<PARAM NAME="UseHeader" VALUE="0"><PARAM NAME="SortAscending" VALUE="-1">

<PARAM NAME="SortColumn" VALUE=""><PARAM NAME="FilterValue" VALUE="">

<PARAM NAME="FilterCriterion" VALUE="??"><PARAM NAME="FilterColumn" VALUE="">

<PARAM NAME="CharSet" VALUE=""><PARAM NAME="Language" VALUE="">

<PARAM NAME="CaseSensitive" VALUE="-1"><PARAM NAME="Sort" VALUE="">

<PARAM NAME="Filter" VALUE=""><PARAM NAME="AppendData" VALUE="0">

<PARAM NAME="DataURL" VALUE="DataBinding.csv">

<PARAM NAME="ReadyState" VALUE="4">

</OBJECT>

<P>He said,

<Q>"Hi there!"</Q>

<SAMP>var a=2, b=5;</SAMP>

(X<SUB>1</SUB>,Y<SUB>2</SUB>)

(X<SUP>2</SUP> + Y<SUP>2</SUP>)

<TABLE>

<TBODY>

<TR>

<TD>

此文本位于表格主体。

</TD>

</TR>

</TBODY>

<TFOOT>

<TR>

<TD>

此文本位于表尾。

</TD>

</TR>

</TFOOT>

</TABLE>
Enter the <VAR>filename</VAR> in the dialog box.
<NOBR>此行文本不会断行，不管窗口的宽度如何。</NOBR>

<NOBR>但是，本行，<WBR>如果窗口的宽度

太小的话，将在"本行，"后断行。</NOBR>



