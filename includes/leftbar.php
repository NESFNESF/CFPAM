<div class="left-sidebar bg-black-300 box-shadow ">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="img/tof.jpg" class="img-circle profile-img" width="70px" height="70">
                                <h6 class="title"><?php echo $_SESSION['user']->nom; ?></h6>
                                <small class="info"><?php if($_SESSION['user']->role == 1){
                                    echo 'Administrateur';

                                }else if($_SESSION['user']->role == 2){
                                    echo 'Comptable';
                                }else if ($_SESSION['user']->role == 3){
                                    echo 'Sécretaire';
                                }else{
                                    echo 'Gestionnaire de Formation';
                                }; ?></small>
                            </div>
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Menu principal</span>
                                    </li>
                                    <li>
                                        <a href="dashboard.php"><i class="fa fa-dashboard"></i> <span>Tableau de bord</span> </a>
                                     
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Apparance</span>
                                    </li>
                                    <?php if($_SESSION['user']->role == 4 || $_SESSION['user']->role == 1 ) {  ?>
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>FORMATION</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                        <li><a href="choix_liste.php"><i class="fa fa fa-server"></i> <span>Liste des Etudiants</span></a></li>
                                        <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>FORMATEUR</span> <i class="fa fa-angle-right arrow"></i></a>
                                            <ul class="child-nav">
                                            <li><a href="liste_formateur.php"><i class="fa fa-bars"></i> <span>Liste Formateur</span></a></li>
                                            <li><a href="ajouter_formateur.php"><i class="fa fa-bars"></i> <span>Ajouter Formateur</span></a></li>

                                            </ul>
                                    </li>
                                        <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>FILIERE</span> <i class="fa fa-angle-right arrow"></i></a>
                                            <ul class="child-nav">
                                            <li><a href="listefi.php"><i class="fa fa-bars"></i> <span>Liste Filière</span></a></li>
                                            <li><a href="createFiliere.php"><i class="fa fa-bars"></i> <span>Ajouter Filière</span></a></li>

                                            </ul>
                                    </li>
                                    <li class="has-children">
                                    <a href="#"><i class="fa fa-file-text"></i> <span>MODULE</span> <i class="fa fa-angle-right arrow"></i></a>
                                            <ul class="child-nav">
                                            <li><a href="module.php"><i class="fa fa-bars"></i> <span>Liste Module</span></a></li>
                                            <li><a href="ajouter_mod.php"><i class="fa fa-bars"></i> <span>Ajouter Module</span></a></li>

                                            </ul>
                                    </li>
                                        <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>NOTE</span> <i class="fa fa-angle-right arrow"></i></a>
                                            <ul class="child-nav">
                                            <li><a href="consulter_note_one.php"><i class="fa fa fa-server"></i> <span>Consulter les notes</span></a></li>
                                     
                                            <li><a href="note_one.php"><i class="fa fa fa-server"></i> <span>Enregistrer Note</span></a></li>
                                            <li><a href="#"><i class="fa fa fa-server"></i> <span>Modifier Note</span></a></li>

                                            </ul>
                                    </li>
                                          
                                            <li><a href="discipline.php"><i class="fa fa fa-server"></i> <span>Discipline</span></a></li>
                                            <li><a href="#"><i class="fa fa fa-server"></i> <span>Budget</span></a></li>
                                            
                                           
                                        </ul>
                                    </li>
                                    <?php }  ?>
                                    <?php if($_SESSION['user']->role == 2 || $_SESSION['user']->role == 1 ) {  ?>
  <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>COMPTABILITE</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="choix_liste_inscrit.php"><i class="fa fa-bars"></i> <span>Liste Inscrits</span></a></li>
                                           <li><a href="choix_liste_solvable.php"><i class="fa fa-newspaper-o"></i> <span>Liste Solvable</span></a>
                                            <li><a href="choix_liste_insolvable.php"><i class="fa fa fa-server"></i> <span>Liste Insolvable</span></a></li>
                                                <li><a href="#"><i class="fa fa fa-server"></i> <span>Salaires</span></a></li>
                                           </li>
                                           <a href="#"><i class="fa fa-newspaper-o"></i> <span>Dépense </span></a>
                                           <li><a href="#"><i class="fa fa fa-server"></i> <span>Budget</span></a></li>
                                           <li><a href="#"><i class="fa fa fa-server"></i> <span>Autres</span></a></li>
                                       </li>
                                       <?php } ?>
                                        </ul>
                                    </li>
                                    <?php if($_SESSION['user']->role == 3 || $_SESSION['user']->role == 1 ) {  ?>
   <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>ENREGISTREMENT</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="choix_liste.php"><i class="fa fa fa-server"></i> <span>Liste Etudiant</span></a></li>
                                           
                                        </ul>
                                    </li>
                                    <?php } ?>

                                    <?php if($_SESSION['user']->role == 1 ) {  ?>
<li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>RESULTATS</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="#"><i class="fa fa-bars"></i> <span>Add Result</span></a></li>
                                            <li><a href="#"><i class="fa fa fa-server"></i> <span>Manage Result</span></a></li>
                                           
                                        </ul>
                                        <li><a href="afficheruser.php"><i class="fa fa fa-server"></i> <span> CREER USER</span></a></li>
                                        <li><a href="change-password"><i class="fa fa fa-server"></i> <span> CHANGER MOT DE PASSE</span></a></li>
                                           
                                    </li>
                        <?php } ?>
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>