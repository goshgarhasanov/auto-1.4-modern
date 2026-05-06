<?php

	function print_dats($a, $b, $strlen = '0') {
		global $_AUTO;
		global $_POST;
		global $_GET;
		global $row;
		global $OPERATOR;

		if (650 <= $row['posts']) {
			return null;
		}
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			$file = @fopen( DOCUMENT_ROOT . '/file/dat_folder/spam/id_' . $a, 'w' );
			@fwrite( $file, @time(  ) . '|' . $b . '|0' );
			@fclose( $file );
			return null;
		}


		if (( $_SERVER['REQUEST_METHOD'] == 'POST' && $b != 0 )) {
			if (file_exists( DOCUMENT_ROOT . '/file/dat_folder/spam/id_' . $a )) {
				$SPAM_ZAPROS = @FILE( DOCUMENT_ROOT . '/file/dat_folder/spam/id_' . $a );
				$SPAM_ZAPROS = EXPLODE( '|', $SPAM_ZAPROS['0'] );

				if (trim( $SPAM_ZAPROS['0'] ) == 'POST') {
					if (( trim( $SPAM_ZAPROS['1'] ) != $b && '3' <= trim( $SPAM_ZAPROS['2'] ) )) {
						header( 'Content-Type:text/html; charset=UTF-8' );
						$file = @fopen( DOCUMENT_ROOT . '/file/dat_folder/spam/B.spam_' . $a, 'a+' );
						@fwrite( $file, $SPAM_ZAPROS['0'] . ' =POST and ' . $SPAM_ZAPROS['1'] . ' != ' . $b . ( ' count ' . $SPAM_ZAPROS['2'] . '
' ) );
						@fclose( $file );
						mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $_POST['message'] ) . '\', `id` = \'' . $a . '\', `usid` = \'' . $b . '\', `status` = \'0\', `time` = \'' . time(  ) . '\', `count` = \'Spam php ' . basename( $_SERVER['SCRIPT_NAME'] ) . '\';' );
						spam_banned( '1', 'Spam php', $_POST['message'], '2', 'spam.php POST' );
						exit( 'curl function Desabled' );
						return null;
					}

					$file = @fopen( DOCUMENT_ROOT . '/file/dat_folder/spam/id_' . $a, 'w' );
					@fwrite( $file, 'POST|' . $b . '|2' );
					@fclose( $file );
					return null;
				}


				if (time(  ) - $SPAM_ZAPROS['0'] < $strlen / 8) {
					if (( ( $_SERVER['HTTP_ACCEPT'] == '' && $_SERVER['HTTP_ACCEPT_LANGUAGE'] == '' ) && $OPERATOR == 'NULL' )) {
						$_SERVER['CONTENT_LENGTH'] = '';
					}


					if (( $_SERVER['CONTENT_LENGTH'] == '' && 0 < count( $_POST ) )) {
						header( 'Content-Type:text/html; charset=UTF-8' );
						spam_banned( '1', 'Spam php', $_POST['message'], '2', 'spam.php curl' );
						exit( 'curl function Desabled' );
					}

					mysql_query( 'UPDATE `users` SET `kik` = \'' . ( time(  ) + 120 ) . '\', `time` = \'' . $_AUTO['online'] . '\', `whokik` = \'Sistem\', `whykik` = \'Flood Copy-Paste etmeyin.\' WHERE `id`=' . $a . ' LIMIT 1;' );
					mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $_POST['message'] ) . '\', `id` = \'' . $a . '\', `usid` = \'' . $b . '\', `status` = \'1\', `time` = \'' . time(  ) . '\', `count` = \'c_p\';' );
					return null;
				}

				$file = @fopen( DOCUMENT_ROOT . '/file/dat_folder/spam/id_' . $a, 'w' );
				@fwrite( $file, 'POST|' . $b . '|0' );
				@fclose( $file );
				return null;
			}

			$file = @fopen( DOCUMENT_ROOT . '/file/dat_folder/spam/id_' . $a, 'w' );
			@fwrite( $file, @time(  ) . '|' . $b . '|0' );
			@fclose( $file );
		}

	}

	function deloldfile($myfile, $del_time) {
		$oldtime = time(  ) - $del_time;
		$dir = opendir( $myfile );

		if ($file = readdir( $dir )) {
			if (( $file != '.' && $file != '..' )) {
				if (@filemtime( $myfile . '/' . $file ) < $oldtime) {
					@unlink( $myfile . '/' . $file );
				}
			}
		}

		closedir( $dir );
	}

	function secryte_pass($a = '0') {
		global $A_OPERA;

		if ($A_OPERA[0] == 'NULL') {
			return crative_ip_dat( $a );
		}

		return crative_id_dat( $a );
	}

	function crative_ip_dat($save) {
		deloldfile( DOCUMENT_ROOT.'/file/dat_folder/password/', '600' );
		deloldfile( DOCUMENT_ROOT.'/file/dat_folder/spam/', '600' );
		$datfile = 7;

		if (file_exists( DOCUMENT_ROOT . '/file/dat_folder/password/block_ip_' . $_SERVER['REMOTE_ADDR'] )) {
			$datfile = file( DOCUMENT_ROOT . '/file/dat_folder/password/block_ip_' . $_SERVER['REMOTE_ADDR'] );
			$datfile = trim( $datfile[0] );

			if (10 <= $datfile) {
				return 'block';
			}
		}


		if ($save == '1') {
			$file = @fopen( DOCUMENT_ROOT . '/file/dat_folder/password/block_ip_' . $_SERVER['REMOTE_ADDR'], 'w' );
			@fwrite( $file, $datfile + 1 );
			@fclose( $file );
		}

	}

	function crative_id_dat($save) {
		global $_POST;
		global $_GET;

		$id = (isset( $_POST['id'] ) ? $_POST['id'] : $_GET['id']);
		$us = (isset( $_POST['us'] ) ? $_POST['us'] : $_GET['us']);
		$id = (isset( $id ) ? $id : $us);

		if ($id == '') {
			return null;
		}

		$datfile = 9;

		if (file_exists( DOCUMENT_ROOT . '/file/dat_folder/password/block_id_' . $id )) {
			$datfile = file( DOCUMENT_ROOT . '/file/dat_folder/password/block_id_' . $id );
			$datfile = trim( $datfile[0] );

			if (( 10 <= $datfile && $save == '0' )) {
				return 'block';
			}
		}


		if ($save == '1') {
			if ($id == '') {
				$kv = array(  );
				foreach ($_POST as $keyr => $valuers) {
					$kv[] = '' . $keyr . '=' . $valuers;
				}

				$query_string = $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'] . '  _POST  ' . join( '&', $kv );
				$kv = array(  );
				foreach ($_GET as $keyr => $valuers) {
					$kv[] = '' . $keyr . '=' . $valuers;
				}

				$query_string = $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'] . '  _GET  ' . join( '&', $kv ) . $query_string;
				$file = @fopen( DOCUMENT_ROOT . '/file/dat_folder/password/block_id_' . $id, 'w' );
				@fwrite( $file, $query_string );
				@fclose( $file );
				return null;
			}

			$file = @fopen( DOCUMENT_ROOT . '/file/dat_folder/password/block_id_' . $id, 'w' );
			@fwrite( $file, $datfile + 1 );
			@fclose( $file );
		}

	}

	function utf_br($a) {
		$a = str_replace( '<', '(', mysql_real_escape_string( $a ) );
		$a = str_replace( '>', ')', $a );
		return a_spam_del( $a );
	}

	function a_spam_del($str) {
		$a = array( '(', ')' );
		$b = array( '', '' );
		return str_replace( $a, $b, $str );
	}

	function strpos_array($haystack, $needles) {
		$haystack = mb_strtolower( $haystack, 'UTF-8' );

		if (is_array( $needles )) {
			foreach ($needles as $str) {

				if (is_array( $str )) {
					$pos = strpos_array( $haystack, $str );
				} 
else {
					$haystack = str_replace( 'probel', ' ', $haystack );
					$str = str_replace( 'probel', ' ', strtolower( $str ) );
					$pos = strpos( strtolower( $haystack ), mb_strtolower( $str, 'UTF-8' ) );
				}


				if ($pos !== FALSE) {
					return $pos;
				}
			}

			return null;
		}

		$needles = str_replace( 'probel', ' ', $needles );
		$haystack = str_replace( 'probel', ' ', $haystack );
		return strpos( strtolower( $haystack ), strtolower( $needles ) );
	}

	function select_number_text($a) {
		$a = preg_replace( '/[^0-9\o]/i', '', strtolower( $a ) );
		$a = str_replace( 'o', '0', $a );
		$a = str_replace( 'l', '1', $a );
		$a = str_replace( 'i', '1', $a );
		return $a;
	}

	function spam_banned($status, $sebeb, $message, $black = '0', $info = '') {
		global $row;
		global $_AUTO;
		global $_POST;
		global $_GET;

		if ($_GET['nk']) {
			$nk = $_GET['nk'];
		} 
else {
			$nk = $_POST['nk'];
		}


		if ($black == '1') {
			serialize_save( $_SERVER['REMOTE_ADDR'], $row['user'], $row['id'] );
			$info = 'Add Black ' . $info;
		}


		if ($status == '1') {
			mysql_query( 'UPDATE `users` SET `banned` = \'2\', `time` = \'' . $_AUTO['online'] . ( '\', `whokik` = \'Sistem\', `whykik` = \'' . $sebeb . '\'  WHERE `id`=' ) . $row['id'] . ' LIMIT 1;' );
		}

		mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $message ) . '\', `id` = \'' . $row['id'] . '\', `usid` = \'' . $nk . ( '\', `status` = \'' . $status . '\', `time` = \'' ) . time(  ) . ( '\', `count` = \'' . $info . '\';' ) );
	}

	function update_flood($a, $b = '500') {
		global $row;
		global $_POST;
		global $_GET;
		global $reklam_text;
		global $new_user;
		global $OPERATOR;
		global $symbol_translit;
		global $number_black;
		global $A_OPERA;
		global $_AUTO;
		global $HTTP_USER_AGENT;

		if ($_GET['nk']) {
			$nk = $_GET['nk'];
		} 
else {
			$nk = $_POST['nk'];
		}

		$black_user = '1';
		$black_ip = serialize_save( 'ip' );

		if (strlen( $_SERVER['HTTP_USER_AGENT'] ) <= 4) {
			serialize_save( $HTTP_USER_AGENT, $row['user'], $row['id'] );
		}


		if ($OPERATOR != 'NULL') {
			$RAND_IPBROWSER = $OPERATOR . ':' . $_SERVER['HTTP_USER_AGENT'];
		} 
else {
			$RAND_IPBROWSER = $_SERVER['REMOTE_ADDR'];
		}


		if (in_array( $RAND_IPBROWSER, $black_ip )) {
			$black_user = '2';
		}


		if (( $row['posts'] < 100 || ( $row['posts'] < 300 && $black_user == '2' ) )) {
			if (strpos_array( select_number_text( $a ), $number_black )) {
				spam_banned( '1', 'Reklam', $a, '1', 'number' );
				return false;
			}
		}


		if (( ( $row['posts'] <= 20 && $black_user == '1' ) || ( $row['posts'] <= 200 && $black_user == '2' ) )) {
			if (strpos_array( $a, $symbol_translit )) {
				$count_msg = mysql_query( 'SELECT count(`id`) FROM `users` WHERE `user_ip` = \'' . $_SERVER['REMOTE_ADDR'] . '\' and `user_soft` = \'' . $_SERVER['HTTP_USER_AGENT'] . '\' and `time`>\'' . ( time(  ) - 172800 ) . '\' and `banned`=\'0\' and `posts`>\'100\';' );
				$rows = @mysql_result( $count_msg, 0 );

				if ($rows <= 5) {
					$black = '1';
				} 
else {
					$black = '0';
				}

				spam_banned( '1', 'Reklam', $a, $black );
				return false;
			}
		}


		if (( !preg_match( '!^[A-z0-9@\.\?]+$!i', $a ) && ( $black_user == '2' && $row['posts'] < 200 ) )) {
			spam_banned( '1', 'Reklam', $a, '0', 'black_ip' );
			return false;
		}


		if (( $row['posts'] < 20 || ( $row['posts'] < 200 && $black_user == '2' ) )) {
			if (strpos_array( $a, $new_user )) {
				spam_banned( '1', 'Reklam', $a, '1', 'new_user' );
				return false;
			}
		}


		if (( $row['posts'] < 20 || ( $row['posts'] < 200 && $black_user == '2' ) )) {
			$cetin_reklam = array( 'yoxduru', 'setaz', 'seheraz', 'qizlaaz', 'qlz', 'ziaaz', 'gezaz', 'nookteee', 'ookte', 'saitinde', 'mengediremsendeg', 'niyeaz', 'nlyeaz', 'a3', 'A3' );

			if (strpos_array( preg_replace( '/[^A-Za-z0-9\?\=]+/', '', $a ), $cetin_reklam )) {
				spam_banned( '1', 'Reklam', $a, '0', 'hard_reklam' );
				return false;
			}
		}


		if (( $row['posts'] < 100 || ( $row['posts'] < 300 && $black_user == '2' ) )) {
			$spam_text2 = array( 'ваl', 'sауiтinа', 'vereсeк', 'вiz' );

			if (strpos_array( preg_replace( '/[^A-z]\ё\й\ц\у\к\е\н\г\ш\щ\з\х\ъ\ф\ы\в\а\п\р\о\л\д\ж\э\я\ч\с\м\и\т\ь\б\ю/i', '', $a ), $spam_text2 )) {
				spam_banned( '1', 'Reklam', $a, '1', 'en_rus' );
				return false;
			}
		}

		$str_time = strlen( $a ) / 4;

		if ($str_time < 3) {
			$str_time = 12;
		}


		if ($black_user == '2') {
			$str_time = $str_time * 3;
		}


		if (preg_match( '/\[\d+\]/', $a )) {
			$str_time = $str_time * 15;
			spam_banned( '0', 'not', $a, '1', 'spam2' );
		}


		if ($row['posts'] < 500) {
			if (strpos_array( $a, $reklam_text )) {
				spam_banned( '1', 'Reklam', $a, '1', 'reklam' );
				return false;
			}


			if (time(  ) + 50 <= $row['flood']) {
				if ($_SERVER) {
					$kv = array(  );
					foreach ($_SERVER as $keyr => $valuers) {
						$kv[] = '' . $keyr . '=' . $valuers;
					}

					$query_string = $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'] . ( ( '
message=' . $a . '
' ) . '
' ) . join( '
', $kv );
				}

				$file = fopen( DOCUMENT_ROOT . '/file/dat_folder/log_server/' . $row['id'], 'w' );
				fwrite( $file, $query_string );
				fclose( $file );
				mysql_query( 'UPDATE `users` SET `kik` = \'' . ( time(  ) + 600 ) . '\', `time` = \'' . $_AUTO['online'] . '\', `whokik` = \'Sistem\', `whykik` = \'Flood Copy-Paste etmeyin.\' WHERE `id`=' . $row['id'] . ' LIMIT 1;' );
				mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $a ) . '\', `id` = \'' . $row['id'] . '\', `usid` = \'' . $nk . '\', `status` = \'1\', `time` = \'' . time(  ) . '\', `count` = \'f_time ' . ( $row['flood'] - time(  ) ) . '\';' );
			}


			if ('3' <= strlen( $a )) {
				if ($row['flood'] < time(  )) {
					$row['flood'] = time(  ) + $str_time;
				} 
else {
					$row['flood'] = $row['flood'] + $str_time;
				}

				mysql_query( 'UPDATE `users` SET `flood` = \'' . $row['flood'] . '\', `flood_id` = \'' . $nk . '\' WHERE `id`=' . $row['id'] . ' LIMIT 1;' );
			}


			if (( '3' <= strlen( $a ) && $row['flood_id'] != $nk )) {
				$yes_s = array(  );
				$yes_s[] = substr_count( $a, '~' );
				$yes_s[] = substr_count( $a, '-' );
				$yes_s[] = substr_count( $a, '_' );
				$spam = 9;
				$i = 9;

				while ($i < 4) {
					if (3 <= $yes_s[$i]) {
						$spam += $yes_s[$i];
					}

					++$i;
				}


				if ($spam < 2) {
					$spam = substr_count( $a, '`' ) * 2;
				}


				if (2 <= $spam) {
				}
			}
		}

		return $a;
	}

	function flood_profile($a) {
		global $row;
		global $_POST;
		global $_GET;
		global $reklam_text;
		global $new_user;
		global $OPERATOR;
		global $symbol_translit;

		if (strlen( $_SERVER['HTTP_USER_AGENT'] ) <= 4) {
			serialize_save( $_SERVER['REMOTE_ADDR'], $row['user'], $row['id'] );
		}


		if ($row['posts'] <= 20) {
			if (strpos_array( $a, $symbol_translit )) {
				$count_msg = mysql_query( 'SELECT count(`id`) FROM `users` WHERE `user_ip` = \'' . $_SERVER['REMOTE_ADDR'] . '\' and `user_soft` = \'' . $_SERVER['HTTP_USER_AGENT'] . '\' and `time`>\'' . ( time(  ) - 172800 ) . '\' and `banned`=\'0\' and `posts`>\'100\';' );
				$rows = @mysql_result( $count_msg, 0 );

				if ($rows <= 5) {
					if ($_GET['user']) {
						$user = $_GET['user'];
					} 
else {
						$user = $_POST['user'];
					}


					if ($row['id']) {
						serialize_save( $_SERVER['REMOTE_ADDR'], $row['user'], $row['id'] );
					} 
else {
						serialize_save( $_SERVER['REMOTE_ADDR'], $user );
					}
				}


				if ($row['id']) {
					mysql_query( 'UPDATE `users` SET `banned` = \'2\', `whokik` = \'Sistem\', `whykik` = \'Reklam\'  WHERE `id`=' . $row['id'] . ' LIMIT 1;' );
					mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $a ) . '\', `id` = \'' . $row['id'] . '\', `usid` = \'' . $nk . '\', `status` = \'13\', `time` = \'' . time(  ) . ( '\', `count` = \'add black_ip ' . $_SERVER['REMOTE_ADDR'] . '\';' ) );
					return false;
				}

				mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $a ) . '\', `status` = \'14\', `time` = \'' . time(  ) . ( '\', `count` = \'add black_ip ' . $_SERVER['REMOTE_ADDR'] . '\';' ) );
				return false;
			}
		}


		if ($row['posts'] < '20') {
			if (strpos_array( $a, $new_user )) {
				if (!$row['id']) {
					$count_msg = mysql_query( 'SELECT count(`id`) FROM `users` WHERE `user_ip` = \'' . $_SERVER['REMOTE_ADDR'] . '\' and `user_soft` = \'' . $_SERVER['HTTP_USER_AGENT'] . '\' and `time`>\'' . ( time(  ) - 172800 ) . '\' and `banned`=\'0\' and `posts`>\'100\';' );
					$rows = @mysql_result( $count_msg, 0 );

					if ($rows <= 5) {
						if ($_GET['user']) {
							$user = $_GET['user'];
						} 
else {
							$user = $_POST['user'];
						}

						serialize_save( $_SERVER['REMOTE_ADDR'], $user );
					}

					mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $a ) . '\', `status` = \'12\', `time` = \'' . time(  ) . ( '\', `count` = \'add black_ip ' . $_SERVER['REMOTE_ADDR'] . '\';' ) );
				} 
