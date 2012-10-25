<?php
/*******************************************************************************
* data/include/class_nxs.php
*
* Genera yn evía un correo con documentos adjuntos
*

PHPfileNavigator versión 2.3.2

Copyright (C) 2004-2005 Lito <lito@eordes.com>

http://phpfilenavigator.litoweb.net/

Este programa es software libre. Puede redistribuirlo y/o modificarlo bajo los
términos de la Licencia Pública General de GNU según es publicada por la Free
Software Foundation, bien de la versión 2 de dicha Licencia o bien (según su
elección) de cualquier versión posterior. 

Este programa se distribuye con la esperanza de que sea útil, pero SIN NINGUNA
GARANTÍA, incluso sin la garantía MERCANTIL implícita o sin garantizar la
CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Véase la Licencia Pública General de
GNU para más detalles. 

Debería haber recibido una copia de la Licencia Pública General junto con este
programa. Si no ha sido así, escriba a la Free Software Foundation, Inc., en
675 Mass Ave, Cambridge, MA 02139, EEUU. 
*******************************************************************************/

defined('OK') or die();

/* **********************************************************************
 *
 * Copyright (C) 2003 - 2004 Alejandro Garcia Gonzalez.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 675 Mass Ave, Cambridge, MA 02139, USA.
 *
 * **********************************************************************
 *
 *	Class:			Nexus MIME Mail ('nxs_mimemail.inc.php')
 *	Version:			1.3
 *	Site:				http://nexus.nuestroweb.com
 *	Author:			Alejandro Garcia Gonzalez <nexus@nuestroweb.com>
 *
 * Contributors:	Pawel Tomicki <p.tomicki@digitalone.pl>
 *						Enrique Garcia M. <egarcia@egm.as>
 *						Ulises Hernandez <megazoidz@gmail.com>
 *
 * Description:
 * A class for sending MIME based e-mail messages.
 *
 * + Plain Text
 * + HTML
 * + Plain Text with Attachments
 * + HTML with Attachments
 * + HTML with Embedded Images
 * + HTML with Embedded Images and Attachments
 *
 * ********************************************************************** */


class PFN_nxs_mimemail {

	/**
 	 * Vars
	 */
	var $conf;
	var $imaxes;
	var $charset = '';
	var $mail_subject = '';
	var $mail_from = '';
	var $mail_to;
	var $mail_cc;
	var $mail_bcc;
	var $mail_text;
	var $mail_html;
	var $mail_type;
	var $mail_header;
	var $mail_body;
	var $mail_reply_to;
	var $mail_return_path;
	var $attachments_index;
	var $attachments = array();
	var $attachments_img = array();
	var $boundary_mix;
	var $boundary_rel;
	var $boundary_alt;
	var $sended_index;

/*
	var $error_msg = array(
			1	=>	'Mail was not sent',
			2	=>	'Body Build Incomplete',
			3	=>	'Need a mail recipient in mail_to',
			4	=>	'No valid Email',
			5	=>	'Opening File'
	);
*/

	/**
	 * Constructor
	 * void nxs_mimemail()
	 */
	function PFN_nxs_mimemail (&$PFN_conf) {
		$this->conf = &$PFN_conf;

		$this->boundary_mix = '=-nxs_mix_'.md5(uniqid(rand()));
		$this->boundary_rel = '=-nxs_rel_'.md5(uniqid(rand()));
		$this->boundary_alt = '=-nxs_alt_'.md5(uniqid(rand()));
		$this->attachments_index = 0;
		$this->sended_index = 0 ;
		$this->charset = $this->conf->g('charset');

		if(!defined('BR')){
			define('BR', (strstr(PHP_OS, 'WIN')?"\r\n":"\n"), TRUE);
		}
	}

	function imaxes (&$PFN_imaxes) {
		$this->imaxes = &$PFN_imaxes;
	}

	/**
	 * void set_from(string mail_from, [string name])
	 */
	function set_from ($mail_from, $name = '') {
		if (empty($mail_from)){
			$this->mail_from = $name.' <nomail@unkown.com>';
		} else {
			$this->mail_from = "$name <$mail_from>";
		}
	}

	/**
	 * bool set_to(string mail_to)
	 */
	function set_to ($mail_to) {
		$this->mail_to = $mail_to;
	}

	/**
	 * bool set_cc(string mail_cc)
	 */
	function set_cc ($mail_cc) {
		$this->mail_cc = $mail_cc;
	}


