# csv2json
    
[Ce kata a été proposé par Frederic Bouchery](https://gist.github.com/f2r/2f1e1fa27186ac670c21d8a0303aabf1)    

## Objectifs
Vous devez réaliser une commande en PHP qui prend en paramètre, un fichier CSV et génère un JSON.

Pour lancer les tests unitaires sous Linux Mac OS X :

```
make unit-tests-loop
```

Pour lancer les tests unitaires sous Windows :
```
./vendor/bin/atoum -l 
```

Il suffit ensuite après d'appuyer sur entrée dans le terminal pour exécuter de nouveau les tests.

## Utilisation

```bash
php csv2json.php [--pretty] [--desc <path/to/descfile>] [--fields <field1,field2,field3>] [--aggregate <field>]
```

## Solution
Tout l'exercice n'a pas été implementé pendant les lives, il resterait à faire : 
* La détection intelligente du délimiteur
* Prendre le nom du fichier csv en paramètre

# Vidéo

Cet exercice a été codé en live sur ma chaîne Youtube en deux parties :
* [Partie 1](https://youtu.be/1Ph-vUQtbeU)
* [Partie 2](https://youtu.be/ZXyV5TjwTwI)