else {
					mysql_query( 'UPDATE `users` SET `banned` = \'2\', `whokik` = \'Sistem\', `whykik` = \'Reklam\'  WHERE `id`=' . $row['id'] . ' LIMIT 1;' );
					mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $a ) . '\', `id` = \'' . $row['id'] . '\', `usid` = \'' . $nk . '\', `status` = \'11\', `time` = \'' . time(  ) . '\', `count` = \'reklam\';' );
				}

				return false;
			}
		}


		if ($row['posts'] < 1000) {
			$a_1 = str_replace( '.', '', $a );
			$a_1 = str_replace( '&n', '.', $a_1 );

			if (strpos_array( $a_1, $reklam_text )) {
				if (!$row['id']) {
					$count_msg = mysql_query( 'SELECT count(`id`) FROM `users` WHERE `user_ip` = \'' . $_SERVER['REMOTE_ADDR'] . '\' and `user_soft` = \'' . $_SERVER['HTTP_USER_AGENT'] . '\' and `time`>\'' . ( time(  ) - 172800 ) . '\' and `banned`=\'0\' and `posts`>\'100\';' );
					$rows = @mysql_result( $count_msg, 0 );

					if ($rows <= 5) {
						if ($_GET['user']) {
							$user = $_GET['user'];
						} 
else {
							$user = $_POST['user'];
						}

						serialize_save( $_SERVER['REMOTE_ADDR'], $user );
					}

					mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $a ) . '\', `status` = \'12\', `time` = \'' . time(  ) . ( '\', `count` = \'add black_ip ' . $_SERVER['REMOTE_ADDR'] . '\';' ) );
				} 