	/**
	 * bool set_bcc(string mail_bcc)
	 */
	function set_bcc ($mail_bcc) {
		$this->mail_bcc = $mail_bcc;
	}

	/**
	 * bool set_reply_to(string mail_reply_to, [string name])
	 */
	function set_reply_to ($mail_reply_to, $name = '') {
		if (empty($mail_reply_to)){
			$this->mail_reply_to = $name.' <nomail@unkown.com>';
		} else {
			$this->mail_reply_to = "$name <$mail_reply_to>";
		}
	}

	/**
	 * bool add_to(string mail_to)
	 */
	function add_to ($mail_to) {
		$this->mail_to = empty($this->mail_to)?$mail_to:($this->mail_to.', '.$mail_to);
	}


	/**
	 * bool add_cc(string mail_cc)
	 */
	function add_cc ($mail_cc) {
		$this->mail_cc = empty($this->mail_cc)?$mail_cc:($this->mail_cc.', '.$mail_cc);
	}


	/**
	 * bool add_bcc(string mail_bcc)
	 */
	function add_bcc ($mail_bcc) {
		$this->mail_bcc = empty($this->mail_bcc)?$mail_bcc:($this->mail_bcc.', '.$mail_bcc);
	}

	/**
	 * void set_subject(string subject)
	 */
	function set_subject ($subject) {
		$this->mail_subject = $subject;
	}

	/**
	 * void set_text(string text)
	 */
	function set_text ($text) {
		$this->mail_text = $text;
	}


	/**
	 * void set_html(string html)
	 */
	function set_html($html){
		if (!empty($html)){
			$this->mail_html = $html;
		}
	}

	/**
	 * void new_mail([mixed from], [mixed to], [string subject], [string text], [string html])
	 */
	function new_mail ($from = '', $to = '', $subject = '', $text = '', $html = '') {
		// First, clear all vars
		$this->mail_subject = '';
		$this->mail_from = '';
		$this->mail_to = '';
		$this->mail_cc = '';
		$this->mail_bcc = '';
		$this->mail_text = '';
		$this->mail_html = '';
		$this->mail_header = '';
		$this->mail_body = '';
		$this->mail_reply_to = '';
		$this->mail_return_path = '';
		$this->attachments_index = 0;
		$this->sended_index = 0;

		// Clear Array Vars
		$this->attachments = array();
		$this->attachments_img = array();

		// Asign vars
		if (is_array($from)) {
			$this->set_from($from[0],$from[1]);
		} else {
			$this->set_from($from);
		}

		if (is_array($to)) {
			foreach ($to as $v) {
				$this->add_to($v);
			}
		} else {
			$this->set_to($to);
		}

		$this->set_subject($subject);
		$this->set_text($text);
		$this->set_html($html);
	}

	/**
	 * void add_attachment(mixed file, string name)
	 */
	function add_attachment ($file, $name) {
		if ($content = $this->open_file($file)) {
			$this->attachments[$this->attachments_index] = array(
				'content' => chunk_split(base64_encode($content), 76, BR),
				'name' => $name,
				'type' => $this->imaxes->mime($name,true),
				'embedded' => false
			);

			$this->attachments_index++;
		} else {
			return 7;
		}
	}

	/**
	 * bool send()
	 */
	function send () {
		if (($this->sended_index == 0) && !$this->build_body()) {
			return 0;
		}

		return mail($this->mail_to, $this->mail_subject, $this->mail_body, $this->mail_header)?1:0;
	}

