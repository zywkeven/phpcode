<?php
  /**
* @version $Id: HTML_toolbar.php,v 1.5 2005/01/23 03:24:16 kochp Exp $
* @package Mambo
* @copyright (C) 2000 - 2005 Miro International Pty Ltd
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
* Mambo is Free Software
*/

/**
* Special global variable declaration DocBlock
* @global integer $GLOBALS['_myvar']
* @name $_myvar
*/

/**
* A sample function docblock
* @global string document the fact that this function uses $_myvar
* @staticvar integer $staticvar this is actually what is returned
* @param string $param1 name to declare
* @param string $param2 value of the name
* @return integer
*/


/**
* The first example class, this is in the same package as the
* procedural stuff in the start of the file
* @package sample
* @subpackage classes
*/

@1、类文档注释规范

//************************************************* 
// Copyright (C), 2007-2010, Shanghai eBrain Info. & Tech. Co., Ltd. 
// File name:     // 文件名 
// Author:     Version:     Date: // 作者、版本及完成日期 
// Description:   // 用于详细说明此程序文件完成的主要功能，与其他模块 
//           // 或函数的接口，输出值、取值范围、含义及参数间的控 
//           // 制、顺序、独立或依赖等关系 
// Others:       // 其它内容的说明 
// Function List:   // 主要函数及其功能 
//   1. ------- 
// History:       // 历史修改记录 
//     <author> <time>   <version >   <desc> 
// David   96/10/12   1.0   build this moudle
//*************************************************

@2、函数注释规范

//************************************************* 
// Function:     // 函数名称 
// Description:   // 函数功能、性能等的描述 
// Calls:       // 被本函数调用的函数清单 
// Called By:     // 调用本函数的函数清单 
// Table Accessed: // 被访问的表（此项仅对于牵扯到数据库操作的程序）
// Table Updated: // 被修改的表（此项仅对于牵扯到数据库操作的程序）
// Input:       // 输入参数说明，包括每个参数的作 
//             // 用、取值说明及参数间关系。 
// Output:       // 对输出参数的说明。 
// Return:       // 函数返回值的说明 
// Others:       // 其它说明 

?>
•@version 版本信息； 
•@package 封装包名称，或所属包名称； 
•@copyright  版权信息； 
•@license 许可证协议信息； 
•@param 参数定义； 
•@author 作者； 
•@example 实例； 
•@abstract 摘要，梗概； 
•@access 使用权限或前置条件； 
•@deprecated 声明事项； 
•@exception 特例，特殊情况； 
•@final 最后，最终； 
•@global 总体的，全局 
•@subpackage 替代包 
•@name 文件名