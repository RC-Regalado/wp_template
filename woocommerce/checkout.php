<?php
/*
 * Template Name: Formulario de pago personalizado
 */

// Asegurarse de que Woocommerce esté activo
if (! class_exists('woocommerce')) {
    exit;
}

// Incluir el encabezado de WordPress
get_header();

// Comprobar si el usuario ha iniciado sesión
if (! is_user_logged_in()) {
    echo '<p>Debes iniciar sesión para acceder al formulario de pago.</p>';
} else {
    // Obtener los detalles del usuario
    $user_id = get_current_user_id();
    $user_data = get_userdata($user_id);

    // Obtener la dirección de envío del usuario
    $shipping_address = WC()->session->get('customer')['shipping_address'];

    // Obtener el carrito de compras
    $cart = WC()->cart->get_cart();
    $cart_items = array();
    foreach ($cart as $cart_item_key => $cart_item) {
        // Obtener los detalles de los productos en el carrito
        $product = wc_get_product($cart_item['product_id']);
        $cart_items[] = array(
            'name'      => $product->get_name(),
            'quantity'  => $cart_item['quantity'],
            'price'     => $product->get_price(),
            'subtotal'  => $product->get_price() * $cart_item['quantity']
        );
    }

    // Calcular el total del carrito
    $cart_total = WC()->cart->get_total();

    // Mostrar el formulario de pago personalizado
?>
<form name="checkout" method="post" class="checkout woocommerce-checkout" action="http://192.168.100.4:5551/finalizar-compra/" enctype="multipart/form-data" novalidate="novalidate">

	
		
		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<div class="woocommerce-billing-fields">
	
		<h3>Detalles de facturación</h3>

	
	
	<div class="woocommerce-billing-fields__field-wrapper">
			<p class="form-row form-row-first validate-required" id="billing_first_name_field" data-priority="10"><label for="billing_first_name" class="">Nombre&nbsp;<abbr class="required" title="obligatorio">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="Ruben" autocomplete="given-name"></span></p><p class="form-row form-row-wide" id="billing_company_field" data-priority="30"><label for="billing_company" class="">Nombre de la empresa&nbsp;<span class="optional">(opcional)</span></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_company" id="billing_company" placeholder="" value="" autocomplete="organization"></span></p><p class="form-row form-row-wide address-field update_totals_on_change validate-required" id="billing_country_field" data-priority="40"><label for="billing_country" class="">País / Región&nbsp;<abbr class="required" title="obligatorio">*</abbr></label><span class="woocommerce-input-wrapper"><select name="billing_country" id="billing_country" class="country_to_state country_select select2-hidden-accessible" autocomplete="country" data-placeholder="Selecciona un país/región…" data-label="País / Región" tabindex="-1" aria-hidden="true"><option value="">Selecciona un país/región…</option><option value="AF">Afganistán</option><option value="AL">Albania</option><option value="DE">Alemania</option><option value="AD">Andorra</option><option value="AO">Angola</option><option value="AI">Anguilla</option><option value="AQ">Antártida</option><option value="AG">Antigua y Barbuda</option><option value="SA">Arabia Saudita</option><option value="DZ">Argelia</option><option value="AR">Argentina</option><option value="AM">Armenia</option><option value="AW">Aruba</option><option value="AU">Australia</option><option value="AT">Austria</option><option value="AZ">Azerbaijan</option><option value="BS">Bahamas</option><option value="BH">Bahrain</option><option value="BD">Bangladesh</option><option value="BB">Barbados</option><option value="PW">Belau</option><option value="BE">Bélgica</option><option value="BZ">Belize</option><option value="BJ">Benin</option><option value="BM">Bermuda</option><option value="BT">Bhutan</option><option value="BY">Bielorrusia</option><option value="MM">Birmania</option><option value="BO">Bolivia</option><option value="BQ">Bonaire, San Eustaquio y Saba</option><option value="BA">Bosnia y Herzegovina</option><option value="BW">Botswana</option><option value="BR">Brasil</option><option value="BN">Brunéi</option><option value="BG">Bulgaria</option><option value="BF">Burkina Faso</option><option value="BI">Burundi</option><option value="CV">Cabo Verde</option><option value="KH">Camboya</option><option value="CM">Camerún</option><option value="CA">Canadá</option><option value="TD">Chad</option><option value="CL">Chile</option><option value="CN">China</option><option value="CY">Chipre</option><option value="VA">Ciudad del Vaticano</option><option value="CO">Colombia</option><option value="KM">Comoras</option><option value="CG">Congo (Brazzaville)</option><option value="CD">Congo (Kinshasa)</option><option value="KP">Corea del Norte</option><option value="KR">Corea del Sur</option><option value="CR">Costa Rica</option><option value="CI">Costa de Marfil</option><option value="HR">Croacia</option><option value="CU">Cuba</option><option value="CW">Curaçao</option><option value="DK">Dinamarca</option><option value="DJ">Djibouti</option><option value="DM">Dominica</option><option value="EC">Ecuador</option><option value="EG">Egipto</option><option value="SV" selected="selected">El Salvador</option><option value="AE">Emiratos Árabes Unidos</option><option value="ER">Eritrea</option><option value="SK">Eslovaquia</option><option value="SI">Eslovenia</option><option value="ES">España</option><option value="US">Estados Unidos (EEUU)</option><option value="EE">Estonia</option><option value="SZ">Esuatini</option><option value="ET">Etiopía</option><option value="PH">Filipinas</option><option value="FI">Finlandia</option><option value="FJ">Fiyi</option><option value="FR">Francia</option><option value="GA">Gabón</option><option value="GM">Gambia</option><option value="GE">Georgia</option><option value="GH">Ghana</option><option value="GI">Gibraltar</option><option value="GD">Granada</option><option value="GR">Grecia</option><option value="GL">Groenlandia</option><option value="GP">Guadalupe</option><option value="GU">Guam</option><option value="GT">Guatemala</option><option value="GF">Guayana Francesa</option><option value="GG">Guernsey</option><option value="GN">Guinea</option><option value="GQ">Guinea Ecuatorial</option><option value="GW">Guinea-Bisáu</option><option value="GY">Guyana</option><option value="HT">Haití</option><option value="HN">Honduras</option><option value="HK">Hong Kong</option><option value="HU">Hungría</option><option value="IN">India</option><option value="ID">Indonesia</option><option value="IQ">Irak</option><option value="IR">Irán</option><option value="IE">Irlanda</option><option value="BV">Isla Bouvet</option><option value="NF">Isla Norfolk</option><option value="SH">Isla Santa Elena</option><option value="IM">Isla de Man</option><option value="CX">Isla de Navidad</option><option value="IS">Islandia</option><option value="AX">Islas Åland</option><option value="KY">Islas Caimán</option><option value="CC">Islas Cocos</option><option value="CK">Islas Cook</option><option value="FO">Islas Feroe</option><option value="GS">Islas Georgias y Sandwich del Sur</option><option value="HM">Islas Heard y McDonald</option><option value="FK">Islas Malvinas</option><option value="MP">Islas Marianas del Norte</option><option value="MH">Islas Marshall</option><option value="SB">Islas Salomón</option><option value="TC">Islas Turcas y Caicos</option><option value="VG">Islas Vírgenes (Británicas)</option><option value="VI">Islas Vírgenes (EEUU)</option><option value="UM">Islas de ultramar menores de Estados Unidos (EEUU)</option><option value="IL">Israel</option><option value="IT">Italia</option><option value="JM">Jamaica</option><option value="JP">Japón</option><option value="JE">Jersey</option><option value="JO">Jordania</option><option value="KZ">Kazajistán</option><option value="KE">Kenia</option><option value="KG">Kirguistán</option><option value="KI">Kiribati</option><option value="KW">Kuwait</option><option value="LA">Laos</option><option value="LS">Lesoto</option><option value="LV">Letonia</option><option value="LB">Líbano</option><option value="LR">Liberia</option><option value="LY">Libia</option><option value="LI">Liechtenstein</option><option value="LT">Lituania</option><option value="LU">Luxemburgo</option><option value="MO">Macao</option><option value="MK">Macedonia del Norte</option><option value="MG">Madagascar</option><option value="MY">Malasia</option><option value="MW">Malaui</option><option value="MV">Maldivas</option><option value="ML">Malí</option><option value="MT">Malta</option><option value="MA">Marruecos</option><option value="MQ">Martinica</option><option value="MU">Mauricio</option><option value="MR">Mauritania</option><option value="YT">Mayotte</option><option value="MX">México</option><option value="FM">Micronesia</option><option value="MD">Moldavia</option><option value="MC">Mónaco</option><option value="MN">Mongolia</option><option value="ME">Montenegro</option><option value="MS">Montserrat</option><option value="MZ">Mozambique</option><option value="NA">Namibia</option><option value="NR">Nauru</option><option value="NP">Nepal</option><option value="NI">Nicaragua</option><option value="NE">Níger</option><option value="NG">Nigeria</option><option value="NU">Niue</option><option value="NO">Noruega</option><option value="NC">Nueva Caledonia</option><option value="NZ">Nueva Zelanda</option><option value="OM">Omán</option><option value="NL">Países Bajos</option><option value="PK">Pakistán</option><option value="PA">Panamá</option><option value="PG">Papúa Nueva Guinea</option><option value="PY">Paraguay</option><option value="PE">Perú</option><option value="PN">Pitcairn</option><option value="PF">Polinesia Francesa</option><option value="PL">Polonia</option><option value="PT">Portugal</option><option value="PR">Puerto Rico</option><option value="QA">Qatar</option><option value="GB">Reino Unido (UK)</option><option value="CF">República Centroafricana</option><option value="CZ">República Checa</option><option value="DO">República Dominicana</option><option value="RE">Reunión</option><option value="RW">Ruanda</option><option value="RO">Rumania</option><option value="RU">Rusia</option><option value="EH">Sahara Occidental</option><option value="WS">Samoa</option><option value="AS">Samoa Americana</option><option value="BL">San Bartolomé</option><option value="KN">San Cristóbal y Nieves</option><option value="SM">San Marino</option><option value="SX">San Martín (Países Bajos)</option><option value="MF">San Martín (parte de Francia)</option><option value="PM">San Pedro y Miquelón</option><option value="VC">San Vicente y las Granadinas</option><option value="LC">Santa Lucía</option><option value="ST">Santo Tomé y Príncipe</option><option value="SN">Senegal</option><option value="RS">Serbia</option><option value="SC">Seychelles</option><option value="SL">Sierra Leona</option><option value="SG">Singapur</option><option value="SY">Siria</option><option value="SO">Somalia</option><option value="LK">Sri Lanka</option><option value="ZA">Sudáfrica</option><option value="SD">Sudán</option><option value="SS">Sudán del Sur</option><option value="SE">Suecia</option><option value="CH">Suiza</option><option value="SR">Surinam</option><option value="SJ">Svalbard y Jan Mayen</option><option value="TH">Tailandia</option><option value="TW">Taiwán</option><option value="TZ">Tanzania</option><option value="TJ">Tayikistán</option><option value="IO">Territorio Británico del Océano Índico</option><option value="PS">Territorios Palestinos</option><option value="TF">Territorios australes franceses</option><option value="TL">Timor Oriental</option><option value="TG">Togo</option><option value="TK">Tokelau</option><option value="TO">Tonga</option><option value="TT">Trinidad y Tobago</option><option value="TN">Túnez</option><option value="TM">Turkmenistán</option><option value="TR">Turquía</option><option value="TV">Tuvalu</option><option value="UA">Ucrania</option><option value="UG">Uganda</option><option value="UY">Uruguay</option><option value="UZ">Uzbekistán</option><option value="VU">Vanuatu</option><option value="VE">Venezuela</option><option value="VN">Vietnam</option><option value="WF">Wallis y Futuna</option><option value="YE">Yemen</option><option value="ZM">Zambia</option><option value="ZW">Zimbabue</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="País / Región" role="combobox"><span class="select2-selection__rendered" id="select2-billing_country-container" role="textbox" aria-readonly="true" title="El Salvador">El Salvador</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><noscript><button type="submit" name="woocommerce_checkout_update_totals" value="Actualizar país/región">Actualizar país/región</button></noscript></span></p><p class="form-row address-field validate-required form-row-wide" id="billing_address_1_field" data-priority="50"><label for="billing_address_1" class="">Dirección de la calle&nbsp;<abbr class="required" title="obligatorio">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_address_1" id="billing_address_1" placeholder="Número de la casa y nombre de la calle" value="Colonia San José Lotificacion loma Linda" autocomplete="address-line1" data-placeholder="Número de la casa y nombre de la calle"></span></p><p class="form-row address-field validate-required validate-state form-row-wide" id="billing_state_field" data-priority="80" data-o_class="form-row form-row-wide address-field validate-required validate-state"><label for="billing_state" class="">Departamento&nbsp;<abbr class="required" title="obligatorio">*</abbr></label><span class="woocommerce-input-wrapper"><select name="billing_state" id="billing_state" class="state_select select2-hidden-accessible" autocomplete="address-level1" data-placeholder="Elige una opción…" data-input-classes="" data-label="Departamento" tabindex="-1" aria-hidden="true"><option value="">Elige una opción…</option><option value="SV-AH">Ahuachapán</option><option value="SV-CA">Cabañas</option><option value="SV-CH">Chalatenango</option><option value="SV-CU">Cuscatlán</option><option value="SV-LI">La Libertad</option><option value="SV-MO">Morazán</option><option value="SV-PA">La Paz</option><option value="SV-SA">Santa Ana</option><option value="SV-SM">San Miguel</option><option value="SV-SO">Sonsonate</option><option value="SV-SS">San Salvador</option><option value="SV-SV">San Vicente</option><option value="SV-UN">La Unión</option><option value="SV-US">Usulután</option></select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-label="Departamento" role="combobox"><span class="select2-selection__rendered" id="select2-billing_state-container" role="textbox" aria-readonly="true" title="Santa Ana">Santa Ana</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span></span></p><p class="form-row form-row-wide validate-required validate-phone" id="billing_phone_field" data-priority="100"><label for="billing_phone" class="">Teléfono&nbsp;<abbr class="required" title="obligatorio">*</abbr></label><span class="woocommerce-input-wrapper"><input type="tel" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="63070498" autocomplete="tel"></span></p><p class="form-row form-row-wide validate-required validate-email" id="billing_email_field" data-priority="110"><label for="billing_email" class="">Dirección de correo electrónico&nbsp;<abbr class="required" title="obligatorio">*</abbr></label><span class="woocommerce-input-wrapper"><input type="email" class="input-text " name="billing_email" id="billing_email" placeholder="" value="ruben.alekey@gmail.com" autocomplete="email username"></span></p><p class="form-row form-row-wide validate-required" id="billing_dui_field" data-priority=""><label for="billing_dui" class="">DUI&nbsp;<abbr class="required" title="obligatorio">*</abbr></label><span class="woocommerce-input-wrapper"><input type="text" class="input-text " name="billing_dui" id="billing_dui" placeholder="Ingresa tu número de DUI" value="06164953-2"></span></p></div>

	</div>

			</div>

			<div class="col-2">
				<div class="woocommerce-shipping-fields">
	</div>
<div class="woocommerce-additional-fields">
	
	
		
			<h3>Información adicional</h3>

		
		<div class="woocommerce-additional-fields__field-wrapper">
					</div>

	
	</div>
			</div>
		</div>

		
		
		
	<h3 id="order_review_heading">Tu pedido</h3>
	
	
	<div id="order_review" class="woocommerce-checkout-review-order">
		<table class="shop_table woocommerce-checkout-review-order-table">
	<thead>
		<tr>
			<th class="product-name">Producto</th>
			<th class="product-total">Subtotal</th>
		</tr>
	</thead>
	<tbody>
						<tr class="cart_item">
					<td class="product-name">
						Obsidiana 1L&nbsp;						 <strong class="product-quantity">×&nbsp;1</strong>											</td>
					<td class="product-total">
						<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>70.00</bdi></span>					</td>
				</tr>
								<tr class="cart_item">
					<td class="product-name">
						Ron Cihuatán Jade&nbsp;						 <strong class="product-quantity">×&nbsp;1</strong>											</td>
					<td class="product-total">
						<span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>14.99</bdi></span>					</td>
				</tr>
					</tbody>
	<tfoot>

		<tr class="cart-subtotal">
			<th>Subtotal</th>
			<td><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>84.99</bdi></span></td>
		</tr>

		
		
		
		
		
		<tr class="order-total">
			<th>Total</th>
			<td><strong><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">$</span>84.99</bdi></span></strong> </td>
		</tr>

		
	</tfoot>
</table>

<div id="payment" class="woocommerce-checkout-payment">
			<ul class="wc_payment_methods payment_methods methods">
			<li class="wc_payment_method payment_method_cod">
	<input id="payment_method_cod" type="radio" class="input-radio" name="payment_method" value="cod" checked="checked" data-order_button_text="">

	<label for="payment_method_cod">
		Pago en efectivo 	</label>
			<div class="payment_box payment_method_cod">
			<p>Paga en efectivo en el momento de recoger.</p>
		</div>
	</li>
<li class="wc_payment_method payment_method_wompi_payment">
	<input id="payment_method_wompi_payment" type="radio" class="input-radio" name="payment_method" value="wompi_payment" data-order_button_text="">

	<label for="payment_method_wompi_payment">
		Tarjeta de crédito <img src="http://192.168.100.4:5551/wp-content/plugins/woocommerce/../wompi-el-salvador/assets/images/wompi.png" alt="Tarjeta de crédito">	</label>
			<div class="payment_box payment_method_wompi_payment" style="display:none;">
			<p>Pague con seguridad usando su tarjeta de crédito.</p>
		</div>
	</li>
		</ul>
		<div class="form-row place-order">
		<noscript>
			Debido a que tu navegador no es compatible con JavaScript o lo tiene desactivado, por favor, asegúrate de hacer clic en el botón <em>Actualizar totales</em> antes de realizar tu pedido. De no hacerlo, se te podría cobrar más de la cantidad indicada arriba.			<br/><button type="submit" class="button alt wp-element-button" name="woocommerce_checkout_update_totals" value="Actualizar totales">Actualizar totales</button>
		</noscript>

			<div class="woocommerce-terms-and-conditions-wrapper">
		<div class="woocommerce-privacy-policy-text"><p>Tus datos personales se utilizarán para procesar tu pedido, mejorar tu experiencia en esta web y otros propósitos descritos en nuestra <a href="http://192.168.100.4:5551/?page_id=3" class="woocommerce-privacy-policy-link" target="_blank">política de privacidad</a>.</p>
</div>
			</div>
	
		
		<button type="submit" class="button alt wp-element-button" name="woocommerce_checkout_place_order" id="place_order" value="Realizar el pedido" data-value="Realizar el pedido">Realizar el pedido</button>
		
		<input type="hidden" id="woocommerce-process-checkout-nonce" name="woocommerce-process-checkout-nonce" value="837645bdba"><input type="hidden" name="_wp_http_referer" value="/?wc-ajax=update_order_review">	</div>
</div>

	</div>

	
</form>
<?php
}
get_footer();
?>