else {
					mysql_query( 'UPDATE `users` SET `banned` = \'2\', `whokik` = \'Sistem\', `whykik` = \'Reklam\'  WHERE `id`=' . $row['id'] . ' LIMIT 1;' );
					mysql_query( 'INSERT INTO `flood` SET `text` = \'' . utf_br( $a ) . '\', `id` = \'' . $row['id'] . '\', `usid` = \'' . $nk . '\', `status` = \'9\', `time` = \'' . time(  ) . '\', `count` = \'profil\';' );
				}

				return false;
			}
		}

		return true;
	}

	$reklam_text = array( 'Ꭺ', 'ṃ', 'ḕ', 'ȇ', 'Ȇ', 'ɗ', 'Ɗ', 'ɐ', 'ʑ', 'ḭ', 'ḃ', 'ʂ', 'ʏ', 'ế', 'ա', 'ო', 'ղ', 'ჩ', 'ἶ', 'ṝ', 'ǭ', '乙', '乃', '➪', 'ѵ', 'զ', 'ƈ', 'ƅ', 'ʛ', 'ʅ', 'ɪ', 'ǥ', '₭', 'ϻ', 'ƙ', 'ℛ', 'ჯ', 'ฉ', 'ɱ', 'ΰ', '¡', 'ß', 'ʐ', '℮', 'آ', 'ƀ', 'Ƀ', 'ʀ', 'Ʀ', 'ω', 'ɧ', 'ล', 'ɽ', 'Ɽ', 'ｃ', '¦', 'ⱥ', 'Ⱥ', 'ҩ', 'ĺ', 'ĥ', 'ƒ', 'ų', 'ľ', 'ŀ', 'ł', 'đ', 'ƭ', 'ở', 'ö̤̇', 'ɦ', 'ɨ', 'έ', 'æ', 'ή', 'ǽ', '0rg', 'yatanda&n', '3jz', ']3iz' );
	$new_user = array( 'tоmаtiкh', 'tоmаtiкv', 'mекаn', '.яu', 'оrg', 'comprobel', 'set.az', '0RG', 'I3iZ', 'I3lZ', '!3lZ ', 'l3lZ', 'l3iZ', 'nkde', 'nokute', 'inguzgu', 'tocka', 'tochka', 'nokte', 'nokde', 'noqde', 'nöqte', 'noqte', 'nomreli', 'mekani', 'SIRINCIK', 'gelinler', 'dabulyu', 'ildebiz', 'darixmabiz', 'nomresine', 'kampaniya var', 'unvani', 'qizlaaz', 'gezaz', '.яu', 'l3ez', '3jz', ']3iz', 'b]z', 'soz.de)probel', 'soz.deprobel)', 'soz.probelde)', '&nyukle&n', '&seksl&n', '&pulsuz&n', 'erotik' );
	$symbol_translit = array( '3iz', '3iз', 'iзl', 'b)z', 'b}z', 'b(z', 'b{z', 'b!z', '9238983', '0552439242', 'tockabiz', '.яu', 'l3ez', '3jz', ']3iz', 'Ꮇ', 'õ', 'ø', 'ậ', 'â', 'á', 'ã', 'å', 'ê', 'ë', 'ý', 'ҳ', 'ŧ', 'ŏ', 'ň', 'ǔ', 'ǜ', 'ǿ', 'ÿ', 'ũ', 'ţ', 'ž', 'ř', 'ķ', 'ŗ', 'ċ', 'ź', 'į', 'ņ', 'ǻ', 'ą', 'ć', 'ė', 'ŝ', 'š', 'ǚ', 'ǖ', 'ǐ', 'ǒ', 'ǎ', 'ư', 'ơ', 'ż', 'ŷ', 'ŵ', 'ű', 'ů', 'ŭ', 'ū', 'ť', 'ś', 'ĵ', 'ļ', 'ń', 'ŉ', 'ō', 'ő', 'ĭ', 'č', 'ď', 'ē', 'ĕ', 'ę', 'ě', 'ħ', 'ĩ', 'ă', 'ĉ', 'à', 'ġ', 'ā', 'ĝ', 'ģ', 'ī', 'ŕ', 'ắ', 'ҡ', 'ỡ', 'α', 'і', 'ṍ', 'ẵ', 'ễ', 'ŋ', 'ƶ', 'ɓ', 'ї', 'ṇ', 'ɠ', 'ά', 'ḧ', 'ɲ', 'ί', 'ị', 'ḁ', 'ṉ', 'ñ', 'ð', 'ò' );
	$number_black = array( '552775293', '8055801', '2366673' );
?>