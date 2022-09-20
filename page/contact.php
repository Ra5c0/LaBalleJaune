<?php
session_start();

ob_start();
?>

            <section>
                <h1>Contactez-nous</h1>
                <div class="">

                    <form class="form-style-9" action="mailto:rgpd@gmail.com" method="POST" enctype="text/plain" id="form">
                        <h3 style="text-align: center;">Informations de contact</h3>
                        <hr>
                        <ul>
                            <li>
                                <input type="text" id="nom" class="field-style field-split align-left" placeholder="Nom" required="" />
                                <input type="text" id="prenom" class="field-style field-split align-right" placeholder="Prénom" required="" />
                            </li>
                            <li>
                                <input type="email" id="email" class="field-style field-split align-left" placeholder="Email" required="">
                                <div style="float: left;">
                                    <input type="radio" name="genre" style="margin-left: 10px;" value="Homme" required="" />Homme
                                    <input type="radio" name="genre" style="margin-left: 10px;" value="Femme" />Femme
                                </div>
                            </li>
                            <li>
                                <input type="date" id="date" class="field-style field-split align-left" placeholder="Date de naissance" required="" />
                                <select id="metier" class="field-style field-split align-right" required="" style="float: right;">
                                    <option value="" disabled selected>--Métier--</option>
                                    <option value="Agents d'entretien">Agents d'entretien</option>
                                    <option value="Enseignants">Enseignants</option>
                                    <option value="Vendeurs">Vendeurs</option>
                                    <option value="Employés administratifs">Employés administratifs</option>
                                    <option value="Cadres">Cadres</option>
                                    <option value="Infirmiers">Infirmiers</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </li>
                            <li>
                                <input type="text" id="objet" class="field-style field-full align-none" placeholder="Objet" required="" />
                            </li>
                            <li>
                                <textarea id="message" class="field-style" placeholder="Message" required=""></textarea>
                            </li>
                            <li>
                                <input type="submit" value="Envoyer le message" />
                            </li>
                        </ul>
                    </form>
                </div>
            </section>

<?php 
$content=ob_get_clean(); 
require_once($_SERVER['DOCUMENT_ROOT']."/LaBalleJaune/php/squelette.php");
?>