	/**
	 * Private
	 * bool build_body()
	 */
	function build_body () {
		switch ($this->parse_elements()) {
			case 1:
				$this->build_header('Content-Type: text/plain; charset="'.$this->charset.'"');
				$this->mail_body = $this->mail_text;
				break;
			case 3:
				$this->build_header('Content-Type: multipart/alternative; boundary="'.$this->boundary_alt.'"');
				$this->mail_body .= '--'.$this->boundary_alt.BR;
				$this->mail_body .= 'Content-Type: text/plain'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_text.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.BR;
				$this->mail_body .= 'Content-Type: text/html; charset="'.$this->charset.'"'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_html.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.'--'.BR;
				break;
			case 5:
				$this->build_header('Content-Type: multipart/mixed; boundary="'.$this->boundary_mix.'"');
				$this->mail_body .= '--'.$this->boundary_mix.BR;
				$this->mail_body .= 'Content-Type: text/plain'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_text.BR.BR;

				foreach ($this->attachments as $value) {
					$this->mail_body .= '--'.$this->boundary_mix.BR;
					$this->mail_body .= 'Content-Type: '.$value['type'].'; name="'.$value['name'].'"'.BR;
					$this->mail_body .= 'Content-Disposition: attachment; filename="'.$value['name'].'"'.BR;
					$this->mail_body .= 'Content-Transfer-Encoding: base64'.BR.BR;
					$this->mail_body .= $value['content'].BR.BR;
				}

				$this->mail_body .= '--'.$this->boundary_mix.'--'.BR;
				break;
			case 7:
				$this->build_header('Content-Type: multipart/mixed; boundary="'.$this->boundary_mix.'"');
				$this->mail_body .= '--'.$this->boundary_mix.BR;
				$this->mail_body .= 'Content-Type: multipart/alternative; boundary="'.$this->boundary_alt.'"'.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.BR;
				$this->mail_body .= 'Content-Type: text/plain'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_text.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.BR;
				$this->mail_body .= 'Content-Type: text/html; charset="'.$this->charset.'"'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_html.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.'--'.BR.BR;

				foreach ($this->attachments as $value) {
					$this->mail_body .= '--'.$this->boundary_mix.BR;
					$this->mail_body .= 'Content-Type: '.$value['type'].'; name="'.$value['name'].'"'.BR;
					$this->mail_body .= 'Content-Disposition: attachment; filename="'.$value['name'].'"'.BR;
					$this->mail_body .= 'Content-Transfer-Encoding: base64'.BR.BR;
					$this->mail_body .= $value['content'].BR.BR;
				}

				$this->mail_body .= '--'.$this->boundary_mix.'--'.BR;
				break;
			case 11:
				$this->build_header('Content-Type: multipart/related; type="multipart/alternative"; boundary="'.$this->boundary_rel.'"');
				$this->mail_body .= '--'.$this->boundary_rel.BR;
				$this->mail_body .= 'Content-Type: multipart/alternative; boundary="'.$this->boundary_alt.'"'.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.BR;
				$this->mail_body .= 'Content-Type: text/plain'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_text.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.BR;
				$this->mail_body .= 'Content-Type: text/html; charset="'.$this->charset.'"'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_html.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.'--'.BR.BR;

				foreach($this->attachments as $value){
					if ($value['embedded']){
						$this->mail_body .= '--'.$this->boundary_rel.BR;
						$this->mail_body .= 'Content-ID: <'.$value['embedded'].'>'.BR;
						$this->mail_body .= 'Content-Type: '.$value['type'].'; name="'.$value['name'].'"'.BR;
						$this->mail_body .= 'Content-Disposition: attachment; filename="'.$value['name'].'"'.BR;
						$this->mail_body .= 'Content-Transfer-Encoding: base64'.BR.BR;
						$this->mail_body .= $value['content'].BR.BR;
					}
				}

				$this->mail_body .= '--'.$this->boundary_rel.'--'.BR;
				break;
			case 15:
				$this->build_header('Content-Type: multipart/mixed; boundary="'.$this->boundary_mix.'"');
				$this->mail_body .= '--'.$this->boundary_mix.BR;
				$this->mail_body .= 'Content-Type: multipart/related; type="multipart/alternative"; boundary="'.$this->boundary_rel.'"'.BR.BR;
				$this->mail_body .= '--'.$this->boundary_rel.BR;
				$this->mail_body .= 'Content-Type: multipart/alternative; boundary="'.$this->boundary_alt.'"'.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.BR;
				$this->mail_body .= 'Content-Type: text/plain'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_text.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.BR;
				$this->mail_body .= 'Content-Type: text/html; charset="'.$this->charset.'"'.BR;
				$this->mail_body .= 'Content-Transfer-Encoding: 7bit'.BR.BR;
				$this->mail_body .= $this->mail_html.BR.BR;
				$this->mail_body .= '--'.$this->boundary_alt.'--'.BR.BR;

				foreach($this->attachments as $value){
					if ($value['embedded']){
						$this->mail_body .= '--'.$this->boundary_rel.BR;
						$this->mail_body .= 'Content-ID: <'.$value['embedded'].'>'.BR;
						$this->mail_body .= 'Content-Type: '.$value['type'].'; name="'.$value['name'].'"'.BR;
						$this->mail_body .= 'Content-Disposition: attachment; filename="'.$value['name'].'"'.BR;
						$this->mail_body .= 'Content-Transfer-Encoding: base64'.BR.BR;
						$this->mail_body .= $value['content'].BR.BR;
					}
				}

				$this->mail_body .= '--'.$this->boundary_rel.'--'.BR.BR;

				foreach($this->attachments as $value){
					if (!$value['embedded']){
						$this->mail_body .= '--'.$this->boundary_mix.BR;
						$this->mail_body .= 'Content-Type: '.$value['type'].'; name="'.$value['name'].'"'.BR;
						$this->mail_body .= 'Content-Disposition: attachment; filename="'.$value['name'].'"'.BR;
						$this->mail_body .= 'Content-Transfer-Encoding: base64'.BR.BR;
						$this->mail_body .= $value['content'].BR.BR;
					}
				}

				$this->mail_body .= '--'.$this->boundary_mix.'--'.BR;
				break;
			default:
				return 8;
		}

		$this->sended_index++;

		return true;
	}

