本函数库供存取 MySQL 数据库。有关 MySQL 的细节，及下载 MySQL 数据库，请到这个网址 http：//www.mysql.com。而网络上也有许多提供处理 MySQL 的用户界面程序，建议到 http：//www.phpwizard.net/phpMyAdmin 下载 phpMyAdmin，可以使用浏览器操作及管理 MySQL。整套 phpMyAdmin 程序，是用 PHP3 完成的，亦可同时研究 PHP3 与 MySQL 的链接。

　　mysql_affected_rows： 得到 MySQL 最后操作影响的列数目。
　　mysql_close： 关闭 MySQL 服务器连接。
　　mysql_connect： 打开 MySQL 服务器连接。
　　mysql_create_db： 建立一个 MySQL 新数据库。
　　mysql_data_seek： 移动内部返回指针。
　　mysql_db_query： 送查询字符串 (query) 到 MySQL 数据库。
　　mysql_drop_db： 移除数据库。
　　mysql_errno： 返回错误信息代码。
　　mysql_error： 返回错误信息。
　　mysql_fetch_array： 返回数组资料。
　　mysql_fetch_field： 取得字段信息。
　　mysql_fetch_lengths： 返回单列各栏资料最大长度。
　　mysql_fetch_object： 返回类资料。
　　mysql_fetch_row： 返回单列的各字段。
　　mysql_field_name： 返回指定字段的名称。
　　mysql_field_seek： 配置指针到返回值的某字段。
　　mysql_field_table： 获得目前字段的资料表 (table) 名称。
　　mysql_field_type： 获得目前字段的类型。
　　mysql_field_flags： 获得目前字段的标志。
　　mysql_field_len： 获得目前字段的长度。
　　mysql_free_result： 释放返回占用内存。
　　mysql_insert_id： 返回最后一次使用 INSERT 指令的 ID。
　　mysql_list_fields： 列出指定资料表的字段 (field)。
　　mysql_list_dbs： 列出 MySQL 服务器可用的数据库 (database)。
　　mysql_list_tables： 列出指定数据库的资料表 (table)。
　　mysql_num_fields： 取得返回字段的数目。
　　mysql_num_rows： 取得返回列的数目。
　　mysql_pconnect： 打开 MySQL 服务器持续连接。
　　mysql_query： 送出一个 query 字符串。
　　mysql_result： 取得查询 (query) 的结果。
　　mysql_select_db： 选择一个数据库。
　　mysql_tablename： 取得资料表名称。

