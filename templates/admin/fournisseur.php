<?php 
include 'bdd.php';
include 'function.php';
include 'check_session.php';


$fournisseurs = $bdd->prepare('SELECT *, membres.id_membre AS membre FROM membres, fournisseurs WHERE membres.id_membre = fournisseurs.id_membre AND membres.id_membre = :id AND fournisseurs.id_fournisseur = :id_fournisseur');
$fournisseurs->execute(array('id' => $_SESSION['id_membre'], 'id_fournisseur' => $_GET['f'] ));
$donnees = $fournisseurs->fetch();

if ($_SESSION['id_membre'] != $donnees['membre']) {
	header('Location:404.php');
	die();
}




if (isset($_POST['modif'])) {
	$f_nom = ucfirst(securisation($_POST['f_nom']));
	$f_site = securisation($_POST['f_site']);
	$f_email = securisation($_POST['f_email']);
	$f_ref = securisation($_POST['f_ref']);
	$f_tel = securisation($_POST['f_tel']);
	$f_fax = securisation($_POST['f_fax']);
	$f_adresse = securisation($_POST['f_adresse']);
	$f_code_postal = securisation($_POST['f_code_postal']);
	$f_ville = securisation($_POST['f_ville']);
	$f_pays = securisation($_POST['f_pays']);
	$f_commentaire = htmlentities($_POST['f_commentaire']);
	$id_membre = $_SESSION['id_membre'];

	if ($f_nom != "") {


	}else{
		setFlash('Attention il n\'y à aucun nom de fournisseur.', 'danger');
	}
}







include 'header.php'; 

?>


