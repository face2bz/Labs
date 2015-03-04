<?php 
include 'bdd.php';
include 'function.php';

if (isset($_SESSION['id_membre'])) {
	header('Location:index.php');
	die();
}

if (isset($_POST['send'])) {
  $username = securisation($_POST['username']);
  $email = securisation($_POST['email']);
  $password = securisation($_POST['password']);
  $password_repeat = securisation($_POST['password_repeat']);
  $nom_societe = securisation($_POST['nom_societe']);

  if (strlen($username) >= 4 AND strlen($username) <= 12) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
      if (strlen($password) >= 4 AND strlen($password) <= 12) {
        if ($password == $password_repeat) {

          // Requêtte pour vérifier si le est libre
          $req = $bdd->prepare('SELECT count(id_membre) AS nbre_occurences FROM membres WHERE m_nom_utilisateur = :username');
          $req->execute(array('username' => $username));

          $donnees = $req->fetch();
          $nbre_occurences = $donnees['nbre_occurences'];
          $req->closeCursor();
                        // Requêtte pour vérifier si l'email est libre
          $req = $bdd->prepare('SELECT count(id_membre) AS nbre_occurences_mail FROM membres WHERE m_email_perso = :email');
          $req->execute(array('email' => $email));

          $donnees = $req->fetch();
          $nbre_occurences_mail = $donnees['nbre_occurences_mail'];
          $req->closeCursor();
          if ($nbre_occurences == 0) {
            if ($nbre_occurences_mail == 0) {
              //définissons notre grain de sel
              $grainDeSel = "sE##!oep24854$$#dsdfzz215754eEeBistoufleAnCat##sdfsd";              
              $motdepasse = sha1($password . $grainDeSel);
              $grainDeSelKey = "sEsd5844##jUdfIdsfk8DF#!!sdf#dsffsd";
              $key = sha1(time() + rand()) . rand(1,99999) . sha1($grainDeSelKey) . $username . rand(400, 54545454) . sha1("keygenerationteletebiz");
              $valide = 1;

              $register = $bdd->prepare('INSERT INTO membres(m_nom_utilisateur, m_password, m_email_perso, m_valide, m_key ,m_date_inscription) 
                VALUES (:username, :motdepasse, :email, :valide, :key, NOW())');
              $register->execute(array(         
                'username' => $username,
                'motdepasse' => $motdepasse,
                'email' => $email,
                'valide' => $valide,
                'key' => $key
                ));
              $id_nouveau = $bdd->lastInsertId(); 

              /*Variables de configuration par défaut*/
              $c_description = "Description de votre société";
              $c_siret = '000 000 000 00000'; 
              $c_date_activite = "2015-01-01";
              $c_ca_t = 82200;
              $c_budget_depart = 1;
              $c_resultat_banque = 1;
              $c_tel = 010203045;
              $c_adresse = "13 Rue du Général Beuret Paris, France";
              $c_site = "http://monsite.fr";
              $c_email_societe = "contact@monsite.fr";
              $c_nom = "Dupont";
              $c_prenom = "Jean";
              /*Variables de configuration par défaut FIN*/

              $config = $bdd->prepare('INSERT INTO configurations(id_membre, c_nom_societe, c_description, c_siret, c_date_activite, c_ca_t, c_budget_depart, c_resultat_banque, c_tel, c_adresse, c_site, c_email_societe, c_nom, c_prenom) 
                VALUES (:id_membre, :nom_societe,:c_description, :c_siret, :c_date_activite, :c_ca_t, :c_budget_depart, :c_resultat_banque, :c_tel, :c_adresse, :c_site, :c_email_societe, :c_nom, :c_prenom)');
              $config->execute(array(
                'id_membre' => $id_nouveau,
                'nom_societe' => $nom_societe,
                'c_description' => $c_description,
                'c_siret' => $c_siret,
                'c_date_activite' => $c_date_activite,
                'c_ca_t' => $c_ca_t,
                'c_budget_depart' => $c_budget_depart,
                'c_resultat_banque' => $c_resultat_banque,
                'c_tel' => $c_tel,
                'c_adresse' => $c_adresse,
                'c_site' => $c_site,
                'c_email_societe' => $c_email_societe,
                'c_nom' => $c_nom,
                'c_prenom' => $c_prenom
                ));

              setFlash('Inscription OK');
              header('Location: login.php');
              die();

            }else{
              setFlash('Attention email déjà utilisé.', 'error');
            }
          }else{
           setFlash('Attention nom d\'utilisateur déjà utilisé.', 'error');
         }


       }else{
        setFlash('Attention les mots de passe sont différent', 'error');
      }
    }else{
      setFlash('Attention le mot de passe doit contenir entre 4 et 12 caractères.', 'error');
    }
  }else{
    setFlash('Votre email n\'est pas correct', 'error');
  }
}else{
  setFlash('Attention le nom d\'utilisateur doit contenir entre 4 et 12 caractères.', 'error');
}
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8"/>
	<title>E-Bistoufle | Connexion </title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="../../assets/admin/pages/css/login.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL SCRIPTS -->
	<!-- BEGIN THEME STYLES -->
	<link href="../../assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="../../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
	<link href="../../assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="../../assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- END THEME STYLES -->
	<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
	<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
	<div class="menu-toggler sidebar-toggler">
	</div>
	<!-- END SIDEBAR TOGGLER BUTTON -->

	<!-- BEGIN LOGIN -->
	<div class="content">
		<!-- BEGIN LOGIN FORM -->
		<div class="row-fluid">
        <?php //var_dump($_POST);?>
        <?php echo flash(); ?>
        <div class="row-fluid">
          <div class="login-box">

            <div class="icons">
              <a href="index.html"><i class="halflings-icon home"></i></a>
              <a href="#"><i class="halflings-icon cog"></i></a>
            </div>
            <h2>Inscription</h2>
            <form class="form-horizontal" action="#" method="post">
              <fieldset>

                <div class="input-prepend" title="Username">
                  <span class="add-on"><i class="halflings-icon user"></i></span>
                  <input class="input-large span10" name="username" id="username" type="text" placeholder="Nom d'utilisateur"/>
                </div>
                <div class="clearfix"></div>

                <div class="input-prepend" title="NomSociete">
                  <span class="add-on"><i class="halflings-icon user"></i></span>
                  <input class="input-large span10" name="nom_societe" id="nom_societe" type="text" placeholder="Nom de votre sociéte"/>
                </div>
                <div class="clearfix"></div>

                <div class="input-prepend" title="E-mail">
                  <span class="add-on"><i class="halflings-icon envelope"></i></span>
                  <input class="input-large span10" name="email" id="email" type="email" placeholder="Adresse email"/>
                </div>
                <div class="clearfix"></div>

                <div class="input-prepend" title="Password">
                  <span class="add-on"><i class="halflings-icon lock"></i></span>
                  <input class="input-large span10" name="password" id="password" type="password" placeholder="Mot de passe"/>
                </div>

                <div class="input-prepend" title="Re_Password">
                  <span class="add-on"><i class="halflings-icon lock"></i></span>
                  <input class="input-large span10" name="password_repeat" id="password_repeat" type="password" placeholder="Repeter mot de passe"/>
                </div>

                <div class="clearfix"></div>

                <div class="button-login">  
                  <button type="submit" name="send" class="btn btn-primary">Inscription</button>
                </div>
                <div class="clearfix"></div>
              </form>

            </div><!--/span-->
          </div><!--/row-->


        </div><!--/.fluid-container-->

      </div><!--/fluid-row-->

		</div>

		<!-- END LOGIN -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="../../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="../../assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="../../assets/admin/pages/scripts/login.js" type="text/javascript"></script>
</body>
<!-- END BODY -->
</html>