	/**
	 * Private
	 * void build_header()
	 */
	function build_header ($content_type) {
		if (!empty($this->mail_from)) {
			$this->mail_header .= 'From: '.$this->mail_from.BR;
			$this->mail_header .= empty($this->mail_reply_to)?('Reply-To: '.$this->mail_from.BR):('Reply-To: '.$this->mail_reply_to.BR);
		}

		if (!empty($this->mail_cc)) {
			$this->mail_header .= 'Cc: '.$this->mail_cc.BR;
		}

		if (!empty($this->mail_bcc)) {
			$this->mail_header .= 'Bcc: '.$this->mail_bcc.BR;
		}

		if (!empty($this->mail_return_path)) {
			$this->mail_header .= 'Return-Path: '.$this->mail_return_path.BR;
		}

		$this->mail_header .= 'MIME-Version: 1.0'.BR;
		$this->mail_header .= 'X-Mailer: neXus MIME Mail - PHP/'.phpversion().BR;
		$this->mail_header .= $content_type;
	}

	/**
	 * Private
	 * mixed parse_elements()
	 */
	function parse_elements () {
		if (empty($this->mail_to)) {
			return 4;
		}

		$this->mail_type = 0;
		$this->search_images();

		if (!empty($this->mail_text)) {
			$this->mail_type = $this->mail_type + 1;
		}

		if (!empty($this->mail_html)) {
			$this->mail_type = $this->mail_type + 2;

			if (empty($this->mail_text)) {
				$this->mail_text = strip_tags(preg_replace('/(<br>|<br \/>)/i',BR,$this->mail_html));
				$this->mail_type = $this->mail_type + 1;
			}
		}

		if ($this->attachments_index != 0) {
			if (count($this->attachments_img) != 0){ 
				$this->mail_type = $this->mail_type + 8;
			}

			if ((count($this->attachments) - count($this->attachments_img)) >= 1) {
				$this->mail_type = $this->mail_type + 4;
			}
		}

		return $this->mail_type;
	}


	/**
	 * Private
	 * void search_images()
	 */
	function search_images () {
		if ($this->attachments_index != 0) {
			foreach($this->attachments as $key => $value){

				//TNX to Pawel Tomicki, Enrique Garcia M.
				//only one instruction to support background and src, better REGEX syntax
				//additional CSS support
				if (preg_match('/(css|image)/i', $value['type'])
				&& preg_match('/\s(background|href|src)\s*=\s*[\"|\']('.$value['name'].')[\"|\'].*>/is', $this->mail_html)) {
					$img_id = md5($value['name']).'.nxs@mimemail';
					$this->mail_html = preg_replace('/\s(background|href|src)\s*=\s*[\"|\']('.$value['name'].')[\"|\']/is', ' \\1="cid:'.$img_id.'"', $this->mail_html);
					$this->attachments[$key]['embedded'] = $img_id;
					$this->attachments_img[] = $value['name'];
				}
			}
		}
	}

	/**
	 * Private
	 * int open_file(string file)
	 */
	function open_file ($file) {
		if(($fp = @fopen($file, 'r'))) {
			$content = fread($fp, filesize($file));
			fclose($fp);

			return $content;
		}

		return 7;
	}
}
?>
