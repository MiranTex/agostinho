<?php
/**
 * @package Helix Ultimate Framework
 * @author JoomShaper https://www.joomshaper.com
 * @copyright Copyright (c) 2010 - 2018 JoomShaper
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 or Later
*/

defined ('JPATH_BASE') or die();

$params = $displayData->params;
$attribs = json_decode($displayData->attribs);

$template = JFactory::getApplication('site')->getTemplate(true);
$tplParams = $template->params;
$blog_image = $tplParams->get('blog_details_image', 'large');
$full_image = '';

if(isset($attribs->helix_ultimate_image) && $attribs->helix_ultimate_image != '')
{
	if($blog_image == 'default')
	{
		$full_image = $attribs->helix_ultimate_image;
	}
	else
	{
		$full_image = $attribs->helix_ultimate_image;
		$basename = basename($full_image);
		$details_image = JPATH_ROOT . '/' . dirname($full_image) . '/' . JFile::stripExt($basename) . '_'. $blog_image .'.' . JFile::getExt($basename);
		if(JFile::exists($details_image)) {
			$full_image = JURI::root(true) . '/' . dirname($full_image) . '/' . JFile::stripExt($basename) . '_'. $blog_image .'.' . JFile::getExt($basename);
		}
	}
}

?>
<?php if($full_image) : 
$full_image_alt_txt = isset($attribs->helix_ultimate_image_alt_txt) && $attribs->helix_ultimate_image_alt_txt != '' ? $attribs->helix_ultimate_image_alt_txt : $displayData->title;
?>
	<div class="article-full-image">
		<img src="<?php echo $full_image; ?>" alt="<?php echo htmlspecialchars($full_image_alt_txt, ENT_COMPAT, 'UTF-8'); ?>" itemprop="image">
	</div>
<?php else: ?>
	<?php $images = json_decode($displayData->images); ?>
	<?php if (isset($images->image_fulltext) && !empty($images->image_fulltext)) : ?>
		<?php $imgfloat = empty($images->float_fulltext) ? $params->get('float_fulltext') : $images->float_fulltext; ?>
		<div class="article-full-image fltoa-<?php echo htmlspecialchars($imgfloat); ?>"> <img
			<?php if ($images->image_fulltext_caption) :
				echo 'class="caption"' . ' title="' . htmlspecialchars($images->image_fulltext_caption) . '"';
			endif; ?>
			src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo htmlspecialchars($images->image_fulltext_alt); ?>" itemprop="image"> </div>
	<?php endif; ?>
<?php endif; ?>
