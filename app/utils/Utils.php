<?php

/**
 * File Utils.php
 *
 * PHP version 5.3+
 *
 * @author    iLucians <ilucians.com>
 * @copyright 2013 iLucians
 * @license   http://ilucians.com
 * @version   XXX
 * @link      http://ilucians.com
 * @category  Utils
 * @package   Utils
 */

/**
 * Class Utils
 *
 * Provide some utilities for web app
 *
 * @author    iLucians <ilucians.com>
 * @copyright 2013 iLucians
 * @license  http://ilucians.com/license license
 * @version   XXX
 * @category  Utils
 * @package   Utils
 * @since     XXX
 */
class Utils {

	/**
	 * General a random password string
	 *
	 * @param int $len is a length of string (default is 8)
	 * 
	 * @return string a random string with length was pass.
	 * @since  XXX
	 */
	public static function randomPassword($len = 8) {
		$alphabet = 'abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < $len; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}

	/**
	 * Convert video to formater which is supported to play video on web browser as .webm, .mp4, .ogg
	 * Ex: exec("ffmpeg -i video.mpg -ar 44100 -ab 32 -f mp4 -s 640x320 SPIKE.MOV.mp4");
	 * ffmpeg -r 30 -i test.mov -s 640x320 -vcodec libtheora -acodec libvorbis out.ogv
	 * 
	 * @param string $inputVideo video filename to convert
	 * @param string $outPutFile Output video filename
	 * @param string $outPutFormater Output video formatter
	 * @param string $sDimension Output video dimension (ex: width x height: 640x320)
	 * @param int $arAudio Audio rate in Hz, default is 44100 (only using for .mp4 converter)
	 * @param int $abAudio Audio bit rate in kbit/s, default is 32 (only using for .mp4 converter)
	 * 
	 * @return string Video output to play on web browser
	 * @since  XXX
	 */
	public static function videoConverter($inputVideo, $outputVideo, $outputFormater, $sDimension = '640x320', $arAudio = 44100, $abAudio = 32) {
		if (file_exists($inputVideo)) {
			$tempPath = sys_get_temp_dir();
			$converterLogPath = $tempPath . '/stories/videos/';
			if (!is_dir($converterLogPath)) {
				mkdir($converterLogPath, 0777, true);
			}
			try {
				$ffmpegObj = new ffmpeg_movie($inputVideo);
				//get audio bitrate from source file
				$srcAB = intval($ffmpegObj->getAudioBitRate());
				//get audio bitrate from source file
				$srcVB = intval($ffmpegObj->getVideoBitRate());
				switch ($outputFormater) {
					case 'webm':
						$command = 'ffmpeg -i ' . $inputVideo . ' -acodec libvorbis -b:a 96k -ac 2 -vcodec libvpx -b:v 400k '; //-ar ' . $arAudio. ' -ab '.$abAudio;
						$command .= ' -f ' . $outputFormater . ' -s ' . $sDimension . ' ' . $outputVideo;
						$command .= ' 1> '.$converterLogPath.'webm_block.txt 2>&1';
						break;
					case 'ogg':
						//set the audio codec to libvorbis
						$aCodec = ' -acodec libvorbis';
						//set the video codec to libtheora
						$vCodec = ' -vcodec libtheora';
						$command = 'ffmpeg -i ' . $inputVideo . $vCodec . $aCodec . ' -vb ' . $srcVB . ' -ar ' . $arAudio . ' -ab ' . $srcAB;
						$command .=' -f ' . $outputFormater . ' -s ' . $sDimension . ' ' . $outputVideo;
						//$command .=' 1> d:\wamp\www\stories\public\videos\block.txt 2>&1 </dev/null';
						break;
					case 'mp4':
						$command = 'ffmpeg -i ' . $inputVideo . ' -strict experimental -ar ' . $arAudio . ' -ab ' . $srcAB;
						$command .= ' -f ' . $outputFormater . ' -s ' . $sDimension . ' ' . $outputVideo;
						$command .= ' 1> '.$converterLogPath.'mp4_block.txt 2>&1';
						break;
					default:
						sprintf($outputFormater, "The converter is not support formater: %s. Please try with .mp4, .webm, .ogg");
						return false;
						break;
				}
				$proc = popen($command, "r");
				$read = fread($proc, 2096);
				pclose($proc);
				$fileConverted = self::getVideoInfo($outputVideo);
				return $fileConverted;
			} catch (Exception $ex) {
				error_log($inputVideo);
				error_log($ex->getMessage());
				return false;
			}
		} else {
			return false;
		}
	}

	/**
	 * Convert audios to formater mp3
	 * Ex: exec("ffmpeg -i sample.wav audio.mp3");
	 * 
	 * @param string $inputAudio audio filename to convert
	 * @param string $outPutFile Output audil filename
	 * 
	 * @return string Audio output to play on web browser
	 * @since  XXX
	 */
	public static function mp3Converter($inputAudio, $outPutFile = null) {
		if (file_exists($inputAudio)) {
			try {
				if ($outPutFile === null) {
					$fileSystem = sys_get_temp_dir();

					$outPutFile = $fileSystem . '/' . self::randomString(16) . 'mp3';
				}
				$command = 'ffmpeg -i ';
				$command .=$inputAudio . ' ';
				$command .=$outPutFile;
				//echo $command;// exit();
				exec($command);
				$fileConverted = self::getVideoInfo($outPutFile);
				return $fileConverted;
			} catch (Exception $ex) {
				error_log($ex->getMessage());
			}
		} else {
			return false;
		}
	}

	//	ffmpeg -i '.$filePath.' -ar 8000 -ab 16000 '.str_replace('m4a', 'mp3', $filePath)
//	}

	/**
	 * Using the getID3 library to get the info of a video file as:
	 * filesize; x-y dimension; duration; mime_type; formatter; dataformat
	 * 
	 * @param string $video file path of video
	 * @return array info of video file
	 * @since  XXX
	 */
	public static function getVideoInfo($video = false) {
		if (file_exists($video)) {
			require_once 'getid3/getid3.php';
			try {
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$getID3 = new getID3;
				$file = $getID3->analyze($video);
				$fileInfo = array(
					'filename' => @$file['filename'],
					'file_size' => @$file['filesize'],
					'x-dimension' => @$file['video']['resolution_x'],
					'y-dimension' => @$file['video']['resolution_y'],
					'duration' => @$file['playtime_string'],
					'mime_type' => @finfo_file($finfo, $video),
					'formater' => @$file['fileformat']);
				finfo_close($finfo);
				return $fileInfo;
			} catch (Exception $ex) {
				echo $video . "<br\>\n";
				echo $ex->getMessage();
			}
		} else {
			return false;
		}
	}

	/**
	 * Get resize dimension of video upload, return the dimension of video as x-dimension x y-dimension (640x480)
	 * 
	 * @param string $fileSrc source file to resize
	 * @param int $newWidth resize file base on width, default is 640
	 * 
	 * @return array new x-dimension, y-dimension, dimension of file
	 * Ex: array('x-dimension'=>640, 'y-dimension'=>480, dimension=>'640x480')
	 * @since XXX
	 */
	public static function resizeFileDimension($fileSrc, $newWidth = '640') {
		$resizeInfo = array();
		if (file_exists($fileSrc)) {
			$fileInfo = self::getVideoInfo($fileSrc);
			if ($fileInfo['x-dimension'] <= $newWidth) {
				$resizeInfo['x-dimension'] = $fileInfo['x-dimension'];
				$resizeInfo['y-dimension'] = $fileInfo['y-dimension'];
				$resizeInfo['dimension'] = $fileInfo['x-dimension'] . 'x' . $fileInfo['y-dimension'];
			} else {
				$resizeInfo['x-dimension'] = $newWidth;
				$resizeInfo['y-dimension'] = round(($newWidth * $fileInfo['y-dimension']) / $fileInfo['x-dimension'], 0);
				$resizeInfo['dimension'] = $resizeInfo['x-dimension'] . 'x' . $resizeInfo['y-dimension'];
			}
			return $resizeInfo;
		} else {
			return false;
		}
	}

	/**
	 * General random lower string to create new name for file upload
	 * 
	 * @param int $len length of string to general, default is 16 and maximum is 32
	 * 
	 * @return string random unique string with length was passed
	 * @since  XXX
	 */
	public static function randomString($len = 16) {
		// create a random string: unique identifier based on the current time in microseconds and md5 it.
		$strMd5Uniqid = md5(uniqid(rand(), true));
		$randomString = substr($strMd5Uniqid, 0, $len); // get random string with $len
		return $randomString;
	}
	

	
	public static function barcodeGenerator($number = 1){
		$uniqnum = time();
		$result = array();
		
	}

}

?>
