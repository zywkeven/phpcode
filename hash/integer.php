<?php
$hashes = array(); $funcs = get_defined_functions(); 
$mask = zend_hash_table_mask($funcs["internal"]); 
foreach ($funcs["internal"] as $f) { 
    $hashes[zend_hash_func($f) & $mask][] = $f; 
} 
print_r(array_filter($hashes,returnbiger));
function returnbiger($e){
    return sizeof($e)>1;
}
Array([1579] => Array
        (
            [0] => zend_hash_table_mask
            [1] => date_add
        )

    [542] => Array
        (
            [0] => strcmp
            [1] => array_udiff_uassoc
        )

    [332] => Array
        (
            [0] => strncmp
            [1] => date_timezone_get
            [2] => mysqli_get_charset
            [3] => posix_getgrnam
        )

    [1146] => Array
        (
            [0] => strcasecmp
            [1] => getmyinode
        )

    [1622] => Array
        (
            [0] => each
            [1] => fscanf
        )

    [852] => Array
        (
            [0] => defined
            [1] => iterator_apply
        )

    [1699] => Array
        (
            [0] => get_parent_class
            [1] => posix_kill
            [2] => rmdir
        )

    [805] => Array
        (
            [0] => method_exists
            [1] => feof
        )

    [1909] => Array
        (
            [0] => interface_exists
            [1] => readline_on_new_line
        )

    [196] => Array
        (
            [0] => class_alias
            [1] => mysqli_get_cache_stats
        )

    [1655] => Array
        (
            [0] => get_required_files
            [1] => posix_getgroups
        )

    [162] => Array
        (
            [0] => trigger_error
            [1] => prev
        )

    [471] => Array
        (
            [0] => set_error_handler
            [1] => gztell
            [2] => mysqli_field_tell
            [3] => iterator_count
            [4] => is_object
            [5] => stream_bucket_new
        )

    [335] => Array
        (
            [0] => restore_error_handler
            [1] => mysql_listdbs
            [2] => var_export
        )

    [1148] => Array
        (
            [0] => set_exception_handler
            [1] => mysqli_stmt_send_long_data
        )

    [1317] => Array
        (
            [0] => get_declared_classes
            [1] => array_fill_keys
        )

    [1770] => Array
        (
            [0] => extension_loaded
            [1] => call_user_func
        )

    [1551] => Array
        (
            [0] => get_defined_constants
            [1] => uniqid
        )

    [96] => Array
        (
            [0] => zend_test_func
            [1] => iconv_strrpos
            [2] => is_file
        )

    [662] => Array
        (
            [0] => gc_collect_cycles
            [1] => explode
        )

    [1465] => Array
        (
            [0] => gc_enabled
            [1] => mysql_result
        )

    [565] => Array
        (
            [0] => gc_enable
            [1] => dl
        )

    [496] => Array
        (
            [0] => strtotime
            [1] => date_default_timezone_get
        )

    [1132] => Array
        (
            [0] => idate
            [1] => strtok
        )

    [311] => Array
        (
            [0] => gmdate
            [1] => fgetcsv
        )

    [460] => Array
        (
            [0] => mktime
            [1] => json_encode
        )

    [961] => Array
        (
            [0] => checkdate
            [1] => strnatcmp
        )

    [647] => Array
        (
            [0] => gmstrftime
            [1] => bzerrno
            [2] => xml_set_element_handler
        )

    [788] => Array
        (
            [0] => time
            [1] => mysqli_stmt_error
        )

    [1432] => Array
        (
            [0] => date_parse_from_format
            [1] => ob_clean
        )

    [1041] => Array
        (
            [0] => date_get_last_errors
            [1] => split
        )

    [235] => Array
        (
            [0] => date_format
            [1] => mysqli_stmt_insert_id
            [2] => posix_initgroups
            [3] => max
        )

    [1291] => Array
        (
            [0] => date_date_set
            [1] => md5
        )

    [22] => Array
        (
            [0] => date_isodate_set
            [1] => hexdec
        )

    [417] => Array
        (
            [0] => date_timestamp_set
            [1] => stat
        )

    [1301] => Array
        (
            [0] => date_timestamp_get
            [1] => sqlite_next
        )

    [1409] => Array
        (
            [0] => timezone_open
            [1] => readfile
        )

    [1068] => Array
        (
            [0] => timezone_transitions_get
            [1] => gzgetss
        )

    [128] => Array
        (
            [0] => timezone_identifiers_list
            [1] => mysqli_ssl_set
            [2] => extract
        )

    [224] => Array
        (
            [0] => date_interval_create_from_date_string
            [1] => curl_copy_handle
        )

    [1361] => Array
        (
            [0] => libxml_use_internal_errors
            [1] => session_cache_limiter
            [2] => session_commit
        )

    [503] => Array
        (
            [0] => preg_match_all
            [1] => fputs
        )

    [1144] => Array
        (
            [0] => preg_filter
            [1] => filter_input_array
        )

    [1824] => Array
        (
            [0] => preg_quote
            [1] => mysql_selectdb
        )

    [1231] => Array
        (
            [0] => preg_last_error
            [1] => sqrt
        )

    [1404] => Array
        (
            [0] => gzclose
            [1] => hash_init
        )

    [1065] => Array
        (
            [0] => gzgetc
            [1] => xmlwriter_start_element
        )

    [504] => Array
        (
            [0] => gzopen
            [1] => curl_multi_add_handle
        )

    [352] => Array
        (
            [0] => gzpassthru
            [1] => base_convert
        )

    [878] => Array
        (
            [0] => gzseek
            [1] => mysqli_field_seek
            [2] => rewind
        )

    [1809] => Array
        (
            [0] => gzwrite
            [1] => sha1_file
        )

    [1141] => Array
        (
            [0] => gzuncompress
            [1] => xml_parser_create_ns
        )

    [563] => Array
        (
            [0] => bzopen
            [1] => spl_autoload_unregister
            [2] => xmlwriter_start_attribute
        )

    [1708] => Array
        (
            [0] => bzwrite
            [1] => mysqli_commit
            [2] => spl_autoload
        )

    [419] => Array
        (
            [0] => bzflush
            [1] => getcwd
        )

    [1347] => Array
        (
            [0] => bzerrstr
            [1] => hash_copy
        )

    [1835] => Array
        (
            [0] => bzerror
            [1] => gethostbynamel
        )

    [1485] => Array
        (
            [0] => bzcompress
            [1] => mysqli_real_escape_string
        )

    [374] => Array
        (
            [0] => bzdecompress
            [1] => finfo_file
        )

    [187] => Array
        (
            [0] => ctype_graph
            [1] => sqlite_exec
        )

    [1205] => Array
        (
            [0] => ctype_upper
            [1] => connection_aborted
        )

    [633] => Array
        (
            [0] => curl_setopt
            [1] => array_search
        )

    [868] => Array
        (
            [0] => curl_multi_select
            [1] => mysql_error
        )

    [383] => Array
        (
            [0] => curl_multi_getcontent
            [1] => sqlite_rewind
            [2] => xmlwriter_start_dtd_attlist
        )

    [1241] => Array
        (
            [0] => dom_import_simplexml
            [1] => posix_getuid
        )

    [8] => Array
        (
            [0] => finfo_open
            [1] => stream_get_filters
        )

    [1420] => Array
        (
            [0] => finfo_close
            [1] => sqlite_query
        )

    [1198] => Array
        (
            [0] => finfo_set_flags
            [1] => is_link
        )

    [304] => Array
        (
            [0] => finfo_buffer
            [1] => mysql_query
            [2] => expm1
            [3] => is_callable
        )

    [1352] => Array
        (
            [0] => mime_content_type
            [1] => get_browser
        )

    [1582] => Array
        (
            [0] => filter_has_var
            [1] => count
        )

    [694] => Array
        (
            [0] => hash_update_stream
            [1] => session_encode
            [2] => unlink
        )

    [1482] => Array
        (
            [0] => hash_update_file
            [1] => system
        )

    [914] => Array
        (
            [0] => hash_final
            [1] => mysqli_refresh
        )

    [1982] => Array
        (
            [0] => hash_algos
            [1] => sqlite_fetch_array
        )

    [2025] => Array
        (
            [0] => iconv_get_encoding
            [1] => http_build_query
            [2] => array_udiff_assoc
        )

    [582] => Array
        (
            [0] => iconv_substr
            [1] => rawurldecode
        )

    [1890] => Array
        (
            [0] => json_decode
            [1] => escapeshellcmd
        )

    [1156] => Array
        (
            [0] => mysql_connect
            [1] => sqlite_column
        )

    [336] => Array
        (
            [0] => mysql_close
            [1] => posix_getegid
        )

    [607] => Array
        (
            [0] => mysql_select_db
            [1] => mysqli_affected_rows
            [2] => htmlentities
        )

    [725] => Array
        (
            [0] => mysql_unbuffered_query
            [1] => fileatime
        )

    [172] => Array
        (
            [0] => mysql_list_processes
            [1] => ob_get_level
        )

    [1492] => Array
        (
            [0] => mysql_num_rows
            [1] => array_intersect
            [2] => xmlwriter_write_dtd_entity
        )

    [1664] => Array
        (
            [0] => mysql_num_fields
            [1] => mysqli_get_connection_stats
        )

    [1659] => Array
        (
            [0] => mysql_fetch_row
            [1] => spl_autoload_extensions
        )

    [549] => Array
        (
            [0] => mysql_field_seek
            [1] => strip_tags
            [2] => getservbyport
        )

    [1886] => Array
        (
            [0] => mysql_field_name
            [1] => fgets
        )

    [924] => Array
        (
            [0] => mysql_field_len
            [1] => clearstatcache
        )

    [63] => Array
        (
            [0] => mysql_field_type
            [1] => mysqli_report
        )

    [900] => Array
        (
            [0] => mysql_real_escape_string
            [1] => posix_getgrgid
            [2] => stream_context_set_default
        )

    [1686] => Array
        (
            [0] => mysql_stat
            [1] => session_regenerate_id
            [2] => show_source
        )

    [648] => Array
        (
            [0] => mysql_ping
            [1] => log1p
        )

    [1272] => Array
        (
            [0] => mysql_get_proto_info
            [1] => stream_socket_get_name
            [2] => xmlwriter_start_pi
        )

    [1903] => Array
        (
            [0] => mysql_set_charset
            [1] => stream_socket_server
            [2] => utf8_decode
        )

    [1473] => Array
        (
            [0] => mysql_numfields
            [1] => shell_exec
        )

    [385] => Array
        (
            [0] => mysql_dbname
            [1] => socket_set_blocking
        )

    [997] => Array
        (
            [0] => mysqli_autocommit
            [1] => ucfirst
            [2] => xmlwriter_end_cdata
        )

    [621] => Array
        (
            [0] => mysqli_connect
            [1] => base64_decode
        )

    [562] => Array
        (
            [0] => mysqli_connect_errno
            [1] => range
        )

    [1750] => Array
        (
            [0] => mysqli_connect_error
            [1] => sqlite_fetch_object
            [2] => is_scalar
        )

    [781] => Array
        (
            [0] => mysqli_error
            [1] => ltrim
        )

    [1354] => Array
        (
            [0] => mysqli_fetch_field_direct
            [1] => stripslashes
            [2] => php_strip_whitespace
        )

    [833] => Array
        (
            [0] => mysqli_fetch_lengths
            [1] => fclose
        )

    [676] => Array
        (
            [0] => mysqli_fetch_row
            [1] => gethostname
        )

    [463] => Array
        (
            [0] => mysqli_get_client_stats
            [1] => implode
            [2] => readlink
        )

    [2007] => Array
        (
            [0] => mysqli_init
            [1] => php_egg_logo_guid
        )

    [611] => Array
        (
            [0] => mysqli_multi_query
            [1] => doubleval
        )

    [1568] => Array
        (
            [0] => mysqli_next_result
            [1] => arsort
        )

    [1993] => Array
        (
            [0] => mysqli_num_fields
            [1] => atan
        )

    [1597] => Array
        (
            [0] => mysqli_reap_async_query
            [1] => closelog
        )

    [1933] => Array
        (
            [0] => mysqli_rollback
            [1] => stripcslashes
        )

    [452] => Array
        (
            [0] => mysqli_stmt_attr_get
            [1] => array_diff_key
        )

    [1616] => Array
        (
            [0] => mysqli_stmt_attr_set
            [1] => xmlwriter_write_attribute_ns
        )

    [1751] => Array
        (
            [0] => mysqli_stmt_bind_param
            [1] => xmlwriter_start_dtd_entity
        )

    [1066] => Array
        (
            [0] => mysqli_stmt_free_result
            [1] => str_shuffle
            [2] => decbin
        )

    [904] => Array
        (
            [0] => mysqli_stmt_get_result
            [1] => strcoll
            [2] => reset
        )

    [643] => Array
        (
            [0] => mysqli_stmt_param_count
            [1] => uasort
        )

    [256] => Array
        (
            [0] => mysqli_stmt_close
            [1] => posix_getpwuid
            [2] => readdir
        )

    [1648] => Array
        (
            [0] => mysqli_stmt_errno
            [1] => posix_getlogin
            [2] => is_long
        )

    [1895] => Array
        (
            [0] => mysqli_stmt_next_result
            [1] => gettype
        )

    [1531] => Array
        (
            [0] => mysqli_stmt_sqlstate
            [1] => xmlwriter_output_memory
        )

    [1173] => Array
        (
            [0] => mysqli_stmt_store_result
            [1] => mysqli_send_long_data
        )

    [622] => Array
        (
            [0] => mysqli_store_result
            [1] => zend_logo_guid
        )

    [624] => Array
        (
            [0] => mysqli_bind_param
            [1] => is_readable
        )

    [1128] => Array
        (
            [0] => mysqli_client_encoding
            [1] => mail
        )

    [1034] => Array
        (
            [0] => mysqli_escape_string
            [1] => mt_rand
        )

    [397] => Array
        (
            [0] => mysqli_fetch
            [1] => sqlite_single_query
        )

    [1327] => Array
        (
            [0] => iterator_to_array
            [1] => stream_get_transports
        )

    [614] => Array
        (
            [0] => pdo_drivers
            [1] => token_name
        )

    [988] => Array
        (
            [0] => posix_setegid
            [1] => ini_alter
        )

    [1712] => Array
        (
            [0] => posix_getpgrp
            [1] => mt_getrandmax
        )

    [359] => Array
        (
            [0] => posix_setpgid
            [1] => popen
        )

    [1047] => Array
        (
            [0] => posix_getsid
            [1] => filectime
        )

    [405] => Array
        (
            [0] => posix_getcwd
            [1] => getprotobyname
            [2] => xmlwriter_set_indent_string
        )

    [1257] => Array
        (
            [0] => posix_access
            [1] => array_uintersect
        )

    [378] => Array
        (
            [0] => posix_getpwnam
            [1] => posix_strerror
        )

    [265] => Array
        (
            [0] => readline
            [1] => set_file_buffer
        )

    [1024] => Array
        (
            [0] => readline_clear_history
            [1] => filesize
        )

    [1781] => Array
        (
            [0] => readline_read_history
            [1] => inet_pton
            [2] => xmlwriter_write_pi
        )

    [2015] => Array
        (
            [0] => readline_callback_handler_remove
            [1] => stream_context_get_options
        )

    [1251] => Array
        (
            [0] => session_save_path
            [1] => var_dump
        )

    [223] => Array
        (
            [0] => session_set_save_handler
            [1] => array_reverse
            [2] => xmlwriter_set_indent
        )

    [2024] => Array
        (
            [0] => session_cache_expire
            [1] => call_user_func_array
            [2] => array_rand
        )

    [1064] => Array
        (
            [0] => sqlite_open
            [1] => stream_context_create
        )

    [344] => Array
        (
            [0] => sqlite_popen
            [1] => xml_set_external_entity_ref_handler
        )

    [714] => Array
        (
            [0] => sqlite_array_query
            [1] => file_put_contents
        )

    [1377] => Array
        (
            [0] => sqlite_fetch_single
            [1] => basename
            [2] => str_word_count
        )

    [2006] => Array
        (
            [0] => sqlite_fetch_string
            [1] => stream_is_local
        )

    [1977] => Array
        (
            [0] => sqlite_current
            [1] => register_tick_function
            [2] => xml_parser_get_option
        )

    [1200] => Array
        (
            [0] => sqlite_num_rows
            [1] => rawurlencode
            [2] => tanh
            [3] => natsort
        )

    [1116] => Array
        (
            [0] => sqlite_num_fields
            [1] => disk_free_space
        )

    [1094] => Array
        (
            [0] => sqlite_valid
            [1] => xmlwriter_write_element
        )

    [4] => Array
        (
            [0] => sqlite_has_more
            [1] => xmlwriter_full_end_element
        )

    [367] => Array
        (
            [0] => sqlite_create_function
            [1] => htmlspecialchars_decode
        )

    [1589] => Array
        (
            [0] => bin2hex
            [1] => inet_ntop
        )

    [247] => Array
        (
            [0] => time_sleep_until
            [1] => pos
        )

    [861] => Array
        (
            [0] => strptime
            [1] => call_user_method_array
        )

    [1307] => Array
        (
            [0] => phpcredits
            [1] => strchr
            [2] => stream_bucket_prepend
        )

    [1832] => Array
        (
            [0] => php_real_logo_guid
            [1] => realpath_cache_get
        )

    [464] => Array
        (
            [0] => substr_count
            [1] => chmod
        )

    [2029] => Array
        (
            [0] => strtoupper
            [1] => rewinddir
        )

    [1022] => Array
        (
            [0] => pathinfo
            [1] => get_magic_quotes_gpc
        )

    [1591] => Array
        (
            [0] => strstr
            [1] => xml_set_end_namespace_decl_handler
        )

    [1613] => Array
        (
            [0] => strrchr
            [1] => ezmlm_hash
        )

    [579] => Array
        (
            [0] => substr_replace
            [1] => realpath_cache_size
        )

    [1348] => Array
        (
            [0] => addcslashes
            [1] => quoted_printable_encode
        )

    [1209] => Array
        (
            [0] => str_replace
            [1] => getlastmod
            [2] => hypot
        )

    [1729] => Array
        (
            [0] => setlocale
            [1] => sys_getloadavg
            [2] => array_uintersect_assoc
        )

    [1921] => Array
        (
            [0] => vsprintf
            [1] => xmlwriter_end_pi
        )

    [1532] => Array
        (
            [0] => urldecode
            [1] => array_chunk
        )

    [1043] => Array
        (
            [0] => link
            [1] => xmlwriter_start_attribute_ns
        )

    [1096] => Array
        (
            [0] => escapeshellarg
            [1] => move_uploaded_file
        )

    [1038] => Array
        (
            [0] => proc_close
            [1] => ob_end_clean
        )

    [1665] => Array
        (
            [0] => proc_terminate
            [1] => array_intersect_uassoc
        )

    [1277] => Array
        (
            [0] => mt_srand
            [1] => token_get_all
        )

    [1811] => Array
        (
            [0] => convert_uudecode
            [1] => array_merge
        )

    [1714] => Array
        (
            [0] => cosh
            [1] => exp
        )

    [1375] => Array
        (
            [0] => is_finite
            [1] => gethostbyname
        )

    [584] => Array
        (
            [0] => log10
            [1] => get_magic_quotes_runtime
        )

    [1111] => Array
        (
            [0] => decoct
            [1] => stream_get_line
        )

    [448] => Array
        (
            [0] => long2ip
            [1] => xml_set_notation_decl_handler
        )

    [1646] => Array
        (
            [0] => getenv
            [1] => header
        )

    [839] => Array
        (
            [0] => putenv
            [1] => dns_get_record
        )

    [5] => Array
        (
            [0] => get_current_user
            [1] => dns_check_record
        )

    [1052] => Array
        (
            [0] => get_cfg_var
            [1] => forward_static_call
        )

    [1424] => Array
        (
            [0] => error_log
            [1] => unserialize
            [2] => xmlwriter_write_attribute
        )

    [673] => Array
        (
            [0] => error_get_last
            [1] => array_shift
        )

    [1695] => Array
        (
            [0] => call_user_method
            [1] => is_array
            [2] => array_keys
        )

    [444] => Array
        (
            [0] => highlight_file
            [1] => headers_list
            [2] => xmlwriter_open_memory
        )

    [1732] => Array
        (
            [0] => ini_get
            [1] => xmlwriter_end_dtd
        )

    [848] => Array
        (
            [0] => ini_set
            [1] => socket_get_status
        )

    [157] => Array
        (
            [0] => config_get_hash
            [1] => pfsockopen
        )

    [333] => Array
        (
            [0] => is_uploaded_file
            [1] => stream_filter_append
        )

    [475] => Array
        (
            [0] => is_null
            [1] => array_count_values
        )

    [1997] => Array
        (
            [0] => fflush
            [1] => ob_end_flush
        )

    [375] => Array
        (
            [0] => tempnam
            [1] => lcg_value
        )

    [1688] => Array
        (
            [0] => stream_context_set_option
            [1] => stream_copy_to_stream
        )

    [1091] => Array
        (
            [0] => stream_filter_prepend
            [1] => array_push
            [2] => xml_set_character_data_handler
        )

    [2032] => Array
        (
            [0] => stream_set_read_buffer
            [1] => lchown
        )

    [533] => Array
        (
            [0] => stream_wrapper_register
            [1] => stream_register_wrapper
        )

    [1635] => Array
        (
            [0] => stream_get_wrappers
            [1] => xml_parser_free
        )

    [457] => Array
        (
            [0] => glob
            [1] => array_diff_uassoc
        )

    [609] => Array
        (
            [0] => filemtime
            [1] => xml_get_current_byte_index
        )

    [1505] => Array
        (
            [0] => ob_list_handlers
            [1] => xmlwriter_write_dtd_element
        )

    [1932] => Array
        (
            [0] => natcasesort
            [1] => xml_get_current_column_number
        )

    [1426] => Array
        (
            [0] => shuffle
            [1] => array_pop
        )

    [1860] => Array
        (
            [0] => next
            [1] => xmlwriter_start_dtd_element
        )

    [1462] => Array
        (
            [0] => array_replace_recursive
            [1] => sys_get_temp_dir
        )

    [455] => Array
        (
            [0] => output_add_rewrite_var
            [1] => xmlwriter_end_document
        )

)

