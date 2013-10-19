<?php
/**
 * Battlefield Play4free Servertool
 * Version 0.4.1
 * 
 * Copyright 2013 Danny Li <SharpBunny> <bfp4f.sharpbunny@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
 
/**
 * replace()
 * Replace vars in string
 * 
 * @param $str str - The string
 * @param $other array - Other stuff to be replaced
 * @return str - The replaced string
 */
function replace($str, $other='') {
	global $settings;
	
	$replace = array(
	
		// DATES
		'%date%' => date($settings['cp_date_format']),
		'%full_date%' => date($settings['cp_date_format_full']),
		'%year%' => date("Y"),
		'%month%' => date("m"),
		'%day%' => date("d"),
		'%hour%' => date("H"),
		'%minute%' => date("i"),
		'%second%' => date("s"),
		
		// TOOL
		'%version%' => TOOL_VERSION,
		
		// SERVER
		'%ip%' => $_SERVER['REMOTE_ADDR'],
		
	);
	
	foreach($replace as $key => $value) {
		$str = str_replace($key,$value,$str);
	}
	
	if(is_array($other)) {
		foreach($other as $key => $value) {
			$str = str_replace($key,$value,$str);
		}
	}
	
	return $str;
}
?>