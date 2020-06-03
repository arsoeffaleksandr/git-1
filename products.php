<?php
/**
 * sublayout products
 *
 * @package	VirtueMart
 * @author Max Milbers
 * @link http://www.virtuemart.net
 * @copyright Copyright (c) 2014 VirtueMart Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL2, see LICENSE.php
 * @version $Id: cart.php 7682 2014-02-26 17:07:20Z Milbo $
 */

defined('_JEXEC') or die('Restricted access');
$products_per_row = $viewData['products_per_row'];
$currency = $viewData['currency'];
$showRating = $viewData['showRating'];
$verticalseparator = " vertical-separator";
echo shopFunctionsF::renderVmSubLayout('askrecomjs');

$ItemidStr = '';
$Itemid = shopFunctionsF::getLastVisitedItemId();
if(!empty($Itemid)){
	$ItemidStr = '&Itemid='.$Itemid;
}

foreach ($viewData['products'] as $type => $products ) {

	$rowsHeight = shopFunctionsF::calculateProductRowsHeights($products,$currency,$products_per_row);

	if(!empty($type) and count($products)>0){
		$productTitle = vmText::_('COM_VIRTUEMART_'.strtoupper($type).'_PRODUCT'); ?>
<div class="<?php echo $type ?>-view">
  <h4><?php echo $productTitle ?></h4>
		<?php // Start the Output
    }

	// Calculating Products Per Row
switch($products_per_row){
    case 1:
        $cellwidth = 'col-lg-12 col-md-12 col-sm-12 col-xs-12';
        break;
    case 2:
        $cellwidth = 'col-lg-6 col-md-6 col-sm-6 col-xs-12';
        break;
    case 3:
        $cellwidth = 'col-lg-4 col-md-4 col-sm-6 col-xs-12';
        break;
    case 4:
        $cellwidth = 'col-lg-3 col-md-3 col-sm-4 col-xs-12';
        break;
    case 5:
       $cellwidth = 'col-lg-3 col-md-3 col-sm-4 col-xs-12';
        break;
    default:
        $cellwidth = 'col-lg-2 col-md-3 col-sm-4 col-xs-12';
}
	$BrowseTotalProducts = count($products);

	$col = 1;
	$nb = 1;
	$row = 1;
?><div class="row"><?php
foreach ( $products as $product ) {
// Show Products ?>
<div class="product <?php echo $cellwidth ?>">
    <div class="spacer">
        <div class="vm-product-media-container">

                <a title="<?php echo $product->product_name ?>" href="<?php echo $product->link.$ItemidStr; ?>">
                    <?php
                    echo $product->images[0]->displayMediaThumb('class="browseProductImage"', false);
                    ?>
                </a>

        </div>

        <div class="vm-product-rating-container">
            <?php echo shopFunctionsF::renderVmSubLayout('rating',array('showRating'=>$showRating, 'product'=>$product));
            if ( VmConfig::get ('display_stock', 1)) { ?>
                <span class="vmicon vm2-<?php echo $product->stock->stock_level ?>" title="<?php echo $product->stock->stock_tip ?>"></span>
            <?php }
            echo shopFunctionsF::renderVmSubLayout('stockhandle',array('product'=>$product));
            ?>
        </div>


            <div class="vm-product-descr-container-<?php echo $rowsHeight[$row]['product_s_desc'] ?>">
                <h2><?php echo JHtml::link ($product->link.$ItemidStr, $product->product_name); ?></h2>
                <?php if(!empty($rowsHeight[$row]['product_s_desc'])){
                ?>
                <p class="product_s_desc">
                    <?php // Product Short Description
                    if (!empty($product->product_s_desc)) {
                        echo shopFunctionsF::limitStringByWord ($product->product_s_desc, 60, ' ...') ?>
                    <?php } ?>
                </p>
        <?php  } ?>
            </div>


        <?php //echo $rowsHeight[$row]['price'] ?>
        <div class="vm3pr-<?php echo $rowsHeight[$row]['price'] ?>"> <?php
            echo shopFunctionsF::renderVmSubLayout('prices',array('product'=>$product,'currency'=>$currency)); ?>
            <div class="clear"></div>
        </div>
        <?php //echo $rowsHeight[$row]['customs'] ?>
        <div class="vm3pr-<?php echo $rowsHeight[$row]['customfields'] ?>"> <?php
            echo shopFunctionsF::renderVmSubLayout('addtocart',array('product'=>$product,'rowHeights'=>$rowsHeight[$row], 'position' => array('ontop', 'addtocart'))); ?>
        </div>

        <div class="vm-details-button">
            <?php // Product Details Button
            $link = empty($product->link)? $product->canonical:$product->link;
            echo JHtml::link($link.$ItemidStr,vmText::_ ( 'COM_VIRTUEMART_PRODUCT_DETAILS' ), array ('title' => $product->product_name, 'class' => 'product-details' ) );
            //echo JHtml::link ( JRoute::_ ( 'index.php?option=com_virtuemart&view=productdetails&virtuemart_product_id=' . $product->virtuemart_product_id . '&virtuemart_category_id=' . $product->virtuemart_category_id , FALSE), vmText::_ ( 'COM_VIRTUEMART_PRODUCT_DETAILS' ), array ('title' => $product->product_name, 'class' => 'product-details' ) );
            ?>
        </div>

    </div>
</div>
<?php } ?>
    </div><?php

      if(!empty($type)and count($products)>0){
        // Do we need a final closing row tag?
        //if ($col != 1) {
      ?>
    <div class="clear"></div>
  </div>
    <?php
    // }
    }
  }