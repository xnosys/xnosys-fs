<?php
	
	return function () {
		
		$globRecursive = function ($pattern, $flags=0) use (&$globRecursive) {
			$files = glob($pattern, $flags);
			foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir) {
				$files = array_merge($files, $globRecursive($dir.'/'.basename($pattern), $flags));
			}
			return $files;
		};
		
		return array(
			'globRecursive' => $globRecursive
		);
		
	};
	
?>