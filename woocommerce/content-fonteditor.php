<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }

			
			global $post, $product;
			
			$color = get_the_terms( $product->id, 'pa_color');
			$size = get_the_terms( $product->id, 'pa_size');
			
			$availability = $product->get_availability();
			
			$terms = get_the_terms( $product->ID, 'product_cat' );
			$catids = array();
			foreach ($terms as  $key => $term) {
			$catids[] = $key;	
			}
			

?>
		
		
		
		
		
		    <!--Start Container-->
 
 
		
 
    	<span class="text01">Please click togedit</span>
		
		
        <div class="mg_edit_block">

		
        	<div class="container">
            	<div class="row">
                	<div class="col-xs-12 col-sm-3 col-md-3">
                    	<div class="mg_edit_block_in">
                        	<select name="" class="col-xs-12">
                            <option selected="" value="#">Italic</option>
                            <option value="#">Italic</option>
                            <option value="#">Bold</option>
                            <option value="#">Italic</option>
                            <option value="#">Bold</option>      
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-4">
                    	<div class="mg_edit_block_in">
                        	<ul class="mg_edit_list">
                            	<li class="mg_a">A</li>
                                <li class="mg_slide">
                                	
                                    	<input type="range" name="size" min="0" max="100" value="24" style="">
											 <output for="size" onforminput="value = size.valueAsNumber;" style="margin-left:300px;"></output>
                                   
                                </li>
                                <li class="text02 mg_a">A</li>
                                <div class="clear"></div>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-3">
                    	<div class="mg_edit_block_in">
                        	<span><input name="" type="checkbox" value=""> Fit to width</span>
                        </div>
                    </div>
                    
                    <div class="col-xs-12 col-sm-3 col-md-2">
                    	<div class="mg_edit_block_in">
                        	<span><input name="" type="checkbox" value=""> SmartCapo <sup style="font-size:8px;">TM</sup></span>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
		
		
		
		
		
		
    	<div class="container">
            <div class="mg_tab_block">
            	<div class="mg_btn_block"><a href="<?php the_permalink(); ?>" class="btn btn-primary" >Buy a License</a></div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <ul class="tab_button">
                            <li class="cc_active"><a href="#tab1">Overview</a></li>
                            <li><a href="#tab2">In Use</a></li>
                            <li><a href="#tab3">Licensing</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mg_open_tab">
                    <div id="tab1" class="open_tab1">
                    	 <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="mg_tab_block_in">
                                <h1>The Deal</h1>
                                <p><strong>12 Fonts</strong></p>
                                <p>Six weights in two styles, making a dozen fonts. Weights range from light to black in roman and true italic. </p>
                                
                                <p><strong>Smart Capo</strong></p>
                                <p>A feature that improves the appearance and readability of alphanumeric words in text, by adjusting their height automatically. This works for any sequences of capitals and numbers combined – whether acronyms, product names or flight numbers – and capitalised words without numbers: taking the pain out of text formatting and saving you time and money.</p>
                                
                                <p><strong>Mid Capitals</strong></p>
                                <p>Designed to line up halfway between x-height and cap height, mid caps are a contemporary alternative to small caps. They don’t dominate the text and work in harmony with the numbers, so they fit perfectly into the Smart Capo concept. </p>
                                
                                <p><strong>Multilingual</strong></p>
                                <p>Wide language support for extended Latin & e??????? (for those that can read Greek). For a full list of supported languages, please see our website.</p>
                                
                                <p><strong>Multiple figure sets</strong></p>
                                <p>Four sets of numerals can easily be switched between when using OpenType-enabled applications. Each font features old-style and lining figures in both proportional and tabular widths, plus superiors and inferiors. These allow you to select the right set of numbers for the right task.</p>
                                
                                <p><strong>OpenType</strong></p>
                                <p>All Type Mafia typefaces are built as OpenType format, a cross-platform font format which can used on either a Mac or PC. Actium’s features allows easy activation of typographic elements, such as switching between figures-sets, in OpenType ready applications such as Adobe Indesign.</p>
                                
                                <ul class="mg_list_style">
                                	<li>Bla bla bla</li>
                                    <li>Bla bla bla</li>
                                    <li>Bla bla bla</li>
                                    <li>Bla bla bla</li>
                                </ul>
                                </div>
                            </div>
                         </div>
                    </div>
                    <div id="tab2" class="open_tab1">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="mg_tab_block_in">
                                    <h1>Numerals</h1>
                                    <span class="text03">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                    <span class="text04">For example, if you are designing a brand new website for someone, most times you will have to make sure the prototype looks finished by inserting text or photos or what have you. The purpose of this is so the person viewing the prototype has a chance to actually feel and understand the idea behind what you have created.</span>
                                    <div class="mg_img_block">
                                    	<div class="mg_img_block_in">Images Size 970x230 </div>	
                                    </div>
                                    <br>
                                    <hr>
                                    <h1>Flexibility with a dozen styles</h1>
                                    <span class="text03">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                     <span class="text04">For example, if you are designing a brand new website for someone, most times you will have to make sure the prototype looks finished by inserting text or photos or what have you. The purpose of this is so the person viewing the prototype has a chance to actually feel and understand the idea behind what you have created.</span>
                                     
                                     <div class="mg_font_style">
                                     	<ul class="mg_style_list">
                                        	<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style01">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style02">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style03">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style04">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style05">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style06">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style07">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style08">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style09">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                        </ul>
                                     </div>
                                     </br>
                                     <hr>
                                     </br>
                                     
                                     <h1>World Domination</h1>
                                    <span class="text04">For example, if you are designing a brand new website for someone, most times you will have to make sure the prototype looks finished by inserting text or photos or what have you. The purpose of this is so the person viewing the prototype has a chance to actually feel and understand the idea behind what you have created.</span>
                                    <div class="mg_font_style">
                                     	<ul class="mg_style_list">
                                        	<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style01">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style02">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style03">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style04">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                            <li class="mg_style05">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                        </ul>
                                     </div>
                                     </br>
                                     <span class="text05">Supported Languages</span>
                                     <ul class="mg_languages_block">
                                     	<li><a href="#">Dutch</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Hindi</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Polish</a></li>
                                        <li><a href="#">Greek</a></li>
                                        <li><a href="#">Portugese</a></li>
                                        <li><a href="#">Dutch</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Hindi</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Polish</a></li>
                                        <li><a href="#">Greek</a></li>
                                        <li><a href="#">Portugese</a></li>
                                        <li><a href="#">Dutch</a></li>
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">Hindi</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">French</a></li>
                                        <li><a href="#">Polish</a></li>
                                        <li><a href="#">Greek</a></li>
                                        <li><a href="#">Portugese</a></li>
                                     </ul>
                                     <div class="clear"></div>
                                     </br>
                                     <div class="row">
                                     	<div class="col-xs-12 col-sm-5 col-md-5">
                                        	 
                                        </div>
                                        <div class="col-xs-12 col-sm-7 col-md-7">
                                        	 <h1>Smart Capo<sup style="font-size:22px;">TM</sup></h1>
                                             <span class="text03">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </span>
                                             <span class="text04">For example, if you are designing a brand new website for someone, most times you will have to make sure the prototype looks finished by inserting text or photos or what have you. The purpose of this is so the person viewing the prototype has a chance to actually feel and understand the idea behind what you have created.</span>
                                        <span class="text05">Please Note</span>    
                                        <ul class="mg_languages_block">
                                            <li><a href="#">Dutch</a></li>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">Hindi</a></li>
                                            <li><a href="#">German</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Polish</a></li>
                                            <li><a href="#">Greek</a></li>
                                            <li><a href="#">Portugese</a></li>
                                            <li><a href="#">Dutch</a></li>
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">Hindi</a></li>
                                            <li><a href="#">German</a></li>
                                            <li><a href="#">French</a></li>
                                            <li><a href="#">Polish</a></li>
                                            <li><a href="#">Greek</a></li>
                                            <li><a href="#">Portugese</a></li>
                                        </ul>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="tab3" class="open_tab1">
                    	 <div class="row">
                             <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="mg_tab_block_in">
                                	
				<h1>Licensing</h1>
				<p>So you don’t end up sleeping with the fishes, we would be thankful if your company obtains the proper site licenses for the use of our fonts.</p>

				<p>Our monk’s work is truly a labour of love, but this business is also our livelihood. We’ll help you understand the licence agreement, so that you’ll be able to pick the right site license, and get the most out of our typefaces. Only with your support can Type Mafia continue to design great typefaces!</p>

				<p>The licence is a contract between you and us. When you ‘purchase’, in fact you’re licensing the use of the fonts; the typeface and copyright are the property of Type Mafia. The use of our fonts has some restrictions which are in the licence agreement. Take a look – it defines your rights, the acceptable uses of our fonts, and the rights we, the mafia, reserve.</p>

				<p>The non-exclusive, nontransferable license is a legal contract between you, the purchaser, and Type Mafia. When you purchase, you’re actually licensing the use of software – you are expressly not owning the typeface, its copyrights or trademarks as that is and remains the exclusive property of Type Mafia. For that reason the right to use Type Mafia’s font software is restricted under a particular set of conditions. It is important that you read and understand this agreement because it defines your rights, the acceptable uses of our fonts, and the rights Type Mafia reserves.</p>

				<p>Once you download and/or install and/or use the Type Mafia Fonts, you are confirming you understand and agree to the terms of this Agreement, and that you have the authority to bind the person or entity specified on your sales receipt to the terms of this Agreement. Upon payment in full, Type Mafia grants to you a non-exclusive, non-transferable license to use our Fonts under the following terms and conditions. If you don’t agree: don’t download, install or use the fonts.</p>

				<p>Type Mafia End User Licence Agreement</p>

				<span class="text05">1. Use of Font Software and Restrictions</span>

				<p><strong>1.1 Installation</strong></p>
				<p>The Font may be installed and used on the number of workstation computers owned by the same entity or individual, either desktops or laptops, as identified in your sales receipt. Please refer to your sales receipt for the amount of installations permitted. If the font software is being installed on a server within the organisation, you still need a multiple user licence for all the devices connected to that server that are going to use the fonts.</p>

				<p><strong>1.2 Output Devices</strong></p>
				<p>The Font Software may be used with any number of output devices per licensed computer. However, the Font Software may not be installed or used with any device that displays a reproduction or facsimile of the Font Software or the designs embodied in the Font Software. This includes, but is not limited to: game playing devices, game of chance devices, mp3 players, electronic books, printer’s memory or mobile phones or other mobile devices. All such uses are not permitted installations, as it is considered a form of redistributing, and are not authorized output devices/uses under this Licence. Any such installation or use requires the purchase of a special licence.</p>

				<p><strong>1.3 Service Bureau/Printer Use</strong></p>
				<p>We consider this as another form of output device, so to reproduce a particular document you may provide a digitised copy of the specified Fonts to a commercial printer or service bureau only for this particular purpose. Afterwards, you and/or the printer or service bureau must destroy the copy of the Fonts. You may provide a commercial printer or service bureau with PDF or other secured files as noted in section 1.5 below.</p>

				<p><strong>1.4 Copies</strong></p>
				<p>Type Mafia font software may not be copied or duplicated in any form except for backup and archiving purposes. So in the latter case you can pack the fonts with a project. Type Mafia font software or documentation may not be rented, leased, sublicensed, (re)distributed, given away or lent to another person or entity.</p>

				<p><strong>1.5 Embedding of Fonts</strong></p>
				<p>Embedding of the Fonts into web pages or digital documents is allowed as long as it is a secured, read-only mode and for display purposes. You must ensure that recipients of such web pages or documents cannot extract, install or use the embedded Fonts. Embedding for editable data and the creation of new documents using an embedded copy of the Font Software is expressly prohibited because the font software is going to be used by others than the software is licensed to, so you require a custom licence. You further agree not to change or alter the embedding bits or other restrictions of the embedding programs within the Font Software itself.</p>

				<p><strong>1.6 Modifications</strong></p>
				<p>In principle we generally allow modifications but you need our written permission.</p>

				<p><strong>1.7 Restriction as Goods for Sale</strong></p>
				<p>This Licence expressly prohibits the use of the Font Software in the creation of alphabet products, such as, but not limited to: house numbers, stamp sets, rub-on letters, adhesive alphabet letters, alphabet punch and die sets or other methods for use in making such products. Any such use requires the purchase of a special licence.</p>

				<p><strong>1.8 Crediting</strong></p>
				<p>The user of this Type Mafia font software agrees to credit Type Mafia as the trademark and copyright owner of the Type Mafia fonts and list the font and publisher names whenever practically possible.</p>

				<p><strong>1.9 Logo Usage</strong></p>
				<p>You may use our Font Software in a logo without any additional charge if the annual gross revenue of that company is less than €3.000.000,- Additional licensing is needed for logo usage of companies who’s annual gross revenue exceeds this.</p>

				<span class="text05">2. Transfer of Licence</span>
				<p>You shall not transfer the Licence Agreement issued to you, to a third party, neither partially, nor completely. This Licence Agreement is nontransferable, unless you have written permission from Type Mafia.</p>

				<span class="text05">3. Copyrights</span>
				<p>You agree that the Font Software and Documentation, and all copies thereof, are owned by Type Mafia, and such structure, organisation, and code are valuable property of Type Mafia. You acknowledge that the Font Software and the documentation is protected by the laws of the Netherlands, by the copyright and design laws of other nations and by other treaties. You agree to treat the Font Software as you would any other copyrighted material, such as a book. Type Mafia retains title and ownership of the Font Software, any distributable media on which it is recorded, and all subsequent copies of the Font Software, regardless of the form or media in or on which the original and other copies may exist.</p>

				<span class="text05">4. Limited Warranty</span>

				<p><strong>4.1</strong></p>
				<p>Type Mafia warrants you that the Font Software will perform substantially in accordance with the Documentation for the thirty (30) day period following your receipt. The Font Software may be returned or exchanged only if defective and will be replaced only when accompanied with a copy of your sales receipt within such thirty (30) day period. If the Font Software doesnít perform substantially in accordance with the Documentation, the entire and exclusive liability and remedy shall be limited to either, at Type Mafiaís option the replacement of the Font Software, or the refund of the licence fee you paid for the Font Software.</p>

				<p><strong>4.2</strong></p>
				<p>Type Mafia does not and cannot warrant the performance or results you may obtain by using the Font Software. The foregoing states the sole and exclusive remedies for Type Mafiaís breach or warranty. Except for the foregoing limited warranty, Type Mafia makes no warranties express or implied, as to non-infringement of third party rights, merchantability, or fitness for any particular purpose. In no event will Type Mafia be liable to you for any consequential, incidental or special damages, including any lost profits, business interruption, loss of business information, lost data or lost savings. Even if an Type Mafia representative has been advised of the possibility of such damages, or for any claim against you by any third party.</p>

				<p><strong>4.3</strong></p>
				<p>You agree to indemnify and hold Type Mafia harmless from and against any claims or damage which may result from your breach of this Licence Agreement.</p>

				<span class="text05">5. Termination</span>
				<p>Type Mafia has the right to terminate your licence immediately if you fail to comply with any term of this Agreement. Upon termination, you must destroy the original and any copies of the Font Software and related documentation and cease all use of the Trademarks.
				</p>
				<span class="text05">6. Governing Law</span>
				<p>This agreement will be governed by the laws in force in the Netherlands.</p>

				<span class="text05">7. Entire Agreement</span>
				<p>You acknowledge that you have read this Agreement, understand it and that it is the complete and exclusive statement of your Agreement with Type Mafia which supersedes any prior Agreement, oral or written, and any other communications between Type Mafia and you relating to the subject matter of this Agreement, and that your obligations under this Agreement, shall inure to the benefit of the Type Mafia licencors whose rights are licensed under this Agreement.
				</p>
				<p><strong>Type Mafia End User Licence Agreement, version 1.1</strong></p>
				<p><strong>Copyright © Type Mafia 15th Februari 2012</strong></p>

												</div>
											 </div>
										 </div>
									
									</div>
								</div>
							</div> 
						</div>
					
					<!--End Container-->
		
		
		
		
		
		
		
		
		
		
		


	
            
			
			
<?php //do_action( 'woocommerce_after_single_product' ); ?>		

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

<!-- #product-<?php the_ID(); ?> -->	