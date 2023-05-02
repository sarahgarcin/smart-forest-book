# Job log


## BUG(s)
- BUG : quand je créer un existing -> ça bug à cause du model

## TO DO

### Code
- Impossible d'accèder à tout le contenu des logbooks via l'API
- tester l'intégration d'image à partir de youtube 
  + pour l'instant c'est compliqué, je n'ai que le lien d'embed
  + essayer de récupérer le titre de la vidéo 
- Cover : ajouter la possibilité d'ajuster la largeur du dos
  + j'ai essayé plein de choses et je n'arrive pas à faire passer la variable vers le pagedjs
- Général : faire un template book pour avoir un aperçu général du bouquin (avec cover et back-cover)
- Faire des calculs ligne de base pour que tout soit aligné
- Faire fonctionner smartypants
- Filtering the content by tags 
  + Pouvoir organiser les éditions par tags ? Filtrer le contentu par tags
- Filtering the content by location
- Create a book by tag ? or by cluster of tags ?
- Also having la possibilité de choisir la langue --> filtering by langage
- Développer les templates (voir ci-dessous) - à partir des articles sur le site
- Avoir la possibilité de publier une version web / html du livre


### Design
- Cover : à designer
- Réfléchir à comment on intègre la carte dans le book
  + comment on créer une double navigation comme dans GRAPHIC DESIGN IN THE POST-DIGITAL AGE
  + La carte peut devenir un sommaire = je recrée une carte à partir de la geolocalisation des éléments du livre avec le numéro de page 
- Rendre visible l'histoire des versions (citer la version du site)


## Questions
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
- ok - Faire fonctionner les images dans "existing"
- ok - Créer la possibilité d'avoir plusieurs livres (book) dans kirby
- ok - Avoir la possibilité de dupliquer un livre (book) [la fonction existe déjà dans kirby]
