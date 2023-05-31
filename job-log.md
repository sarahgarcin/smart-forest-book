# Job log

## BUG(s)
- BUG : quand je veux supprimer une page type logbook ou story

## TO DO
- ok - Ajouter les urls dans les footnotes (href)
- ok - Ajouter un template radio ! // avoir un design différent 
- How to guide !
- Mettre le site en ligne pour qu'elles puissent tester 
- Design template radio 
- Avoir plus de possibilités sur la couverture 
  + soit générer les auteurs depuis les articles
  + soit un texte qu'on ajoute
  + soit rien 
- Avoir la possibilité d'ajouter un index d'auteurs qui se génère automatiquement (comme l'index)
- Question de l'ordre des auteurs 
- 3000 - 5000 articles dans un chapitre Smart Forests 
- vérifier comment faire pour récupérer les articles dans d'autres langues --> essayer en mettant la langue dans l'url ? 
- Avoir la possibilité de choisir la langue page par page // avoir des traductions pour chaque statique texte (Contributors / Tags)
- Histoire des tags => une manière d'organiser le contenu ? By chapter ? Avoir une forme d'organisation  
- Backcover (comme sur le livre Manifestos)
  + Texte
  + website 
  + logos
  + endrstment
  + barcode 

### Now
- Les numéros des articles doivent être par article et non pas tous les chapitres (trouver comment faire…)
- Sommaire ajouter : pastilles numéro + icone, auteur
- Faire fonctionner la page "about the authors", comment faire pour que la page se génère automatiquement à partir de la page auteur du site ? J'ai tester en js et j'ai un problème de CORS… 

### Code
- Ajouter la fonctionnalité de carte  
- Filtering the content by tags 
  + Pouvoir organiser les éditions par tags ? Filtrer le contentu par tags
  + Create a book by tag ? or by cluster of tags ?
- Filtering the content by location
- Also having la possibilité de choisir la langue --> filtering by langage
- Cover : ajouter la possibilité d'ajuster la largeur du dos
  + j'ai essayé plein de choses et je n'arrive pas à faire passer la variable vers le pagedjs
- tester l'intégration d'image à partir de youtube 
  + pour l'instant c'est compliqué, je n'ai que le lien d'embed
  + essayer de récupérer le titre de la vidéo

### Design
- Réfléchir à comment on peut travailler les orphelines / veuves etc…
- Comment affiner le justifier !
- Micro-typographie / Faire fonctionner smartypants / ou script js
- Faire des calculs ligne de base pour que tout soit aligné
  + c'est presque bon - il y a encore le problème des images…



## Questions
- ok - Que faire avec les liens ? Les afficher ? Les mettre en notes de bas de page ?
- sent - Je ne peux pas accèder à la donnée qui dit quand l'article a été modifié
- sent - Demander à Jennifer si c'est possible dans l'API d'avoir un classement par tags
- sent - problème avec des titres mal formatés
- Que met-on sur le back-cover ? 

## Questions Posées
- Je n'arrive pas à avoir les contenus des logbooks, j'ai seulement accès à la description mais pas aux articles / sous pages des logbooks
- Comment faire quand il y a une vidéo ? 
- Quelles impressions ? Quels papiers ? Quelle reliure ?
- Qu'est ce qu'on fait avec les crédits qui ne sont pas formatés en tant que tel ? Comment affiner ? + références des citations par exemple ou citations ? (ex: les 2 derniers paragraphes ici : https://atlas.smartforests.net/en/stories/digital-technologies-and-conservation-surveillance/ ) Légendes des images de couverture pour les stories (à la fin de l'article) !
- Retranscription radio ? Comment ça marche ? + crédits dans le corps du texte ?

### Templates
- Table of content
- Index by tags (maybe cover page)
- Introduction
- Radio
- Logbooks
- Stories
- Map (maybe more a way of navigate)
- Conclusion
- References
- Contributors 

## Done
- ok - Bug numéros de page des auteurs (index sur la couverture)
- ok - Cleaner l'interface (blueprints etc.)
- ok - Général : faire un template book pour avoir un aperçu général du bouquin (avec cover et back-cover)
- ok - Avoir la possibilité de publier une version web / html du livre
- ok - BUG : quand je créer un existing -> ça bug à cause du model
- ok - Changer la couleur de la couv (plus proche des couleur de la carte)
- ok - Faire un template type intro (voir design angeline)
- ok - Faire un template type page (crédits ou autre -- genre logbook)
- ok - ajouter page about the authors
- ok - ajouter page crédits 
- ok - ajouter back cover (à voir ce qu'on met dessus)
- ok - Ajouter carte page de gauche début des stories et logbooks + tester avec box shadow
- ok - Cover : à designer
- ok - Version web / print
- ok - ajouter un listing des livres sur la page d'accueil
- ok - ajouter du grand fond 
- ok - Ligne de méta data : Je me suis basée sur 4 colonnes et si possible une vide pour espacer le contriutors des tags. A voir si c'est possible.
- ok - Impossible d'accèder à tout le contenu des logbooks via l'API
- ok - Faire fonctionner les images dans "existing"
- ok - Créer la possibilité d'avoir plusieurs livres (book) dans kirby
- ok - Avoir la possibilité de dupliquer un livre (book) [la fonction existe déjà dans kirby]
