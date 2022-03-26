<?php
/**
 * Author: jerry.mei
 * Email: jerry.mei2049@gmail.com
 * Date: 2022/3/26
 * 助手函数，可以全局调用
 */

/**
 * 拼装输出成功信息
 * @example [$success,$data,$code] = response_success("")
 */
if ( ! function_exists('response_success')) {
	function response_success($data = ""): array {
		return array(TRUE , $data , '');
	}
}

/**
 *  拼装输出错误信息
 * @example [$success,$data,$code] = response_error("")
 */
if ( ! function_exists('response_error')) {
	function response_error($data , $code = ''): array {
		return array(FALSE , $data , $code);
	}
}

/**
 * 错误转换函数
 */
if ( ! function_exists('error_format')) {
	function error_format($errors): array {
		$errors = implode("" , $errors);
		$errors = preg_replace("/。/" , "，" , $errors);
		return preg_replace('#，$#i' , '。' , $errors);
	}
}
