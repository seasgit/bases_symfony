# Install Projet
```bash
 symfony new Book --full --version=5.2
```
# Première exécution
```bash
 symfony serve
```
# Premier controller
```bash
# Test console
symfony console
# puis
symfony console make:controller
```
## Premier problème
A ce stade pas de DB configurée.  
Avec la route vers le controller Book, on a une erreur : 
- -> `Environment variable not found: "DATABASE_URL".`
## Solution provisoire ou pas ?
```bash 
# dans le fichier .env
DATABASE_URL="mysql://root:@127.0.0.1:3306/db_livres_eyrolles"
# depuis le terminal
symfony console doctrine:database:create
```
Taper l'adresse :  https://localhost:8000/book
>> on arrive sur le bon controller qui lance sa vue.
# Test profiler
Barre du bas, tester l'onglet Routing
```bash
# voir les routes, les noms de route avec leur méthodes
symfony console debug:router
```
# Controller et routes
## Annotations
Ici avec nom de route préfixée par app_ et méthode HTTP.
```php
    /**
     * @Route("/book", name="app_book", methods={"GET"})
     */
    public function index(): Response
```
## Méthodes et de type de réponse
1. render() permet d'aller vers une vue html entre autre.
2. On peut aussi avoir d'autre types de réponse. voir la méthode `message()`
2.1 réponse brute type string
2.3 réponse objet JSON
## Routes et wildcard
L'art et la manière de gérer les paramètres des méthodes
#
# Twig
Voir le code autour du controller Book
# Exemple de code
```php
{% block main %}
    {% for d in data %}
        {% if loop.index0 == 0 %}
            <p style='color:hotpink'>{{ d.name }} {{ d.action }}</p>
        {% else %}
            <p>{{ d.name }} {{ d.action }}</p>
        {% endif %}
    {% endfor %}
{% endblock %}
```
__NB__ :  
- {%  %} pour exécuter
- {{  }} pour afficher
#
# Entity
## Créer une entité
```bash
# Test console et mot clé = doctrine (ORM)
symfony console
symfony console make:entity
```
## Modifier un entité
J'ai créé une entité mais j'ai oublié quelques attributs.
```bash
symfony console make:entity Book
# ajoute le champ requis
```
#
# Migrations
```bash
php bin/console make:migration
# ou
symfony console make:migration
```
Un fichier avec le code relatif au SGBD utilisé ets créé.
```bash
symfony console doctrine:migrations:migrate
```
#
# Fixtures
- Comment alimenter la base de données pour la 1ere fois.
- Système qui s'installe en mode dev.
```bash
 composer require --dev doctrine/doctrine-fixtures-bundle
 # à propos du cache
 symfony console cache:clear
 ```
 #
 # Controller et BookRepository
 - Selection de Book enregistrés dans notre base
 - Plusieurs méthodes à voir plus tard.

 # Suite à faire ensemble en classe.
 1. Modifier l'entité Book
    - Ajouter un champ `resume`
    - Ajouter un champ `prix`
 2. Refaire une migration
 3. Modifier la fixture
 4. Ajouter au controller une méthode detail pour un livre.
    - Ajouter la vue book/detail.html.twig  
 5. dans la vue d'accueil, ajouter un lien qui amène au détail.


