<?php 
include 'bdd.php';
include 'function.php';
include 'check_session.php';

$h_page = "Ajout d'un fournisseur";

if (isset($_POST['send'])) {

	$f_nom = ucfirst(securisation($_POST['nom_fournisseur']));
	$f_site = securisation($_POST['site_fournisseur']);
	$f_email = securisation($_POST['email']);
	$f_ref = securisation($_POST['ref']);
	$f_tel = securisation($_POST['numero_tel']);
	$f_fax = securisation($_POST['numero_fax']);
	$f_adresse = securisation($_POST['adresse']);
	$f_code_postal = securisation($_POST['code_postal']);
	$f_ville = securisation($_POST['ville']);
	$f_pays = securisation($_POST['country']);
	$f_commentaire = securisation($_POST['commentaire']);
	$id_membre = $_SESSION['id_membre'];

	if ($f_nom != "") {

		if ($f_tel != "") {

			if (!filter_var($f_email, FILTER_VALIDATE_EMAIL) === false) {

		$req = $bdd->prepare('SELECT * FROM fournisseurs WHERE f_nom = :f_nom AND id_membre = :id_membre');
		$req->execute(array('f_nom' => $f_nom, 'id_membre' => $id_membre));
		$donnees = $req->fetch();
		if ($req->rowCount() > 0 ) {

			setFlash('Nom du fournisseur déja utilisé.', 'danger');

		}else{

			$fournisseurs = $bdd->prepare('INSERT INTO fournisseurs(f_nom, f_ref, f_email, f_site, f_tel, f_fax, f_commentaire, f_pays, f_adresse, f_code_postal, f_ville, id_membre) 
				VALUES (:f_nom, :f_ref, :f_email, :f_site, :f_tel, :f_fax, :f_commentaire, :f_pays, :f_adresse, :f_code_postal, :f_ville, :id_membre)');
			$fournisseurs->execute(array(
				'f_nom' => $f_nom,
				'f_ref' => $f_ref,
				'f_email' => $f_email,
				'f_site' => $f_site,		
				'f_tel' => $f_tel,
				'f_fax' => $f_fax,
				'f_commentaire' => $f_commentaire,
				'f_pays' => $f_pays,
				'f_adresse' => $f_adresse,
				'f_code_postal' => $f_code_postal,
				'f_ville' => $f_ville,			
				'id_membre' => $id_membre
				));		

				// HISTORIQUE INSERT DEBUT
					historique(2, $h_page, 'Ajout du fournisseur ' . $f_nom);
				// HISTORIQUE INSERT FIN

			setFlash('Vous avez bien ajouté <strong>' . $f_nom . '</strong> comme nouveau fournisseur.');
			header('Location:ajout_fournisseur.php');
			die();
			
		}


			}else{
		setFlash('Attention l\'email est vide ou invalide', 'danger');
	}

		}else{
		setFlash('Attention il n\'y à aucun numéro de téléphone', 'danger');
	}

	}else{
		setFlash('Attention il n\'y à aucun nom de fournisseur.', 'danger');
	}	
}


include 'header.php'; ?>
<div class="page-content">
	

	<!-- BEGIN PAGE HEADER-->
	<h3 class="page-title">
		Ajout de fournisseur
	</h3>
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Accueil</a>
			</li>
			<li>
				<i class="fa fa-angle-right"></i>
				Ajout fournisseur
			</li>
		</ul>

	</div>
	<!-- END PAGE HEADER-->
	<!-- BEGIN PAGE CONTENT-->
	<!-- BEGIN DASHBOARD STATS -->
	<?php echo flash();?>
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<a href="#myModal2" role="button" class="btn green" data-toggle="modal">
				Voir la liste des fournisseurs déja enregistré </a> 

				<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Liste des fournisseurs déja enregistré</h4>
							</div>
							<div class="modal-body p-1">
								<select class="form-control select2me" name="options2">
									<option value="">...</option>
									<?php echo fournisseurs('f_nom'); ?>
								</select>
							</div>
							<div class="modal-footer">
								<button data-dismiss="modal" class="btn green">OK</button>
							</div>
						</div>
					</div>
				</div>


				<!-- BEGIN SAMPLE FORM PORTLET-->
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i> Ajouter un fournisseurs
						</div>
						<div class="tools">
							<a href="" class="collapse" data-original-title="" title="">
							</a>
							<a href="" class="remove" data-original-title="" title="">
							</a>
						</div>
					</div>
					<div class="portlet-body form">
						<form role="form" method="post" action="#">
							<div class="form-body">

								<button type="submit" class="btn blue" name="send">Enregistrer</button>

								<div class="form-group p-1-t">
									<label class="control-label">Nom du fournisseur <span class="required" aria-required="true">
										* </span>
										</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-pencil"></i>
										</span>
										<?php echo input('nom_fournisseur','Ex : Auchan'); ?>
									</div>
								</div>

								<div class="form-group">
									<label>Site Web du fournisseur</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-globe"></i>
										</span>
										<?php echo input('site_fournisseur','Ex : http://auchan.fr'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label">Email <span class="required" aria-required="true">
										* </span>
										</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-envelope"></i>
										</span>
										<?php echo email('email', 'Ex : contact@little-owl.fr'); ?>
									</div>
								</div>

								<div class="form-group">
									<label>Référence</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-folder"></i>
										</span>
										<?php echo input('ref', 'Ex : BX200DFER'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label">Numéro de téléphone <span class="required" aria-required="true">
										* </span>
										</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-phone"></i>
										</span>
										<?php echo phone('numero_tel', 'Ex : 0102030405'); ?>
									</div>
								</div>

								<div class="form-group">
									<label>Numéro de fax</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-fax"></i>
										</span>
										<?php echo phone('numero_fax', 'Ex : 0102030405'); ?>
									</div>
								</div>

								<div class="form-group">
									<label>Adresse</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-home"></i>
										</span>									
										<?php echo input('adresse', 'Ex : 24 rue du moulin'); ?>

									</div>
								</div>

								<div class="form-group">
									<label>Code postal</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-home"></i>
										</span>
										<?php echo input('code_postal', 'Ex : 13004'); ?>								
									</div>
								</div>

								<div class="form-group">
									<label>Ville</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-home"></i>
										</span>
										<?php echo input('ville', 'Ex : Marseille'); ?>								
									</div>
								</div>


								<div class="form-group">
									<label>Pays</label>
									<label class="control-label visible-ie8 visible-ie9">Pays</label>

									<select class="form-control select2me" name="country">
										<option value="FR" selected>France</option>
										<option value="AF">Afghanistan</option>
										<option value="AL">Albania</option>
										<option value="DZ">Algeria</option>
										<option value="AS">American Samoa</option>
										<option value="AD">Andorra</option>
										<option value="AO">Angola</option>
										<option value="AI">Anguilla</option>
										<option value="AQ">Antarctica</option>
										<option value="AR">Argentina</option>
										<option value="AM">Armenia</option>
										<option value="AW">Aruba</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
										<option value="AZ">Azerbaijan</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrain</option>
										<option value="BD">Bangladesh</option>
										<option value="BB">Barbados</option>
										<option value="BY">Belarus</option>
										<option value="BE">Belgium</option>
										<option value="BZ">Belize</option>
										<option value="BJ">Benin</option>
										<option value="BM">Bermuda</option>
										<option value="BT">Bhutan</option>
										<option value="BO">Bolivia</option>
										<option value="BA">Bosnia and Herzegowina</option>
										<option value="BW">Botswana</option>
										<option value="BV">Bouvet Island</option>
										<option value="BR">Brazil</option>
										<option value="IO">British Indian Ocean Territory</option>
										<option value="BN">Brunei Darussalam</option>
										<option value="BG">Bulgaria</option>
										<option value="BF">Burkina Faso</option>
										<option value="BI">Burundi</option>
										<option value="KH">Cambodia</option>
										<option value="CM">Cameroon</option>
										<option value="CA">Canada</option>
										<option value="CV">Cape Verde</option>
										<option value="KY">Cayman Islands</option>
										<option value="CF">Central African Republic</option>
										<option value="TD">Chad</option>
										<option value="CL">Chile</option>
										<option value="CN">China</option>
										<option value="CX">Christmas Island</option>
										<option value="CC">Cocos (Keeling) Islands</option>
										<option value="CO">Colombia</option>
										<option value="KM">Comoros</option>
										<option value="CG">Congo</option>
										<option value="CD">Congo, the Democratic Republic of the</option>
										<option value="CK">Cook Islands</option>
										<option value="CR">Costa Rica</option>
										<option value="CI">Cote d'Ivoire</option>
										<option value="HR">Croatia (Hrvatska)</option>
										<option value="CU">Cuba</option>
										<option value="CY">Cyprus</option>
										<option value="CZ">Czech Republic</option>
										<option value="DK">Denmark</option>
										<option value="DJ">Djibouti</option>
										<option value="DM">Dominica</option>
										<option value="DO">Dominican Republic</option>
										<option value="EC">Ecuador</option>
										<option value="EG">Egypt</option>
										<option value="SV">El Salvador</option>
										<option value="GQ">Equatorial Guinea</option>
										<option value="ER">Eritrea</option>
										<option value="EE">Estonia</option>
										<option value="ET">Ethiopia</option>
										<option value="FK">Falkland Islands (Malvinas)</option>
										<option value="FO">Faroe Islands</option>
										<option value="FJ">Fiji</option>
										<option value="FI">Finland</option>
										<option value="FR">France</option>
										<option value="GF">French Guiana</option>
										<option value="PF">French Polynesia</option>
										<option value="TF">French Southern Territories</option>
										<option value="GA">Gabon</option>
										<option value="GM">Gambia</option>
										<option value="GE">Georgia</option>
										<option value="DE">Germany</option>
										<option value="GH">Ghana</option>
										<option value="GI">Gibraltar</option>
										<option value="GR">Greece</option>
										<option value="GL">Greenland</option>
										<option value="GD">Grenada</option>
										<option value="GP">Guadeloupe</option>
										<option value="GU">Guam</option>
										<option value="GT">Guatemala</option>
										<option value="GN">Guinea</option>
										<option value="GW">Guinea-Bissau</option>
										<option value="GY">Guyana</option>
										<option value="HT">Haiti</option>
										<option value="HM">Heard and Mc Donald Islands</option>
										<option value="VA">Holy See (Vatican City State)</option>
										<option value="HN">Honduras</option>
										<option value="HK">Hong Kong</option>
										<option value="HU">Hungary</option>
										<option value="IS">Iceland</option>
										<option value="IN">India</option>
										<option value="ID">Indonesia</option>
										<option value="IR">Iran (Islamic Republic of)</option>
										<option value="IQ">Iraq</option>
										<option value="IE">Ireland</option>
										<option value="IL">Israel</option>
										<option value="IT">Italy</option>
										<option value="JM">Jamaica</option>
										<option value="JP">Japan</option>
										<option value="JO">Jordan</option>
										<option value="KZ">Kazakhstan</option>
										<option value="KE">Kenya</option>
										<option value="KI">Kiribati</option>
										<option value="KP">Korea, Democratic People's Republic of</option>
										<option value="KR">Korea, Republic of</option>
										<option value="KW">Kuwait</option>
										<option value="KG">Kyrgyzstan</option>
										<option value="LA">Lao People's Democratic Republic</option>
										<option value="LV">Latvia</option>
										<option value="LB">Lebanon</option>
										<option value="LS">Lesotho</option>
										<option value="LR">Liberia</option>
										<option value="LY">Libyan Arab Jamahiriya</option>
										<option value="LI">Liechtenstein</option>
										<option value="LT">Lithuania</option>
										<option value="LU">Luxembourg</option>
										<option value="MO">Macau</option>
										<option value="MK">Macedonia, The Former Yugoslav Republic of</option>
										<option value="MG">Madagascar</option>
										<option value="MW">Malawi</option>
										<option value="MY">Malaysia</option>
										<option value="MV">Maldives</option>
										<option value="ML">Mali</option>
										<option value="MT">Malta</option>
										<option value="MH">Marshall Islands</option>
										<option value="MQ">Martinique</option>
										<option value="MR">Mauritania</option>
										<option value="MU">Mauritius</option>
										<option value="YT">Mayotte</option>
										<option value="MX">Mexico</option>
										<option value="FM">Micronesia, Federated States of</option>
										<option value="MD">Moldova, Republic of</option>
										<option value="MC">Monaco</option>
										<option value="MN">Mongolia</option>
										<option value="MS">Montserrat</option>
										<option value="MA">Morocco</option>
										<option value="MZ">Mozambique</option>
										<option value="MM">Myanmar</option>
										<option value="NA">Namibia</option>
										<option value="NR">Nauru</option>
										<option value="NP">Nepal</option>
										<option value="NL">Netherlands</option>
										<option value="AN">Netherlands Antilles</option>
										<option value="NC">New Caledonia</option>
										<option value="NZ">New Zealand</option>
										<option value="NI">Nicaragua</option>
										<option value="NE">Niger</option>
										<option value="NG">Nigeria</option>
										<option value="NU">Niue</option>
										<option value="NF">Norfolk Island</option>
										<option value="MP">Northern Mariana Islands</option>
										<option value="NO">Norway</option>
										<option value="OM">Oman</option>
										<option value="PK">Pakistan</option>
										<option value="PW">Palau</option>
										<option value="PA">Panama</option>
										<option value="PG">Papua New Guinea</option>
										<option value="PY">Paraguay</option>
										<option value="PE">Peru</option>
										<option value="PH">Philippines</option>
										<option value="PN">Pitcairn</option>
										<option value="PL">Poland</option>
										<option value="PT">Portugal</option>
										<option value="PR">Puerto Rico</option>
										<option value="QA">Qatar</option>
										<option value="RE">Reunion</option>
										<option value="RO">Romania</option>
										<option value="RU">Russian Federation</option>
										<option value="RW">Rwanda</option>
										<option value="KN">Saint Kitts and Nevis</option>
										<option value="LC">Saint LUCIA</option>
										<option value="VC">Saint Vincent and the Grenadines</option>
										<option value="WS">Samoa</option>
										<option value="SM">San Marino</option>
										<option value="ST">Sao Tome and Principe</option>
										<option value="SA">Saudi Arabia</option>
										<option value="SN">Senegal</option>
										<option value="SC">Seychelles</option>
										<option value="SL">Sierra Leone</option>
										<option value="SG">Singapore</option>
										<option value="SK">Slovakia (Slovak Republic)</option>
										<option value="SI">Slovenia</option>
										<option value="SB">Solomon Islands</option>
										<option value="SO">Somalia</option>
										<option value="ZA">South Africa</option>
										<option value="GS">South Georgia and the South Sandwich Islands</option>
										<option value="ES">Spain</option>
										<option value="LK">Sri Lanka</option>
										<option value="SH">St. Helena</option>
										<option value="PM">St. Pierre and Miquelon</option>
										<option value="SD">Sudan</option>
										<option value="SR">Suriname</option>
										<option value="SJ">Svalbard and Jan Mayen Islands</option>
										<option value="SZ">Swaziland</option>
										<option value="SE">Sweden</option>
										<option value="CH">Switzerland</option>
										<option value="SY">Syrian Arab Republic</option>
										<option value="TW">Taiwan, Province of China</option>
										<option value="TJ">Tajikistan</option>
										<option value="TZ">Tanzania, United Republic of</option>
										<option value="TH">Thailand</option>
										<option value="TG">Togo</option>
										<option value="TK">Tokelau</option>
										<option value="TO">Tonga</option>
										<option value="TT">Trinidad and Tobago</option>
										<option value="TN">Tunisia</option>
										<option value="TR">Turkey</option>
										<option value="TM">Turkmenistan</option>
										<option value="TC">Turks and Caicos Islands</option>
										<option value="TV">Tuvalu</option>
										<option value="UG">Uganda</option>
										<option value="UA">Ukraine</option>
										<option value="AE">United Arab Emirates</option>
										<option value="GB">United Kingdom</option>
										<option value="US">United States</option>
										<option value="UM">United States Minor Outlying Islands</option>
										<option value="UY">Uruguay</option>
										<option value="UZ">Uzbekistan</option>
										<option value="VU">Vanuatu</option>
										<option value="VE">Venezuela</option>
										<option value="VN">Viet Nam</option>
										<option value="VG">Virgin Islands (British)</option>
										<option value="VI">Virgin Islands (U.S.)</option>
										<option value="WF">Wallis and Futuna Islands</option>
										<option value="EH">Western Sahara</option>
										<option value="YE">Yemen</option>
										<option value="ZM">Zambia</option>
										<option value="ZW">Zimbabwe</option>
									</select>
								</div>


								<div class="form-group">
									<label class="control-label col-md-3">Commentaire</label>
									<div class="col-md-9">
										<textarea name="commentaire" data-provide="markdown" rows="10" data-error-container="#editor_error"><?php if (isset($_POST['commentaire'])){ echo $_POST['commentaire'];} ?></textarea>
										<div id="editor_error">
										</div>
									</div>
								</div>

								<div class="form-actions">
									<button type="submit" class="btn blue" name="send">Enregistrer</button>
								</div>
							</form>
						</div>
					</div>
					<!-- END SAMPLE FORM PORTLET-->

				</div>

			</div>
			<!-- END DASHBOARD STATS -->
			<!-- END PAGE CONTENT-->
		</div>

		<?php include 'footer.php'; ?>

