(1) Les noms des fichiers sont nommés de cette manière: les fichies sans "traite_" sont des pages alors les fichiers avec "traite_" sont pour traiter les données générées.

(2) L'ordre de lancement: debut.php => interest.php => traite_interest.php => csp.php => traite_csp.php => Mid.php => note1.php => traite_note1.php => note2.php => traite_note2.php => note3.php => traite_note3.php => note4.php => traite_note4.php => avant.php => explanation1.php (ici script haha.py est excuté pour générer 12 recommandations selon les réponses précédentes) => traite_explanation1.php => noexp1.php => traite_noexp1.php => explanation2.php => traite_explanation2.php => noexp2.php => traite_noexp2.php =>.... 12 recommandation.... => avant.php => efficient.php => traite_efficient.php => effectiveness.php => traite_effectiveness => persuasiveness.php => traite_persuasiveness.php => satisfaction.php => traite_satisfaction.php => trust.php => traite_trust.php => transparent.php => traite_transparent.php => fin.php

(3) Recsys.sql est la base de données contenant les informations dans la base CoMoDa

(4) cluster_context_correlation.txt et context_cluster_correlation.txt contient les correlations entre contexts et les clusters des items(Dans le processus j'ai adopté item-based methods et la méthode "relevants".)

(5) history.csv est le sfichier contenant les représentations des situations contextuelles dans le base CoMoDa, ells sont calculés avant pour réduire le temps de recommandation comme elles sont réutilisables.

(6) Les images utilisés sont dans le '/img'