<div class="page-content">
	

	<!-- BEGIN PAGE HEADER-->
	<h3 class="page-title">
		<?php echo $donnees['f_nom']; ?>
	</h3>
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Accueil</a>
			</li>
			<li>
				<i class="fa fa-angle-right"></i>
				<a href="liste_fournisseurs.php">Liste des fournisseurs</a>
			</li>
			<li>
				<i class="fa fa-angle-right"></i>
				<?php echo $donnees['f_nom']; ?>
			</li>
		</ul>

	</div>
	<!-- END PAGE HEADER-->
	<!-- BEGIN PAGE CONTENT-->
	<!-- BEGIN DASHBOARD STATS -->
	<?php echo flash(); var_dump($_POST);?>
	<div class="row">


		<div class="col-md-12">
			<!-- BEGIN PROFILE SIDEBAR -->
			<div class="profile-sidebar">
				<!-- PORTLET MAIN -->
				<div class="portlet light profile-sidebar-portlet">
					<!-- SIDEBAR USERPIC -->
					<div class="profile-userpic">
						<img src="../img/inconnu.jpg" class="img-responsive" alt="">
					</div>
					<!-- END SIDEBAR USERPIC -->
					<!-- SIDEBAR USER TITLE -->
					<div class="profile-usertitle">
						<div class="profile-usertitle-name">
							<?php echo $donnees['f_nom']; ?>
						</div>
						<div class="profile-usertitle-job">
							<img src="../../assets/global/img/flags/<?php echo strtolower($donnees['f_pays']); ?>.png"></i>
						</div>
					</div>
					<!-- END SIDEBAR USER TITLE -->
					<!-- SIDEBAR BUTTONS -->
					<div class="profile-userbuttons">

							
						<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
										<h4 class="modal-title">Modification de <?php echo $donnees['f_nom']; ?></h4>
									</div>
									<div class="modal-body p-1">

										<form role="form" method="post" action="#">

												<button type="button" data-dismiss="modal" class="btn default">Close</button>
												<button type="submit" class="btn green" name="modif">Modifier</button>
											
											<div class="form-group p-1-t">
												<label class="control-label">Nom du fournisseur <span class="required" aria-required="true">
													* </span>
												</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-pencil"></i>
													</span>
													<input type='text' placeholder='Ex : Auchan' class='form-control' name='f_nom' value='<?php echo $donnees['f_nom']; ?>'>
												</div>
											</div>

											<div class="form-group">
												<label>Site Web du fournisseur</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-globe"></i>
													</span>
													<input type='text' placeholder='Ex : http://little-owl.fr' class='form-control' name='f_site' value='<?php echo $donnees['f_site']; ?>'>
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
													<input type='email' placeholder='Ex : contact@little-owl.fr' class='form-control' name='f_email' value='<?php echo $donnees['f_email']; ?>'>
												</div>
											</div>

											<div class="form-group">
												<label>Référence</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-folder"></i>
													</span>
													<input type='text' placeholder='Ex : BX20090DF' class='form-control' name='f_ref' value='<?php echo $donnees['f_ref']; ?>'>
												</div>
											</div>

											<div class="form-group">
												<label class="control-label">Numéro de téléphone </label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-phone"></i>
													</span>
													<input type='text' placeholder='Ex : 0102030405' class='form-control' name='f_tel' value='<?php echo $donnees['f_tel']; ?>'>
												</div>
											</div>

											<div class="form-group">
												<label>Numéro de fax</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-fax"></i>
													</span>
													<input type='text' placeholder='Ex : 0102030406' class='form-control' name='f_fax' value='<?php echo $donnees['f_fax']; ?>'>
												</div>
											</div>

											<div class="form-group">
												<label>Adresse</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-home"></i>
													</span>									
													<input type='text' placeholder='Ex : 24 rue des fournisseur' class='form-control' name='f_adresse' value='<?php echo $donnees['f_adresse']; ?>'>
												</div>
											</div>

											<div class="form-group">
												<label>Code postal</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-home"></i>
													</span>
													<input type='text' placeholder='Ex : 13009' class='form-control' name='f_code_postal' value='<?php echo $donnees['f_code_postal']; ?>'>
												</div>
											</div>

											<div class="form-group">
												<label>Ville</label>
												<div class="input-group">
													<span class="input-group-addon">
														<i class="fa fa-home"></i>
													</span>
													<input type='text' placeholder='Ex : Marseille' class='form-control' name='f_ville' value='<?php echo $donnees['f_ville']; ?>'>
												</div>
											</div>


											<div class="form-group">
												<label>Pays</label>
												<label class="control-label visible-ie8 visible-ie9">Pays</label>

												<select class="form-control select2me" name="f_pays">
													<option value="<?php echo $donnees['f_pays']; ?>" selected><?php echo $donnees['f_pays']; ?></option>
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
													<textarea class="ckeditor form-control p-1" name="f_commentaire" rows="6" data-error-container="#editor2_error"><?php echo $donnees['f_commentaire']; ?></textarea>
													<div id="editor2_error">
													</div>
												</div>
											</div>									
												<button type="button" data-dismiss="modal" class="btn default">Fermer</button>								
										</form>

										
									</div>
								</div>
							</div>
						</div>

						<a href="#myModal2" role="button" class="btn green btn btn-circle green-haze btn-sm" data-toggle="modal">Modifier</a>
						<button type="button" class="btn btn-circle btn-danger btn-sm">Supprimer</button>
					</div>
					<!-- END SIDEBAR BUTTONS -->
					<!-- SIDEBAR MENU -->
					<div class="profile-usermenu">
						<ul class="nav">
							<li class="active">
								<a href="extra_profile.html">
									<i class="icon-home"></i>
									Overview </a>
								</li>
								<li>
									<a href="extra_profile_account.html">
										<i class="icon-settings"></i>
										Account Settings </a>
									</li>
									<li>
										<a href="page_todo.html" target="_blank">
											<i class="icon-check"></i>
											Tasks </a>
										</li>
										<li>
											<a href="extra_profile_help.html">
												<i class="icon-info"></i>
												Help </a>
											</li>
										</ul>
									</div>
									<!-- END MENU -->
								</div>
								<!-- END PORTLET MAIN -->
								<!-- PORTLET MAIN -->
								<div class="portlet light">
									<!-- STAT -->
									<div class="row list-separated profile-stat">
										<div class="col-md-4 col-sm-4 col-xs-6">
											<div class="uppercase profile-stat-title">
												60
											</div>
											<div class="uppercase profile-stat-text">
												Commandes
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-6">
											<div class="uppercase profile-stat-title">
												20
											</div>
											<div class="uppercase profile-stat-text">
												Retards
											</div>
										</div>
										<div class="col-md-4 col-sm-4 col-xs-6">
											<div class="uppercase profile-stat-title">
												12%
											</div>
											<div class="uppercase profile-stat-text">
												Pourcentage
											</div>
										</div>
									</div>
									<!-- END STAT -->
									<div>
										<h4 class="profile-desc-title">Commentaire</h4>
										<span class="profile-desc-text"> <?php echo htmlspecialchars_decode($donnees['f_commentaire']); ?> </span>
										<div class="margin-top-20 profile-desc-link">
											<i class="fa fa-globe"></i>
											
											<?php if ($donnees['f_site'] == '') {
												echo "Aucun site";
											}else{												
												?>
												<a href="<?php echo $donnees['f_site']; ?>"><?php echo $donnees['f_site']; ?></a>
												<?php
											} ?>
											
										</div>
										<div class="margin-top-20 profile-desc-link">
											<i class="fa fa-envelope"></i>

											<?php if ($donnees['f_email'] == '') {
												echo "Aucun email";
											}else{												
												?>
												<a href="<?php echo $donnees['f_email']; ?>"><?php echo $donnees['f_email']; ?></a>
												<?php
											} ?>

										</div>
										<div class="margin-top-20 profile-desc-link">
											<i class="fa fa-phone"></i>

											<?php if ($donnees['f_tel'] == '') {
												echo "Aucun site";
											}else{												
												echo $donnees['f_tel'];												
											} ?>

										</div>
									</div>
								</div>
								<!-- END PORTLET MAIN -->
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="col-md-12">
										<!-- BEGIN PORTLET -->
										<div class="portlet light ">
											<div class="portlet-title">
												<div class="caption caption-md">
													<i class="icon-bar-chart theme-font hide"></i>
													<span class="caption-subject font-blue-madison bold uppercase">Dernière activé</span>
													<span class="caption-helper hide">weekly stats...</span>
												</div>
												
														</div>
														<div class="portlet-body">
															<div class="row number-stats margin-bottom-30">
																<div class="col-md-6 col-sm-6 col-xs-6">
																	<div class="stat-left">
																		<div class="stat-chart">
																			<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																			<div id="sparkline_bar"></div>
																		</div>
																		<div class="stat-number">
																			<div class="title">
																				Commandes en cours
																			</div>
																			<div class="number">
																				7
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-md-6 col-sm-6 col-xs-6">
																	<div class="stat-right">
																		<div class="stat-chart">
																			<!-- do not line break "sparkline_bar" div. sparkline chart has an issue when the container div has line break -->
																			<div id="sparkline_bar2"></div>
																		</div>
																		<div class="stat-number">
																			<div class="title">
																				Prix total
																			</div>
																			<div class="number">
																				73 &euro;
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="table-scrollable table-scrollable-borderless">
																<table class="table table-hover table-light">
																	<thead>
																		<tr class="uppercase">
																			<th colspan="2">
																				Produit
																			</th>
																			<th>
																				Prix
																			</th>
																			<th>
																				Quantité
																			</th>
																			<th>
																				Date
																			</th>
																			<th>
																				RATE
																			</th>
																		</tr>
																	</thead>
																	<tr>
																		<td class="fit">
																			<img class="user-pic" src="../../assets/admin/layout3/img/avatar4.jpg">
																		</td>
																		<td>
																			<a href="#" class="primary-link">Brain</a>
																		</td>
																		<td>
																			$345
																		</td>
																		<td>
																			45
																		</td>
																		<td>
																			124
																		</td>
																		<td>
																			<span class="bold theme-font">80%</span>
																		</td>
																	</tr>
																	<tr>
																		<td class="fit">
																			<img class="user-pic" src="../../assets/admin/layout3/img/avatar5.jpg">
																		</td>
																		<td>
																			<a href="#" class="primary-link">Nick</a>
																		</td>
																		<td>
																			$560
																		</td>
																		<td>
																			12
																		</td>
																		<td>
																			24
																		</td>
																		<td>
																			<span class="bold theme-font">67%</span>
																		</td>
																	</tr>
																	<tr>
																		<td class="fit">
																			<img class="user-pic" src="../../assets/admin/layout3/img/avatar6.jpg">
																		</td>
																		<td>
																			<a href="#" class="primary-link">Tim</a>
																		</td>
																		<td>
																			$1,345
																		</td>
																		<td>
																			450
																		</td>
																		<td>
																			46
																		</td>
																		<td>
																			<span class="bold theme-font">98%</span>
																		</td>
																	</tr>
																	<tr>
																		<td class="fit">
																			<img class="user-pic" src="../../assets/admin/layout3/img/avatar7.jpg">
																		</td>
																		<td>
																			<a href="#" class="primary-link">Tom</a>
																		</td>
																		<td>
																			$645
																		</td>
																		<td>
																			50
																		</td>
																		<td>
																			89
																		</td>
																		<td>
																			<span class="bold theme-font">58%</span>
																		</td>
																	</tr>
																</table>
															</div>
														</div>
													</div>
													<!-- END PORTLET -->
												</div>
												
											</div>
											<div class="row">
												<div class="col-md-6">
													<!-- BEGIN PORTLET -->
													<div class="portlet light">
														<div class="portlet-title">
															<div class="caption caption-md">
																<i class="icon-bar-chart theme-font hide"></i>
																<span class="caption-subject font-blue-madison bold uppercase">Customer Support</span>
																<span class="caption-helper">45 pending</span>
															</div>
															<div class="inputs">
																<div class="portlet-input input-inline input-small ">
																	<div class="input-icon right">
																		<i class="icon-magnifier"></i>
																		<input type="text" class="form-control form-control-solid" placeholder="search...">
																	</div>
																</div>
															</div>
														</div>
														<div class="portlet-body">
															<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
																<div class="general-item-list">
																	<div class="item">
																		<div class="item-head">
																			<div class="item-details">
																				<img class="item-pic" src="../../assets/admin/layout3/img/avatar4.jpg">
																				<a href="" class="item-name primary-link">Nick Larson</a>
																				<span class="item-label">3 hrs ago</span>
																			</div>
																			<span class="item-status"><span class="badge badge-empty badge-success"></span> Open</span>
																		</div>
																		<div class="item-body">
																			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
																		</div>
																	</div>
																	<div class="item">
																		<div class="item-head">
																			<div class="item-details">
																				<img class="item-pic" src="../../assets/admin/layout3/img/avatar3.jpg">
																				<a href="" class="item-name primary-link">Mark</a>
																				<span class="item-label">5 hrs ago</span>
																			</div>
																			<span class="item-status"><span class="badge badge-empty badge-warning"></span> Pending</span>
																		</div>
																		<div class="item-body">
																			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat tincidunt ut laoreet.
																		</div>
																	</div>
																	<div class="item">
																		<div class="item-head">
																			<div class="item-details">
																				<img class="item-pic" src="../../assets/admin/layout3/img/avatar6.jpg">
																				<a href="" class="item-name primary-link">Nick Larson</a>
																				<span class="item-label">8 hrs ago</span>
																			</div>
																			<span class="item-status"><span class="badge badge-empty badge-primary"></span> Closed</span>
																		</div>
																		<div class="item-body">
																			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh.
																		</div>
																	</div>
																	<div class="item">
																		<div class="item-head">
																			<div class="item-details">
																				<img class="item-pic" src="../../assets/admin/layout3/img/avatar7.jpg">
																				<a href="" class="item-name primary-link">Nick Larson</a>
																				<span class="item-label">12 hrs ago</span>
																			</div>
																			<span class="item-status"><span class="badge badge-empty badge-danger"></span> Pending</span>
																		</div>
																		<div class="item-body">
																			Consectetuer adipiscing elit Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
																		</div>
																	</div>
																	<div class="item">
																		<div class="item-head">
																			<div class="item-details">
																				<img class="item-pic" src="../../assets/admin/layout3/img/avatar9.jpg">
																				<a href="" class="item-name primary-link">Richard Stone</a>
																				<span class="item-label">2 days ago</span>
																			</div>
																			<span class="item-status"><span class="badge badge-empty badge-danger"></span> Open</span>
																		</div>
																		<div class="item-body">
																			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, ut laoreet dolore magna aliquam erat volutpat.
																		</div>
																	</div>
																	<div class="item">
																		<div class="item-head">
																			<div class="item-details">
																				<img class="item-pic" src="../../assets/admin/layout3/img/avatar8.jpg">
																				<a href="" class="item-name primary-link">Dan</a>
																				<span class="item-label">3 days ago</span>
																			</div>
																			<span class="item-status"><span class="badge badge-empty badge-warning"></span> Pending</span>
																		</div>
																		<div class="item-body">
																			Lorem ipsum dolor sit amet, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
																		</div>
																	</div>
																	<div class="item">
																		<div class="item-head">
																			<div class="item-details">
																				<img class="item-pic" src="../../assets/admin/layout3/img/avatar2.jpg">
																				<a href="" class="item-name primary-link">Larry</a>
																				<span class="item-label">4 hrs ago</span>
																			</div>
																			<span class="item-status"><span class="badge badge-empty badge-success"></span> Open</span>
																		</div>
																		<div class="item-body">
																			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
													<!-- END PORTLET -->
												</div>
												<div class="col-md-6">
													<!-- BEGIN PORTLET -->
													<div class="portlet light tasks-widget">
														<div class="portlet-title">
															<div class="caption caption-md">
																<i class="icon-bar-chart theme-font hide"></i>
																<span class="caption-subject font-blue-madison bold uppercase">Tasks</span>
																<span class="caption-helper">16 pending</span>
															</div>
															<div class="inputs">
																<div class="portlet-input input-small input-inline">
																	<div class="input-icon right">
																		<i class="icon-magnifier"></i>
																		<input type="text" class="form-control form-control-solid" placeholder="search...">
																	</div>
																</div>
															</div>
														</div>
														<div class="portlet-body">
															<div class="task-content">
																<div class="scroller" style="height: 282px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
																	<!-- START TASK LIST -->
																	<ul class="task-list">
																		<li>
																			<div class="task-checkbox">
																				<input type="hidden" value="1" name="test"/>
																				<input type="checkbox" class="liChild" value="2" name="test"/>
																			</div>
																			<div class="task-title">
																				<span class="task-title-sp">
																					Present 2013 Year IPO Statistics at Board Meeting </span>
																					<span class="label label-sm label-success">Company</span>
																					<span class="task-bell">
																						<i class="fa fa-bell-o"></i>
																					</span>
																				</div>
																				<div class="task-config">
																					<div class="task-config-btn btn-group">
																						<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																							<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																						</a>
																						<ul class="dropdown-menu pull-right">
																							<li>
																								<a href="#">
																									<i class="fa fa-check"></i> Complete </a>
																								</li>
																								<li>
																									<a href="#">
																										<i class="fa fa-pencil"></i> Edit </a>
																									</li>
																									<li>
																										<a href="#">
																											<i class="fa fa-trash-o"></i> Cancel </a>
																										</li>
																									</ul>
																								</div>
																							</div>
																						</li>
																						<li>
																							<div class="task-checkbox">
																								<input type="checkbox" class="liChild" value=""/>
																							</div>
																							<div class="task-title">
																								<span class="task-title-sp">
																									Hold An Interview for Marketing Manager Position </span>
																									<span class="label label-sm label-danger">Marketing</span>
																								</div>
																								<div class="task-config">
																									<div class="task-config-btn btn-group">
																										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																											<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																										</a>
																										<ul class="dropdown-menu pull-right">
																											<li>
																												<a href="#">
																													<i class="fa fa-check"></i> Complete </a>
																												</li>
																												<li>
																													<a href="#">
																														<i class="fa fa-pencil"></i> Edit </a>
																													</li>
																													<li>
																														<a href="#">
																															<i class="fa fa-trash-o"></i> Cancel </a>
																														</li>
																													</ul>
																												</div>
																											</div>
																										</li>
																										<li>
																											<div class="task-checkbox">
																												<input type="checkbox" class="liChild" value=""/>
																											</div>
																											<div class="task-title">
																												<span class="task-title-sp">
																													AirAsia Intranet System Project Internal Meeting </span>
																													<span class="label label-sm label-success">AirAsia</span>
																													<span class="task-bell">
																														<i class="fa fa-bell-o"></i>
																													</span>
																												</div>
																												<div class="task-config">
																													<div class="task-config-btn btn-group">
																														<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																															<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																														</a>
																														<ul class="dropdown-menu pull-right">
																															<li>
																																<a href="#">
																																	<i class="fa fa-check"></i> Complete </a>
																																</li>
																																<li>
																																	<a href="#">
																																		<i class="fa fa-pencil"></i> Edit </a>
																																	</li>
																																	<li>
																																		<a href="#">
																																			<i class="fa fa-trash-o"></i> Cancel </a>
																																		</li>
																																	</ul>
																																</div>
																															</div>
																														</li>
																														<li>
																															<div class="task-checkbox">
																																<input type="checkbox" class="liChild" value=""/>
																															</div>
																															<div class="task-title">
																																<span class="task-title-sp">
																																	Technical Management Meeting </span>
																																	<span class="label label-sm label-warning">Company</span>
																																</div>
																																<div class="task-config">
																																	<div class="task-config-btn btn-group">
																																		<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																																			<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																																		</a>
																																		<ul class="dropdown-menu pull-right">
																																			<li>
																																				<a href="#">
																																					<i class="fa fa-check"></i> Complete </a>
																																				</li>
																																				<li>
																																					<a href="#">
																																						<i class="fa fa-pencil"></i> Edit </a>
																																					</li>
																																					<li>
																																						<a href="#">
																																							<i class="fa fa-trash-o"></i> Cancel </a>
																																						</li>
																																					</ul>
																																				</div>
																																			</div>
																																		</li>
																																		<li>
																																			<div class="task-checkbox">
																																				<input type="checkbox" class="liChild" value=""/>
																																			</div>
																																			<div class="task-title">
																																				<span class="task-title-sp">
																																					Kick-off Company CRM Mobile App Development </span>
																																					<span class="label label-sm label-info">Internal Products</span>
																																				</div>
																																				<div class="task-config">
																																					<div class="task-config-btn btn-group">
																																						<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																																							<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																																						</a>
																																						<ul class="dropdown-menu pull-right">
																																							<li>
																																								<a href="#">
																																									<i class="fa fa-check"></i> Complete </a>
																																								</li>
																																								<li>
																																									<a href="#">
																																										<i class="fa fa-pencil"></i> Edit </a>
																																									</li>
																																									<li>
																																										<a href="#">
																																											<i class="fa fa-trash-o"></i> Cancel </a>
																																										</li>
																																									</ul>
																																								</div>
																																							</div>
																																						</li>
																																						<li>
																																							<div class="task-checkbox">
																																								<input type="checkbox" class="liChild" value=""/>
																																							</div>
																																							<div class="task-title">
																																								<span class="task-title-sp">
																																									Prepare Commercial Offer For SmartVision Website Rewamp </span>
																																									<span class="label label-sm label-danger">SmartVision</span>
																																								</div>
																																								<div class="task-config">
																																									<div class="task-config-btn btn-group">
																																										<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																																											<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																																										</a>
																																										<ul class="dropdown-menu pull-right">
																																											<li>
																																												<a href="#">
																																													<i class="fa fa-check"></i> Complete </a>
																																												</li>
																																												<li>
																																													<a href="#">
																																														<i class="fa fa-pencil"></i> Edit </a>
																																													</li>
																																													<li>
																																														<a href="#">
																																															<i class="fa fa-trash-o"></i> Cancel </a>
																																														</li>
																																													</ul>
																																												</div>
																																											</div>
																																										</li>
																																										<li>
																																											<div class="task-checkbox">
																																												<input type="checkbox" class="liChild" value=""/>
																																											</div>
																																											<div class="task-title">
																																												<span class="task-title-sp">
																																													Sign-Off The Comercial Agreement With AutoSmart </span>
																																													<span class="label label-sm label-default">AutoSmart</span>
																																													<span class="task-bell">
																																														<i class="fa fa-bell-o"></i>
																																													</span>
																																												</div>
																																												<div class="task-config">
																																													<div class="task-config-btn btn-group">
																																														<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																																															<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																																														</a>
																																														<ul class="dropdown-menu pull-right">
																																															<li>
																																																<a href="#">
																																																	<i class="fa fa-check"></i> Complete </a>
																																																</li>
																																																<li>
																																																	<a href="#">
																																																		<i class="fa fa-pencil"></i> Edit </a>
																																																	</li>
																																																	<li>
																																																		<a href="#">
																																																			<i class="fa fa-trash-o"></i> Cancel </a>
																																																		</li>
																																																	</ul>
																																																</div>
																																															</div>
																																														</li>
																																														<li>
																																															<div class="task-checkbox">
																																																<input type="checkbox" class="liChild" value=""/>
																																															</div>
																																															<div class="task-title">
																																																<span class="task-title-sp">
																																																	Company Staff Meeting </span>
																																																	<span class="label label-sm label-success">Cruise</span>
																																																	<span class="task-bell">
																																																		<i class="fa fa-bell-o"></i>
																																																	</span>
																																																</div>
																																																<div class="task-config">
																																																	<div class="task-config-btn btn-group">
																																																		<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																																																			<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																																																		</a>
																																																		<ul class="dropdown-menu pull-right">
																																																			<li>
																																																				<a href="#">
																																																					<i class="fa fa-check"></i> Complete </a>
																																																				</li>
																																																				<li>
																																																					<a href="#">
																																																						<i class="fa fa-pencil"></i> Edit </a>
																																																					</li>
																																																					<li>
																																																						<a href="#">
																																																							<i class="fa fa-trash-o"></i> Cancel </a>
																																																						</li>
																																																					</ul>
																																																				</div>
																																																			</div>
																																																		</li>
																																																		<li class="last-line">
																																																			<div class="task-checkbox">
																																																				<input type="checkbox" class="liChild" value=""/>
																																																			</div>
																																																			<div class="task-title">
																																																				<span class="task-title-sp">
																																																					KeenThemes Investment Discussion </span>
																																																					<span class="label label-sm label-warning">KeenThemes </span>
																																																				</div>
																																																				<div class="task-config">
																																																					<div class="task-config-btn btn-group">
																																																						<a class="btn btn-xs default" href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
																																																							<i class="fa fa-cog"></i><i class="fa fa-angle-down"></i>
																																																						</a>
																																																						<ul class="dropdown-menu pull-right">
																																																							<li>
																																																								<a href="#">
																																																									<i class="fa fa-check"></i> Complete </a>
																																																								</li>
																																																								<li>
																																																									<a href="#">
																																																										<i class="fa fa-pencil"></i> Edit </a>
																																																									</li>
																																																									<li>
																																																										<a href="#">
																																																											<i class="fa fa-trash-o"></i> Cancel </a>
																																																										</li>
																																																									</ul>
																																																								</div>
																																																							</div>
																																																						</li>
																																																					</ul>
																																																					<!-- END START TASK LIST -->
																																																				</div>
																																																			</div>
																																																			<div class="task-footer">
																																																				<div class="btn-arrow-link pull-right">
																																																					<a href="#">See All Tasks</a>
																																																				</div>
																																																			</div>
																																																		</div>
																																																	</div>
																																																	<!-- END PORTLET -->
																																																</div>
																																															</div>
																																														</div>
																																														<!-- END PROFILE CONTENT -->
																																													</div>



																																												</div>
																																												<!-- END DASHBOARD STATS -->
																																												<!-- END PAGE CONTENT-->
																																											</div>

																																											<?php include 'footer.php'; ?>

