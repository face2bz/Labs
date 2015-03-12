<?php 
include 'bdd.php';
include 'function.php';
include 'check_session.php';

$h_page = "Ajout d'un type de produit";

if (isset($_POST['send'])) {

	$t_p_nom = ucfirst(securisation($_POST['t_p_nom']));	
	$t_p_ref = securisation($_POST['t_p_ref']);	
	$t_p_commentaire = htmlentities($_POST['t_p_commentaire']);
	$id_membre = $_SESSION['id_membre'];

	if ($t_p_nom != "") {

			$req = $bdd->prepare('SELECT * FROM type_produit WHERE t_p_nom = :t_p_nom AND id_membre = :id_membre');
		$req->execute(array('t_p_nom' => $t_p_nom, 'id_membre' => $id_membre));
		$donnees = $req->fetch();
		if ($req->rowCount() > 0 ) {

			setFlash('Nom du type de produit déja utilisé.', 'danger');

		}else{

			$fournisseurs = $bdd->prepare('INSERT INTO type_produit(t_p_nom, t_p_ref, t_p_commentaire, id_membre) 
				VALUES (:t_p_nom, :t_p_ref, :t_p_commentaire, :id_membre)');
			$fournisseurs->execute(array(
				't_p_nom' => $t_p_nom,
				't_p_ref' => $t_p_ref,
				't_p_commentaire' => $t_p_commentaire,
				'id_membre' => $id_membre
				));		

				// HISTORIQUE INSERT DEBUT
					historique(2, $h_page, 'Ajout du type produit ' . $t_p_nom);
				// HISTORIQUE INSERT FIN

			setFlash('Vous avez bien ajouté <strong>' . $t_p_nom . '</strong> comme nouveau type de produit.');
			header('Location:ajout_type_produit.php');
			die();
			
		}

	}else{
		setFlash('Attention il n\'y à aucun nom de type produit.', 'danger');
	}	
}


include 'header.php'; ?>
<div class="page-content">
	

	<!-- BEGIN PAGE HEADER-->
	<h3 class="page-title">
		Ajout d'un type produit
	</h3>
	<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<i class="fa fa-home"></i>
				<a href="index.php">Accueil</a>
			</li>
			<li>
				<i class="fa fa-angle-right"></i>
				Ajout d'un type produit
			</li>
		</ul>
		<div class="page-toolbar">
			<div class="btn-group pull-right">				
				<a href="#myModal2" role="button" class="btn green" data-toggle="modal">Liste des types de produits</a> 
			</div>
		</div>

	</div>
	<!-- END PAGE HEADER-->
	<!-- BEGIN PAGE CONTENT-->
	<!-- BEGIN DASHBOARD STATS -->
	<?php echo flash();?>
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
				<div id="myModal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
								<h4 class="modal-title">Liste des types de produits déja enregistré</h4>
							</div>
							<div class="modal-body p-1">
								<select class="form-control select2me" name="options2">
									<option value="">...</option>
									<?php echo typeproduit('t_p_nom'); ?>
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
							<i class="fa fa-gift"></i> Ajouter un type de produit
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
									<label class="control-label">Nom du type de produit <span class="required" aria-required="true">
										* </span>
										</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-pencil"></i>
										</span>
										<?php echo input('t_p_nom','Ex : Bagues'); ?>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label">Référence</span>
										</label>
									<div class="input-group">
										<span class="input-group-addon">
											<i class="fa fa-pencil"></i>
										</span>
										<?php echo input('t_p_ref','Ex : BXDFER21'); ?>
									</div>
								</div>

								<div class="form-group last">
									<div class="col-md-12">
										<!-- BEGIN Portlet PORTLET-->
										<div class="portlet">
											<div class="portlet-title">
												<div class="caption">
													<i class="fa fa-gift"></i>Commentaire
												</div>												
											</div>
											<div class="portlet-body ">
												<div class="col-md-12">
													<textarea class="ckeditor form-control last" name="t_p_commentaire" rows="6" data-error-container="#editor2_error"><?php if (isset($_POST['commentaire'])){ echo $_POST['commentaire'];} ?></textarea>

												</div>
											</div>
										</div>
										<!-- END Portlet PORTLET-->
									</div>
								</div>



							<div class="form-actions">
								<div class="row p-1-t">
									<div class="col-md-9"><button type="submit" class="btn blue" name="send">Enregistrer</button>
									</div>
								</div>
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

