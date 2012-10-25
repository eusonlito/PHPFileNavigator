<?php
/****************************************************************************
* data/plantillas/Xtraduccion.inc.php
*
* plantilla para la visualización del formulario para traduccion
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

defined('OK') && defined('XESTION') or die();
?>
<div id="ver_info">
	<div class="bloque_info"><h1><?php echo $PFN_conf->t('xestion').' &raquo; '.$PFN_conf->t('Xtraduccion'); ?></h1></div>
	<div class="bloque_info">
		<div id="Xinformes_cab">
			<div style="background: #EEE; text-align: center;"><a href="estado.php?<?php echo PFN_get_url(false); ?>"><?php echo $PFN_conf->t('Xcomprobar_traduccions'); ?></a></div>

			<br /><?php echo $PFN_conf->t('Xtraduccion_intro'); ?><br />
			<form action="index.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="executa" value="escoller" />

			<br /><div style="text-align: center;">
				<strong><?php echo $PFN_conf->t('charset'); ?>:</strong>
				<select name="tr_charset" tabindex="5">
					<option value="US-ASCII"<?php echo ($tr_charset == 'US-ASCII')?' selected="selected"':''; ?>>US-ASCII United States</option>
					<option value="ISO-8859-1"<?php echo ($tr_charset == 'ISO-8859-1')?' selected="selected"':''; ?>>ISO-8859-1 Westerm European</option>
					<option value="ISO-8859-2"<?php echo ($tr_charset == 'ISO-8859-2')?' selected="selected"':''; ?>>ISO-8859-2 East European</option>
					<option value="ISO-8859-3"<?php echo ($tr_charset == 'ISO-8859-3')?' selected="selected"':''; ?>>ISO-8859-3 South European</option>
					<option value="ISO-8859-4"<?php echo ($tr_charset == 'ISO-8859-4')?' selected="selected"':''; ?>>ISO-8859-4 North European</option>
					<option value="ISO-8859-5"<?php echo ($tr_charset == 'ISO-8859-5')?' selected="selected"':''; ?>>ISO-8859-5 Cyrillic</option>
					<option value="ISO-8859-6"<?php echo ($tr_charset == 'ISO-8859-6')?' selected="selected"':''; ?>>ISO-8859-6 Arabic</option>
					<option value="ISO-8859-7"<?php echo ($tr_charset == 'ISO-8859-7')?' selected="selected"':''; ?>>ISO-8859-7 Greek</option>
					<option value="ISO-8859-8"<?php echo ($tr_charset == 'ISO-8859-8')?' selected="selected"':''; ?>>ISO-8859-8 Hebrew</option>
					<option value="ISO-8859-9"<?php echo ($tr_charset == 'ISO-8859-9')?' selected="selected"':''; ?>>ISO-8859-9 Turkish</option>
					<option value="ISO-8859-10"<?php echo ($tr_charset == 'ISO-8859-10')?' selected="selected"':''; ?>>ISO-8859-10 Nordic</option>
					<option value="ISO-8859-11"<?php echo ($tr_charset == 'ISO-8859-11')?' selected="selected"':''; ?>>ISO-8859-11 Thai</option>
					<option value="ISO-8859-14"<?php echo ($tr_charset == 'ISO-8859-14')?' selected="selected"':''; ?>>ISO-8859-14 Celtic</option>
					<option value="ISO-8859-15"<?php echo ($tr_charset == 'ISO-8859-15')?' selected="selected"':''; ?>>ISO-8859-15 Latin-9</option>
					<option value="ISO-8859-16"<?php echo ($tr_charset == 'ISO-8859-16')?' selected="selected"':''; ?>>ISO-8859-16 South-Eastern European</option>
					<option value="UTF-8"<?php echo ($tr_charset == 'UTF-8')?' selected="selected"':''; ?>>UTF-8 Unicode</option>
					<option value="Big5"<?php echo ($tr_charset == 'Big5')?' selected="selected"':''; ?>>Big5 Chinese Traditional (Taiwan, HongKong)</option>
					<option value="EUC-TW"<?php echo ($tr_charset == 'EUC-TW')?' selected="selected"':''; ?>>EUC-TW Chinese Traditional</option>
					<option value="GB2312"<?php echo ($tr_charset == 'GB2312')?' selected="selected"':''; ?>>GB2312 Chinese Simplified</option>
					<option value="GB"<?php echo ($tr_charset == 'GB')?' selected="selected"':''; ?>>GB (GuoBiao) Chinese Simplified</option>
					<option value="GBK"<?php echo ($tr_charset == 'GBK')?' selected="selected"':''; ?>>GBK Chinese Simplified</option>
					<option value="HZ"<?php echo ($tr_charset == 'HZ')?' selected="selected"':''; ?>>HZ Chinese Simplified</option>
					<option value="ISO-2022-GB"<?php echo ($tr_charset == 'ISO-2022-GB')?' selected="selected"':''; ?>>ISO-2022-GB New Chinese standard</option>
					<option value="EUC-JP"<?php echo ($tr_charset == 'EUC-JP')?' selected="selected"':''; ?>>EUC-JP Japanese</option>
					<option value="EUC-JIS"<?php echo ($tr_charset == 'EUC-JIS')?' selected="selected"':''; ?>>EUC-JIS Japanese</option>
					<option value="ISO-2022-JP"<?php echo ($tr_charset == 'ISO-2022-JP')?' selected="selected"':''; ?>>ISO-2022-JP Japanese</option>
					<option value="ISO-2022-KR"<?php echo ($tr_charset == 'ISO-2022-KR')?' selected="selected"':''; ?>>ISO-2022-KR Korean</option>
					<option value="EUC-KR"<?php echo ($tr_charset == 'EUC-KR')?' selected="selected"':''; ?>>EUC-KR Korean</option>
					<option value="KO18-R"<?php echo ($tr_charset == 'KO18-R')?' selected="selected"':''; ?>>KO18-R Cyrillic</option>
					<option value="KO18-U"<?php echo ($tr_charset == 'KO18-U')?' selected="selected"':''; ?>>KO18-U Cyrillic</option>
				</select>&nbsp;&nbsp;&nbsp;

				<strong><?php echo $PFN_conf->t('Xlistar'); ?>:</strong>
				<select name="tr_listar">
					<option value="todas"<?php echo ($tr_listar == 'todas')?' selected="selected"':''; ?>> <?php echo $PFN_conf->t('Xtodas'); ?></option>
					<option value="vacias"<?php echo ($tr_listar == 'vacias')?' selected="selected"':''; ?>> <?php echo $PFN_conf->t('Xsen_traducir'); ?></option>
				</select>

				<br />

				<strong><?php echo $PFN_conf->t('Xarquivo'); ?>:</strong>
				<select name="tr_arquivo">
					<?php foreach (array('axuda','estado','idiomas','instalar','web','xestion') as $v) { ?>
					<option value="<?php echo $v; ?>"<?php echo ($v == $tr_arquivo)?' selected="selected"':''; ?>> <?php echo ucfirst($v); ?> </option>
					<?php } ?>
				</select>&nbsp;&nbsp;&nbsp;

				<strong><?php echo $PFN_conf->t('orixe'); ?>:</strong>
				<select name="tr_orixe">
					<option value=""><?php echo $PFN_conf->t('Xescolle_idioma'); ?></option>
					<?php
					foreach ($idiomas_valen as $k => $v) {
					?>
					<option value="<?php echo $k; ?>"<?php echo ($k == $tr_orixe)?' selected="selected"':''; ?>> <?php echo $v; ?> </option>
					<?php } ?>
				</select>&nbsp;&nbsp;&nbsp;

				<strong><?php echo $PFN_conf->t('destino'); ?>:</strong>
				<select name="tr_destino">
					<option value=""><?php echo $PFN_conf->t('Xescolle_idioma'); ?></option>
					<?php foreach ($lista_idiomas as $k => $v) { ?>
					<option value="<?php echo $k; ?>"<?php echo ($k == $tr_destino)?' selected="selected"':''; ?>> <?php echo $v; ?> </option>
					<?php } ?>
				</select>&nbsp;&nbsp;&nbsp;

				<br /><br />
				<input type="reset" value=" <?php echo $PFN_conf->t('voltar'); ?> " class="boton" onclick="enlace('../index.php?<?php echo PFN_get_url(false); ?>');" />
				<input type="submit" value=" <?php echo $PFN_conf->t('aceptar'); ?> " style="margin-left: 40px;" class="boton" /><br />
			</div><br />
			</fieldset>
			</form>
		</div>

		<div id="Xinformes_resultado">
			<?php
			if (count($erros) || $ok) {
				echo '<div class="aviso">';

				if (count($erros)) {
					foreach ($erros as $v) {
						echo $PFN_conf->t('Xerros',$v).'<br />';
					}
				} else {
					echo $PFN_conf->t('Xok',6);
				}

				echo '</div><br />';
			}
			?>
			<form action="gdar.php?<?php echo PFN_get_url(false); ?>" method="post" onsubmit="return submitonce();">
			<fieldset>
			<input type="hidden" name="executa" value="gardar" />
			<input type="hidden" name="tr_orixe" value="<?php echo $tr_orixe; ?>" />
			<input type="hidden" name="tr_destino" value="<?php echo $tr_destino; ?>" />
			<input type="hidden" name="tr_arquivo" value="<?php echo $tr_arquivo; ?>" />
			<input type="hidden" name="tr_listar" value="<?php echo $tr_listar; ?>" />
			<input type="hidden" name="tr_charset" value="<?php echo $tr_charset; ?>" />

			<?php
			foreach ($datos_orixe as $k => $v) {
				if (is_array($v)) {
					foreach ($v as $k2 => $v2) {
						if (empty($datos_destino[$k][$k2]) || $tr_listar == 'todas') {
							echo "\n".'<h1>'.$PFN_conf->t('Xclave').': '.$k.'</h1><br />';
							break;
						}
					}

					foreach ($v as $k2 => $v2) {
						$txt_destino = preg_replace('/(<br>|<br \/>)/i', "\n", $datos_destino[$k][$k2]);

						if (empty($txt_destino) || $tr_listar == 'todas') {
							$alto = intval(strlen($v2)/85);
							$alto = (($alto == 0)?1:$alto)+1;
							$v2 = preg_replace('/(<br>|<br \/>)/i',"\n", $v2);
							$v2 = preg_replace('/\<((\/|\w).*)\>/sU','&lt;\\1&gt;', $v2);
							$v2 = PFN_cambia_intros($v2);

							echo"\n". '<br /><h2>'.$PFN_conf->t('Xsub_clave').': '.$k2.'</h2><br />'
								.'<div class="fondo_gris">'.$v2.'<br />'
								.'<textarea name="idioma_i['.$k.']['.$k2.']" style="width: 680px;" rows="'.$alto.'">'
								.$txt_destino.'</textarea></div><br />';
						} else {
							echo "\n".'<textarea style="display: none;" name="idioma_i['.$k.']['.$k2.']">'.$txt_destino.'</textarea>';
						}
					}
				} else {
					$txt_destino = preg_replace('/(<br>|<br \/>)/i', "\n", $datos_destino[$k]);

					if (empty($txt_destino) || $tr_listar == 'todas') {
						echo "\n".'<h1>'.$PFN_conf->t('Xclave').': '.$k.'</h1><br />';
						$alto = intval(strlen($v)/85);
						$alto = (($alto == 0)?1:$alto)+1;
						$v = preg_replace('/(<br>|<br \/>)/i',"\n", $v);
						$v = preg_replace('/\<((\/|\w).*)\>/sU','&lt;\\1&gt;', $v);
						$v = PFN_cambia_intros($v);

						echo "\n".'<div class="fondo_gris">'.$v.'<br />'
							.'<textarea name="idioma_i['.$k.']" style="width: 680px;" rows="'.$alto.'">'
							.$txt_destino.'</textarea></div><br />';
					} else {
						echo "\n".'<textarea style="display: none;" name="idioma_i['.$k.']">'.$txt_destino.'</textarea>';
					}
				}

				unset($txt_destino);
			}
			?>
			<br />

			<?php if (!empty($executa)) { ?>
			<div style="text-align: center;">
				<input type="reset" value=" <?php echo $PFN_conf->t('Xreiniciar_campos'); ?> " class="boton" />
				<input type="submit" value=" <?php echo $PFN_conf->t('Xgardar_idioma'); ?> " style="margin-left: 40px;" class="boton" />
			</div>
			<?php } ?>
			<br /><br />
			</fieldset>
			</form>
		</div>
	</div>
</div>