　　mysql_affected_rows　得到 MySQL 最后操作影响的列数目。
　　语法： int mysql_affected_rows(int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　内容说明： 本函数可得到 MySQL 最后查询操作 INSERT、UPDATE 或 DELETE 所影响的列 (row) 数目。若最后的查询 (query) 是使用 DELETE 而且没有使用 WHERE 命令，则会删除全部资料，本函数将返回 0。若最后使用的是 SELECT，则用本函数不会得到预期的数目，因为要改变 MySQL 数据库本函数才有效，欲得到 SELECT 返回的数目需使用 mysql_num_rows() 函数。

　　mysql_close　关闭 MySQL 服务器连接。
　　语法： int mysql_close(int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数关闭与 MySQL 数据库服务器的连接。若无指定参数 link_identifier 则会关闭最后的一笔连接。用 mysql_pconnect() 连接则无法使用本函数关闭。实际上本函数不是一定需要的，当 PHP 整页程序结束后，将会自动关闭与数据库的非永久性 (non-persistent) 连接。成功返回 true、失败返回 false 值。
　　参考： mysql_connect() mysql_pconnect()

　　mysql_connect　打开 MySQL 服务器连接。
　　语法： int mysql_connect(string [hostname] [：port], string [username], string [password]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数建立与 MySQL 服务器的连接。其中所有的参数都可省略。当使用本函数却不加任何参数时，参数 hostname 的默认值为 localhost、参数 username 的默认值为 PHP 执行行程的拥有者、参数 password 则为空字符串 (即没有密码)。而参数 hostname 后面可以加冒号与埠号，代表使用那个埠与 MySQL 连接。当然在使用数据库时，早点使用 mysql_close() 将连接关掉可以节省资源。

　　 使用范例
　　<?php
$dbh = mysql_connect('localhost：3306','mcclain','standard'); 
　　　　mysql_select_db('admreqs'); 
　　　　$query = "insert into requests(date, request, email, priority,status) values 　　　　(NOW(),'$description', '$email', '$priority', 'NEW')"; 
　　　　$res = mysql_query($query, $dbh); 
　　　　$query = "select max(id) from requests"; 
　　　　$res = mysql_query($query, $dbh); 
　　　　$err = mysql_error(); 
　　　　if($err){ 
　　　　　　echo "发生错误，请通知<a href=mailto：webmaster@my.site>站长</a>"; 
　　　　} 
　　　　$row = mysql_fetch_row($res); 
　　　　echo "未来您使用的号码为： ".$row[0]; 
　　?> 
　　参考： mysql_close() mysql_pconnect()

　　mysql_create_db　建立一个 MySQL 新数据库。
　　语法： int mysql_create_db(string database name, int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数用来建立新的数据库 (database)。在建立前，必须先与服务器连接。
　　参考： mysql_drop_db()

　　mysql_data_seek　移动内部返回指针。
　　语法： int mysql_data_seek(int result_identifier, int row_number);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数可移动内部返回的列指针到指定的 row_number 去。之后若使用 mysql_fetch_row() 可以返回新列的值。成功返回 true、失败则返回 false。

　　mysql_db_query　送查询字符串 (query) 到 MySQL 数据库。
　　语法： int mysql_db_query(string database, string query, int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数用来送出查询字符串 (query) 到后端的 MySQL 数据库中。而可省略的参数 　　link_identifier 若不存在，程序会自动寻找其它 mysql_connect() 连接后的连接代码。发生错误时会返回 false，其它没错误时则返回它的返回代码。
　　参考： mysql_connect()

　　mysql_drop_db　移除数据库。
　　语法： int mysql_drop_db(string database_name, int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数移除已存在的数据库。成功返回 true、失败则返回 false。
　　参考： mysql_create_db()

　　mysql_errno
　　返回错误信息代码。
　　语法： int mysql_errno(int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能　
　　内容说明： 本函数可以得到 MySQL 数据库服务器的错误代码。通常用在 PHP 网页程序开发阶段，作为 PHP 与 MySQL 的除错用。

　　使用范例
　　<?php
　　　　mysql_connect("marliesle");
　　　　echo mysql_errno()."： ".mysql_error()."<BR>";
　　　　mysql_select_db("nonexistentdb");
　　　　echo mysql_errno()."： ".mysql_error()."<BR>";
　　　　$conn = mysql_query("SELECT * FROM nonexistenttable");
　　　　echo mysql_errno()."： ".mysql_error()."<BR>";
　　?> 
　　参考： mysql_error()

　　mysql_error　返回错误信息。
　　语法： string mysql_error(int [link_identifier]);
　　返回值： 字符串
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到 MySQL 数据库服务器的错误信息。通常用在 PHP 网页程序开发阶段，与 mysql_errno() 一起作为PHP 与 MySQL 的除错用。
　　参考： mysql_errno()

　　mysql_fetch_array　返回数组资料。
　　语法： array mysql_fetch_array(int result, int [result_typ]);
　　返回值： 数组
　　函数种类： 数据库功能
　　内容说明： 本函数用来将查询结果 result 拆到数组变量中。若 result 没有资料，则返回 false 值。而本函数可以说是 mysql_fetch_row() 的加强函数，除可以将返回列及数字索引放入数组之外，还可以将文字索引放入数组中。若是好几个返回字段都是相同的文字名称，则最后一个置入的字段有效，解 决方法是使用数字索引或者为这些同名的字段 (column) 取别名 (alias)。治募注意的是使用本函数的处理速度其实不会比 mysql_fetch_row() 函数慢，要用哪个函数还是看使用的需求决定。参数 result_typ 是一个常量值，有以下几种常量 MYSQL_ASSOC、MYSQL_NUM 与 MYSQL_BOTH。

　　 使用范例
　　<?php
　　　　mysql_connect($host,$user,$password);
　　　　$result = mysql_db_query("database","select * from table");
　　　　while($row = mysql_fetch_array($result)) {
　　　　　　echo $row["user_id"];
　　　　　　echo $row["fullname"];
　　　　}
　　　　mysql_free_result($result);
　　?>

　　mysql_fetch_field　取得字段信息。
　　语法： object mysql_fetch_field(int result, int [field_offset]);
　　返回值： 类
　　函数种类： 数据库功能
　　内容说明： 本函数返回的类资料为 result 的字段 (Column) 信息。返回类的属性如下：

　　name - 字段名称
　　table - 字段所在表格的资料表名称
　　max_length - 字段的最大长度
　　not_null - 若为 1 表示本字段不能是空的 (null) 
　　primary_key - 若为 1 表示本字段是主要键 (primary key) 
　　unique_key - 若为 1 表示本字段为不可重覆键 (unique key) 
　　multiple_key - 若为 1 表示本字段为可重覆键 (non-unique key) 
　　numeric - 若为 1 表示本字段为数字类型 (numeric) 
　　blob - 若为 1 表示本字段为位类型 (BLOB) 
　　type - 字段类型
　　unsigned - 若为 1 表示本字段为无记号 (unsigned) 
　　zerofill - 若为 1 表示本字段为被零填满 (zero-filled) 
　　参考： mysql_field_seek()

　　mysql_fetch_lengths　返回单列各栏资料最大长度。
　　语法： array mysql_fetch_lengths(int result);
　　返回值： 数组
　　函数种类： 数据库功能
　　内容说明： 本函数将 mysql_fetch_row() 处理过的最后一列资料的各字段资料最大长度放在数组变量之中。若执行失败则返回 false 值。返回数组的第一笔资料索引值是 0。
　　参考： mysql_fetch_row()

mysql_fetch_object　返回类资料。
　　语法： object mysql_fetch_object(int result, int [result_typ]);
　　返回值： 类
　　函数种类： 数据库功能
　　内容说明： 本函数用来将查询结果 result 拆到类变量中。使用方法和 mysql_fetch_array() 几乎相同，不同的地方在于本函数返回资料是类而不是数组。若 result 没有资料，则返回 false 值。另外治募注意的地方是，取回的类资料的索引只能是文字而不能用数字，这是因为类的特性。类资料的特性中所有的属性 (property) 名称都不能是数字，因此只好乖乖使用文字字符串当索引了。参数 result_typ是一个常量值，有以下几种常量 MYSQL_ASSOC、MYSQL_NUM 与 MYSQL_BOTH。关于速度方面，本函数的处理速度几乎和 mysql_fetch_row() 及 mysql_fetch_array() 二函数差不多，要用哪个函数还是看使用的需求决定。

　　 使用范例，下面的例子示范如使用返回的类。
　　<?php 
　　　　mysql_connect($host,$user,$password);
　　　　$result = mysql_db_query("MyDatabase","select * from test");
　　　　while($row = mysql_fetch_object($result)) {
　　　　　　echo $row->user_id;
　　　　　　echo $row->fullname;
　　　　}
　　　　mysql_free_result($result);
　　?> 
　　参考： mysql_fetch_array() mysql_fetch_row()

　　mysql_fetch_row　返回单列的各字段。
　　语法： array mysql_fetch_row(int result);
　　返回值： 数组
　　函数种类： 数据库功能
　　内容说明： 本函数用来将查询结果 result 之单列拆到数组变量中。数组的索引是数字索引，第一个的索引值是 0。若 result 没有资料，则返回 false 值。
参考： mysql_fetch_array() mysql_fetch_object() mysql_data_seek() mysql_fetch_lengths() mysql_result()

　　mysql_field_name　返回指定字段的名称。
　　语法： string mysql_field_name(int result, int field_index);
　　返回值： 字符串
　　函数种类： 数据库功能
　　内容说明： 本函数用来取得指定字段的名称。

　　使用范例
　　mysql_field_name($result,2); 

　　mysql_field_seek　配置指针到返回治募某字段。
　　语法： int mysql_field_seek(int result, int field_offset);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数配置目前的指针到返回治募特定字段中。
　　参考： mysql_fetch_field()

　　mysql_field_table　获得目前字段的资料表 (table) 名称。
　　语法： string mysql_field_table(int result, int field_offset);
　　返回值： 字符串
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到目前所在字段的资料表名。

　　mysql_field_type　获得目前字段的类型。
　　语法： string mysql_field_type(int result, int field_offset);
　　返回值： 字符串
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到目前所在字段的类型格式。返回的字符串为字段的类型，包括了 int、real、string、blob....等等，详见 MySQL 的相关文件中有关于类型的部份。

　　使用范例
　　<?php
　　　　mysql_connect("localhost：3306");
　　　　mysql_select_db("wisconsin");
　　　　$result = mysql_query("SELECT * FROM onek");
　　　　$fields = mysql_num_fields($result);
　　　　$rows = mysql_num_rows($result);
　　　　$i = 0;
　　　　$table = mysql_field_table($result, $i);
　　　　echo "资料表 '".$table."' 有 ".$fields." 栏及 ".$rows." 列。<br>";
　　　　echo "本资料表的字段如下<br>";
　　　　while ($i < $fields) {
　　　　　　$type = mysql_field_type ($result, $i);
　　　　　　$name = mysql_field_name ($result, $i);
　　　　　　$len = mysql_field_len ($result, $i);
　　　　　　$flags = mysql_field_flags ($result, $i);
　　　　　　echo $type." ".$name." ".$len." ".$flags."<br>";
　　　　　　$i++;
　　　　}
　　　　mysql_close();
　　?>

　　mysql_field_flags　获得目前字段的标志。
　　语法： string mysql_field_flags(int result, int field_offset);
　　返回值： 字符串
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到目前所在字段的标志。若一个字段有数种属性标志，则返回的标志为这些属性连起来的字符串，每个属性都用空格隔开，可以使用 explode() 切开这些字符串。返回的标志可能是：not_null、primary_key、unique_key、multiple_key、blob、 unsigned、zerofill、binary、enum、auto_increment、timestamp。

　　mysql_field_len　获得目前字段的长度。
　　语法： int mysql_field_len(int result, int field_offset);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到目前所在字段的长度。

　　mysql_free_result　释放返回占用内存。
　　语法： boolean mysql_free_result(int result);
　　返回值： 布尔值
　　函数种类： 数据库功能
　　内容说明： 本函数可以释放目前 MySQL 数据库 query 返回所占用的内存。一般只有在非常担心在内存的使用上可能会不足的情形下才会用本函数。PHP 程序会在结束时自动释放。

　　mysql_insert_id　返回最后一次使用 INSERT 指令的 ID。
　　语法： int mysql_insert_id(int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到最后一次使用 INSERT 到 MySQL 数据库的执行 ID。sleibowitz@btcwcu.org (13-May-1999) 指出在 PHP 3.0.7版用 REPLACE 也和使用 INSERT 一样，可以使用本函数获得 ID。

　　mysql_list_fields　列出指定资料表的字段 (field)。
　　语法： int mysql_list_fields(string database_name, string table_name, int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到指定的资料表的所有字段。返回的字段信息可以供 mysql_field_flags()、mysql_field_len()、mysql_field_name() 及 mysql_field_type() 等函数使用。若有错误则返回 -1。

　　mysql_list_dbs　列出 MySQL 服务器可用的数据库 (database)。
　　语法： int mysql_list_dbs(int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到 MySQL 服务器的可用数据库。

　　mysql_list_tables　列出指定数据库的资料表 (table)。
　　语法： int mysql_list_tables(string database, int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到指定数据库中的所有资料表名称。

　　mysql_num_fields　取得返回字段的数目。
　　语法： int mysql_num_fields(int result);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到返回字段的数目。
　　参考： mysql_db_query() mysql_query() mysql_fetch_field() mysql_num_rows()

　　mysql_num_rows　取得返回列的数目。
　　语法： int mysql_num_rows(int result);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数可以得到返回列的数目。
　　参考： mysql_db_query() mysql_query() mysql_fetch_row()

　　mysql_pconnect　打开 MySQL 服务器持续连接。
　　语法： int mysql_pconnect(string [hostname] [：port], string [username], string [password]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数和 mysql_connect() 雷同。不同的地方在于使用本函数打开数据库时，程序会先寻找是否曾经执行过本函数，若执行过则返回先前执行的 ID。另一个不同的地方是本函数无法使用 mysql_close() 关闭数据库。

　　mysql_query　送出一个 query 字符串。
　　语法： int mysql_query(string query, int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数送出 query 字符串供 MySQL 做相关的处理或者执行。若没有指定 link_identifier 参数，则程序会自动寻找最近打开的 ID。当 query 查询字符串是 UPDATE、INSERT 及 DELETE 时，返回的可能是 true 或者 false；查询的字符串是 SELECT 则返回新的 ID 值。joey@samaritan.com (09-Feb-1999) 指出，当返回 false 时，并不是执行成功但无返回值，而是查询的字符串有错误。
　　参考： mysql_db_query() mysql_select_db() mysql_connect() 

　　mysql_result　取得查询 (query) 的结果。
　　语法： int mysql_result(int result, int row, mixed field);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数取得一格 query 的结果。参数 field 可以是字段名称、顺序或者是 FieldName.TableName 的格式。在返回资料量少时，可以使用本函数来处理。当数据库大时，本函数的效率就有待考量了，这时可以使用较有效率的 mysql_fetch_row()、mysql_fetch_array() 及 mysql_fetch_object() 等函数。

　　mysql_select_db　选择一个数据库。
　　语法： int mysql_select_db(string database_name, int [link_identifier]);
　　返回值： 整数
　　函数种类： 数据库功能
　　内容说明： 本函数选择 MySQL 服务器中的数据库以供之后的资料查询作业 (query) 处理。成功返回 true，失败则返回 false。
　　参考： mysql_connect() mysql_pconnect() mysql_query()

　　mysql_tablename　取得资料表名称。
　　语法： string mysql_tablename(int result, int i);
　　返回值： 字符串
　　函数种类： 数据库功能
　　内容说明： 本函数可取得资料表名称字符串，一般配合 mysql_list_tables() 函数使用，取得该函返回的数字的名称字符串。

　　使用范例
　　<?php 
　　　　mysql_connect ("localhost：3306");
　　　　$result = mysql_list_tables ("wisconsin");
　　　　$i = 0;
　　　　while ($i < mysql_num_rows ($result)) {
　　　　　　$tb_names[$i] = mysql_tablename ($result, $i);
　　　　　　echo $tb_names[$i] . "<BR>";
　　　　　　$i++;
　　　　}
　　?> 
  