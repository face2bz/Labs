<?php 
include 'bdd.php';
include 'function.php';
include 'check_session.php';
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
				Liste des fournisseurs
			</li>
		</ul>

	</div>
	<!-- END PAGE HEADER-->
	<!-- BEGIN PAGE CONTENT-->
	<!-- BEGIN DASHBOARD STATS -->
	<?php echo flash();?>
	<div class="row">


		<div class="col-md-12">
			
			<!-- BEGIN EXAMPLE TABLE PORTLET-->
			<div class="portlet box green-haze">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-globe"></i>Datatable with TableTools
					</div>
					<div class="tools">
						<a href="javascript:;" class="reload">
						</a>
						<a href="javascript:;" class="remove">
						</a>
					</div>
				</div>
				<div class="portlet-body">
					<table class="table table-striped table-bordered table-hover" id="sample_2">
						<thead>
							<tr>
								<th>
									Nom
								</th>
								<th>
									Email
								</th>
								<th>
									Pays
								</th>
								<th>
									Téléphone
								</th>
								<th>
									Référence
								</th>
								<th>
									Commentaire
								</th>
							</tr>
						</thead>
						<tbody>
							
							<?php 

							$fournisseurs = $bdd->prepare('SELECT * FROM membres, fournisseurs WHERE membres.id_membre = fournisseurs.id_membre AND membres.id_membre = :id ORDER BY fournisseurs.f_nom ASC');
							$fournisseurs->execute(array('id' => $_SESSION['id_membre']));
							while ($donnees = $fournisseurs->fetch()){
								?>
								<tr>
									<td>  <a href="fournisseur.php?f=<?php echo $donnees['id_fournisseur']; ?>"><?php echo $donnees['f_nom']; ?></a>    </td>
									<td> <a href="mailto:<?php echo $donnees['f_email']; ?>"><?php echo $donnees['f_email']; ?></a>  </td>
									<td><img src="../../assets/global/img/flags/<?php echo strtolower($donnees['f_pays']); ?>.png"></i></td>

									<td><?php echo $donnees['f_tel']; ?> </td>
									<td><?php echo $donnees['f_ref']; ?> </td>
									<td><?php echo $donnees['f_commentaire']; ?> </td>
								</tr>
								<?php									
							} 
							$fournisseurs->closeCursor();
							?>


							
							
						</tbody>
					</table>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
			


		</div>
		<!-- END DASHBOARD STATS -->
		<!-- END PAGE CONTENT-->
	</div>

	<?php include 'footer.php'; ?>

